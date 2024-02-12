@extends('public.layouts.wrapperPublic')
@section('content')
    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">

        <!-- WELCOME-->
        <section class="welcome p-t-10 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Welcome back
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
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Surat</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <!-- CHART-->
                        <div class="statistic-chart-1">
                            <h3 class="title-3 m-b-30">Masive</h3>
                            <div class="chart-wrap">
                                <canvas id="widgetChart5"></canvas>
                            </div>
                            <div class="statistic-chart-1-note">
                                <span class="big">10,368</span>
                                <span>/ 16220 items sold</span>
                            </div>
                        </div>
                        <!-- END CHART-->
                    </div>
                    <div class="col-md-6 col-lg-4">
                    
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- END STATISTIC CHART-->



    </div>
@endsection
