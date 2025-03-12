<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users List</title>
</head>

<body>
    <div>
        @foreach ($users as $user)
            @if ($user->address || $user->posts->count() > 0)
                <div>
                    <h4>{{ $user->name }}</h4>
                    @if ($user->posts->count() > 0)
                        <p>Posts Count: {{ $user->posts->count() }}</p>
                    @endif
                    @foreach ($user->addresses as $address)
                        <p>Address{{ $loop->iteration }}: {{ $address->country }}, {{ $address->city }}</p>
                    @endforeach
                </div>
                <hr>
            @endif
        @endforeach
    </div>
    {{-- <div>
        @foreach ($addresses as $address)
            @if ($address->user)
                <div>
                    <h4>{{ $address->country }}, {{ $address->city }}</h4>
                    <p>{{ $address->user->name }} is living in this address.</p>
                </div>
                <hr>
            @endif
        @endforeach
    </div> --}}
</body>

</html>
