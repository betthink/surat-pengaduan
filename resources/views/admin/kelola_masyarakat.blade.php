     @extends('admin/layouts/wrapper')
     @section('content')
         <div class="">
             <!-- Topbar -->
             @include('admin.layouts.navbar')

             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- DataTales  -->
                 <div class="card shadow mb-4">
                     <div class="card-header d-flex py-3 align-items-center w-100 justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Kelola user / masyarakat</h6>
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
                         <a href="/tambah-masyarakat" class="btn btn-outline-success">Tambah
                             masyarakat</a>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>Username</th>
                                         <th>Nama</th>
                                         <th>Alamat</th>    
                                         <th>NIK</th>
                                         <th>Tanggal Lahir</th>
                                         <th>Tempat Lahir</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @if (isset($datauser))
                                         @foreach ($datauser as $data)
                                             <tr>
                                                 <td>{{ $data['username'] }}</td>
                                                 <td>{{ $data['nama'] }}</td>
                                                 <td>{{ $data['alamat'] }}</td>
                                                 <td>{{ $data['nik'] }}</td>
                                                 <td>{{ $data['tanggal_lahir'] }}</td>
                                                 <td>{{ $data['tempat_lahir'] }}</td>
                                                 <td class="d-md-flex m-2 ">
                                                     <a href="{{ route('edit-masyarakat', ['id' => $data['id']]) }}"
                                                         class="btn btn-primary w-50 mx-2">
                                                         <i class="fa-solid fa-pen"></i>
                                                     </a>

                                                     <form class="w-50"
                                                         action="{{ route('hapus.masyarakat', ['id' => $data['id']]) }}"
                                                         method="POST" class="d-inline">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="btn btn-success w-100">
                                                             <i class="fa-regular fa-trash-can"></i>
                                                         </button>
                                                     </form>

                                                 </td>
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
     @endsection
