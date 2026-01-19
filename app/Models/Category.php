<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Testing\Fluent\Concerns\Has;

class Category extends Model
{
    protected $fillable=["name","description","image"];

    public function books(){
        return $this->HasMany(Book::class);
    }
}
