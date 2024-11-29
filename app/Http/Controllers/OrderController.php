<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\Product;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

use Stripe\Stripe;
use Stripe\Checkout\Session;

class OrderController extends Controller
{
    //proceed to checkout
    public function placeOrder(Request $request)
    {
        // Validate the request data
        // try {
            //code...
        $request->validate([
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'billing_country' => 'required|string',
            'billing_address1' => 'required|string',
            'billing_address2' => 'nullable',
            'billing_city' => 'required|string',
            'billing_phone' => 'required|string',
            'billing_email' => 'required|string',

            'different_ship' => 'nullable|string|in:same,different',

            'shipping_country' => 'required_if:different_ship,different',
            'shipping_address1' => 'required_if:different_ship,different',
            'shipping_address2' => 'nullable',
            'shipping_city' => 'nullable|string',
            'shipping_phone' => 'required_if:different_ship,different',

            'note' => 'nullable',

            'shipping_method' => 'nullable|in:free_shipping,local,flat_rate',
            'payment_method' => 'required|in:bank_transfer,cash_on_delivery,stripe',
            // 'total' => 'required|numeric',
        ]);

        // Calculate the total from the cart
        $authUser = auth()->user();
        // $authUser->id = 1;
        $cart = Cart::where('created_by', $authUser->id)->first();

        // Use the session as fallback if user is not logged in
        $cartItems = $cart->products;

        // Calculate total
        $cartTotal = 0;
        $firstProductInCart = $cartItems; // Your JSON-like structure

        // Extract the first key
        $firstKey = array_key_first($firstProductInCart);

        // Extract the first item's value using the key
        // $firstItem = $firstProductInCart[$firstKey];

        $vendorId = Product::find($firstKey)->created_by;

        foreach ($cartItems as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }

        if ($request['different_ship']=='different') {
            //billing details is different from shipping details
            $orderData = [
                'created_by' => $authUser->id, // If logged in, otherwise nullable
                'products' => $cartItems,
                'vendor_id' => $vendorId,
                // 'first_name' => $request['first_name'],
                // 'last_name' => $request['last_name'],
                'billing_country' => $request['billing_country'],
                'billing_address1' => $request['billing_address1'],
                'billing_address2' => !empty($request['billing_address2']) ? $request['billing_address2'] : null,
                'billing_city' => $request['billing_city'],
                'billing_phone' => $request['billing_phone'],
                'billing_email' => $request['billing_email'],
                'different_ship' => 'different',

                'shipping_country' => !empty($request['shipping_country']) ? $request['shipping_country'] : null,
                'shipping_address1' => $request['shipping_address1'],
                'shipping_address2' => !empty($request['shipping_address2']) ? $request['shipping_address2'] : null,
                'shipping_city' => !empty($request['shipping_city']) ? $request['shipping_city'] : null,
                'shipping_phone' => !empty($request['shipping_phone']) ? $request['shipping_phone'] : null,
                'shipping_method' => !empty($request['shipping_method']) ? $request['shipping_method'] : 'free',
                'payment_method' => !empty($request['payment_method']) ? $request['payment_method'] : 'cash_on_delivery',

                'note' => !empty($request['note']) ? $request['note'] : null,

                'total' => $cartTotal,
                'status' => 'pending',

            ];
        } else {
            $orderData = [
                'created_by' => $authUser->id, // If logged in, otherwise nullable
                'products' => $cartItems,
                'vendor_id' => $vendorId,
                'first_name' => null,
                'last_name' => null,
                'billing_country' => $request['billing_country'],
                'billing_address1' => $request['billing_address1'],
                'billing_address2' => !empty($request['billing_address2']) ? $request['billing_address2'] : null,
                'billing_city' => $request['billing_city'],
                'billing_phone' => $request['billing_phone'],
                'billing_email' => $request['billing_email'],
                'different_ship' => 'same',

                'shipping_country' => $request['billing_country'],
                'shipping_address1' => $request['billing_address1'],
                'shipping_address2' => !empty($request['billing_address2']) ? $request['billing_address2'] : null,
                'shipping_city' => $request['billing_city'],
                'shipping_phone' => $request['billing_phone'],
                'shipping_method' => !empty($request['shipping_method']) ? $request['shipping_method'] : 'free',
                'payment_method' => !empty($request['payment_method']) ? $request['payment_method'] : 'cash_on_delivery',

                'note' => !empty($request['note']) ? $request['note'] : null,

                'total' => $cartTotal,
                'status' => 'pending',

            ];
        }

        if ($request['payment_method'] === 'stripe') {
            // Redirect to Stripe payment
            return $this->handleStripePayment($request, $orderData, $cart->id, $cartTotal, $authUser);
        }

        // Check if payment method is cash_on_delivery or manual bank_transfer
        if ($request['payment_method'] === 'cash_on_delivery' || $request['payment_method'] === 'bank_transfer') {
            // Save the order
            $order = Order::create($orderData);
            $cart->delete();
            // You can redirect to a confirmation page, etc.
            return redirect()->route('orderConfirmation', ['order' => $order->id]);
        }

        // Check if payment method is Stripe
        if ($request['payment_method'] === 'stripe') {
            return $this->processStripePayment($order);
        }

        // } catch (\Exception $e) {
        //     //throw $th;
        //     return $e->getMessage();
        // }
    }

    public function orderConfirmation(Order $order)
    {
        return view('pages.payment.orderConfirmation', compact('order'));
    }

    private function calculateShippingFee($shippingMethod)
    {
        switch ($shippingMethod) {
            case 'free_shipping':
                return 0;
            case 'local':
                return 15;  // Example flat fee for local shipping
            case 'flat_rate':
                return 35;
            default:
                return 0;
        }
    }

    // Handle Stripe Payment
    protected function handleStripePayment($request, $orderData, $cartId, $cartTotal, $authUser)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $order = Order::create($orderData); //as pending
        $amountTotal = (int) $cartTotal * 100;

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Order from ' . $authUser->name,
                    ],
                    'unit_amount' => $amountTotal, // Example amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.stripeSuccess', ['orderId'=>$order->id, 'cartId'=>$cartId]),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($checkoutSession->url);
    }

    // Stripe Success
    public function stripeSuccess($orderId, $cartId)
    {
        // Save the order after payment success
        $orderData = Order::find($orderId);
        $orderData->status = 'paid';
        $orderData->save();

        if ($cartId) {
            $cart = Cart::find($cartId);
            $cart?->delete();
        }

        // Save the order now
        // $order = Order::create(array_merge($orderData, ['status' => 'paid']));

        return redirect()->route('checkout.success', ['orderId' => $orderData->id]);
    }

    // Order Success
    public function orderSuccess($orderId)
    {
        $order = Order::findOrFail($orderId);
        // return view('order-success', compact('order'));
        return view('pages.payment.orderConfirmation', compact('order'));
    }

    // Cancel Order
    public function orderCancel()
    {
        return view('pages.payment.orderCancel', compact('order'));
    }

}
