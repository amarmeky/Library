<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    @include("errors.error")
    @include("successes.success")
    <ul>
        @guest
            <li><a href="{{ route("register.form") }}">Register</a></li>
            <li><a href="{{ route("login.form") }}">Login</a></li>
        @endguest
        @auth
            <form action="{{ route("logout") }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @endauth
    </ul>
    @yield('content')
    @yield('js')
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>
</body>

</html>