  @extends('auth.layouts.wrapper_auth')
  @section('wrapper_auth')
      <div class="container">
          <div class="row">
              <div class="col-md-6 order-md-2">
                  <img src="{{ asset('login-assets/images/undraw_file_sync_ot38.svg') }}" alt="Image" class="img-fluid">
              </div>
              <div class="col-md-6 contents">
                  <div class="row justify-content-center">
                      <div class="col-md-8">
                          <div class="mb-4">
                              <h3><strong>Log in warga</strong></h3>
                              <p class="mb-4">Untuk warga yang sudah terdaftar sihlakan log in</p>
                          </div>
                          <form action="{{ route('public-login') }}" method="POST">
                              @csrf
                              <div class="form-group first">
                                  <label for="username">Username</label>
                                  <input  value="{{ old('username') }}" name="username" type="text" class="form-control" id="username" required>

                              </div>
                              <div class="form-group first">
                                  <label for="password">password</label>
                                  <input  value="{{ old('password') }}" name="password" type="text" class="form-control" id="password" required>

                              </div>


                              <button type="submit" class="btn text-white btn-block btn-primary"> Log in</button>

                          </form>
                          <div class="mt-5 d-flex justify-content-between">

                              <a class=" text-primary" href="{{ route('public-register') }}" style="color: #fff">Buat
                                  akun</a>
                              <a class=" text-primary" href="{{ route('login-admin') }}" style="color: #fff">Log in admin</a>
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
