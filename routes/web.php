<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ContactFormController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ShopController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'account'], function () {

    Route::get('/login', [AccountController::class, 'login'])->name('login');
    Route::post('/login_check', [AccountController::class, 'check_login'])->name('login.submit');

    Route::get('/register', [AccountController::class, 'register'])->name('register');
    Route::post('/register_check', [AccountController::class, 'check_register'])->name('register.submit');

    //Logout
    Route::get('/logout', [AccountController::class, 'logout'])->name('logout');


    Route::get('/veryfy_account/{email}', [AccountController::class, 'veryfy'])->name('veryfy');

    Route::get('/password/forgot', [AccountController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/password/email', [AccountController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/profile', [ProfileController::class, 'profile'])
        // ->middleware('auth')
        ->name('profile.user');

    Route::get('/profile/show/{id}', [ProfileController::class, 'show'])
        // ->middleware('auth')
        ->name('profile.show');

    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users', [UserController::class, 'show'])
        // ->middleware('users')
        ->name('users.show');

    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/password/reset/{token}', [AccountController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [AccountController::class, 'reset'])->name('password.update');
    //favorite
    Route::get('/favorite', [AccountController::class, 'showFavorite'])->name('show.favorite');
<<<<<<< HEAD
    Route::delete('/deleteFavorite/{product}', [AccountController::class, 'deleteFavorite'])->name('delete.favorite');
=======
    Route::delete('/deleteFavorite/{id}',[AccountController::class,'deleteFavorite'])->name('deleteFavorite');
>>>>>>> 5afeb7f6b93fdc036edcec014d50d666f55a6e44
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/contact', [ContactFormController::class, 'contact'])->name('contact');
    Route::post('/contact', [ContactFormController::class, 'submit'])->name('contact.submit');
});

<<<<<<< HEAD
// Route::get('product/{category_slug}/{product_slug}/', [HomeController::class, 'detail'])->name('home.detail');
=======
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/search', [ShopController::class, 'shopFilter'])->name('shop.search');
Route::get('/categories/{category_id}', [ShopController::class, 'shopFilter'])->name('shop.categoryProduct');
Route::get('/filter', [ShopController::class, 'shopFilter'])->name('shop.filter');

>>>>>>> 5afeb7f6b93fdc036edcec014d50d666f55a6e44

Route::get('productDetail/{slug}', [HomeController::class, 'detail'])->name('productDetail');

Route::get('favorite/{id}', [HomeController::class, 'favorite'])->name('favorite');

//cart
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index']);
    Route::post('store', [CartController::class, 'store'])->name('store');
});
