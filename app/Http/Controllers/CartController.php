<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
     // Add to Cart
    public function addToCart($id, $qty)
    {
        $product = Product::findOrFail($id); // Assuming you have a Product model
        // $userId = auth()->id(); // Get logged-in user's ID if applicable
        $userId = 1; // Get logged-in user's ID if applicable

        // Find cart in database, or create a new one if it doesn't exist
        $cart = Cart::firstOrCreate(
            ['created_by' => $userId],
            ['products' => []]
        );

        // Decode existing cart items
        $cartItems = $cart->products;

        // Add product to cart or increment quantity if it exists
        if (isset($cartItems[$id])) {
            // $cartItems[$id]['quantity']++;
            $cartItems[$id]['quantity'] = $qty;
        } else {
            $cartItems[$id] = [
                "name" => $product->name,
                // "quantity" => 1,
                "quantity" => $qty,
                "price" => $product->price,
                "featured_image" => $product->featured_image,
            ];
        }

        // Update cart products in the database
        $cart->products = $cartItems;
        $cart->save();

        // Optionally store in session for quick access
        session()->put('cart', $cartItems);

        // Return cart count for UI
        return response()->json([
            'success' => true,
            'cartCount' => count($cartItems),
        ]);
    }

    public function addToCartMultiple($id)
    {
        $product = Product::findOrFail($id); // Assuming you have a Product model
        // $userId = auth()->id(); // Get logged-in user's ID if applicable
        $userId = 1; // Get logged-in user's ID if applicable

        // Find cart in database, or create a new one if it doesn't exist
        $cart = Cart::firstOrCreate(
            ['created_by' => $userId],
            ['products' => []]
        );

        // Decode existing cart items
        $cartItems = $cart->products;

        // Add product to cart or increment quantity if it exists
        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity']++;
        } else {
            $cartItems[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "featured_image" => $product->featured_image,
            ];
        }

        // Update cart products in the database
        $cart->products = $cartItems;
        $cart->save();

        // Optionally store in session for quick access
        session()->put('cart', $cartItems);

        // Return cart count for UI
        return response()->json([
            'success' => true,
            'cartCount' => count($cartItems),
        ]);
    }

    // Remove from Cart
    public function removeFromCart($id){
        // $userId = auth()->id();
        $userId = 1;
        $cart = Cart::where('created_by', $userId)->first();

        if ($cart) {
            $cartItems = $cart->products;

            // Remove the product
            if (isset($cartItems[$id])) {
                unset($cartItems[$id]);
            }

            // Update cart in database
            $cart->products = $cartItems;
            $cart->save();

            // Update session
            session()->put('cart', $cartItems);
        }

        return redirect()->back()->with('success', 'Product removed from cart');
    }

    // View Cart
    public function viewCart()
    {
        // $userId = auth()->id();
        $userId = 1;
        $cart = Cart::where('created_by', $userId)->first();

        // Use the session as fallback if user is not logged in
        // $cartItems = session('cart', $cart ? $cart->products : []);
        $cartItems = $cart ? $cart->products : [];

        // Calculate total
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('pages.cart.cartList', compact('cartItems', 'total', 'cart'));
    }

    public function updateCart(Request $request)
    {
        $cart = Cart::find($request->cartId);

        // Decode existing cart items
        $cartItems = $cart->products;

        // Get the cart data from the form submission
        $cartData = $request->input('cart');

        // Loop through the cart data and update quantities
        foreach ($cartData as $id => $data) {
            if (isset($cartItems[$id])) {
                $cartItems[$id]['quantity'] = $data['quantity'];
            }
        }

        // Update cart products in the database
        $cart->products = $cartItems;
        $cart->save();

        // Optionally, return success message or redirect back to cart
        // return redirect()->route('cartList')->with('success', 'Cart updated successfully.');
        return back()->with('success', 'Cart updated successfully.');
    }

    // Clear Cart after Checkout
    public function clearCart()
    {
        // $userId = auth()->id();
        $userId = 1;

        // Clear from session and database
        session()->forget('cart');

        if ($userId) {
            Cart::where('created_by', $userId)->delete();
        }

        return redirect()->route('cartList')->with('success', 'Cart cleared successfully');
    }
}
