@extends('layout')
@section('title')
    Edit category
@endsection
@section('content')
    <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
        <label for="desc">Description</label>
        <textarea name="description" id="desc" cols="30" rows="10">{{ $category->description }}</textarea>
        <label for="image">Image</label>
        <input type="file" name="image">
        <img src="{{ asset('storage/'.$category->image) }}" width="200px" alt="">
        <button type="submit" class="btn btn-info">Update</button>
    </form>
@endsection