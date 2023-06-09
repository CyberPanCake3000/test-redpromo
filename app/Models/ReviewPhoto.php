<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'review_id'];

}
