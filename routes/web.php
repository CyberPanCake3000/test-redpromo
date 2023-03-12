<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [ProductController::class, 'index'])->name('home');
Route::get('/show/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
Route::post('/toggle-favorite/{product_id}', [FavoriteController::class, 'toggleFavorite'])->name('toggle_favorite');

Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::post('/store_review', [ReviewController::class, 'store'])->name('review.store');
