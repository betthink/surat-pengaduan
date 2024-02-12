   @extends('auth.templates')
   @section('main')
       <section class="container">
           <div class="row justify-content-center">
               <div class="col-md-6 text-center mb-5">
               </div>
           </div>
           <div class="row justify-content-center">
               <div class="col-md-6 col-lg-10">
                   <div class="wrap d-md-flex">
                       <div class="img"
                           style="background-image: url('https://images.unsplash.com/photo-1682686581362-796145f0e63?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
                       </div>
                       <div class="login-wrap p-4 p-md-5">
                           <div class="d-flex">
                               <div class="w-100">
                                   <h5 class="mb-4">Sihlakan mengisi data untuk melakukan pendaftar</h5>
                               </div>

                           </div>
                           <form class="row " action="/tambah-masyarakat" method="POST">
                               @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                               <div class="mb-3 input-group-sm col-md-6  ">
                                   <label for="nama" class="form-label">nama</label>
                                   <input value="{{ old('nama') }}" name="nama" type="text" class="form-control"
                                       id="nama">
                                   @error('nama')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>

                               <div class="mb-3 input-group-sm col-md-6">
                                   <label for="username" class="form-label">username</label>
                                   <input value="{{ old('username') }}" name="username" type="text" class="form-control"
                                       id="username">
                                   @error('username')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="mb-3 input-group-sm col-md-6">
                                   <label for="password" class="form-label">password</label>
                                   <input value="{{ old('password') }}" name="password" type="password" class="form-control"
                                       id="password">
                                   @error('password')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="mb-3 input-group-sm col-md-6">
                                   <label for="alamat" class="form-label">alamat</label>
                                   <input value="{{ old('alamat') }}" name="alamat" type="alamat" class="form-control"
                                       id="alamat">
                                   @error('alamat')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="mb-3 input-group-sm col-md-6">
                                   <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                                   <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="text"
                                       class="form-control" id="tanggal_lahir">
                                   @error('tanggal_lahir')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="mb-3 input-group-sm col-md-6">
                                   <label for="tempat_lahir" class="form-label">Tempat lahir</label>
                                   <input value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="tempat_lahir"
                                       class="form-control" id="tempat_lahir">
                                   @error('tempat_lahir')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="mb-3 input-group-sm col-md-12">
                                   <label for="nik" class="form-label">nik</label>
                                   <input value="{{ old('nik') }}" name="nik" type="nik" class="form-control"
                                       id="nik">
                                   @error('nik')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="mb-3 input-group-sm col-md-12">
                                   <label for="nomor_telp" class="form-label">Nomor Telpon</label>
                                   <input value="{{ old('nomor_telp') }}" name="nomor_telp" type="number" class="form-control"
                                       id="nomor_telp">
                                   @error('nik')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="mb-3 input-group-sm col-md-12">
                                   <button type="submit" class="btn btn-outline-primary rounded col-md-12">Daftar</button>
                               </div>
                           </form>
                           <p class="text-center">Sudah punya akun?
                               <a href="/"> Log in
                                   disini</a>
                           </p>
                       </div>
                   </div>
               </div>
           </div>
       </section>
   @endsection
