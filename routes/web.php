<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\IncomingItemController;
use App\Http\Controllers\OutgoingItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{username}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::patch('/users/update/{id}', [UserController::class, 'updateUserData'])->name('users.update');
    Route::put('/users/update-password/{id}', [UserController::class, 'updatePassword'])->name('password.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['web', 'auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/excel', [ItemController::class, 'exportExcel'])->name('items.excel');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/excel', [SupplierController::class, 'exportExcel'])->name('suppliers.excel');
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/{item}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/{item}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/suppliers/{item}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    
    Route::get('/items/incoming', [IncomingItemController::class, 'index'])->name('incomingItems.index');
    Route::get('/items/incoming/excel', [IncomingItemController::class, 'exportExcel'])->name('incomingItems.excel');
    Route::get('/items/incoming/create', [IncomingItemController::class, 'create'])->name('incomingItems.create');
    Route::post('/items/incoming', [IncomingItemController::class, 'store'])->name('incomingItems.store');
    Route::delete('/items/incoming/{item}', [IncomingItemController::class, 'destroy'])->name('incomingItems.destroy');
    
    Route::get('/items/outgoing', [OutgoingItemController::class, 'index'])->name('outgoingItems.index');
    Route::get('/items/outgoing/excel', [OutgoingItemController::class, 'exportExcel'])->name('outgoingItems.excel');
    Route::get('/items/outgoing/create', [OutgoingItemController::class, 'create'])->name('outgoingItems.create');
    Route::post('/items/outgoing', [OutgoingItemController::class, 'store'])->name('outgoingItems.store');
    Route::delete('/items/outgoing/{item}', [OutgoingItemController::class, 'destroy'])->name('outgoingItems.destroy');
    
    Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
    Route::get('/stocks/excel', [StockController::class, 'exportExcel'])->name('stocks.excel');
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');