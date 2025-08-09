<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade Component</title>
</head>

<body>

    <h1>Hello World!</h1>

    {{-- <x-alert style="color:red; border:1px solid green;" text="This is a message!" /> --}}

    {{-- @php
    $languages = ["PHP", "JavaScript", "Python", "C", "C++", "Dart"];
    @endphp

    @foreach ($languages as $language)
    <x-alert :text="$language" />
    @endforeach --}}

    <x-button name="click_me" id="click_me" style="background: red; color: black;" />
    <x-button style="color: White;" />

</body>

</html>