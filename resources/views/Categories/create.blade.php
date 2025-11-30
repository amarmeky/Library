<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create category</title>
</head>

<body>
@include('errors.error')
    <form action="{{ url("categories") }}" method="post">
        @csrf
        <input type="text" name="name">
        {{-- @error("name")
        {{ $message }}
        @enderror --}}
        <textarea name="desc" id="" cols="30" rows="10"></textarea>
        {{-- @error("desc")
        {{ $message }}
        @enderror --}}
        <button type="submit">Create</button>
    </form>
</body>

</html>