     @extends('admin/layouts/wrapper')
     @section('content')
         <div class="">
             <!-- Topbar -->
             @include('admin.layouts.navbar')
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
             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- DataTales  -->
                 <div class="card shadow mb-4">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Kelola Pengaduan</h6>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>Nama terlapor</th>
                                         <th>Judul perkara</th>
                                         <th>Deskripsi</th>
                                         <th>Status</th>
                                         <th>Hasil</th>
                                         <th>Tanggal</th>
                                         <th>Rujukan</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($data as $item)
                                         <tr>
                                             <td>{{ $item['nama_terlapor'] }}</td>
                                             <td>{{ $item['judul_perkara'] }}</td>
                                             <td>{{ $item['deskripsi'] }}</td>
                                             <td
                                                 class="{{ $item['status'] === 'Diproses' ? 'text-success' : 'text-danger' }}">
                                                 {{ $item['status'] }}</td>

                                             <td>{{ $item['hasil'] }}</td>
                                             <td>{{ $item['tanggal'] }}</td>
                                             <td>{{ $item['rujukan'] }}</td>
                                             <td class="d-flex my-1">
                                                 <button class="btn btn-outline-primary">Filter</button>
                                                 <button class="btn btn-outline-success ml-2"><i
                                                         class="fa-solid fa-circle-down"></i></button>
                                             </td>
                                         </tr>
                                     @endforeach

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>

             </div>
             <!-- /.container-fluid -->
         </div>
     @endsection
