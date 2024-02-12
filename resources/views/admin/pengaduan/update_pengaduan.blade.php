   @extends('admin.layouts.container')
   @section('container')
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-6">
                   <!-- END USER DATA-->
               </div>
           </div>
           <div class="row">
               <div class="col-md-12 bg-light h-100 py-5 px-3">
                   <form action="{{ route('update.pengaduan.action') }}" method="post">
                       @csrf <!-- Tambahkan CSRF token untuk keamanan -->

                       <div class="form-floating">
                           <label for="floatingSelectGrid">Status</label>
                           <select name="status" class="form-control" id="floatingSelectGrid">
                               <option {{ $data['status'] == 'Diproses' ? 'selected' : '' }} value="Diproses">Diproses
                               </option>
                               <option {{ $data['status'] == 'Selesai' ? 'selected' : '' }} value="Selesai">Selesai</option>
                           </select>
                       </div>

                       <div class="my-3 ">
                           <label for="rujukan" class="form-label">Rujukan</label>
                           <input value="{{ $data['rujukan'] }}" name="rujukan" type="text" class="form-control"
                               id="rujukan">
                       </div>
                       <div class="my-3 d-none">
                           <input value="{{ $data['id'] }}" name="id" type="text" class="form-control"
                               id="id">
                       </div>
                       <div class="form-floating mb-5">
                           <label for="floatingSelectGrid">Hasil</label>

                           <select name="hasil" class="form-control" id="floatingSelectGrid">

                               <option {{ $data['hasil'] == 'Pidana' ? 'selected' : '' }} value="Pidana">Pidana</option>
                               <option {{ $data['hasil'] == 'Perdata' ? 'selected' : '' }} value="Perdata">Perdata</option>
                               <option {{ $data['hasil'] == 'tidak terdeteksi' ? 'selected' : '' }} value="Pidana">Tidak
                                   Terdeteksi
                               </option>
                           </select>
                       </div>

                       <button type="submit" class="btn btn-success col-md-12"
                           onclick="return confirm('Apakah Anda yakin ingin menyimpan?')">Submit
                           perubahan</button>
                   </form>
               </div>
           </div>
       </div>
   @endsection
