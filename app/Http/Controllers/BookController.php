<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function all()
    {
        $books = Book::paginate(5);

        return view('Books.all', ['books' => $books]);
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('Books.show', ['book' => $book, 'id' => $id]);
    }
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('Books.create', compact("categories"));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            'small_desc' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);
        $data['user_id'] = 1;
        $data['image'] = Storage::putFile('books', $data['image']);
        Book::create($data);
        session()->flash('success', 'book created successfully');
        return redirect(route('books.all'));
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('Books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'image' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg',
            'small_desc' => 'string',
            'price' => 'numeric',
            'category_id' => 'exists:categories,id'
        ]);
        $data['user_id'] = 1;
        $book = Book::findOrFail($id);
        if ($request->has('image')) {
            if ($book->image) {
                Storage::delete($book->image);
            }
            $data['image'] = Storage::putFile('categories', $data['image']);
        }
        $book->update($data);
        session()->flash('success', 'book updated successfully');

        return redirect(route('books.show', $id));
    }
    public function delete($id)
    {
        $book = Book::findOrFail($id);
        if ($book->image) {
            Storage::delete($book->image);
        }
        $book->delete();
        session()->flash('success', 'book deleted successfully');

        return redirect(route('books.all'));
    }
}
