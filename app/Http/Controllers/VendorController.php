<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Order;

class VendorController extends Controller
{
    public function vendorRegister()
    {
        $authUser = !Auth::guest() ? Auth::user() : "";
        return view('vendor.pages.addVendor', compact('authUser'));
    }

    public function vendorRegisterPost(Request $request)
    {
        $authUser = !Auth::guest() ? Auth::user() : null;
        $rules = array(
            'name' => $authUser ? 'nullable|string' : 'required|string',
            'email' => $authUser ? 'nullable|string|email' : 'required|string|email',
            'password' => $authUser ? 'nullable|string' : 'nullable|string',

            'business_name' => 'required|string',
            'business_link' => 'nullable|string',

            'featured_logo' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'featured_image' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'alternate_images.*' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',

            'business_city' => 'required|string',
            'business_state' => 'required|string',
            'business_country' => 'required|string',
            'business_address' => 'required|string',
        );
        $messages = [
            'email.string' => '* Invalid Characters',
            'email.email' => '* Must be of Email format with \'@\' symbol',

            'password.string'   => 'Invalid Characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $vendor = new Vendor();

            if (!$authUser) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::login($user);
            }

            $vendor->business_name = $request->business_name;
            $vendor->slug = Str::slug($request->business_name);
            $vendor->user_id = $authUser ? $authUser->id : $user->id;
            $vendor->business_link = $request->business_link ? $request->business_link : null;

            $vendor->business_city = $request->business_city;
            $vendor->business_state = $request->business_state;
            $vendor->business_country = $request->business_country;
            $vendor->business_address = $request->business_address;
            $vendor->category_id = $request->category_id;

            $vendor->business_description = $request->business_description;

            // Handle the main image upload
            $featured_logo = $this->upload('vendors/', 'png', $request->file('featured_logo'), 'noimage.png');
            $featured_image = $this->upload('vendors/', 'png', $request->file('featured_image'), 'noimage.png');

            // Handle the alternate images upload (multiple)
            $alternate_images = [];
            if ($request->file('alternate_images')) {
            // if (is_array($request->file('alternate_images')) && !empty($request->file('alternate_images'))) {
                foreach ($request->file('alternate_images') as $image) {
                    $alternate_images[] = $this->upload('vendors/', $image->getClientOriginalExtension(), $image, 'noimage.png');
                }
            }

            $vendor->featured_logo = $featured_logo;
            $vendor->featured_image = $featured_image;
            $vendor->alternate_images = !empty($alternate_images) ? json_encode($alternate_images) : null;

            $vendor->save();

            return redirect()->route('vendorDashboard');
        }
    }

    public function vendorEditBusinessDetailPost(Request $request)
    {
        $authUser = Auth::user();
        $rules = array(

            'business_name' => 'required|string',
            'business_link' => 'nullable|string',

            'featured_logo' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'featured_image' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'alternate_images.*' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',

            'business_city' => 'required|string',
            'business_state' => 'required|string',
            'business_country' => 'required|string',
            'business_address' => 'required|string',
        );
        $messages = [
            'email.string' => '* Invalid Characters',
            'email.email' => '* Must be of Email format with \'@\' symbol',

            'password.string'   => 'Invalid Characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $vendor = Vendor::where(['user_id'=>$authUser->id])->first();

            $vendor->business_name = $request->business_name;
            $vendor->slug = Str::slug($request->business_name);
            $vendor->user_id = $authUser->id;
            $vendor->business_link = $request->business_link ? $request->business_link : null;

            $vendor->business_city = $request->business_city;
            $vendor->business_state = $request->business_state;
            $vendor->business_country = $request->business_country;
            $vendor->business_address = $request->business_address;
            $vendor->category_id = $request->category_id;

            $vendor->business_description = $request->business_description;

            // Handle the main image upload
            if ($request->hasFile('featured_logo')) {
                // Delete old image if exists
                if ($vendor->featured_logo && Storage::disk('public')->exists('vendors/' . $vendor->featured_logo)) {
                    Storage::disk('public')->delete('vendors/' . $vendor->featured_logo);
                }

                // Upload new image
                $mainImageName = $this->upload('vendors', $request->file('featured_logo')->getClientOriginalExtension(), $request->file('featured_logo'), 'noimage.png');
                $vendor->featured_logo = $mainImageName;
            }

            if ($request->hasFile('featured_image')) {
                // Delete old image if exists
                if ($vendor->featured_image && Storage::disk('public')->exists('vendors/' . $vendor->featured_image)) {
                    Storage::disk('public')->delete('vendors/' . $vendor->featured_image);
                }

                // Upload new image
                $mainImageName = $this->upload('vendors', $request->file('featured_image')->getClientOriginalExtension(), $request->file('featured_image'), 'noimage.png');
                $vendor->featured_image = $mainImageName;
            }

            // Handle alternate images: removal and addition
            $currentAlternateImages = json_decode($vendor->alternate_images, true) ?? [];

            // Remove images marked for deletion
            if ($request->filled('deleted_images')) {
                $deletedIndexes = explode(',', $request->input('deleted_images'));
                foreach ($deletedIndexes as $index) {
                    if (isset($currentAlternateImages[$index])) {
                        $imageToDelete = $currentAlternateImages[$index];
                        if (Storage::disk('public')->exists('vendors/' . $imageToDelete)) {
                            Storage::disk('public')->delete('vendors/' . $imageToDelete);
                        }
                        unset($currentAlternateImages[$index]);
                    }
                }
            }

            // Handle new alternate images
            if ($request->hasFile('alternate_images')) {
                foreach ($request->file('alternate_images') as $image) {
                    $imageName = $this->upload('vendors', $image->getClientOriginalExtension(), $image, 'default_image.jpg');
                    $currentAlternateImages[] = $imageName;
                }
            }

            // Update the vendor's alternate images
            $vendor->alternate_images = json_encode(array_values($currentAlternateImages)); // Re-index the array
            $vendor->save();

            // return redirect()->route('vendorDashboard');
            return back();
        }
    }

    public function vendorAccount()
    {
        $authUser = auth()->user();
        $owner = $authUser;
        $vendor = Vendor::with('category')->where(['user_id'=>$authUser->id])->first();
        return view('vendor.pages.account.vendorAccountSetting', compact('authUser','owner','vendor'));
    }

    public function dashboard()
    {
        if (Auth::guest()) {
            return view('pages.auth.login');
        }
        $authUser = Auth::user();
        $owner = $authUser;
        $products = 'all';
        return view('vendor.dashboard', compact('products', 'authUser', 'owner' ));
    }

    public function vendorShop($owner_id, $shop_slug="")
    {
        $owner = User::findOrFail($owner_id);
        $shop = Vendor::where(['user_id'=>$owner_id, 'slug'=>$shop_slug])->first();
        // $authUserId = 1;
        $products = Product::where('created_by', $owner_id)->get();
        return view('vendor.pages.vendorShop', compact('products', 'owner', 'owner_id', 'shop', 'shop_slug'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function allProduct()
    {
        $authUser = auth()->user();
        $owner = $authUser;
        $products = Product::where('created_by', $owner->id)->get();
        return view('vendor.pages.product.allProduct', compact('products', 'owner' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addProduct()
    {
        $authUser = auth()->user();
        $owner = $authUser;
        $products = Product::where('created_vy', $owner->id)->get();
        return view('vendor.pages.product.addProduct', compact('products', 'owner' ));
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
        return redirect()->route('vendorAllProduct')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function vendorOrders()
    {
        $authUser = auth()->user();
        $owner = $authUser;
        $orders = Order::where('vendor_id', $owner->id)->get();
        return view('vendor.pages.orders.vendorOrders', compact('orders', 'owner' ));
    }

    public function vendorSingleOrder($order_id)
    {
        $authUser = auth()->user();
        $owner = $authUser;
        $order = Order::with('customer')->where('id', $order_id)->where('vendor_id', $owner->id)->first();
        $cartItems = $order->products;

        // Calculate total
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('vendor.pages.orders.vendorOrderDetail', compact('order', 'owner', 'cartItems', 'total' ));
    }

    public function updateOrderStatus(Request $request, $order_id)
    {
        $authUser = auth()->user();
        $owner = $authUser;
        $status = $request->order_status;
        $order = Order::where('id', $order_id)->first();
        $order->status = $status;
        $order->save();

        return back()->with('success', 'Updated Successfully');
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
