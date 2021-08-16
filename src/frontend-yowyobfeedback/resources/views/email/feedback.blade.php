<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yowyob Feedback</title>
</head>
<body>
        <h1 class="text-3xl">{{ $details['title'] }}</h1>
        <p>{{ $details['nameMember'] }}</p>
        <p>{{ $details['body'] }}</p>
        <p>Merci</p>

        <a href="{{ env('APP_URL').'/admin' }}">Se connecter</a>
</body>
</html>
