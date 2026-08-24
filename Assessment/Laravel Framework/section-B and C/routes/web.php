<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;


Route::get('/menu', [MenuController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Orders Route Group protected by auth middleware
Route::middleware('auth')->prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');

    // Kept for requirement verification
    Route::get('/{id}', function ($id) {
        return 'Order Show: ' . $id;
    })->name('orders.show');
});

// Admin Route Group protected by auth and admin middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    })->name('admin.dashboard');

    Route::get('/restaurants', function () {
        return 'Manage Restaurants';
    })->name('admin.restaurants');

    Route::get('/menu-items', function () {
        return 'Manage Menu Items';
    })->name('admin.menu_items');
});

require __DIR__ . '/auth.php';
