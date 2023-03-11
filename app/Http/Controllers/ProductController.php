<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        $categories = Category::take(10)->get();
        return view('home', ['products' => $products, 'categories' => $categories]);
    }

    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }
}
