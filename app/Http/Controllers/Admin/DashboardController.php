<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;

use App\CentralLogics\Helpers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Order;

class DashboardController extends Controller
{
    public function handleAutoLogin(Request $request)
    {
        try {
            // Get the token from the query parameter
            $auto_login_token = (string) $request->query('auto_login_token');

            // Decode the token
            $payload = JWT::decode($auto_login_token, new Key(env('LOGIN_SECRET'), 'HS256'));

            // Validate timestamp
            if (now()->timestamp - $payload->timestamp > 28000000) { // 8 mths expiration
                return response('Token expired', 403);
            }

            $user = User::where('email', $payload->email)->first();
            if ($user) {
                $user->name = $payload->name;
                $user->email = $payload->email;
                $user->password = $payload->password;
                $user->auto_login_token = $auto_login_token;
                $user->save();
            } else {
                $user = new User();
                $user->name = $payload->name;
                $user->email = $payload->email;
                $user->password = $payload->password;
                $user->auto_login_token = $auto_login_token;
                $user->save();
            }

            // Log the user in
            $token = Auth::guard('admin')->login($user);
            return redirect()->route('adminDashboard');

        } catch (\Exception $e) {
            // return response()->json([
            //     'success' => false,
            //     'message' => $e->getMessage(),

            // ],500);
            return back();
        }
    }

    public function autologin($section)
    {
        $user = Auth::guard('admin')->user();
        $auto_login_token = $user->auto_login_token;
        $url = 'https://'.$section.'.roomzhub.com/admin/auth/auto-login?auto_login_token='.$auto_login_token;
        // return Redirect::away('http://127.0.0.1:9000/admin/auth/auto-login?auto_login_token='.$auto_login_token);
        return Redirect::away($url);
    }

    public function login()
    {
        return view('backend.auth.login');
    }

    public function loginPost(Request $request)
    {
        $rules = array(
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string',
        );
        $messages = [
            'email.required' => '* Your Email is required',
            'email.string' => '* Invalid Characters',
            'email.email' => '* Must be of Email format with \'@\' symbol',
            'email.exists' => '* Invalid Credentials',

            'password.required'   => 'This field is required',
            'password.string'   => 'Email does not exist',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $user = User::where('email',$request->email)->first();
            if($user->status !== 'superadmin'){
                return back()->with('error', 'Unauthorised Process');
            }
            if (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'status' => 'superadmin' // Ensure only admin users can log in
            ])) {
                $auto_login_token = Helpers::generateJWT($user);
                $user->auto_login_token = $auto_login_token;
                $user->save();

                Auth::guard('admin')->login($user);

                return redirect()->route('adminDashboard');
            }

            // $credentials = $request->only('email', 'password');
            // $check = Auth::guard('admin')->attempt($credentials);
            // if (!$check) {
            //     return back()->with('error', 'Invalid email or password, please check your credentials and try again');
            // }
            // $user = Auth::getProvider()->retrieveByCredentials($credentials); //full user details

            $auto_login_token = Helpers::generateJWT($user);
            $user->auto_login_token = $auto_login_token;
            $user->save();

            Auth::guard('admin')->login($user);


