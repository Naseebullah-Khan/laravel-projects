<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
</head>

<body>
    <h1>User Dashboard</h1>
    @auth
        {{-- <p>Name: {{ auth()->user()->name }}</p> --}}
        <p>Name: {{ Auth::user()->name }}</p>
        {{-- <p>Email: {{ auth()->user()->email }}</p> --}}
        <p>Email: {{ Auth::user()->email }}</p>
    @endauth
</body>

</html>
