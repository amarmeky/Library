@extends('layout')
@section('title')
    Show Category
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    {{ $category->name }}<br>
    {{ $category->description }}
    <br>
    <button class="btn btn-warning"><a href="{{ route('categories.edit', ['id' => $category->id]) }}">Edit</a></button>
    <button class="btn btn-danger"><a href="{{ route('categories.delete', ['id' => $category->id]) }}">Delete</a></button>

@endsection