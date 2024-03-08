@extends('public.layouts.wrapperPublic')
@section('content')
    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!-- WELCOME-->
        <section class="welcome p-t-10 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Selamat datang
                            <span> @isset($user)
                                    {{ $user['username'] }}
                                @endisset!</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!-- STATISTIC CHART-->
        <section class="statistic-chart">
            <div class="container">
              
                <div class="row">

                    <div class="col-md-6">
                        <!-- TOP CAMPAIGN-->
                        <div class="top-campaign">
                            <h3 class="title-3 m-b-30">Kasus-kasus</h3>
                            <div class="table-responsive">
                                <table class="table table-top-campaign">
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item['judul_perkara'] }}</td>
                                                <td>{{ $item['tanggal'] }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END TOP CAMPAIGN-->
                    </div>
                  
                </div>
            </div>
        </section>
        <!-- END STATISTIC CHART-->



    </div>
@endsection
