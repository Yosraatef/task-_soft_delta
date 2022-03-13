<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\PagesController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api', 'middleware' => ['setlocale', 'checkCountry']], function () {
    // Auth Cycle
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('resend_code', [AuthController::class, 'resend_code']);
    Route::post('forget-password', [AuthController::class, 'forget_password']);
    Route::post('verify-code', [AuthController::class, 'verifyCode']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
    Route::get('profile', [ProfileController::class, 'showProfile']);
    Route::post('change-password', [ProfileController::class, 'changePassword']);
    Route::post('update-profile', [ProfileController::class, 'updateProfile']);

    // Stores
    Route::post('stores', [RestaurantController::class, 'index']);
    Route::get('stores/{id}', [RestaurantController::class, 'show']);
    Route::get('stores/{id}/info', [RestaurantController::class, 'info']);
    Route::get('stores/{id}/meals', [RestaurantController::class, 'storeMeals']);
    Route::get('cuisines', [RestaurantController::class, 'cuisines']);

    //Meals
    Route::get('meals', [MealController::class, 'meals']);
    Route::get('meals/{id}', [MealController::class, 'show']);

    //Booking
    Route::get('stores/{id}/form', [BookingController::class, 'bookingForm']);
    Route::post('stores/{id}/booking', [BookingController::class, 'checkout']);
    Route::get('checkout_callback/{status}', [BookingController::class, 'checkout_callback'])->name('checkout_callback');
    Route::get('order/checkout_callback/{status}', [CheckoutController::class, 'checkout_callback'])->name('order.checkout_callback');
    Route::get('my-bookings', [BookingController::class, 'myBookings']);
    Route::get('booking/{id}', [BookingController::class, 'bookingDetails']);

    // Cart
    Route::get('cart_count', [CartController::class, 'cartCount']);
    Route::post('add/cart', [CartController::class, 'addCart']);
    Route::post('remove/cart', [CartController::class, 'removeCart']);
    Route::get('list/cart', [CartController::class, 'cartList']);

    // Checkout Order
    Route::get('checkout/info', [CheckoutController::class, 'checkoutInfo']);
    Route::post('{id}/checkout', [CheckoutController::class, 'checkout']);
    Route::get('my-orders', [CheckoutController::class, 'MyOrders']);
    Route::get('order/{id}', [CheckoutController::class, 'orderDetails']);

    //Coupon
    Route::post('check-coupon', [CouponController::class, 'checkCoupon']);

    // Reviews
    Route::post('review', [ReviewController::class, 'review']);

    // Contact us
    Route::post('contact-us', [ContactController::class, 'contactUs']);

    //Pages
    Route::get('pages/policy', [PagesController::class, 'policy']);
    Route::get('pages/terms', [PagesController::class, 'terms']);
    Route::get('pages/about-us', [PagesController::class, 'aboutUs']);
    Route::get('pages', [PagesController::class, 'pages']);

    // Home
    Route::get('home', [HomeController::class, 'index']);
    Route::get('countries', [HomeController::class, 'countries']);
    Route::get('ads', [HomeController::class, 'ads']);

    Route::get('regions', [HomeController::class, 'regions']);
});
