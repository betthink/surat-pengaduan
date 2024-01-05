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
                             <th>hasil</th>
                             <th>Status</th>
                         </tr>
                     </thead>
                     <tbody>
                         @if (isset($dataHasil))
                             @foreach ($dataHasil as $data)
                                 <tr alert" role="alert">
                                     <td>{{ $data['nama_terlapor'] }}</td>
                                     <td>{{ $data['judul_perkara'] }}</td>
                                     <td>{{ $data['hasil'] }}</td>
                                     <td><a href="{{ route('public-hasil-detail', ['id' => $data['id']]) }}"
                                             class="btn btn-primary">Detail</a></td>
                                     <td class="status"><span
                                             class="{{ $data['status'] === 'Diproses' ? 'waiting' : 'active' }}">
                                             {{ $data['status'] }}</span>
                                     </td>
                                 </tr>
                             @endforeach
                         @endif
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 @endsection
