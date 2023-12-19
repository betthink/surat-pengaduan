     @extends('admin/layouts/wrapper')
     @section('content')
         {{-- @php
             var_dump($dataKatakunci);die;
         @endphp --}}
         <div class="">
             <!-- Topbar -->
             @include('admin.layouts.navbar')

             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- DataTales  -->
                 <div class="card shadow mb-4">
                     <div class="card-header d-flex py-3 align-items-center w-100 justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Kelola Kata kunci</h6>
                         @if (session('success'))
                             <div class="alert alert-success">
                                 {{ session('success') }}
                             </div>
                         @endif
                         <a href="/tambah-kata-kunci" class="btn btn-outline-success">Tambah
                             kata kunci</a>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>Kata</th>
                                         <th>Kategori</th>
                                         <th>keterangan</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @if (isset($dataKatakunci))
                                         @foreach ($dataKatakunci as $data)
                                             <tr>
                                                 <td>{{ $data['kata'] }}</td>
                                                 <td>{{ $data['kategori'] }}</td>
                                                 <td>{{ $data['keterangan'] }}</td>
                                                 <td class="d-flex w-100  justify-content-center ">
                                                     <a href="{{ route('edit-masyarakat', ['id' => $data['id']]) }}"
                                                         class="btn btn-outline-success w-50 mx-2 ">
                                                         <i class="fa-solid fa-pen"></i>
                                                     </a>

                                                     <form class="w-100"
                                                         action="{{ route('hapus.kata.kunci', ['id' => $data['id']]) }}"
                                                         method="POST" class="d-inline">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="btn btn-outline-danger w-50">
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
