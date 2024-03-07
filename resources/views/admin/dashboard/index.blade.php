  @extends('admin.layouts.container')
  @section('container')
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="overview-wrap">
                      <h2 class="title-1">Dashboard</h2>
                      {{-- <button class="au-btn au-btn-icon au-btn--blue">
                          <i class="zmdi zmdi-plus"></i>add item</button> --}}
                  </div>
              </div>
          </div>
          <div class="row m-t-25">
              <div class="col-sm-6 col-lg-3">
                  <div class="overview-item overview-item--c1">
                      <div class="overview__inner">
                          <div class="overview-box clearfix">
                              <div class="icon">
                                  <i class="zmdi zmdi-account-o"></i>
                              </div>
                              <div class="text-light">
                                  <h2>{{ $jumlah_user }}</h2>
                                  <div>Total masyarakat</div>
                              </div>
                          </div>
                          <div class="overview-chart">
                              <canvas id="widgetChart1"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                  <div class="overview-item overview-item--c2">
                      <div class="overview__inner">
                          <div class="overview-box clearfix">
                              <div class="icon">
                                  <i class="zmdi zmdi-shopping-cart"></i>
                              </div>
                              <div class="text-light">
                                  <h2>{{ $jumlah_laporan }}</h2>
                                  <div>Total pengaduan</div>
                              </div>
                          </div>
                          <div class="overview-chart">
                              <canvas id="widgetChart2"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                  <div class="overview-item overview-item--c3">
                      <div class="overview__inner">
                          <div class="overview-box clearfix">
                              <div class="icon">
                                  <i class="zmdi zmdi-calendar-note"></i>
                              </div>
                              <div class="text-light">
                                  <h2>{{ $pengaduanPidana }}</h2>
                                  <div>Kasus pidana</div>
                              </div>
                          </div>
                          <div class="overview-chart">
                              <canvas id="widgetChart3"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                  <div class="overview-item overview-item--c4">
                      <div class="overview__inner">
                          <div class="overview-box clearfix">
                              <div class="icon">
                                  <i class="zmdi zmdi-money"></i>
                              </div>
                              <div class="text-light">
                                  <h2>{{ $pengaduanPerdata }}</h2>
                                  <div>Kasus perdata</div>
                              </div>
                          </div>
                          <div class="overview-chart">
                              <canvas id="widgetChart4"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-lg-12">
                  <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                      <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                          <div class="bg-overlay bg-overlay--blue"></div>
                          <h3>
                              <i class="zmdi zmdi-account-calendar"></i>Kasus terkini
                          </h3>

                      </div>
                      <div class="au-task js-list-load">
                          {{-- @foreach ($datas as $item)
                      
                  @endforeach --}}
                          <div class="au-task-list js-scrollbar3">
                              @foreach ($datas as $item)
                                  <div class="au-task__item au-task__item--danger">
                                      <div class="au-task__item-inner">
                                        
                                          <div class="time">{{ $item['nama_terlapor'] }}</div>
                                          <div class="time">{{ $item['tanggal'] }}</div>
                                          <div class="time">{{ $item['rujukan'] }}</div>
                                          <div class="time">{{ $item['deskripsi'] }}</div>
                                          <div class="time">{{ $item['hasil'] }}</div>
                                      </div>
                                  </div>
                              @endforeach


                          </div>
                      </div>

                  </div>
              </div>
          </div>

      </div>
      {{-- <div class="row">
              <div class="col-md-12">
                  <div class="copyright">
                      <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                              href="https://colorlib.com">Colorlib</a>.</p>
                  </div>
              </div>
          </div> --}}
      </div>
  @endsection
