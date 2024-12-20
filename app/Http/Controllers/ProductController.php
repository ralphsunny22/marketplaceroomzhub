<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\CentralLogics\Helpers;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function singleProduct(string $id)
    {
        $product = Product::findOrFail($id);
        $alternate_images = $product->alternate_images ? json_decode($product->alternate_images) : null;

        $owner_id = $product->created_by;

        //cartProduct
        $cartProduct = Helpers::cartProduct($product->id); //{"name":"Annie Shoe","quantity":8,"price":1000,"featured_image":"2024-09-14-66e582b673b00.png"}
        $cartProductQty = $cartProduct ?  $cartProduct['quantity'] : 1;

        $similarProducts = Product::where('id', '!=', $id)->where('category_id', $product->category_id)->where('created_by', $owner_id)->get();

        return view('pages.product.singleProduct', compact('product', 'alternate_images', 'cartProductQty', 'similarProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
