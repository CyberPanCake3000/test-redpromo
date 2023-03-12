<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        $categories = DB::table('categories')
            ->select('categories.*', DB::raw('COUNT(reviews.id) as review_count'))
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
            ->groupBy('categories.id')
            ->orderBy('review_count', 'desc')
            ->take(8)
            ->get();

        return view('home', ['products' => $products, 'categories' => $categories]);
    }

    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }
}
