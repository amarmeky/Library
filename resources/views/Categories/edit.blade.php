@extends('layout')
@section('title')
    Edit category
@endsection
@section('content')
    <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
        @csrf
        @method('put')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
        <label for="desc">Description</label>
        <textarea name="description" id="desc" cols="30" rows="10">{{ $category->description }}</textarea>
        <button type="submit" class="btn btn-info">Update</button>
    </form>
@endsection