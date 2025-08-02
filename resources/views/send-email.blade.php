<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
</head>

<body>
    <form action="{{ route('send.email') }}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <br />
            <input type="email" name="email" id="email" required />
        </div>
        <br />
        <div>
            <label for="message">Message</label>
            <br />
            <textarea name="message" id="message" required></textarea>
        </div>
        <br />
        <div>
            <input type="submit" value="Send Email">
        </div>
    </form>
</body>

</html>
