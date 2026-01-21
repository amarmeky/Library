@extends('layout')
@section('title')
    Show book
@endsection
@section('content')
    Title:{{ $book->title }}
    <br>
    Small Description:{{ $book->small_desc }}
    <br>
    Description:{{ $book->description }}
    <br>
    Price:{{ $book->price }}
    <br>
    CategoryName:{{ $book->category->name }}
    <br>
    Image:<img src="{{ asset('storage/' . $book->image) }}" width="300px" alt="">
    <br>
    <button class="btn btn-warning"><a href="{{ route('books.edit', ['id' => $book->id]) }}">Edit</a></button>
    <button class="btn btn-danger"><a href="{{ route('books.delete', ['id' => $book->id]) }}">Delete</a></button>
@endsection
