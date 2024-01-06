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
             <div class="table-wrap">
                 <table class="table table-responsive-xl">
                     <thead>
                         <tr class="">
                             <th>Nama terlapor</th>
                             <th>Judul Perkara</th>
                             <th>Hasil</th>
                             <th>Status</th>
                             <th>Detail</th>
                         </tr>
                     </thead>
                     <tbody>
                         @if (isset($dataHasil))
                             @foreach ($dataHasil as $data)
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
                                         <button type="button" class="btn btn-primary" data-toggle="modal"
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
                                                 {{ $data['deskripsi'] }}
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary"
                                                     data-dismiss="modal">Close</button>
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
