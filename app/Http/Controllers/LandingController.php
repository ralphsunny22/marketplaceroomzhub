<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landing()
    {
        $products = Product::all();
        return view('pages.landing', compact('products' ));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
