  @extends('container.wrapperLogin')
  @section('wrapperLogin')
      <body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
          <section class="ftco-section">
              <div class="container">
                  @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif
                  @if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                  <div class="row justify-content-center">
                      <div class="col-md-6 text-center mb-5">
                          <h2 class="heading-section">Selamat datang Admin</h2>
                      </div>

                  </div>
                  @error('username')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  @error('password')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="row justify-content-center">
                      <div class="col-md-6 col-lg-4">
                          <div class="login-wrap p-0">
                              <form action="{{ route('admin-register') }}" method="POST" class="signin-form">
                                  @csrf
                                  <div class="form-group">
                                      <input name="nama" type="text" class="form-control" placeholder="nama" required>

                                  </div>
                                  <div class="form-group">
                                      <input name="username" type="text" class="form-control" placeholder="Username"
                                          required>

                                  </div>
                                  <div class="form-group">
                                      <input name="password" id="password-field" type="password" class="form-control"
                                          placeholder="Password" required>
                                      <span toggle="#password-field"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                  </div>
                                  <div class="form-group">
                                      <button type="submit"
                                          class="form-control btn btn-primary submit px-3">Registrasi</button>
                                  </div>
                                  <div class="form-group d-md-flex">
                                      <div class="w-50">
                                          <span>Sudah punya akun?</span>

                                      </div>
                                      <div class="w-50 text-md-right">

                                          <a class=" text-primary" href="{{ route('admin-login') }}"
                                              style="color: #fff">Login</a>
                                      </div>
                                  </div>
                              </form>

                          </div>
                      </div>
                  </div>
              </div>
          </section>
      @endsection
