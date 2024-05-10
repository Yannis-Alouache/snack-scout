<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name("home");

Route::get('/products', [ProductController::class, 'index']);

Route::get('/product/{id}', [ProductController::class, 'details']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/signin', [AuthController::class, 'loginPage'])->name("login");

Route::post('/signin', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerPage']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index']);

    Route::post('/apply-coupon', [CouponController::class, 'applyCoupon'])->name('coupon.apply');

    Route::get('cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');

    Route::get('cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
    
    Route::get('add-to-cart/{id}/{quantity}', [CartController::class, 'addToCart'])->name('add.to.cart');
    
    Route::get('/checkout', [PaymentController::class, 'index']);

    Route::post('/checkout', [PaymentController::class, 'processCheckout'])->name('checkout.process');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/order/{id}/mark-as-treated', [OrderController::class, 'markAsTreated'])->name('order.markAsTreated');

    Route::get('/my-orders', [OrderController::class, 'index']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/dashboard/products', [DashboardController::class, 'productsList'])->name("dashboard-products-list");
    
    Route::get('/dashboard/product/add', [DashboardController::class, 'addProduct']);
    
    Route::post('/dashboard/product/add', [ProductController::class, 'store']);
        
    Route::get('/dashboard/orders', [DashboardController::class, 'ordersList']);

    Route::delete('/dashboard/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});