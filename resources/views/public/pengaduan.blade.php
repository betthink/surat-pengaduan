  @extends('public/layouts/container')
  @section('containerpublic')
      <div class="row">
          <div class="col">


              <div class="container shadow p-4 ">
                  <h3 class="my-3">Sihlakan isi kolom pengaduan</h3>
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

                      <button type="submit" class="btn btn-secondary col-md-12">Masukkan</button>
                  </form>
              </div>
          </div>
      </div>
  @endsection
