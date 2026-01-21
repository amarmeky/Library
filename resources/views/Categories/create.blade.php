@extends('layout')
@section('title')
    Create Category
@endsection
@section('content')
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}">
        <textarea name="description" id="" cols="30" rows="10"> {{ old('description') }}</textarea>
        <input type="file" name="image" id="">
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
