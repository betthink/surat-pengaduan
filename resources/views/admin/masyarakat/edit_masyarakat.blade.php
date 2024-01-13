@extends('admin/layouts/wrapper')

@section('content')
    <div class="">
        <!-- Topbar -->
        @include('admin.layouts.navbar')

        <!-- Begin Page Content -->
        <div class="container bg-light shadow p-4 ">

            <form class="row" action="" method="POST">
                @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                  @method('PUT') 
                <div class="mb-3 col-md-6 ">
                    <label for="nama" class="form-label">Nama</label>
                    <input value="{{ $user->nama }}" required name="nama" type="text" class="form-control"
                        id="nama">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input value="{{  $user->alamat }}" name="alamat" type="text" class="form-control" id="alamat">
                    @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="tempat_lahir" class="form-label">Tempat lahir</label>
                    <input value="{{  $user->tempat_lahir }}" name="tempat_lahir" type="text" class="form-control"
                        id="tempat_lahir">
                    @error('tempat_lahir')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                    <input value="{{  $user->tanggal_lahir }}" name="tanggal_lahir" type="text" class="form-control"
                        id="tanggal_lahir">
                    @error('tanggal_lahir')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input value="{{  $user->nik }}" name="nik" type="text" class="form-control" id="nik">
                    @error('nik')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                  <div class=" mb-3 col-md-6">
                          <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
                         <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                             <option 
                              
                             
                             {{  $user->jenis_kelamin =='Laki-laki'? 'selected' : '' }} value="Laki-laki">Laki-laki
                             </option>
                             <option  {{  $user->jenis_kelamin=='Perempuan'? 'selected' : ''}} value="Perempuan">Perempuan</option>
                         </select>
                     </div>
                     <div class="mb-3 col-md-6">
                         <label for="nomor_telp" class="form-label">Nomor telpon</label>
                         <input value="{{  $user->nomor_telp }}" name="nomor_telp" type="text" class="form-control"
                             id="nomor_telp">
                         @error('nomor_telp')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                <div class="mb-3 col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{  $user->username }}" name="username" type="text" class="form-control"
                        id="username">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
          

                <button type="submit" class="btn btn-success col-md-12">Edit</button>
            </form>
        </div>

    </div>
@endsection
