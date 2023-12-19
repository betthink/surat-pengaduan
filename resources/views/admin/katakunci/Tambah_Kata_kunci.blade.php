     @extends('admin/layouts/wrapper')
     @section('content')
         <div class="">
             <!-- Topbar -->
             @include('admin.layouts.navbar')

             <!-- Begin Page Content -->
             <div class="container shadow p-4 ">

                 <form class="row " action="" method="POST">
                     @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                     <div class="mb-3 col-md-6 ">
                         <label for="katakunci" class="form-label">kata kunci</label>
                         <input placeholder="Masukkan kata kunci" value="{{ old('katakunci') }}" name="katakunci"
                             type="text" class="form-control" id="katakunci">
                         @error('katakunci')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="mb-3 col-md-6">
                         <label for="kategori" class="form-label">kategori</label>
                         <select id="kategori" name="kategori" class="form-select">
                             <option value="" selected>Pilih kategori </option>
                             <option value="Perdata">Perdata</option>
                             <option value="Pidana">Pidana</option>
                         </select>

                         @error('kategori')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="mb-3 col-md-6">
                         <label for="keterangan" class="form-label">keterangan</label>
                         <input placeholder="Masukkan keterangan" value="{{ old('keterangan') }}" name="keterangan"
                             type="text" class="form-control" id="keterangan">
                         @error('keterangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <button type="submit" class="btn btn-outline-primary col-md-12">Tambahkan</button>
                 </form>
             </div>

         </div>
     @endsection
