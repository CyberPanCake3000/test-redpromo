<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', '=', Auth::id())->paginate(10);
        return view('product.favorite', ['favorites' => $favorites]);
    }

    public function toggleFavorite(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        if($product->getFavorite()) {
            $favorite = $product->getFavorite()->delete();
            return response()->json(['message' => 'deleted']);
        }else{
            Favorite::create([
                'user_id' =>  Auth::id(),
                'product_id' => $product->id,
            ]);
            return response()->json(['message' => 'created']);
        }
    }
}
