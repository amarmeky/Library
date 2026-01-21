@extends('layout')
@section('title')
    Edit Book
@endsection
@section('content')
    <form action="{{ route('books.update', ['id' => $book->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $book->title }}">
        <label for="desc">Description</label>
        <textarea name="description" id="desc" cols="30" rows="10">{{ $book->description }}</textarea>
        <label for="small_desc">Small Description</label>
        <textarea name="small_desc" id="small_desc" cols="30" rows="10">{{ $book->small_desc }}</textarea>
        <label for="categoryName">Category Name</label>

        <select name="category_id" id="categoryName">
            <option value="" disabled>Select category </option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{ $book->price }}">
        <label for="image">Image</label>
        <img src="{{ asset('storage/' . $book->image) }}" width="200px" alt="">
        <input type="file" name="image" id="image">
        <button type="submit" class="btn btn-info">Update</button>
    </form>
@endsection
