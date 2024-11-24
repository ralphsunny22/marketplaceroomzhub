<?php

namespace App\CentralLogics;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Models\User;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Vendor;

class Helpers
{
    public static function generateJWT($user) {
        $payload = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'timestamp' => now()->timestamp // Add a timestamp for expiration validation
        ];

        // Generate the JWT token
        $jwt = JWT::encode($payload, env('LOGIN_SECRET'), 'HS256');

        return $jwt;
    }

    /**
     * Encrypt data
     *
     * @param string $text
     * @param string $secretKey
     * @return array
     */
    public static function encryptData($text, $secretKey) {
        $algorithm = 'aes-256-cbc';

        // Ensure the secret key is a valid length for the algorithm
        $key = hash('sha256', $secretKey, true); // Hash the key to get 256-bit key
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($algorithm)); // Generate IV

        // Encrypt the text
        $encryptedText = openssl_encrypt($text, $algorithm, $key, OPENSSL_RAW_DATA, $iv);

        return [
            'iv' => bin2hex($iv), // Convert IV to hex for safe transport
            'data' => bin2hex($encryptedText) // Convert encrypted data to hex
        ];
    }

    public static function decryptData($hash, $secretKey) {
        try {
            $algorithm = 'aes-256-cbc';

            $key = hash('sha256', $secretKey, true); // Hash the key to get 256-bit key
            $iv = hex2bin($hash['iv']); // Convert IV back to binary
            $encryptedText = hex2bin($hash['data']); // Convert encrypted data back to binary

            return $decryptedText = openssl_decrypt($encryptedText, $algorithm, $key, OPENSSL_RAW_DATA, $iv);

            // If decryption fails, $decryptedText will be false
            if ($decryptedText === false) {
                throw new \Exception('Decryption failed. Data may have been tampered with.');
            }

            return $decryptedText;
        } catch (\Exception $e) {
            // Log or handle the error as needed
            return false; // Return false to indicate decryption failure
        }
    }


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

    public static function categories(){
        $categories = Category::all();
        return $categories;
    }

    public static function vendor(){
        $vendor = Vendor::where('user_id', Auth::user()?->id)->first();
        return $vendor;
    }

    public static function allVendors(){
        $allVendors = Vendor::all();
        return $allVendors;
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
