@extends('public.layouts.wrapperPublic')
@section('content')
    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!-- STATISTIC CHART-->
        <section class="">
            <div class="container">
              
                {{-- surat heres --}}
                <div class="row">
                    <div class="col-lg-12">
                        <!-- USER DATA-->
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30">
                              </i>Surat - surat pengantar pengaduan
                            </h3>

                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <td>Kategori laporan</td>
                                            <td>judul perkara</td>
                                            <td>terlapor</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_surat as $item)
                                            <tr>

                                                <td>
                                                    <div class="table-data__info">

                                                        <span>
                                                            {{ $item['hasil'] }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="role admin">{{ $item['judul_perkara'] }}</span>
                                                </td>
                                                <td>
                                                    <span class="role admin">{{ $item['nama_terlapor'] }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('public-detail-surat', ['id' => $item['id']]) }}"
                                                        class="">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- END USER DATA-->
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
