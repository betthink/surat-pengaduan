   @extends('auth.templates')
   @section('main')
       <section class="ftco-section">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-md-6 text-center mb-5">
                   </div>
               </div>
               <div class="row justify-content-center">
                   <div class="col-md-12 col-lg-10">
                       <div class="wrap d-md-flex">
                           <div class="img"
                               style="background-image: url('https://images.unsplash.com/photo-1682686581362-796145f0e123?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
                           </div>
                           <div class="login-wrap p-4 p-md-5">
                               <div class="d-flex">
                                   <div class="w-100">
                                       <h3 class="mb-4">Daftar</h3>
                                   </div>

                               </div>
                               <form class="row " action="" method="POST">
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
                                       <label for="username" class="form-label">username</label>
                                       <input value="{{ old('username') }}" name="username" type="text"
                                           class="form-control" id="username">
                                       @error('username')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                   </div>
                                   <div class="mb-3 col-md-12">
                                       <label for="password" class="form-label">password</label>
                                       <input value="{{ old('password') }}" name="password" type="password"
                                           class="form-control" id="password">
                                       @error('password')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                   </div>

                                   <button type="submit" class="btn btn-primary rounded col-md-12">Daftar</button>
                               </form>
                               <p class="text-center">Sudah punya akun?<a href="/"> Log in
                                       disini</a></p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
   @endsection
