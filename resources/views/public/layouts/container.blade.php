<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman {{ $title }}</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-success w-100">
        <div class="container-fluid py-1 d-flex w-100 justify-content-between">
            <a class="navbar-brand" href="#">Mantap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav justify-content-end w-100">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link  {{ $title === 'Beranda' ? 'active' : '' }}" aria-current="page"
                            href="{{ route('Beranda') }}">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Pengaduan' ? 'active' : '' }}" href="{{ route('public-pengaduan') }}">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Hasil' ? 'active' : '' }}" href="{{ route('public-hasil') }}">Hasil</a>
                    </li>

                </ul>
            </div>
            <span><a href="{{ route('logout') }}"> <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                        @isset($user)
                            {{ $user['username'] }}
                        @endisset
                    </span></a></span>
        </div>
    </nav>
    @yield('containerpublic')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login/js/bootstrap.min.js') }}"></script>
</body>

</html>
