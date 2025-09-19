<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="user_id" content="{{ Auth::user()?->id }}">
    <title>Messages</title>
    @vite("resources/js/app.js")
</head>

<body>
    <form action="{{ route("send-message") }}" method="get">
        <label for="message">Message</label>
        <input type="text" name="message" id="message">
        <br><br>
        <label for="user_id">User ID</label>
        <input type="number" name="user_id" id="user_id">
        <br><br>
        <input type="submit" value="Send">
    </form>

    <div id="messages">
    </div>
</body>

</html>