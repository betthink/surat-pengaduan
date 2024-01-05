<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/css/coloring.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/table/css/style.css') }}">

</head>

<body>
    @include('public.layouts.navbar_public')

    <div class="container">
        @yield('containerTable')
    </div>

    <script src="{{ asset('assets/table/js/jquery.min.js') }}  "></script>
    <script src="{{ asset('assets/table/js/js/popper.js') }}"></script>
    <script src=" {{ asset('assets/table/js/js/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('assets/table/js/main.js') }}"></script>
    

</body>

</html>
