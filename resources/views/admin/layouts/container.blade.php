<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    <title>{{ $title }}</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('cool-admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('cool-admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('cool-admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('cool-admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('cool-admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('cool-admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('cool-admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('cool-admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('cool-admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('cool-admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('cool-admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('cool-admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        media="all">

    <!-- Main CSS-->
    <link href="{{ asset('cool-admin/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    {{-- sidebar --}}
    @include('admin.layouts.sidebar')
    <div class="page-container">
        {{-- header --}}
        @include('admin.layouts.header')
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                @yield('container')
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

    <!-- end document-->
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: "'{{ session('success') }}'",
                    icon: 'success',
                    position: "top",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Gagal login!',
                    text: "'{{ session('error') }}'",
                    icon: 'error',
                    position: "top",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endif

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jquery JS-->
    <script src="{{ asset('cool-admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('cool-admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('cool-admin/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('cool-admin/vendor/select2/select2.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('cool-admin/js/main.js') }}"></script>
</body>

</html>
