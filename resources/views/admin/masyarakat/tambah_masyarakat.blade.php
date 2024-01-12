     @extends('admin/layouts/wrapper')
     @section('content')
         <!-- Topbar -->
         @include('admin.layouts.navbar')
         <div class="container">

             <!-- Begin Page Content -->
             <div class="container shadow p-4 ">

                 <form class="row " action="{{ route('tambah-masyarakat') }}" method="POST">
                     @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                     <div class="mb-3 col-md-6 ">
                         <label for="nama" class="form-label">nama</label>
                         <input value="{{ old('nama') }}" name="nama" type="text" class="form-control" id="nama">
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
                         <label for="tempat_lahir" class="form-label">Tempat lahir</label>
                         <input value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="text" class="form-control"
                             id="tempat_lahir">
                         @error('tempat_lahir')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="mb-3 col-md-6">
                         <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                         <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="date" class="form-control"
                             id="tanggal_lahir">
                         @error('tanggal_lahir')
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
                         <input value="{{ old('username') }}" name="username" type="text" class="form-control"
                             id="username">
                         @error('username')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="mb-3 col-md-6">
                         <label for="password" class="form-label">password</label>
                         <input value="{{ old('password') }}" name="password" type="password" class="form-control"
                             id="password">
                         @error('password')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <button type="submit" class="btn btn-outline-primary col-md-12">Submit</button>
                 </form>
             </div>

         </div>
     @endsection
