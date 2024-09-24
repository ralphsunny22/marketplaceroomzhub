<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $products = 'all';
        return view('vendor.dashboard', compact('products' ));
    }

    public function vendorShop($owner_id)
    {
        // $authUser = Auth::user();
        $authUserId = 1;
        $products = Product::where('created_by', '1')->get();
        return view('vendor.pages.vendorShop', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function allProduct()
    {
        $products = Product::all();
        return view('vendor.pages.product.allProduct', compact('products' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addProduct()
    {
        $products = 'all';
        return view('vendor.pages.product.addProduct', compact('products' ));
    }

    /**
     * Display the specified resource.
     */
    public function addProductPost(Request $request){
        // Validate the request
        // return $files = $request->file('alternate_images');
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'featured_image' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'alternate_images.*' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            // 'specifications' => 'nullable|array',
            'specifications.*' => 'nullable|string|max:255',
        ]);

        // Handle the main image upload
        $featured_image = $this->upload('products/', 'png', $request->file('featured_image'), 'noimage.png');

        // Handle the alternate images upload (multiple)
        $alternate_images = [];
        if ($request->file('alternate_images')) {
        // if (is_array($request->file('alternate_images')) && !empty($request->file('alternate_images'))) {
            foreach ($request->file('alternate_images') as $image) {
                $alternate_images[] = $this->upload('products/', $image->getClientOriginalExtension(), $image, 'noimage.png');
            }
        }

        // Create the product
        $product = Product::create([
            'name' => $request->input('name'),
            'created_by' => 1,
            'slug' => Str::slug($request->input('name')),
            'uuid' => (string) Str::uuid(),
            'category_id' => (int) $request->input('category_id'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'description' => !empty($request->input('description')) ? $request->input('description') : null,
            'featured_image' => $featured_image,
            'alternate_images' => !empty($alternate_images) ? json_encode($alternate_images) : null,
            'specifications' => !empty($request->specifications) ? json_encode($request->input('specifications', [])) : null, // Store as JSON
        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Product added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show the edit form
    public function editProdduct($id)
    {
        $product = Product::findOrFail($id);
        return view('vendor.pages.product.editProduct', compact('product' ));
    }

    /**
     * Update the specified resource in storage.
     */
    // Handle the update request
    public function editProdductPost(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alternate_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'specifications' => 'nullable|array',
            'specifications.*' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        // Update basic fields
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));
        $product->price = $request->input('price');
        $product->category_id = (int) $request->input('category_id');
        $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');
        $product->specifications = json_encode($request->input('specifications'));

        // Handle main image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($product->featured_image && Storage::disk('public')->exists('products/' . $product->featured_image)) {
                Storage::disk('public')->delete('products/' . $product->featured_image);
            }

            // Upload new image
            $mainImageName = $this->upload('products', $request->file('featured_image')->getClientOriginalExtension(), $request->file('featured_image'), 'noimage.png');
            $product->featured_image = $mainImageName;
        }

        // Handle alternate images: removal and addition
        $currentAlternateImages = json_decode($product->alternate_images, true) ?? [];

        // Remove images marked for deletion
        if ($request->filled('deleted_images')) {
            $deletedIndexes = explode(',', $request->input('deleted_images'));
            foreach ($deletedIndexes as $index) {
                if (isset($currentAlternateImages[$index])) {
                    $imageToDelete = $currentAlternateImages[$index];
                    if (Storage::disk('public')->exists('products/' . $imageToDelete)) {
                        Storage::disk('public')->delete('products/' . $imageToDelete);
                    }
                    unset($currentAlternateImages[$index]);
                }
            }
        }

        // Handle alternate images upload
        // if ($request->hasFile('alternate_images')) {
        //     $alternateImages = [];
        //     foreach ($request->file('alternate_images') as $image) {
        //         $imageName = $this->upload('products', $image->getClientOriginalExtension(), $image, 'noimage.png');
        //         $alternateImages[] = $imageName;
        //     }
        //     $product->alternate_images = json_encode($alternateImages);
        // }
        // Handle new alternate images
        if ($request->hasFile('alternate_images')) {
            foreach ($request->file('alternate_images') as $image) {
                $imageName = $this->upload('products', $image->getClientOriginalExtension(), $image, 'default_image.jpg');
                $currentAlternateImages[] = $imageName;
            }
        }

        // Update the product's alternate images
        $product->alternate_images = json_encode(array_values($currentAlternateImages)); // Re-index the array
        $product->save();

        // Redirect with success message
        return redirect()->route('allProduct')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    protected function upload(string $dir, string $format, $image, $default_image)
    {
        if ($image != null) {
            $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $format;
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->putFileAs($dir, $image, $imageName);
        } else {
            $imageName = $default_image;
        }

        return $imageName;
    }
}
