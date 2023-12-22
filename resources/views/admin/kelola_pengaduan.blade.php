     @extends('admin/layouts/wrapper')
     @section('content')
         <div class="">
             <!-- Topbar -->
             @include('admin.layouts.navbar')

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
                                     <tr>
                                         <td>Tiger Nixon</td>
                                         <td>System Architect</td>
                                         <td>Edinburgh</td>
                                         <td>61</td>
                                         <td>2011/04/25</td>
                                         <td>2011/04/25</td>
                                         <td>2011/04/25</td>
                                         <td>
                                             <button class="btn btn-outline-primary">Filter</button>
                                             <button class="btn btn-outline-success ml-2"><i
                                                     class="fa-solid fa-circle-down"></i></button>
                                         </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>

             </div>
             <!-- /.container-fluid -->
         </div>
     @endsection
