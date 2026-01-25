@extends('layout')
@section('title')
    Login Form
@endsection
@section('content')
    <form action="{{ route("login") }}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection