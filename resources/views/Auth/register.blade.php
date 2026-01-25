@extends('layout')
@section('title')
    Register Form
@endsection
@section('content')
    <form action="{{ route("register") }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="name" name="name" id="name">
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        <br>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection