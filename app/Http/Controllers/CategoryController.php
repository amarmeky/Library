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
        return view("Categories.show", ['category' => $category, 'id' => $id]);
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
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view("Categories.edit", ['category' => $category, 'id' => $id]);
    }
    public function update(Request $request, $id)
    {


        $data = $request->validate([
            'name' => "required|string|max:225",
            'desc' => "required|string",
        ]);


        $category = Category::findOrFail($request->id);
        $category->update([
            'name' => $data['name'],
            'description' => $data['desc']
        ]);
        $category->save();

        return redirect(url("categories"));
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(url("categories"));
    }
}
