<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;
use Illuminate\Support\Facades\Session;
use App\CentralLogics\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Vendor;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function landing($ivData="", $mData="")
    public function landing()
    {
        $vendors = Vendor::all();
        $categories = Category::all();
        $products = Product::all();

        return view('pages.landing', compact('products', 'categories', 'vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function generalShop()
    {
        // $authUser = Auth::user();
        $authUserId = 1;
        $products = Product::where('created_by', '1')->get();
        return view('pages.generalShop', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function categoryShop($categorySlug)
    {
        $category = Category::where('slug',$categorySlug)->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('pages.categoryShop', compact('products','category'));
    }

    /**
     * Display the specified resource.
     */

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
