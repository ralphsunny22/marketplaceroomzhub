<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/', [LandingController::class, 'landing'])->name('landing');
Route::get('/shop', [LandingController::class, 'generalShop'])->name('generalShop');
Route::get('/product/{id}', [ProductController::class, 'singleProduct'])->name('singleProduct');

//vendor
Route::group(['prefix' => 'vendors'], function () {
    Route::get('/', [VendorController::class, 'dashboard'])->name('vendorDashboard');
    Route::get('/all-product', [VendorController::class, 'allProduct'])->name('allProduct');
    Route::get('/add-product', [VendorController::class, 'addProduct'])->name('addProduct');
    Route::post('/add-product', [VendorController::class, 'addProductPost'])->name('addProductPost');
    Route::get('/edit-product/{id}', [VendorController::class, 'editProdduct'])->name('editProdduct');
    Route::post('/edit-product/{id}', [VendorController::class, 'editProdductPost'])->name('editProdductPost');

    Route::get('/shop/{owner_id}', [VendorController::class, 'vendorShop'])->name('vendorShop');
});

//cart
Route::get('/add-to-cart-multiple/{id}', [CartController::class, 'addToCartMultiple'])->name('addToCartMultiple');
Route::get('/add-to-cart/{id}/{qty}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cartList');
Route::post('/cart', [CartController::class, 'updateCart'])->name('updateCart');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clearCart');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');

//checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

//order
Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('placeOrder');
Route::get('/order-confirmation/{order}', [OrderController::class, 'orderConfirmation'])->name('orderConfirmation');

Route::get('/payment/success/{order}', [StripeController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/cancel/{order}', [StripeController::class, 'paymentCancel'])->name('payment.cancel');





