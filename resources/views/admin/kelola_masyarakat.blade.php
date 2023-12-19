     @extends('admin/layouts/wrapper')
     @section('content')
         <div class="">
             <!-- Topbar -->
             @include('admin.layouts.navbar')

             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- DataTales  -->
                 <div class="card shadow mb-4">
                     <div class="card-header d-flex py-3 align-items-center w-100 justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Kelola user / masyarakat</h6>
                         @if (session('success'))
                             <div class="alert alert-success">
                                 {{ session('success') }}
                             </div>
                         @endif
                         <a href="/tambah-masyarakat" class="btn btn-outline-success">Tambah
                             masyarakat</a>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>Username</th>
                                         <th>Nama</th>
                                         <th>Alamat</th>
                                         <th>NIK</th>
                                         <th>Tanggal Lahir</th>
                                         <th>Tempat Lahir</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @if (isset($datauser))
                                         @foreach ($datauser as $data)
                                             <tr>
                                                 <td>{{ $data['username'] }}</td>
                                                 <td>{{ $data['nama'] }}</td>
                                                 <td>{{ $data['alamat'] }}</td>
                                                 <td>{{ $data['nik'] }}</td>
                                                 <td>{{ $data['tanggal_lahir'] }}</td>
                                                 <td>{{ $data['tempat_lahir'] }}</td>
                                                 <td class="d-md-flex ">
                                                     <a href="{{ route('edit-masyarakat', ['id' => $data['id']]) }}"
                                                         class="btn btn-outline-primary w-50 mx-2">
                                                         <i class="fa-solid fa-pen"></i>
                                                     </a>

                                                     <form class="w-50"
                                                         action="{{ route('hapus.masyarakat', ['id' => $data['id']]) }}"
                                                         method="POST" class="d-inline">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="btn btn-outline-danger w-100">
                                                             <i class="fa-regular fa-trash-can"></i>
                                                         </button>
                                                     </form>

                                                 </td>
                                             </tr>
                                         @endforeach
                                     @endif
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
             {{--  modal add masyarakat --}}
             {{-- <div class="modal fade w-100" id="modalAddMasyarakat" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog w-100">
                     <div class="modal-content">
                         <div class="modal-header">
                             <p class="modal-title fs-1" id="exampleModalLabel">Tambah masyarakat</p>
                             <button type="button" class="btn btn-close" data-bs-dismiss="modal"
                                 aria-label="Close">x</button>
                         </div>
                         <div class="modal-body">

                             <form class="row" action="/post-masyarakat" method="POST">
                                 @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                                 <div class="mb-3 col-md-6 ">
                                     <label for="nama" class="form-label">nama</label>
                                     <input value="{{ old('nama') }}" name="nama" type="text" class="form-control"
                                         id="nama">
                                     @error('nama')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                                 <div class="mb-3 col-md-6">
                                     <label for="alamat" class="form-label">alamat</label>
                                     <input value="{{ old('alamat') }}" name="alamat" type="text" class="form-control"
                                         id="alamat">
                                     @error('alamat')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                                 <div class="mb-3 col-md-6">
                                     <label for="tempat_lahir" class="form-label">tempat_lahir</label>
                                     <input value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="text"
                                         class="form-control" id="tempat_lahir">
                                     @error('tempat_lahir')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                                 <div class="mb-3 col-md-6">
                                     <label for="nik" class="form-label">nik</label>
                                     <input value="{{ old('nik') }}" name="nik" type="text" class="form-control"
                                         id="nik">
                                     @error('nik')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                                 <div class="mb-3 col-md-6">
                                     <label for="username" class="form-label">username</label>
                                     <input value="{{ old('username') }}" name="username" type="text"
                                         class="form-control" id="username">
                                     @error('username')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                                 <div class="mb-3 col-md-6">
                                     <label for="password" class="form-label">password</label>
                                     <input value="{{ old('password') }}" name="password" type="password"
                                         class="form-control" id="password">
                                     @error('password')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>

                                 <button id="submitButton" type="submit" class="btn btn-primary col-md-12">Submit</button>
                             </form>
                         </div>

                     </div>
                 </div>
             </div> --}}


         </div>

     @endsection
