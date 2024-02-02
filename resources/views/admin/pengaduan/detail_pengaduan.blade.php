  @extends('admin.layouts.container')
  @section('container')
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-datas-center j mb-2 gap-5">
            <h1 class="h3 mb-0 text-gray-800">Detail pengaduan</h1>
            <a href="{{ route('unduh-pdf', ['id' => $data['id']]) }}" class="btn btn-success">Unduh surat</a>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-8 mb-3">

                <div class="card px-3">
                    <table class="table table-bordered mt-5">

                        <tbody>
                            <tr>
                                <th scope="row">Nama Terlapor</th>
                                <td>{{ $data['nama_terlapor'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Judul perkara</th>
                                <td>{{ $data['judul_perkara'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Judul perkara</th>
                                <td>{{ $data['deskripsi'] }}</td>
                            </tr>
                         
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{ $data['status'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Hasil</th>
                                <td>{{ $data['hasil'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal</th>
                                <td>{{ $data['tanggal'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Rujukan</th>
                                <td>{{ $data['rujukan'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

    <!-- Page chart -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <!-- /.container-fluid -->
@endsection
