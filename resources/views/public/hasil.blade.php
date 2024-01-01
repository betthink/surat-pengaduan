  @extends('public/layouts/container')
  @section('containerpublic')
      <div class="row">
          <div class="col">
              <div class="container mt-3">

                  <h3>Hasil</h3>
                  @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif
              </div>
              <!-- DataTales  -->
              <div class="container">
                  <div class="card shadow mb-4">
                      <div class="card-header d-flex py-3 align-items-center w-100 justify-content-between">
                          <h6 class="m-0 font-weight-bold text-secondary">Daftar pengaduan</h6>
                          @if (session('success'))
                              <div class="alert alert-success">
                                  {{ session('success') }}
                              </div>
                          @endif

                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                      <tr>
                                          <th>Nama terlapor</th>
                                          <th>Judul Perkara</th>
                                          <th>Deskripsi</th>
                                          <th>hasil</th>
                                          <th>Tanggal pelaporan</th>
                                          <th>Rujukan</th>
                                          <th>Status</th>
                                          <th>user</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @if (isset($dataHasil))
                                          @foreach ($dataHasil as $data)
                                              <tr>
                                                  <td>{{ $data['nama_terlapor'] }}</td>
                                                  <td>{{ $data['judul_perkara'] }}</td>
                                                  <td>{{ $data['deskripsi'] }}</td>
                                                  <td>{{ $data['hasil'] }}</td>
                                                  <td>{{ $data['tanggal'] }}</td>
                                                  <td>{{ $data['rujukan'] }}</td>
                                                  <td>{{ $data['status'] }}</td>
                                                  <td>{{ $data['id_user'] }}</td>
                                              </tr>
                                          @endforeach
                                      @endif
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endsection
