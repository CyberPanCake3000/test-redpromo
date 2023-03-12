<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating', 'user_id', 'product_id'];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }
}
