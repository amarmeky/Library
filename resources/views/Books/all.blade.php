@extends('layout')
@section('title')
    All books
@endsection
@section('content')
    <a href="{{ route('books.create') }}">Create Book
        <br>
    </a>
    @foreach ($books as $book)
        {{ $loop->iteration }}-
        <a href="{{ url("books/$book->id") }}">{{ $book->title }}<br></a>
        {{ $book->description }}
        <hr>
    @endforeach
    {{ $books->links() }}
@endsection
