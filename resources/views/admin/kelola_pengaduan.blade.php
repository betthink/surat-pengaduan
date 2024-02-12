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
                                         <th>Hasil</th>
                                         <th>Tanggal</th>
                                         <th>Rujukan</th>
                                         <th>Status</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($data as $item)
                                         <tr>
                                             <td>{{ $item['nama_terlapor'] }}</td>
                                             <td>{{ $item['judul_perkara'] }}</td>
                                             <td>{{ $item['deskripsi'] }}</td>
                                             <td>{{ $item['hasil'] }}</td>
                                             <td>{{ $item['tanggal'] }}</td>
                                             <td>{{ $item['rujukan'] }}</td>
                                             <td
                                                 class="{{ $item['status'] === 'Diproses' ? 'text-success' : 'text-danger' }}">
                                                 {{ $item['status'] }}</td>
                                             <td class="d-flex m-2">
                                                 <button data-toggle="modal" data-target="#detailModal{{ $item['id'] }}"
                                                     class="btn btn-primary">Validasi</button>
                                                 <a href="{{ route('kelola.pengaduan', ['id' => $item['id']]) }}"
                                                     class="btn btn-success ml-2"><i
                                                         class="fa-solid fa-circle-down"></i></a>
                                                 <a href="{{ route('delete-pengaduan', ['id' => $item['id']]) }}"
                                                     class="btn btn-danger ml-2">Delete</i></a>
                                             </td>
                                         </tr>
                                         <div class="modal fade" id="detailModal{{ $item['id'] }}" tabindex="-1"
                                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h5 class="modal-title" id="exampleModalLabel">Perkara
                                                             <span class="text-success">
                                                                 {{ $item['nama_terlapor'] }}</span> dengan judul
                                                             <span class="text-success"> {{ $item['judul_perkara'] }}
                                                             </span>
                                                         </h5>
                                                         <button type="button" class="close" data-dismiss="modal"
                                                             aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                     </div>

                                                     <div class="modal-body">
                                                         <form class="row" action="" method="POST">
                                                             @csrf <!-- Tambahkan CSRF token untuk keamanan -->

                                                             <div class="form-floating">
                                                                 <select name="status" class="form-select"
                                                                     id="floatingSelectGrid">
                                                                     <option
                                                                         {{ $item['status'] == 'Diproses' ? 'selected' : '' }}
                                                                         value="Diproses">Diproses</option>
                                                                     <option
                                                                         {{ $item['status'] == 'Selesai' ? 'selected' : '' }}
                                                                         value="Selesai">Selesai</option>
                                                                 </select>
                                                                 <label for="floatingSelectGrid">Status</label>
                                                             </div>

                                                             <div class="my-3 ">
                                                                 <label for="rujukan" class="form-label">Rujukan</label>
                                                                 <input value="{{ $item['rujukan'] }}" name="rujukan"
                                                                     type="text" class="form-control" id="rujukan">
                                                             </div>
                                                             <div class="my-3 d-none">
                                                                 <input value="{{ $item['id'] }}" name="id"
                                                                     type="text" class="form-control" id="id">
                                                             </div>
                                                             <div class="form-floating">
                                                                 <select name="hasil" class="form-select"
                                                                     id="floatingSelectGrid">

                                                                     <option
                                                                         {{ $item['hasil'] == 'Pidana' ? 'selected' : '' }}
                                                                         value="Pidana">Pidana</option>
                                                                     <option
                                                                         {{ $item['hasil'] == 'Perdata' ? 'selected' : '' }}
                                                                         value="Perdata">Perdata</option>
                                                                     <option
                                                                         {{ $item['hasil'] == 'tidak terdeteksi' ? 'selected' : '' }}
                                                                         value="Pidana">Tidak Terdeteksi
                                                                     </option>
                                                                 </select>
                                                                 <label for="floatingSelectGrid">Hasil</label>
                                                             </div>

                                                             <button type="submit" class="btn btn-success col-md-12">Submit
                                                                 perubahan</button>
                                                         </form>
                                                         {{-- </div> --}}
                                                     </div>

                                                 </div>
                                             </div>
                                        
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
