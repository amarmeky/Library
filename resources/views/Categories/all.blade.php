@extends('layout')
@section('title')
    All Categoryies
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <a href="{{ route('categories.create')}}">Create Category
        <br>
    </a>
    @foreach ($categories as $category)
        {{ $loop->iteration }}-
        <a href="{{ url("categories/$category->id") }}">{{ $category->name}}<br></a>
        {{ $category->description}}
        <hr>
    @endforeach
@endsection