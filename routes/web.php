<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    $products = Product::paginate(10);
    return view('home', ['products' => $products]);
});

Auth::routes();

Route::get('/home', [ProductController::class, 'index'])->name('home');
Route::get('/show/{product}', [ProductController::class, 'show'])->name('product.show');
Route::post('/search', [SearchController::class, 'search'])->name('search');
