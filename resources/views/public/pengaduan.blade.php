  @extends('public/layouts/container')
  @section('containerpublic')
      <div class="row">
          <div class="col">
              <div class="container mt-3">

                  <h1>Pengaduan</h1>
                  <div class="container shadow p-4 ">

                      <form class="row " action="" method="POST">
                          @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                          
                          <div class="mb-3 col-md-6 ">
                              <label for="nama" class="form-label">Nama terlapor</label>
                              <input value="{{ old('nama_terlapor') }}" name="nama_terlapor" type="text"
                                  class="form-control" id="nama_terlapor">
                              @error('nama_terlapor')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="mb-3 col-md-6">
                              <label for="judul_perkara" class="form-label">Judul perkara</label>
                              <input value="{{ old('judul_perkara') }}" name="judul_perkara" type="text"
                                  class="form-control" id="judul_perkara">
                              @error('judul_perkara')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="mb-3 col-md-6">
                              <label for="deskripsi" class="form-label">deskripsi</label>
                              <textarea value="{{ old('deskripsi') }}" name="deskripsi" type="text"  class="form-control"
                                  id="deskripsi"cols="30" rows="8"></textarea>
                              @error('deskripsi')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <button type="submit" class="btn btn-outline-success col-md-12">Masukkan</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  @endsection
