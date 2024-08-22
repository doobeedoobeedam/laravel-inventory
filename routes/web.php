<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\IncomingItemController;
use App\Http\Controllers\OutgoingItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{item}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{item}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{item}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

Route::get('/items/incoming', [IncomingItemController::class, 'index'])->name('incomingItems.index');
Route::get('/items/incoming/create', [IncomingItemController::class, 'create'])->name('incomingItems.create');
Route::post('/items/incoming', [IncomingItemController::class, 'store'])->name('incomingItems.store');
Route::delete('/items/incoming/{item}', [IncomingItemController::class, 'destroy'])->name('incomingItems.destroy');

Route::get('/items/outgoing', [OutgoingItemController::class, 'index'])->name('outgoingItems.index');
Route::get('/items/outgoing/create', [OutgoingItemController::class, 'create'])->name('outgoingItems.create');
Route::post('/items/outgoing', [OutgoingItemController::class, 'store'])->name('outgoingItems.store');
Route::delete('/items/outgoing/{item}', [OutgoingItemController::class, 'destroy'])->name('outgoingItems.destroy');

Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
