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
                      <div class="col-md-6 col text-center mb-5">
                          <h2 class="heading-section">Sihlakan melakukan registrasi</h2>
                      </div>

                  </div>
                  <div>
                      @error('username')
                          <script>
                              document.addEventListener('DOMContentLoaded', function() {
                                  Swal.fire({
                                      title: 'Gagal registrasi!',
                                      text: "'{{ $message }}'",
                                      icon: 'error',
                                      position: "top",
                                      showConfirmButton: false,
                                      timer: 1500
                                  });
                              });
                          </script>
                      @enderror
                      @error('nik')
                          <script>
                              document.addEventListener('DOMContentLoaded', function() {
                                  Swal.fire({
                                      title: 'Gagal registrasi!',
                                      text: "'{{ $message }}'",
                                      icon: 'error',
                                      position: "top",
                                      showConfirmButton: false,
                                      timer: 1500
                                  });
                              });
                          </script>
                      @enderror
                      @error('password')
                          <script>
                              document.addEventListener('DOMContentLoaded', function() {
                                  Swal.fire({
                                      title: 'Gagal registrasi!',
                                      text: "'{{ $message }}'",
                                      icon: 'error',
                                      position: "top",
                                      showConfirmButton: false,
                                      timer: 1500
                                  });
                              });
                          </script>
                      @enderror
                  </div>
                  <div class="row justify-content-center">
                      <div class="col-md-6 col-lg-6">
                          <div class="login-wrap p-0">
                              <form action="" method="POST" class="signin-form row col-md-12">
                                  @csrf
                                  <div class="form-group col-md-6 col">
                                      <input value="{{ old('nama') }}" name="nama" type="text" class="form-control"
                                          placeholder="nama" required>
                                  </div>
                                  <div class="form-group col-md-6 col">
                                      <input value="{{ old('username') }}" name="username" type="text"
                                          class="form-control" placeholder="Username" required>
                                  </div>
                                  <div class="form-group col-md-6 col">
                                      <input value="{{ old('alamat') }}" name="alamat" type="text" class="form-control"
                                          placeholder="alamat" required>
                                  </div>

                                  <div class="form-group col-md-6 col">
                                      <input value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="text"
                                          class="form-control" placeholder="Tempat lahir" required>
                                  </div>
                                  <div class="form-group col-md-6 col">
                                      <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="date"
                                          class="form-control" placeholder="Tanggal lahir" required>
                                  </div>
                                  <div class="form-group col-md-6 col">
                                      <input value="{{ old('nik') }}" name="nik" type="text" class="form-control"
                                          placeholder="nik" required>
                                  </div>
                                  <div class="form-group col-md-6 col">
                                      <input value="{{ old('nomor_telp') }}" name="nomor_telp" type="text"
                                          class="form-control" placeholder="Nomor Telepon" required>
                                  </div>
                                  <div class="form-group col-md-6 col">
                                      <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                                          <option selected>Pilih jenis kelamin</option>
                                          <option value="Laki-laki">Laki-laki
                                          </option>
                                          <option value="Perempuan">Perempuan</option>
                                      </select>
                                      {{-- <input value="{{ old('nomor_telp') }}" name="nomor_telp" type="text" class="form-control"
                                          placeholder="Nomor Telepon" required> --}}
                                  </div>
                                  <div class="invisible form-group col-md-6 col">
                                      <input value="public" name="status" type="text" class="form-control" required>
                                  </div>
                                  <div class="form-group col-md-6 col">
                                      <input value="{{ old('password') }}" name="password" id="password-field"
                                          type="password" class="form-control" placeholder="Password" required>
                                      <span toggle="#password-field"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                  </div>
                                  <div class="form-group col-md-12 col">
                                      <button type="submit"
                                          class="form-control btn btn-primary submit px-3">Registrasi</button>
                                  </div>
                                  <div class="form-group col-md-6 col d-md-flex">
                                      <div class="w-50">
                                          <span>Sudah punya akun?</span>

                                      </div>
                                      <div class="w-50 text-md-right">

                                          <a class=" text-primary" href="{{ route('public-login') }}"
                                              style="color: #fff">Log in</a>
                                      </div>
                                  </div>
                              </form>

                          </div>
                      </div>
                  </div>
              </div>
          </section>
      @endsection
