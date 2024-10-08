@extends('public.layouts.wrapperPublic')
@section('content')
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class=" m-b-35">Hasil laporan penduduk</h3>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <strong class="card-title">
                                <span class="font-weight-bold">Kasus terbaru</span>
                            </strong>
                            <a href="{{ route('public-detail-surat', ['id' => $dataHasil[0]['id']]) }}"
                                class="btn btn-secondary text-light">
                                <i class="fas fa-download"></i></a>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="font-weight-bold">Nama Terlapor</span>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-secondary">{{ $dataHasil[0]['nama_terlapor'] }}</p>
                                </div>
                             
                                <div class="col-md-6">
                                    <span class="font-weight-bold">Deskripsi</span>
                                </div>
                             
                                <div class="col-md-6">
                                    <p class="text-secondary">{{ $dataHasil[0]['deskripsi'] }}</p>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <span class="font-weight-bold">Judul perkara</span>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-secondary">{{ $dataHasil[0]['judul_perkara'] }}</p>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <span class="font-weight-bold">Rujukan</span>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-secondary">{{ $dataHasil[0]['rujukan'] }}</p>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <span class="font-weight-bold">Hasil</span>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-secondary">{{ $dataHasil[0]['hasil'] }}</p>
                                </div>
                                <div class="col-md-6">
                                    <span class="font-weight-bold">NIK Terlapor</span>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-secondary">{{ $dataHasil[0]['nik_terlapor'] }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Terlapor</th>
                                    <th>Judul perkara</th>
                                    <th>hasil</th>
                                    <th>Deskripsi</th>
                                    <th>status</th>
                                    <th>NIK Terlapor</th>
                                    <th>Rujukan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($dataHasil))
                                    @foreach ($dataHasil as $index => $data)
                                        @if ($index === 0)
                                            @continue
                                        @endif
                                        <tr class="tr-shadow">
                                            <td>{{ $data['nama_terlapor'] }}</td>
                                            <td>
                                                <span class="font-weight-bold" class="block-email">{{ $data['judul_perkara'] }}</span>
                                            </td>
                                            <td class="desc">{{ $data['hasil'] }}</td>
                                            <td>{{ $data['deskripsi'] }}</td>
                                            <td>
                                                <span class="font-weight-bold"
                                                    class="badge {{ $data['status'] === 'Diproses' ? 'badge-warning  ' : 'badge-success  ' }} ">{{ $data['status'] }}</span>
                                            </td>
                                            <td>{{ $data['nik_terlapor'] }}</td>
                                            <td>{{ $data['rujukan'] }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('public-detail-surat', ['id' => $data['id']]) }}"
                                                        class="item">
                                                        <i class="fas fa-download"></i>
                                                    </a>
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
    </section>
    <!-- END DATA TABLE-->
@endsection
