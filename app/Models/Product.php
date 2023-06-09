<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'quantity'];

    public function getImage()
    {
        return $this->hasMany(ProductImage::class)->first();
    }

    public function getCategories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getReviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getFavorite()
    {
        return $this->hasMany(Favorite::class, 'product_id', 'id')->where('user_id', '=', Auth::id())->first();
    }
}
