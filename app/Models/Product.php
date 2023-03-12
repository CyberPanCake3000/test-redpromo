<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Category;

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
}
