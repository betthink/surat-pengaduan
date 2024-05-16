  @extends('auth.layouts.wrapper_auth')
  @section('wrapper_auth')
      <div class="container">x
          <div class="row">
              <div class="col-md-6 order-md-2">
                  <img src="{{ asset('login-assets/images/undraw_file_sync_ot38.svg') }}" alt="Image" class="img-fluid">
              </div>
              <div class="col-md-6 contents">
                  <div class="row justify-content-center">
                      <div class="col-md-8">
                          <div class="mb-4">
                              <h3><strong>Registrasi admin</strong></h3>
                              <p class="mb-4">Untuk admin yang belum terdaftar sihlakan registrasi</p>
                          </div>
                          <form action="" method="POST">
                              @csrf
                              <div class="form-group first">
                                  <label for="nama">nama</label>
                                  <input value="{{ old('nama') }}" name="nama" type="text" class="form-control"
                                      id="nama" required>
                              </div>
                              <div class="form-group first">
                                  <label for="username">Username</label>
                                  <input value="{{ old('username') }}" name="username" type="text" class="form-control"
                                      id="username" required>
                              </div>
                              <div class="form-group first">
                                  <label for="password">Password</label>
                                  <input value="{{ old('password') }}" name="password" type="text" class="form-control"
                                      id="password" required>

                              </div>
                           
                              <button type="submit" class="btn text-white btn-block btn-primary"> Daftar</button>
                          </form>
                          <div class="mt-5">
                              <a class=" text-primary" href="{{ route('admin-login') }}" style="color: #fff">Log in Admin</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
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
          @if ($errors->any())
              <script>
                  document.addEventListener('DOMContentLoaded', function() {
                      Swal.fire({
                          title: 'Error!',
                          text: "@foreach ($errors->all() as $error) {{ $error }} @endforeach",
                          icon: 'error',
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
  @endsection
