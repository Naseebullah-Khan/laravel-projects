<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messages</title>
    @vite("resources/js/echo.js")
</head>

<body>
    <form action="{{ route("send-message") }}" method="get">
        <label for="message">Message</label>
        <input type="text" name="message" id="message">
        <input type="submit" value="Send">
    </form>
</body>

</html>