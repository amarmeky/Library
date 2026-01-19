@extends('layout')
@section('title')
    Create Book
@endsection
@section('content')
    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title">
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <textarea name="small_desc" id="" cols="30" rows="10"></textarea>
        <input type="number" name="price">
        <select name="category_id">
            <option value="" disabled>Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }}</option>
            @endforeach
        </select>
        <input type="file" name="image" id="">
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
