<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ProductController;


Auth::routes();
Route::get('/', [App\Http\Controllers\LandingController::class, 'landing'])->name('landing');
Route::get('/blog/{slug}', [App\Http\Controllers\LandingController::class, 'detail_blog'])->name('blog.detail');

Route::post('/subscribe-submit', [App\Http\Controllers\LandingController::class, 'index'])->name('submit.subscribe');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('categories', CategoryController::class)->except(['update']);
    Route::post('/category-update/{id}', [CategoryController::class, 'update'])->name('categories.update');

    Route::resource('blogs', BlogController::class)->except(['update']);
    Route::post('/blogs-update/{id}', [BlogController::class, 'update'])->name('blogs.update');

    Route::resource('configs', ConfigController::class)->only(['index','update']);

    Route::resource('products', ProductController::class)->except(['update']);
    Route::post('/products-update/{id}', [ProductController::class, 'update'])->name('products.update');
});
