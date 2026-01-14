<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillabel = ["title", "description", "image", "small_desc", "price", "user_id", "category_id"];
    function user() {
        return $this->belongsTo(User::class);
    }
    function category(){
        return $this->belongsTo(Category::class);
    }
}
