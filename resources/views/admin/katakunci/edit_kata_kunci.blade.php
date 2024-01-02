     @extends('admin/layouts/wrapper')
     @section('content')
         <!-- Topbar -->
         @include('admin.layouts.navbar')
         <div class="container">

             <!-- Begin Page Content -->
             <div class="container shadow p-4 ">
                 <form class="row " action="" method="POST">
                     @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                     @method('PUT')
                     <div class="mb-3 col-md-6 ">
                         <label for="katakunci" class="form-label">kata kunci</label>
                         <input value="{{ $katakunci->kata }}" placeholder="Masukkan kata kunci"
                             value="{{ old('katakunci') }}" name="katakunci" type="text" class="form-control"
                             id="katakunci">
                         @error('katakunci')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="mb-3 col-md-6">
                         <label for="kategori" class="form-label">kategori</label>
                         <select id="kategori" name="kategori" class="form-select">
                             <option value="Perdata" {{ $katakunci->kategori == 'Perdata' ? 'selected' : '' }}>Perdata
                             </option>
                             <option value="Pidana" {{ $katakunci->kategori == 'Pidana' ? 'selected' : '' }}>Pidana</option>
                             <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                         </select>


                         @error('kategori')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="mb-3 col-md-6">
                         <label for="keterangan" class="form-label">keterangan</label>
                         <input value="{{ $katakunci->keterangan }}" placeholder="Masukkan keterangan"
                             value="{{ old('keterangan') }}" name="keterangan" type="text" class="form-control"
                             id="keterangan">
                         @error('keterangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <button type="submit" class="btn btn-success col-md-12">Ubah</button>
                 </form>
             </div>

         </div>
     @endsection
