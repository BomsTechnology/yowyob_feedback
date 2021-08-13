<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yowyob - Feedback</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="shortcut icon" type="image/jng" href="{{ asset('images/logo2.png') }}">

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js"></script>


</head>

<body>

    @include('front-office.layouts.header')

    @yield('content')

    @include('front-office.layouts.footer')

    <script>
        $(document).ready(function() {
            $(".carousel").owlCarousel({
                margin: 20,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: false
                    }
                }
            });
        });
        const body = document.querySelector('body');

        const darkMode = function() {
            body.classList.toggle('dark');
        }
    </script>
</body>

</html>
