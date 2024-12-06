<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');

//     $response = Http::get('http://localhost:8000/api/web/v1/listing/get-all');

//     // You can handle the response like this
//     if ($response->successful()) {
//         $data = $response->json(); // Get the JSON response as an array
//         return response()->json(['success'=>true, 'data'=>$data]);
//     } else {
//         // Handle error
//         return response()->json(['success'=>false]);
//     }

// });

// Route::get('/{ivData?}/{mData?}', [LandingController::class, 'landing'])->name('landing');
Route::get('/', [LandingController::class, 'landing'])->name('landing');
Route::get('/shop', [LandingController::class, 'generalShop'])->name('generalShop');
Route::get('/shop/{categorySlug}', [LandingController::class, 'categoryShop'])->name('categoryShop');
Route::get('/product/{id}', [ProductController::class, 'singleProduct'])->name('singleProduct');

Route::get('/login', [AuthController::class, 'login'])->name('loginFront');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginFrontPost');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//muti-login handler
Route::get('/auth/auto-login', [AuthController::class, 'handleAutoLogin']);

Route::get('/account', [AuthController::class, 'account'])->name('account')->middleware('auth');
Route::post('/account', [AuthController::class, 'accountPost'])->name('accountPost')->middleware('auth');

//vendor
Route::group(['middleware' => 'auth', 'prefix' => 'vendors'], function () {
    Route::get('/', [VendorController::class, 'dashboard'])->name('vendorDashboard');
    Route::get('/account', [VendorController::class, 'vendorAccount'])->name('vendorAccount');

    Route::get('/register', [VendorController::class, 'vendorRegister'])->name('vendorRegister');
    Route::post('/register', [VendorController::class, 'vendorRegisterPost'])->name('vendorRegisterPost');
    Route::post('/edit-business-details', [VendorController::class, 'vendorEditBusinessDetailPost'])->name('vendorEditBusinessDetailPost');
    Route::get('/all-product', [VendorController::class, 'allProduct'])->name('vendorAllProduct');
    Route::get('/add-product', [VendorController::class, 'addProduct'])->name('addProduct');
    Route::post('/add-product', [VendorController::class, 'addProductPost'])->name('addProductPost');
    Route::get('/edit-product/{id}', [VendorController::class, 'editProdduct'])->name('editProdduct');
    Route::post('/edit-product/{id}', [VendorController::class, 'editProdductPost'])->name('editProdductPost');

    Route::get('/orders', [VendorController::class, 'vendorOrders'])->name('vendorOrders');
    Route::get('/orders/{order_id}', [VendorController::class, 'vendorSingleOrder'])->name('vendorSingleOrder');
    Route::post('/update-orders/{order_id}', [VendorController::class, 'updateOrderStatus'])->name('updateOrderStatus');

});
Route::group(['prefix' => 'vendors'], function () {
    Route::get('/shop/{owner_id}/{shop_slug?}', [VendorController::class, 'vendorShop'])->name('vendorShop');
});

//cart
Route::group(['middleware' => 'auth'], function () {
    Route::get('/add-to-cart-multiple/{id}', [CartController::class, 'addToCartMultiple'])->name('addToCartMultiple');
    Route::get('/add-to-cart/{id}/{qty}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cartList');
    Route::post('/cart', [CartController::class, 'updateCart'])->name('updateCart');
    Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clearCart');
    Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
});

//checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout')->middleware('auth');

//order
Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('placeOrder')->middleware('auth');
Route::get('/order-confirmation/{order}', [OrderController::class, 'orderConfirmation'])->name('orderConfirmation')->middleware('auth');

Route::get('/checkout/stripe-success/{orderId?}/{cartId?}', [OrderController::class, 'stripeSuccess'])->name('checkout.stripeSuccess')->middleware('auth');
Route::get('/checkout/success/{orderId}', [OrderController::class, 'orderSuccess'])->name('checkout.success')->middleware('auth');
Route::get('/checkout/cancel', [OrderController::class, 'orderCancel'])->name('checkout.cancel')->middleware('auth');

/////
Route::get('/payment/success/{order}', [StripeController::class, 'paymentSuccess'])->name('payment.success')->middleware('auth');
Route::get('/payment/cancel/{order}', [StripeController::class, 'paymentCancel'])->name('payment.cancel')->middleware('auth');

//chat
Route::get('/chat/{activeUserId?}', [ChatController::class, 'chat'])->name('chat');
Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('sendMessage');

////admin/////////////
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'adminDashboard'])->name('adminDashboard')->middleware('auth:web');

    Route::group(['prefix' => 'auth'], function () {
        Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
        Route::get('/login', [DashboardController::class, 'login'])->name('login');
        Route::post('/login', [DashboardController::class, 'loginPost'])->name('loginPost');
        Route::get('/autologin/{section}', [DashboardController::class, 'autologin'])->name('autologin');
        Route::get('/auto-login', [DashboardController::class, 'handleAutoLogin'])->name('handleAutoLogin');
    });

    Route::group(['middleware' => 'auth:web', 'prefix' => 'customers'], function () {
        Route::get('/', [DashboardController::class, 'allCustomer'])->name('allCustomer');
    });

    Route::group(['middleware' => 'auth:web', 'prefix' => 'vendors'], function () {
        Route::get('/{status?}', [DashboardController::class, 'allVendor'])->name('allVendor');
        Route::get('/single/{vendor_id}', [DashboardController::class, 'singleVendor'])->name('singleVendor');
    });

    Route::group(['middleware' => 'auth:web', 'prefix' => 'categories'], function () {
        Route::get('/', [DashboardController::class, 'allCategory'])->name('allCategory');
        Route::get('/create', [DashboardController::class, 'createCategory'])->name('createCategory');
        Route::post('/create', [DashboardController::class, 'createCategoryPost'])->name('createCategoryPost');
        Route::get('/edit/{category_id}', [DashboardController::class, 'editCategory'])->name('editCategory');
        Route::post('/edit/{category_id}', [DashboardController::class, 'editCategoryPost'])->name('editCategoryPost');
    });

    Route::group(['middleware' => 'auth:web', 'prefix' => 'products'], function () {
        Route::get('/{status?}', [DashboardController::class, 'allProduct'])->name('allProduct');
        Route::get('/detail/{product_id}', [DashboardController::class, 'productDetail'])->name('productDetail');
    });

    Route::group(['middleware' => 'auth:web', 'prefix' => 'orders'], function () {
        Route::get('/{status?}', [DashboardController::class, 'allOrder'])->name('allOrder');
        Route::get('/detail/{order_id}', [DashboardController::class, 'orderDetail'])->name('orderDetail');
        Route::post('/update-orders/{order_id}', [VendorController::class, 'updateOrderStatus'])->name('updateOrderStatus');
    });

    //////////////////////////////////

    Route::group(['prefix' => 'payment'], function () {
        Route::get('/all', [PaymentController::class, 'allPayment'])->name('allPayment');

    });

});




