<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;

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

Route::get('/', function () {
    return view('pages.welcome');
});

Auth::routes();

Route::post('/subscribe-submit', [App\Http\Controllers\LandingController::class, 'index'])->name('submit.subscribe');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('categories', CategoryController::class)->except(['update']);
    Route::post('/category-update/{id}', [CategoryController::class, 'update'])->name('categories.update');

    Route::resource('blogs', BlogController::class)->except(['update']);
    Route::post('/blogs-update/{id}', [BlogController::class, 'update'])->name('blogs.update');
});
