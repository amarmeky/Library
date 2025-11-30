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

    public function create()
    {
        return view("Categories.create");
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => "required|string|max:225",
            'desc' => "required|string",
        ]);

        Category::create([
            'name' => $data['name'],
            'description' => $data['desc']
        ]);
        return redirect(url("categories"));
    }
}
