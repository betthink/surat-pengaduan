  @extends('public/layouts/container')
  @section('containerpublic')
      <div class="row d-flex justify-content-center mt-5">
          <div class="col col-md-8">
              <div class="container shadow p-4 ">
                  <h3 class="my-3">Isi data pengaduan</h3>
                  <form class="row" action="" method="POST">
                      @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                      <div class="mb-3 col-md-6 ">
                          <input placeholder="masukkan nama terlapor" value="{{ old('nama_terlapor') }}" name="nama_terlapor"
                              type="text" class="form-control" id="nama_terlapor">
                          @error('nama_terlapor')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3 col-md-6">
                          <input placeholder="masukkan judul perkara" value="{{ old('judul_perkara') }}"
                              name="judul_perkara" type="text" class="form-control" id="judul_perkara">
                          @error('judul_perkara')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3 col-md-6">
                          <textarea placeholder="tuliskan deskripsi" value="{{ old('deskripsi') }}" name="deskripsi" type="text"
                              class="form-control" id="deskripsi"cols="30" rows="8"></textarea>
                          @error('deskripsi')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>

                      <button type="submit" class="btn bg-primary text-light col-md-12">Masukkan</button>
                  </form>
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
