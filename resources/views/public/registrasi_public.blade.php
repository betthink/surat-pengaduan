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
                              <h3><strong>Registrasi warga</strong></h3>
                              <p class="mb-4">Untuk warga yang belum terdaftar sihlakan registrasi</p>
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
                              <div class="form-group first">
                                  <label for="alamat">Alamat</label>
                                  <input value="{{ old('alamat') }}" name="alamat" type="text" class="form-control"
                                      id="alamat" required>

                              </div>
                              <div class="form-group first">
                                  <label for="tempat_lahir">Tempat lahir</label>
                                  <input value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="text"
                                      class="form-control" id="tempat_lahir" required>

                              </div>
                              <div class="form-group first">
                                  <label for="nik">nik</label>
                                  <input value="{{ old('nik') }}" name="nik" type="text" class="form-control"
                                      id="nik" required>

                              </div>
                              <div class="form-group first">
                                  <label for="nomor_telp">Nomor telp</label>
                                  <input value="{{ old('nomor_telp') }}" name="nomor_telp" type="text"
                                      class="form-control" id="nomor_telp" required>
                              </div>



                              <div class="form-group first">
                                  <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="date"
                                      class="form-control" placeholder="Tanggal lahir" required>
                              </div>

                              <div class="form-group first">
                                  <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                                      <option selected>Pilih jenis kelamin</option>
                                      <option value="Laki-laki">Laki-laki
                                      </option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                              </div>
                              <div class="invisible form-group first">
                                  <input value="public" name="status" type="text" class="form-control" required>
                              </div>
                              <button type="submit" class="btn text-white btn-block btn-primary"> Log in</button>

                          </form>
                          <div class="mt-5">

                              <a class=" text-primary" href="{{ route('public-login') }}" style="color: #fff">Log in</a>
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