            return redirect()->route('adminDashboard');
        }
    }

    public function logout()
    {
        $user = Auth::guard('admin')->user();
        Auth::guard('admin')->logout($user);
        return view('backend.auth.login');
    }

    public function adminDashboard()
    {
        $users = User::count();

        $products = Product::count();
        $productPending = Product::where('status', 'pending')->count();
        $productFeatured = Product::where('status', 'featured')->count();

        $vendors = Vendor::count();
        $vendorPending = Vendor::where('status', 'pending')->count();
        $vendorConfirmed = Vendor::where('status', 'confirmed')->count();
        $vendorSuspended = Vendor::where('status', 'suspended')->count();

        $customers = Order::distinct('created_by')->count();

        $orders = Order::count();
        $orderPending = Order::where('status', 'pending')->count();
        $orderDelivered = Order::where('status', 'delivered')->count();
        $orderCancelled = Order::where('status', 'cancelled')->count();

        return view('backend.dashboard', compact('products', 'productPending', 'productFeatured', 'users',
        'vendors', 'vendorPending', 'vendorConfirmed', 'vendorSuspended', 'customers',
        'orders', 'orderPending', 'orderDelivered', 'orderCancelled'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function allCustomer()
    {
        // Fetch distinct 'created_by' customers along with their relationship
        $customers = Order::with('customer')
            ->select('created_by') // Select only the 'created_by' column
            ->distinct()
            ->get();

        $allStatus = [
            ['name'=>'active', 'bgColor'=>'success'],
            ['name'=>'inactive', 'bgColor'=>'danger'],
        ]; //'completed', 'pending', 'draft'

        return view('backend.customer.allCustomer', compact('customers', 'allStatus'));
    }


    public function allVendor($status="")
    {
        if ($status=="") {
            $vendors = Vendor::with('user')->get();
        }
        if ($status=="pending") {
            $vendors = Vendor::with('user')->where('status', 'pending')->get();
        }
        if ($status=="confirmed") {
            $vendors = Vendor::with('user')->where('status', 'confirmed')->get();
        }
        if ($status=="suspended") {
            $vendors = Vendor::with('user')->where('status', 'suspended')->get();
        }


        $allStatus = [
            ['name'=>'confirmed', 'bgColor'=>'success'],
            ['name'=>'pending', 'bgColor'=>'primary'],
            ['name'=>'suspended', 'bgColor'=>'danger'],
        ];

        return view('backend.vendor.allVendor', compact('vendors', 'allStatus', 'status'));
    }

    public function singleVendor($vendor_id)
    {
        // $vendor = Vendor::find($vendor_id);
        // $vendorUserId = $vendor->user_id;
        $business = Vendor::with(['user'])->where('id', $vendor_id)->first();
        $business['orders'] = Order::where('vendor_id', $business->user_id)->get();
        $business['products'] = Product::where('created_by', $business->user_id)->get();

        $allStatus = [
            ['name'=>'confirmed', 'bgColor'=>'success'],
            ['name'=>'pending', 'bgColor'=>'primary'],
            ['name'=>'suspended', 'bgColor'=>'danger'],
        ];

        return view('backend.vendor.singleVendor', compact('business', 'allStatus'));
    }

    public function editVendorPost(Request $request, $vendor_id)
    {
        $authUser = Auth::user();
        $rules = array(
            'business_name' => 'required|string',
            'business_link' => 'nullable|string',

            'featured_logo' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'featured_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'alternate_images.*' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',

            'business_city' => 'required|string',
            'business_state' => 'required|string',
            'business_country' => 'required|string',
            'business_address' => 'required|string',
        );
        $messages = [
            'business_name.required' => '* Business name is required',
            'business_name.string'   => 'Invalid Characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $vendor = Vendor::where(['id'=>$vendor_id])->first();

            $vendor->business_name = $request->business_name;
            $vendor->slug = Str::slug($request->business_name);
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
            // $currentAlternateImages = json_decode($vendor->alternate_images, true) ?? [];
            $currentAlternateImages = $vendor->getRawOriginal('alternate_images') ? json_decode($vendor->getRawOriginal('alternate_images'), true) : [];

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

            return back()->with('sucess', 'Vendor Updated Successfully');
        }
    }

    public function editVendor($vendor_id)
    {
        $authUser = auth()->user();
        $vendor = Vendor::with('category')->where('id', $vendor_id)->first();

        return view('backend.vendor.editVendor', compact('vendor'));
    }

    public function createCategory()
    {
        return view('backend.category.createCategory');
    }

    public function createCategoryPost(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->uuid = (string) Str::uuid();

        // Handle the main image upload
        $featured_logo = $this->upload('categories/', 'png', $request->file('featured_logo'), 'noimage.png');

        $category->featured_logo = $featured_logo;
        $category->save();

        return back()->with('sucess', 'Categoty Saved Successfully');

    }

    public function editCategoryPost(Request $request, $category_id)
    {
        $user = Auth::guard('admin')->user();
        $category = Category::find($category_id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if ($request->hasFile('featured_logo')) {
            // Delete old image if exists
            if ($category->featured_logo && Storage::disk('public')->exists('categories/' . $category->featured_logo)) {
                Storage::disk('public')->delete('categories/' . $category->featured_logo);
            }

            // Upload new image
            $mainImageName = $this->upload('categories', $request->file('featured_logo')->getClientOriginalExtension(), $request->file('featured_logo'), 'noimage.png');
            $category->featured_logo = $mainImageName;
        }
        $category->save();
        return back()->with('sucess', 'Categoty Updated Successfully');
    }

    public function editCategory($category_id)
    {
        $category = Category::find($category_id);
        return view('backend.category.editCategory', compact('category'));
    }


    public function allCategory()
    {
        $categories = Category::all();
        return view('backend.category.allCategory', compact('categories'));
    }

    public function allProduct($status="")
    {
        if ($status=="") {
            $products = Product::with(['createdBy','category'])->get();
        } else {
            $products = Product::with(['createdBy','category'])->where('status',$status)->get();
        }


        $allStatus = [
            ['name'=>'pending', 'bgColor'=>'primary'],
            ['name'=>'featured', 'bgColor'=>'success'],
        ];

        return view('backend.product.allProduct', compact('products', 'allStatus', 'status'));
    }

    public function allOrder($status="")
    {
        if ($status=="") {
            $orders = Order::with(['customer','vendor'])->get();
        } else {
            $orders = Order::with(['customer','vendor'])->where('status',$status)->get();
        }

        $allStatus = [
            ['name'=>'pending', 'bgColor'=>'primary'],
            ['name'=>'featured', 'bgColor'=>'success'],
        ];

        return view('backend.order.allOrder', compact('orders', 'allStatus', 'status'));
    }

    public function orderDetail(string $order_id)
    {
        $order = Order::find($order_id);
        $status = $order->status;

        $cartItems = $order->products;

        // Calculate total
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $allStatus = [
            ['name'=>'pending', 'bgColor'=>'primary'],
            ['name'=>'in progress', 'bgColor'=>'info'],
            ['name'=>'delivered', 'bgColor'=>'success'],
            ['name'=>'cancelled', 'bgColor'=>'danger'],
        ];
        return view('backend.order.orderDetail', compact('order', 'cartItems', 'total', 'allStatus', 'status'));
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

    public function productDetail(string $product_id)
    {
        $product = Product::with('vendor')->where('id', $product_id)->first();
        $status = $product->status;

        $allStatus = [
            ['name'=>'pending', 'bgColor'=>'primary'],
            ['name'=>'in progress', 'bgColor'=>'info'],
            ['name'=>'delivered', 'bgColor'=>'success'],
            ['name'=>'cancelled', 'bgColor'=>'danger'],
        ];
        $alternateImages = $product->alternate_images ? json_decode($product->alternate_images) : null;
        return view('backend.product.productDetail', compact('product', 'allStatus', 'alternateImages'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
