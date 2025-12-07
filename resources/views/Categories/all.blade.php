@extends('layout')
@section('title')
    All Categoryies
@endsection
@section('content')
    <a href="{{ url("categories/create") }}">Create Category
        <br>
    </a>
    @foreach ($categories as $category)
        {{ $loop->iteration }}-
        <a href="{{ url("categories/$category->id") }}">{{ $category->name}}<br></a>
        {{ $category->description}}
        <hr>
    @endforeach
@endsection