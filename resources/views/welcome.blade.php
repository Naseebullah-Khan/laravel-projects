<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic LAravel</title>
</head>

<body>
    <h1>This is Home Page.</h1>
    <a href="{{ route('posts', ['id' => 4, 'slug' => 9]) }}">Posts</a>
    <a href="{{ route('about') }}">About</a>
</body>

</html>
