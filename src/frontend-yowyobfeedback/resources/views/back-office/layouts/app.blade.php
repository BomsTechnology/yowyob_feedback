<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yowyob - FeedBack</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="shortcut icon" type="image/jng" href="{{ asset('images/logo2.png') }}">

    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>

    @include('back-office.layouts.sidebar')

    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js"></script>

    <script>
        const body  = document.querySelector('body');

        const darkMode = function() {
            body.classList.toggle('dark');
        }
    </script>
</body>

</html>
