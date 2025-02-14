<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\FavoriteController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ReviewController;
use App\Http\Controllers\Web\SubscribeController;
use Illuminate\Support\Facades\Route;

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

//Home page
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('/');
});
//Product
Route::controller(ProductController::class)->group(function () {
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('details/{productId}', 'details')->name('details');
    });
});
Route::controller(ContactController::class)->group(function () {
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::get('index', 'index')->name('index');
        Route::post('store', 'store')->name('store');
    });
});


Route::controller(BlogController::class)->group(function () {
    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::get('index', 'index')->name('index');
        Route::get('details/{blogId}', 'details')->name('details');
    });
});
//Review
Route::controller(ReviewController::class)->group(function () {
    Route::group(['prefix' => 'review', 'as' => 'review.'], function () {
        Route::post('store/{productId}', 'store')->name('store');
    });
});
//Subscribe Routes
Route::controller(SubscribeController::class)->group(function () {
    Route::post('/subscribe', 'subscribe')->name('subscribe');
});
Route::middleware(['auth:web'])->group(function () {
//    Auth routes
    Route::controller(AuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
        Route::get('profile', 'profile')->name('profile');
        Route::put('postProfile', 'postProfile')->name('postProfile');
        Route::post('confirmOrder', 'confirmOrder')->name('confirmOrder');
    });
//    Cart Routes
    Route::controller(CartController::class)->group(function () {
        Route::post('cart', 'cart')->name('cart');
        Route::delete('deleteCartProduct','deleteCartProduct')->name('deleteCartProduct');
        Route::get('cartProducts', 'cartProducts')->name('cartProducts');
    });
//    Favorite Routes
    Route::controller(FavoriteController::class)->group(function () {
        Route::post('favorite', 'favorite')->name('favorite');
        Route::get('favoriteProducts', 'favoriteProducts')->name('favoriteProducts');
    });
//    Order Routes
    Route::controller(OrderController::class)->group(function () {
        Route::post('confirm', 'confirm')->name('confirm');
    });
});

//    Auth routes
Route::middleware('guest:web')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('register', 'register')->name('register');
        Route::post('postRegister', 'postRegister')->name('postRegister');
        Route::get('login', 'login')->name('login');
        Route::post('postLogin', 'postLogin')->name('postLogin');
    });
});

