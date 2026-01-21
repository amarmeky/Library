@extends('layout')
@section('title')
    Create Category
@endsection
@section('content')
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">

        <label for="desc">Description</label>
        <textarea name="description" id="desc" cols="30" rows="10"> {{ old('description') }}</textarea>

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
