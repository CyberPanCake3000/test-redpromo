<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'LIKE', '%'.$query.'%')->get();
        $categories = Category::where('name', 'LIKE', '%'.$query.'%')->get();
        $searchResults = array_merge($products->toArray(), $categories->toArray());
        shuffle($searchResults);
        return view('search_result', ['searchResults' => $searchResults]);
    }
}
