<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>

<body>
    <div>
        @foreach ($posts as $post)
            <div>
                <h4>{{ $post->title }}</h4>
                <p>Author: {{ $post->user->name }}</p>
            </div>
            <hr>
        @endforeach
    </div>
</body>

</html>
