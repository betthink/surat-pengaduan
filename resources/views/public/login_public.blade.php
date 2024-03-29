  @extends('container.wrapperLogin')
  @section('wrapperLogin')

      <body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
          <section class="ftco-section">
              <div class="container">
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
                
                  <div class="row justify-content-center">
                      <div class="col-md-6 text-center mb-5">
                          <h2 class="heading-section">Selamat datang Warga</h2>
                      </div>
                  
                  </div>
                  <div class="row justify-content-center">
                      <div class="col-md-6 col-lg-4">
                          <div class="login-wrap p-0">
                              <form action="{{ route('public-login') }}" method="POST" class="signin-form">
                                  @csrf
                                  <div class="form-group">
                                      <input value="{{ old('username') }}" name="username" type="text"
                                          class="form-control" placeholder="Username" required>

                                  </div>
                                  <div class="form-group">
                                      <input value="{{ old('password') }}" name="password" id="password-field"
                                          type="password" class="form-control" placeholder="Password" required>
                                      <span toggle="#password-field"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                  </div>
                                  <div class="form-group">
                                      <button type="submit" class="form-control btn btn-primary submit px-3">Log
                                          In</button>
                                  </div>
                                  <div class="form-group d-md-flex">
                                      <div class="w-50">
                                          <span>Belum punya akun?</span>

                                      </div>
                                      <div class="w-50 text-md-right">

                                          <a class=" text-primary" href="{{ route('public-register') }}"
                                              style="color: #fff">Buat akun</a>
                                      </div>
                                  </div>
                              </form>

                          </div>
                      </div>
                  </div>
              </div>
          </section>
      @endsection
