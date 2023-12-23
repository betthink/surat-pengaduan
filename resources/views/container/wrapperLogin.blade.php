<!doctype html>
<html lang="en">

<head>
    <title>Halaman Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/login-20/css/style.css') }}">

</head>

<body class="img js-fullheight" style="background-image: url({{ asset('assets/login/images/bgx.jpg') }});">
    @yield('wrapperLogin')
    <script src="{{ asset('assets/login-20/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/login-20/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login-20/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login-20/js/main.js') }}"></script>

</body>

</html>