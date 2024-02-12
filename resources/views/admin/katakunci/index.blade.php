     @extends('admin.layouts.container')
     @section('container')

         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12">
                     <div class="table-data__tool w-100 bg-light py-3">

                         <div class="table-data__tool-right ml-3">
                             <a href="/tambah-kata-kunci" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                 <i class="zmdi zmdi-plus"></i>Tambah</a>
                         </div>
                     </div>
                     <div class="table-responsive table-responsive-data2">
                         <table class="table table-data2" id="dataTable" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>Kata</th>
                                     <th>Kategori</th>
                                     <th>keterangan</th>
                                     <th></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @if (isset($dataKatakunci))
                                     @foreach ($dataKatakunci as $data)
                                         <tr class="tr-shadow">
                                             <td>{{ $data['kata'] }}</td>
                                             <td>{{ $data['kategori'] }}</td>
                                             <td>{{ $data['keterangan'] }}</td>
                                             <td class="">
                                                 <div class="table-data-feature">
                                                     <a href="{{ route('edit.kata.kunci', ['id' => $data['id']]) }}"
                                                         class="item bg-c1">
                                                         <i class="zmdi zmdi-edit"></i></a>
                                                     </a>
                                                     <form class="w-100"
                                                         action="{{ route('hapus.kata.kunci', ['id' => $data['id']]) }}"
                                                         method="POST" class="">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="item ">
                                                             <i class="zmdi zmdi-delete"></i> </a>
                                                         </button>
                                                     </form>

                                                 </div>
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

     @endsection
