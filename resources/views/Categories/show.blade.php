@extends('layout')
@section('title')
    Show Category
@endsection
@section('content')
    {{ $category->name }}<br>
    {{ $category->description }}
    <hr>
@endsection