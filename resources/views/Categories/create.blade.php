@extends('layout')
@section('title')
    Create Category
@endsection
@section('content')
    @include('errors.error')
    <form action="{{ url("categories") }}" method="post">
        @csrf
        <input type="text" name="name">
        <textarea name="desc" id="" cols="30" rows="10"></textarea>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection