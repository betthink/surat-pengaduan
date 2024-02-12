  @extends('public/layouts/container')
  @section('containerpublic')
     <div class="row">
         <div class="col">

          
             <div class="card  mt-5 container mx-5  p-2">

                 <div class="card card-body ">
                     <h5 class="card-title align-self-center text-primary">KASUS TERKINI</h5>
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

             {{-- cards list --}}
             <div class="row gap-1 d-flex justify-content-center mt-4">
                 @if (isset($dataHasil))
                     @foreach ($dataHasil as $index => $data)
                         @if ($index === 0)
                             @continue
                         @endif
                         <div style="min-width: 500px;" class="col-md-4 mb-4"> <!-- Menambah class col-md-4 dan mb-4 -->
                             <div class="card p-4 d-flex d-flex-col gap-3">
                                 <div class="card-body">
                                     <div class="d-flex justify-content-between">
                                         <span>Nama</span>
                                         <h5 class="card-text text-primary"> {{ $data['nama_terlapor'] }}</h5>
                                     </div>
                                     <div class="d-flex justify-content-between">
                                         <span>Judul perkara</span>
                                         <p class="card-text text-primary">{{ $data['judul_perkara'] }}</p>
                                     </div>
                                     <div class="d-flex justify-content-between">
                                         <span>Hasil</span>
                                         <p class="card-text text-primary">{{ $data['hasil'] }}</p>

                                     </div>
                                     <div class="d-flex justify-content-between">
                                         <span>Status</span>

                                         <p class="card-text fw-5 {{ $data['status'] === 'Diproses' ? 'text-danger' : 'text-success' }}">
                                             {{ $data['status'] }}</p>

                                     </div>


                                 </div>
                                 <button type="button" class="btn btn-success align-self-end" data-toggle="modal"
                                     data-target="#detailModal{{ $data['id'] }}">
                                     Detail
                                 </button>
                             </div>
                         </div>
                         <!-- Modal -->
                         <div class="modal fade" id="detailModal{{ $data['id'] }}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Detail perkara
                                             {{ $data['judul_perkara'] }} </h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                         <!-- ... (kode modal tetap sama) ... -->
                     @endforeach
                 @endif
             </div>

         </div>
     </div>

 @endsection
