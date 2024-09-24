<?php

namespace App\CentralLogics;
use Illuminate\Support\Facades\Storage;
use App\Models\Cart;

class Helpers
{
    public static function cartTotal() {
        $authUserId = 1;
        $cart = Cart::where('created_by', $authUserId)->latest()->first();

        // Use the session as fallback if user is not logged in
        $cartItems = $cart ? $cart->products : [];

        return collect($cartItems)->count();
    }

    // Clear Cart after Checkout
    public static function clearCart()
    {
        // $userId = auth()->id();
        $userId = 1;

        // Clear from session and database
        session()->forget('cart');
        $cart = Cart::where('created_by', $userId)->first();

        if ($cart) {
            Cart::where('created_by', $userId)->delete();
            return true;
        }
        return false;
    }

    public static function cartProduct($productId){

        // $userId = auth()->id();
        $userId = 1;
        $cart = Cart::where('created_by', $userId)->first();

        if ($cart) {
            // Decode existing cart items
            $cartItems = $cart->products;

            if (isset($cartItems[$productId])) {
                // $cartItems[$id]['quantity'];
                $product = $cartItems[$productId];
                return $product;
            }
            return null;
        }
        return null;
    }

    //////////////////////////

    public static function getBgColor($status, $allStatus) {
        foreach ($allStatus as $statusItem) {
            if ($statusItem['name'] === $status) {
                return $statusItem['bgColor'];
            }
        }
        return null; // Return null or a default value if the status is not found
    }

}
