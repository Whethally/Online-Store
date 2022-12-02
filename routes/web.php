<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\RegisterController;
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

Route::redirect('/', 'market')->name('market');

Route::redirect('/market', '/', 301)->name('market.redirect');

// Route::resource('/market', MarketController::class);

Route::resource('market', MarketController::class)->names([
    'index' => 'market',
    'create' => 'market.create',
    'store' => 'market.store',
    'show' => 'market.show',
    'edit' => 'market.edit',
    'update' => 'market.update',
    'delete' => 'market.delete',
]);
// Route::resource('cart', CartController::class)->names([
//     'index' => 'cart',
//     'create' => 'cart.create',
//     'store' => 'cart.store',
//     'show' => 'cart.show',
//     'edit' => 'cart.edit',
//     'update' => 'cart.update',
//     'delete' => 'cart.delete',
// ]);

Route::middleware('guest')->group(function () {

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
    
    Route::get('login/{user}/confirmation', [LoginController::class, 'confirmation'])->name('login.confirmation');
    Route::post('login/{user}/confirm', [LoginController::class, 'confirm'])->name('login.confirm');

});
Route::get('/about', function () {
    return view('home.about');
})->name('about');
Route::get('/info', function () {
    return view('home.info');
})->name('info');
// Route::get('/admin', function () {
//     return view('market.admin.panel');
// });

Route::get('cart', [MarketController::class, 'cart'])->name('cart');
Route::get('checkout', [MarketController::class, 'checkout'])->name('checkout');
Route::post('cart_order', [MarketController::class, 'cart_order'])->name('cart_order')->middleware('auth');
Route::get('add-to-cart/{id}', [MarketController::class, 'add_to_cart'])->name('add.to.cart');

Route::patch('update_cart', [MarketController::class, 'update_cart'])->name('update_cart');

Route::delete('remove_from_cart', [MarketController::class, 'remove_from_cart'])->name('remove_from_cart');