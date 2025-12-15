@extends('layout')
@section('title')
    Edit category
@endsection
@section('content')
@include("errors.error")
    <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
        @csrf
        @method('put')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
        <label for="desc">Description</label>
        <textarea name="desc" id="desc">{{ $category->description }}</textarea>
        <button type="submit" class="btn btn-info">Update</button>
    </form>
@endsection