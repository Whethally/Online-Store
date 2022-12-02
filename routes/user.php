<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('auth', 'active')->group(function(){
// Route::prefix('user')->group(function(){

    Route::redirect('/', '/user/profile')->name('profile');

    Route::resource('profile', UserController::class)->names([
        'index' => 'profile',
        'create' => 'profile.create',
        'store' => 'profile.store',
        'show' => 'profile.show',
        'edit' => 'profile.edit',
        'update' => 'profile.update',
        'destroy' => 'profile.destroy'
    ]);

});

Route::middleware('auth')->group(function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::delete('delete_cart_user/{id}', [UserController::class, 'delete_cart'])->name('delete_cart_user');

});