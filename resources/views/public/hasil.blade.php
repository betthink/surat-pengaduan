 @extends('public.layouts.containerTable')
 @section('containerTable')
     <div class="row">
         <div class="col-md-12">

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
             <div class="card w-50 mt-5 p-2">
                 <p class="d-inline-flex gap-1">
                     <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
                         data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                         Kasus terkini
                     </button>
                 </p>
                 <div class="collapse" id="collapseExample">
                     <div class="card card-body">
                         <div class="d-flex justify-content-between">
                             <p class="card-text">Nama Terlapor</p>
                             <p class="text-success">
                                 {{ $dataHasil[0]['nama_terlapor'] }}</p>
                         </div>
                         <div class="d-flex justify-content-between">
                             <p class="card-text">Judul perkara</p>
                             <p class="text-success">
                                 {{ $dataHasil[0]['judul_perkara'] }}</p>
                         </div>
                         <div class="d-flex justify-content-between">
                             <p class="card-text">Hasil</p>
                             <p class="text-success">
                                 {{ $dataHasil[0]['hasil'] }}</p>
                         </div>
                         <div class="d-flex justify-content-between">
                             <p class="card-text">Status</p>
                             <p class="text-success">
                                 {{ $dataHasil[0]['status'] }}</p>
                         </div>
                         <div class="d-flex justify-content-between">
                             <p class="card-text">Deskripsi</p>
                             <p class="text-success">
                                 {{ $dataHasil[0]['deskripsi'] }}</p>
                         </div>
                         <div class="d-flex justify-content-between">
                             <p class="card-text">Rujukan</p>
                             <p class="text-success">
                                 {{ $dataHasil[0]['rujukan'] }}</p>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="table-wrap">
                 <table class="table table-responsive-xl">
                     <thead>
                         <tr class="">
                             <th>Nama terlapor</th>
                             <th>Judul Perkara</th>
                             <th>Hasil</th>
                             <th>Status</th>
                             <th>#</th>
                         </tr>
                     </thead>
                     <tbody>
                         @if (isset($dataHasil))
                             @foreach ($dataHasil as $index => $data)
                                 @if ($index === 0)
                                     @continue
                                 @endif
                                 <tr class="alert" role="alert">
                                     <td>{{ $data['nama_terlapor'] }}</td>
                                     <td>{{ $data['judul_perkara'] }}</td>
                                     <td>{{ $data['hasil'] }}</td>
                                     <td class="status">
                                         <span class="{{ $data['status'] === 'Diproses' ? 'waiting' : 'active' }}">
                                             {{ $data['status'] }}
                                         </span>
                                     </td>
                                     <td>
                                         <button type="button" class="btn btn-success" data-toggle="modal"
                                             data-target="#detailModal{{ $data['id'] }}">
                                             Detail
                                         </button>
                                     </td>
                                 </tr>
                                 <!-- Modal -->
                                 <div class="modal fade" id="detailModal{{ $data['id'] }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Detail perkara
                                                     {{ $data['judul_perkara'] }} </h5>
                                                 <button type="button" class="close" data-dismiss="modal"
                                                     aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                 </button>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="d-flex justify-content-between">
                                                     <h6 class="fw-bold text-success">Deskripsi</h6>
                                                     <p>
                                                         {{ $data['deskripsi'] }}</p>
                                                 </div>
                                                 <div class="d-flex justify-content-between">
                                                     <h6 class="fw-bold text-success">Tanggal laporan</h6>
                                                     <p>
                                                         {{ $data['tanggal'] }}</p>
                                                 </div>
                                                 <div class="d-flex justify-content-between">
                                                     <h6 class="fw-bold text-success">Rujukan</h6>
                                                     <p>
                                                         {{ $data['rujukan'] }}</p>
                                                 </div>
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary"
                                                     data-dismiss="modal">Tutup</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         @endif

                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 @endsection
