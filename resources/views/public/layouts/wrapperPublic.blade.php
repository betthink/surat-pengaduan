<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    {{-- <meta name="author" content="Hau Nguyen"> --}}
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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <style>
        .modal-scrollable .modal-dialog {
            max-height: calc(100vh - 100px);
            /* 100px merupakan estimasi tinggi elemen lain di laman Anda */
            overflow-y: auto;
        }
    </style>
</head>
<body class="animsition">
    <div class="page-wrapper">
        @include('public.layouts.components.header')
        <!-- PAGE CONTENT-->
        @yield('content')
        {{-- contents --}}
    </div>

    {{-- modal detail --}}
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data profile </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <span>Username</span>
                            <p class="card-text ">{{ $user['username'] }}</p>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <span>Nama</span>
                            <p class="card-text ">{{ $user['nama'] }}</p>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <span>NIK</span>
                            <p class="card-text ">{{ $user['nik'] }}</p>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <span>Alamat</span>
                            <p class="card-text ">{{ $user['alamat'] }}</p>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <span>Nomor telepon</span>
                            <p class="card-text ">{{ $user['nomor_telp'] }}</p>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <span>Jenis kelamin</span>
                            <p class="card-text ">{{ $user['jenis_kelamin'] }}</p>
                        </div>

                        <div class="card-body d-flex justify-content-between">
                            <span>Tempat Lahir</span>
                            <p class="card-text ">{{ $user['tempat_lahir'] }}</p>
                        </div>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#update"
                            class="au-btn--submit  text-white">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal update --}}
    <!-- Modal -->
    <div class="modal fade modal-scrollable" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit profile </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update-profile') }}" method="post" class="card">
                        @csrf
                        <div class="mb-3 px-3">
                            <label for="username" class="form-label">Username</label>
                            <input required name="username" value="{{ $user['username'] }}" type="text"
                                class="form-control" id="username" placeholder="Username">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="nama" class="form-label">nama</label>
                            <input required name="nama" value="{{ $user['nama'] }}" type="text"
                                class="form-control" id="nama" placeholder="nama">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input required name="nik" value="{{ $user['nik'] }}" type="text"
                                class="form-control" id="nik" placeholder="nik">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input required name="alamat" value="{{ $user['alamat'] }}" type="text"
                                class="form-control" id="alamat" placeholder="alamat">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="nomor_telp" class="form-label">Nomor telp</label>
                            <input required name="nomor_telp" value="{{ $user['nomor_telp'] }}" type="text"
                                class="form-control" id="nomor_telp" placeholder="nomor telpon">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                <option {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">
                                    Laki-laki
                                </option>
                                <option {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} value="Perempuan">
                                    Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="mb-3 px-3">
                            <label for="tempat_lahir" class="form-label">Tempat lahir</label>
                            <input required name="tempat_lahir" value="{{ $user['tempat_lahir'] }}" type="text"
                                class="form-control" id="tempat_lahir" placeholder="tempat_lahir">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="tempat_lahir" class="form-label">Tempat lahir</label>
                            <input required name="tanggal_lahir" value="{{ $user['tanggal_lahir'] }}" type="date"
                                class="form-control" id="tanggal_lahir" placeholder="tanggal lahir">
                        </div>
                        <div class="invisible form-group first">
                            <input required value="{{ $user['id'] }}" name="id" type="text"
                                class="form-control" required>
                        </div>
                        <div class="mb-3 px-3">
                            <button type="submit " class="au-btn--submit  text-white w-100"> Simpan </button>
                        </div>

                    </form>
                </div>
                {{-- notifikasi --}}
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
            </div>
        </div>
    </div>
    {{-- end modal --}}
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <!-- Main JS-->
    <script src="{{ asset('cool-admin/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
