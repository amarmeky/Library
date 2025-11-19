<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>

<body>
    @if (isset($id))
        {{ $category->name }}<br>
        {{ $category->description }}
        <hr>
    @else
        @foreach ($categories as $category)
            {{ $category->name}}<br>
            {{ $category->description}}
            <hr>
        @endforeach
    @endif

</body>

</html>