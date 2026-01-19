@extends('layout')
@section('title')
    Show Category
@endsection
@section('content')
    {{ $category->name }}
    <br>
    {{ $category->description }}
    <br>
    @foreach ($category->books as $book)
        {{ $book->title }}
        {{ $book->user->name }}
    @endforeach
    <br>
    <img src="{{ asset('storage/' . $category->image) }}" width="300px" alt="">
    <br>
    <button class="btn btn-warning"><a href="{{ route('categories.edit', ['id' => $category->id]) }}">Edit</a></button>
    <button class="btn btn-danger"><a href="{{ route('categories.delete', ['id' => $category->id]) }}">Delete</a></button>
@endsection
