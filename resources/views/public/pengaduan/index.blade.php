@extends('public.layouts.wrapperPublic')
@section('content')
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Pengaduan</h3>
                    {{-- content --}}
                    <div class="card">
                        <div class="card-header">Buat laporan </div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Isi data</h3>
                            </div>
                            <hr>
                            <form action="" method="POST"novalidate="novalidate">
                                @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_terlapor" class="control-label mb-1">Nama terlapor</label>
                                        <input placeholder="Masukkan nama terlapor" id="cc-pament" name="nama_terlapor"
                                            type="text" class="form-control" aria-required="true" aria-invalid="false">
                                        @error('nama_terlapor')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group  col-md-6 has-success">
                                        <label for="judul_perkara" class="control-label mb-1">Judul perkara</label>
                                        <input placeholder="Masukkan judul perkara" id="judul_perkara" name="judul_perkara"
                                            type="text" class="form-control judul_perkara valid" data-val="true"
                                            data-val-required="Please enter the name on card" autocomplete="judul_perkara"
                                            aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                        <span class="help-block field-validation-valid" data-valmsg-for="judul_perkara"
                                            data-valmsg-replace="true"></span>
                                        @error('judul_perkara')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi" class="control-label mb-1">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="9" placeholder="Masukkan deskripsi" class="form-control"></textarea>
                                    <span class="help-block" data-valmsg-for="deskripsi" data-valmsg-replace="true"></span>
                                    @error('deskripsi')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <button id="submit-button" type="submit" class="au-btn--submit  text-white btn-block d-flex justify-content-center ">
                                        {{-- <i class="fa fa-lock fa-lg"></i> --}}
                                        <span id="submit-button">Buat laporan</span>
                                        <span id="submit-button" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- TOP CAMPAIGN-->
                            <div class="top-campaign">
                                <h3 class="title-3 m-b-30">List kata kunci pidana</h3>
                                <div class="table-responsive">
                                    <table class="table table-top-campaign">
                                        <tbody>
                                            @if (isset($kata_kunci))
                                                @foreach ($kata_kunci['pidana'] as $item)
                                                    <tr>
                                                        <td>{{ $item['kata'] }}</td>
                                                        <td>#</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--  END TOP CAMPAIGN-->
                        </div>
                        <div class="col-lg-6">
                            <!-- TOP CAMPAIGN-->
                            <div class="top-campaign">
                                <h3 class="title-3 m-b-30">List kata kunci perdata</h3>
                                <div class="table-responsive">
                                    <table class="table table-top-campaign">
                                        <tbody>
                                            @if (isset($kata_kunci))
                                                @foreach ($kata_kunci['perdata'] as $item)
                                                    <tr>
                                                        <td>{{ $item['kata'] }}</td>
                                                        <td>#</td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--  END TOP CAMPAIGN-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->
@endsection
