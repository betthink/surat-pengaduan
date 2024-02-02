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
                                       {{-- <td class="desc">Samsung S8 Black</td> --}}
                                       <td>
                                           <span class="status--process">{{ $item['status'] }}</span>
                                       </td>
                                       <td>
                                           <div class="table-data-feature">
                                               {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                   title="Send">
                                                   <i class="zmdi zmdi-mail-send"></i>
                                               </button> --}}
                                               <button class="item" data-toggle="modal"
                                                   data-target="#mediumModal{{ $item['id'] }}" title="Edit">
                                                   <i class="zmdi zmdi-edit"></i></a>
                                               </button>
                                               <button class="item" data-toggle="tooltip" data-placement="top"
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
                                       <!-- modal medium -->
                                       <div class="modal fade" id="mediumModal{{ $item['id'] }}" tabindex="-1" role="dialog"
                                           aria-labelledby="mediumModalLabel" aria-hidden="true">
                                           <div class="modal-dialog modal-lg" role="document">
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
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">Cancel</button>
                                                       <button type="button" class="btn btn-primary">Confirm</button>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
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
