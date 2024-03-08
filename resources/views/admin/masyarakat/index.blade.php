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
                   <div class="table-data__tool bg-light py-3 ">
                       <div class="table-data__tool-right ml-3">
                           <a href="{{ route('tambah.masyarakat') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                               <i class="zmdi zmdi-plus"></i>Tambah</a>
                       </div>
                   </div>
                   <div class="table-responsive ">
                       {{-- table-responsive-data2 --}}
                       <table class="table table-data2">
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
                               @foreach ($datauser as $data)
                                   <tr class="tr-shadow">
                                       <td>{{ $data['username'] }}</td>
                                       <td>{{ $data['nama'] }}</td>
                                       <td>{{ $data['alamat'] }}</td>
                                       <td>{{ $data['nik'] }}</td>
                                       <td>{{ $data['tanggal_lahir'] }}</td>
                                       <td>{{ $data['tempat_lahir'] }}</td>

                                       <td>
                                           <div class="table-data-feature">
                                               {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                   title="Send">
                                                   <i class="zmdi zmdi-mail-send"></i>
                                               </button> --}}
                                               <a href="{{ route('edit.masyarakat', ['id' => $data['id']]) }}"
                                                   class="item" title="Edit">
                                                   <i class="zmdi zmdi-edit"></i></a>
                                               </button>
                                               <form action="{{ route('hapus.masyarakat', ['id' => $data['id']]) }}"
                                                   method="POST" class="item" data-toggle="tooltip" data-placement="top"
                                                   title="Hapus">
                                                   @csrf
                                                   @method('DELETE')
                                                   <button  onclick="return confirm('Apakah Anda yakin ingin menghapus penduduk?')" type="submit">
                                                       <i class="zmdi zmdi-delete"></i> </button>
                                               </form>
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
