<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //DISPLAY AVAILABLE PRODUCTS, CREATE NEW PRODUCT
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

    //SAVE PRODUCT TO DATABASE
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::post('/product/create/save', [ProductController::class, 'save'])->name('product.save');

    //MANIPULATE DATA AND SAVE TO DATABASE
    Route::get('/product/{product}/edit', [ProductController::class,'edit'])->name('product.edit');
    Route::get('/product/{product}/reserve', [ProductController::class,'reserve'])->name('product.reserve');

    Route::put('/product/{product}/update', [ProductController::class,'update'])->name('product.update');
    Route::delete('/product/{product}/delete', [ProductController::class,'delete'])->name('product.delete');

    Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    Route::get('/message/users', [MessageController::class, 'users'])->name('message.users');
    Route::get('/message/{user}/', [MessageController::class, 'chat'])->name('message.chat');
    Route::post('/message/{user}/chat', [MessageController::class, 'store'])->name('message.store');
    Route::get('/message/{user}/display', [MessageController::class, 'display'])->name('message.display');

       

    
});

require __DIR__.'/auth.php';
