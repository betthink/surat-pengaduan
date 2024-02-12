   @extends('admin.layouts.container')
   @section('container')
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-6">
                   <!-- END USER DATA-->
               </div>
           </div>
           <div class="row">
               <div class="col-md-12">
                   <!-- DATA TABLE -->
                   <div class="table-data__tool w-100 bg-light py-3">

                   </div>
                   <div class="table-responsive table-responsive-data2">
                       <table class="table table-data2">
                           <thead>
                               <tr>
                                   <th>Nama terlapor</th>
                                   <th>Perkara</th>
                                   <th>Deskripsi</th>
                                   <th>Hasil</th>
                                   <th>Tanggal</th>
                                   <th>Rujukan</th>
                                   <th>Status</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($data as $item)
                                   <tr class="tr-shadow">
                                       <td>{{ $item['nama_terlapor'] }}</td>
                                       <td>{{ $item['judul_perkara'] }}</td>
                                       <td>{{ $item['deskripsi'] }}</td>
                                       <td>{{ $item['hasil'] }}</td>
                                       <td>{{ $item['tanggal'] }}</td>
                                       <td>{{ $item['rujukan'] }}</td>
                                       <td>
                                           <span
                                               class="{{ $item['status'] === 'Selesai' ? 'role member' : 'role user' }}">{{ $item['status'] }}</span>

                                       </td>
                                       <td>
                                           <div class="table-data-feature">
                                               <button class="item" data-toggle="tooltip" data-placement="top"
                                                   title="Edit">
                                                   <a href="{{ route('update.pengaduan', ['id' => $item['id']]) }}">
                                                       <i class="zmdi zmdi-edit"></i></a>
                                               </button>
                                               <button  onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="item" data-toggle="tooltip" data-placement="top"
                                                   title="Hapus">
                                                   <a href="{{ route('delete-pengaduan', ['id' => $item['id']]) }}">
                                                       <i class="zmdi zmdi-delete"></i> </a>
                                               </button>
                                               <button class="item" data-toggle="tooltip" data-placement="top"
                                                   title="Detail">
                                                   <a href="{{ route('kelola.pengaduan', ['id' => $item['id']]) }}">
                                                       <i class="zmdi zmdi-more"></i></a>
                                               </button>
                                           </div>
                                       </td>

                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </div>
                   <!-- END DATA TABLE -->
               </div>
           </div>
           {{-- footer --}}
           <div class="row mt-5">
               <div class="col-md-12">
               </div>
           </div>
       </div>
   @endsection
