<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman {{ $title }}</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    {{-- icons --}}
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/css/coloring.css') }}" rel="stylesheet">
</head>

<body>
    @include('public.layouts.navbar_public')
    <div class="container">
        @yield('containerpublic')
    </div>
    {{-- start modal --}}
    {{-- modal profile --}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data profile </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
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
                            class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="nik" class="form-label">nik</label>
                            <input required name="nik" value="{{ $user['nik'] }}" type="text"
                                class="form-control" id="nik" placeholder="nik">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="alamat" class="form-label">alamat</label>
                            <input required name="alamat" value="{{ $user['alamat'] }}" type="text"
                                class="form-control" id="alamat" placeholder="alamat">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="nomor_telp" class="form-label">nomor_telp</label>
                            <input required name="nomor_telp" value="{{ $user['nomor_telp'] }}" type="text"
                                class="form-control" id="nomor_telp" placeholder="nomor telpon">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
                            <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                                <option {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">
                                    Laki-laki
                                </option>
                                <option {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} value="Perempuan">
                                    Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="mb-3 px-3">
                            <label for="tempat_lahir" class="form-label">tempat_lahir</label>
                            <input required name="tempat_lahir" value="{{ $user['tempat_lahir'] }}" type="text"
                                class="form-control" id="tempat_lahir" placeholder="tempat_lahir">
                        </div>
                        <div class="mb-3 px-3">
                            <label for="tempat_lahir" class="form-label">tempat_lahir</label>
                            <input required name="tanggal_lahir" value="{{ $user['tanggal_lahir'] }}" type="text"
                                class="form-control" id="tanggal_lahir" placeholder="tanggal lahir">
                        </div>
                        <div class="invisible form-group first">
                            <input required value="{{ $user['id'] }}" name="id" type="text"
                                class="form-control" required>
                        </div>
                        <div class="mb-3 px-3">
                            <button type="submit " class="btn btn-primary w-100"> Simpan </button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login/js/bootstrap.min.js') }}"></script>
</body>

</html>
