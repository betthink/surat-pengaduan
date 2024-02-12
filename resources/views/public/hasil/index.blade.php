@extends('public.layouts.wrapperPublic')
@section('content')
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Hasil laporan penduduk</h3>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"> Kasus terbaru
                                <small>
                                    <span
                                        class="badge  {{ $dataHasil[0]['status'] === 'Diproses' ? 'badge-warning  ' : 'badge-success  ' }}float-right mt-1">
                                        {{ $dataHasil[0]['status'] }}</span>
                                </small>
                            </strong>
                        </div>
                        <div class="card-body">
                            <h5>{{ $dataHasil[0]['nama_terlapor'] }}</h5>
                            <p class="card-text"> {{ $dataHasil[0]['deskripsi'] }}
                            </p>
                            <p>{{ $dataHasil[0]['judul_perkara'] }}</p>
                            <p>{{ $dataHasil[0]['rujukan'] }}</p>
                            <p>{{ $dataHasil[0]['hasil'] }}</p>
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
                                                <span class="block-email">{{ $data['judul_perkara'] }}</span>
                                            </td>
                                            <td class="desc">{{ $data['hasil'] }}</td>
                                            <td>{{ $data['deskripsi'] }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $data['status'] === 'Diproses' ? 'badge-warning  ' : 'badge-success  ' }} ">{{ $data['status'] }}</span>
                                            </td>
                                            <td>{{ $data['rujukan'] }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Detail" data-toggle="modal"
                                                        data-target="#mediumModal{{ $data['id'] }}">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- modal medium -->
                                        <div class="modal fade" id="mediumModal{{ $data['id'] }}" tabindex="-1"
                                            role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            There are three species of zebras: the plains zebra, the
                                                            mountain zebra and the Grévy's zebra. The plains zebra and the
                                                            mountain
                                                            zebra belong to the subgenus Hippotigris, but Grévy's zebra is
                                                            the sole species of subgenus Dolichohippus. The latter
                                                            resembles an ass, to which it is closely related, while the
                                                            former two are more horse-like. All three belong to the
                                                            genus Equus, along with other living equids.
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal medium -->
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
