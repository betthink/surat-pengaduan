  @extends('container.wrapperLog')
  @section('auth_content')
      <div class="page-content--bge5">
          <div class="container">
              <div class="login-wrap">
                  <div class="login-content">
                      <div class="login-logo">
                         <h3>Login Warga</h3>
                      </div>
                      <div class="login-form">
                          <form action="{{ route('public-login') }}" method="post">
                              @csrf
                              <div class="form-group">
                                  <label>Username</label>
                                  <input class="au-input au-input--full" type="text" name="username" placeholder="">
                              </div>
                              <div class="form-group">
                                  <label>Password</label>
                                  <input class="au-input au-input--full" type="password" name="password" placeholder="">
                              </div>

                              <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">Log in</button>

                          </form>
                          <div class="register-link">
                              <p>
                                  Belum punya akun ?
                                  <a class=" text-primary" href="{{ route('public-register') }}" style="color: #fff">Buat
                                      akun</a>
                              </p>
                              <hr>
                              <p> <a class=" text-primary" href="{{ route('login-admin') }}" style="color: #fff">Log in
                                      admin</a></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endsection
