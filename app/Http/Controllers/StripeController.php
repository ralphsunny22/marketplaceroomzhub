<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

use App\Model\Order;
use App\Model\Cart;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    // public function paymentSuccess(Order $order)
    // {
    //     // Update the order status to completed
    //     $order->update([
    //         'order_status' => 'completed',
    //     ]);

    //     // Redirect to a thank-you page or order confirmation page
    //     return view('order.thank_you', ['order' => $order]);
    // }

    // public function paymentSuccess(Order $order)
    // {
    //     // Update order status to completed
    //     $order->update(['order_status' => 'completed']);

    //     // Send confirmation email
    //     Mail::to($order->email)->send(new OrderConfirmationMail($order));

    //     return view('order.thank_you', ['order' => $order]);
    // }

    public function paymentSuccess(Request $request, Order $order)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // Retrieve the Checkout session to confirm payment success
        $session = \Stripe\Checkout\Session::retrieve($request->query('session_id'));

        if ($session->payment_status == 'paid') {
            // Update order status to completed
            $order->update(['order_status' => 'completed']);

            // Send confirmation email
            Mail::to($order->email)->send(new OrderConfirmationMail($order));

            return view('order.thank_you', ['order' => $order]);
        } else {
            return back()->withErrors('Payment not successful. Please try again.');
        }
    }

    public function paymentCancel(Order $order)
    {
        // Update order status to canceled
        $order->update(['order_status' => 'canceled']);

        return redirect()->route('cart.index')->withErrors('Payment was canceled. Please try again.');
    }

    // Function to handle Stripe payment
    // protected function processStripePayment($order)
    // {
    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     // Create a PaymentIntent with the order total amount in cents
    //     $paymentIntent = PaymentIntent::create([
    //         'amount' => $order->total * 100, // Stripe expects amount in cents
    //         'currency' => 'usd',
    //         'metadata' => [
    //             'order_id' => $order->id,
    //         ],
    //     ]);

    //     // Return the client secret to the frontend to display Stripe form
    //     return view('stripe.checkout', [
    //         'clientSecret' => $paymentIntent->client_secret,
    //         'order' => $order,
    //     ]);
    // }

    // protected function processStripePayment($order)
    // {
    //     try {
    //         Stripe::setApiKey(config('services.stripe.secret'));

    //         // Create PaymentIntent
    //         $paymentIntent = PaymentIntent::create([
    //             'amount' => $order->total * 100, // Amount in cents
    //             'currency' => 'usd',
    //             'metadata' => ['order_id' => $order->id],
    //         ]);

    //         return view('stripe.checkout', [
    //             'clientSecret' => $paymentIntent->client_secret,
    //             'order' => $order,
    //         ]);
    //     } catch (\Exception $e) {
    //         // Handle Stripe API errors
    //         return back()->withErrors('An error occurred while processing your payment: ' . $e->getMessage());
    //     }
    // }

    protected function processStripePayment($order)
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            // Create Stripe Checkout Session
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Order #' . $order->id,
                        ],
                        'unit_amount' => $order->total * 100, // Amount in cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                // The placeholder {CHECKOUT_SESSION_ID} is automatically replaced by Stripe with the actual session ID when the user completes the payment.
                // When the user is redirected to the success_url, the CHECKOUT_SESSION_ID will be included in the query string, like this: payment.success?order=123&session_id=cs_test_12345.
                // You can then retrieve the session ID from the URL (using request('session_id') in Laravel) on the payment.success route to verify the payment with Stripe and update the order status.
                'success_url' => route('payment.success', ['order' => $order->id]) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel', ['order' => $order->id]),
            ]);

            return redirect($session->url);

        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while initiating payment: ' . $e->getMessage());
        }
    }
}
