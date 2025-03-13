<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tags</title>
</head>

<body>
    <div>
        @foreach ($tags as $tag)
            <div>
                <h4>{{ $tag->name }}</h4>
                <p>Posts: </p>
                <ul>
                    @foreach ($tag->posts as $post)
                        <li>{{ $post->title }}</li>
                    @endforeach
                </ul>
            </div>
            <hr>
        @endforeach
    </div>
</body>

</html>
