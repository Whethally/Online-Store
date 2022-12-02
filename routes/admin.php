<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth', 'admin')->group(function(){
    
        Route::redirect('/', '/admin/dashboard')->name('dashboard');
    
        Route::resource('dashboard', AdminController::class)->names([
            'index' => 'dashboard',
            'create' => 'dashboard.create',
            'store' => 'dashboard.store',
            'show' => 'dashboard.show',
            'edit' => 'dashboard.edit',
            'update' => 'dashboard.update',
            'destroy' => 'dashboard.destroy',
        ]);

    Route::get('active_status', [AdminController::class, 'active_status'])->name('active_status');
    Route::get('market_status', [AdminController::class, 'market_status'])->name('market_status');
    Route::get('admin_status', [AdminController::class, 'admin_status'])->name('admin_status');
    Route::delete('destroy_category/{category}', [AdminController::class, 'destroy_category'])->name('destroy_category');
    Route::delete('destroy_user/{user}', [AdminController::class, 'destroy_user'])->name('destroy_user');

    Route::get('edit_status/{id}', [AdminController::class, 'edit_status'])->name('edit_status');
    Route::put('update_status/{id}', [AdminController::class, 'update_status'])->name('update_status');
    Route::delete('delete_cart/{id}', [AdminController::class, 'delete_cart'])->name('delete_cart');

    Route::resource('category', CategoryController::class)->names([
        'index' => 'category',
        'create' => 'category.create',
        'store' => 'category.store',
        'show' => 'category.show',
        'edit' => 'category.edit',
        'update' => 'category.update',
        'destroy' => 'category.destroy',
    ]);

    });