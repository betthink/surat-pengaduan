<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('login-assets/fonts/icomoon/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('login-assets/css/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('login-assets/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('login-assets/css/style.css') }} ">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>{{ $title }}</title>
</head>

<body>



    <div class="content">

        {{-- content here --}}
        @yield('wrapper_auth')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('login-assets/js/jquery-3.3.1.min.js') }} "></script>
    <script src="{{ asset('login-assets/js/popper.min.js') }} "></script>
    <script src="{{ asset('login-assets/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('login-assets/js/main.js') }} "></script>
</body>

</html>
