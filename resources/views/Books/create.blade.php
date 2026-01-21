@extends('layout')
@section('title')
    Create Book
@endsection
@section('content')
    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">title</label>
        <input type="text" name="title" id="name" value="{{ old('title') }}">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
        <label for="small_desc">SmallDescription</label>
        <textarea name="small_desc" id="small_desc" cols="30" rows="10">{{ old('small_desc') }}</textarea>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}">
        <label for="categoryName">Category Name</label>
        <select name="category_id" id="categoryName">
            <option value="" disabled>Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }}</option>
            @endforeach
        </select>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
