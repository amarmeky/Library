<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Symfony\Component\String\s;

class CategoryController extends Controller
{
    public function all()
    {
        $categories = Category::paginate(3);
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
            'description' => "required|string",
            'image' => "required|image|max:2048|mimes:jpeg,png,jpg,gif,svg",
        ]);

        $data['image'] = Storage::putFile("categories", $data['image']);
        Category::create($data);
        session()->flash('success', 'category created successfully');
        return redirect(url("categories"));
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view("Categories.edit", compact('category'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "name" => "required|string|max:225",
            "description" => "required|string",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        $category = Category::findOrFail($id);
        if ($request->has("image")) {
            if ($category->image) {
                Storage::delete($category->image);
            }
            $data['image'] = Storage::putFile("categories", $data['image']);
        }
        $category->update($data);
        session()->flash('success', 'category updated successfully');

        return redirect(url("categories/{$id}"));
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        if($category->image){
            Storage::delete($category->image);
        }
        $category->delete();
        session()->flash('success', 'category deleted successfully');

        return redirect(url("categories"));
    }
}
