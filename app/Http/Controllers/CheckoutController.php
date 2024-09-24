<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Cart;  // Assuming you have a Cart model to get the cart items

class CheckoutController extends Controller
{
    public function checkout()
    {
        // $userId = auth()->id();
        $userId = 1;
        $cart = Cart::where('created_by', $userId)->first();

        if (!$cart) {
            // abort('404');
            // return back();
            return redirect()->route('cartList');
        }

        // Use the session as fallback if user is not logged in
        // $cartItems = session('cart', $cart ? $cart->products : []);
        $cartItems = $cart ? $cart->products : [];

        // Calculate total
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('pages.checkout.checkout', compact('cart', 'cartItems', 'total'));
    }
    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name'  => 'required|string|max:255',
    //         'company_name' => 'nullable|string|max:255',
    //         'country'    => 'required|string|max:255',
    //         'address1'   => 'required|string|max:255',
    //         'address2'   => 'nullable|string|max:255',
    //         'city'       => 'required|string|max:255',
    //         'phone'      => 'required|string|max:20',
    //         'email'      => 'required|email|max:255',
    //         'shipping_method' => 'required|in:free_shipping,local,flat_rate',
    //         'payment_method' => 'required|in:bank_transfer,cod,stripe',
    //     ]);

    //     // Calculate the total from the cart
    //     $cartItems = Cart::where('user_id', auth()->id())->get();
    //     $cartTotal = $cartItems->sum(function ($item) {
    //         return $item->price * $item->quantity;
    //     });

    //     $shippingFee = $this->calculateShippingFee($request->shipping_method);
    //     $total = $cartTotal + $shippingFee;

    //     // Save the checkout details
    //     $checkout = new Checkout();
    //     $checkout->user_id = auth()->id();
    //     $checkout->first_name = $validatedData['first_name'];
    //     $checkout->last_name = $validatedData['last_name'];
    //     $checkout->company_name = $validatedData['company_name'];
    //     $checkout->country = $validatedData['country'];
    //     $checkout->address1 = $validatedData['address1'];
    //     $checkout->address2 = $validatedData['address2'];
    //     $checkout->city = $validatedData['city'];
    //     $checkout->phone = $validatedData['phone'];
    //     $checkout->email = $validatedData['email'];
    //     $checkout->notes = $request->notes;
    //     $checkout->shipping_method = $validatedData['shipping_method'];
    //     $checkout->payment_method = $validatedData['payment_method'];
    //     $checkout->total = $total;

    //     $checkout->save();

    //     // Redirect or process the payment method
    //     return redirect()->route('checkout.success');  // Or process payment
    // }

    // private function calculateShippingFee($shippingMethod)
    // {
    //     switch ($shippingMethod) {
    //         case 'free_shipping':
    //             return 0;
    //         case 'local':
    //             return 15;  // Example flat fee for local shipping
    //         case 'flat_rate':
    //             return 35;
    //         default:
    //             return 0;
    //     }
    // }
}

