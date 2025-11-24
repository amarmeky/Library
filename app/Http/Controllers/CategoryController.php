<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all()
    {
        $categories = Category::all();
        return view("Categories.all", ['categories' => $categories]);
    }
    public function show($id)
    {
        $category = Category::findorFail($id);
        return view("Categories.one", ['category' => $category, 'id' => $id]);
    }
}
