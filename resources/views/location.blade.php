<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Location</title>
</head>

<body>
    <div>
        <h1>{{ $country->name }}</h1>
        <h2>States: </h2>
        <ul>
            @foreach ($country->states as $state)
                <li>{{ $state->name }}</li>
                <h3>Cities: </h3>
                <ul>
                    @foreach ($state->cities as $city)
                        <li>{{ $city->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    </div>
    <hr>
    <div>
        <h1>{{ $country->name }}</h1>
        <h2>Cities: </h2>
        <ul>
            @foreach ($country->cities as $city)
                <li>{{ $city->name }}</li>
                < @endforeach
        </ul>
    </div>
</body>

</html>
