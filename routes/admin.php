<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register ADMIN routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Admin Auth
Route::middleware('guest:admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'postLogin')->name('postLogin');
    });
});
Route::middleware('auth:admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::put('postProfile', 'postProfile')->name('postProfile');
    });

//    Categories routes
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::controller(CategoryController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('delete/{id}', 'delete')->name('delete');
        });
    });
//    Products Routes
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('delete/{id}', 'delete')->name('delete');
            Route::get('reviews/{productId}', 'reviews')->name('reviews');
        });
    });
//    User Routes
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('delete/{id}', 'delete')->name('delete');
        });
    });
//    Blog Routes
    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::controller(BlogController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('delete/{id}', 'delete')->name('delete');
        });
    });

//    Subscribes
    Route::group(['prefix' => 'subscribes', 'as' => 'subscribes.'], function () {
        Route::controller(SubscribeController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('sendMail/{user}', 'sendMail')->name('sendMail');
        });
    });
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('index', 'index')->name('index');
        });
    });
//    Orders
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::controller(OrderController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('details/{orderId}', 'details')->name('details');
            Route::put('update/{orderId}', 'update')->name('update');
        });
    });
});

