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
                              <div class="text">
                                  <h2>10368</h2>
                                  <span>Total masyarakat</span>
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
                              <div class="text">
                                  <h2>388,688</h2>
                                  <span>Total pengaduan</span>
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
                              <div class="text">
                                  <h2>1,086</h2>
                                  <span>Kasus pidana</span>
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
                              <div class="text">
                                  <h2>$1,060,386</h2>
                                  <span>Kasus perdata</span>
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
              <div class="col-lg-6">
                  <div class="au-card recent-report">
                      <div class="au-card-inner">
                          <h3 class="title-2">recent reports</h3>
                          <div class="chart-info">
                              <div class="chart-info__left">
                                  <div class="chart-note">
                                      <span class="dot dot--blue"></span>
                                      <span>products</span>
                                  </div>
                                  <div class="chart-note mr-0">
                                      <span class="dot dot--green"></span>
                                      <span>services</span>
                                  </div>
                              </div>
                              <div class="chart-info__right">
                                  <div class="chart-statis">
                                      <span class="index incre">
                                          <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                      <span class="label">products</span>
                                  </div>
                                  <div class="chart-statis mr-0">
                                      <span class="index decre">
                                          <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                      <span class="label">services</span>
                                  </div>
                              </div>
                          </div>
                          <div class="recent-report__chart">
                              <canvas id="recent-rep-chart"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="au-card chart-percent-card">
                      <div class="au-card-inner">
                          <h3 class="title-2 tm-b-5">char by %</h3>
                          <div class="row no-gutters">
                              <div class="col-xl-6">
                                  <div class="chart-note-wrap">
                                      <div class="chart-note mr-0 d-block">
                                          <span class="dot dot--blue"></span>
                                          <span>products</span>
                                      </div>
                                      <div class="chart-note mr-0 d-block">
                                          <span class="dot dot--red"></span>
                                          <span>services</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-6">
                                  <div class="percent-chart">
                                      <canvas id="percent-chart"></canvas>
                                  </div>
                              </div>
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
                          <button class="au-btn-plus">
                              <i class="zmdi zmdi-plus"></i>
                          </button>
                      </div>
                      <div class="au-task js-list-load">
                          <div class="au-task__title">
                              <p>Tasks for John Doe</p>
                          </div>
                          <div class="au-task-list js-scrollbar3">
                              <div class="au-task__item au-task__item--danger">
                                  <div class="au-task__item-inner">
                                      <h5 class="task">
                                          <a href="#">Meeting about plan for Admin Template 2018</a>
                                      </h5>
                                      <span class="time">10:00 AM</span>
                                  </div>
                              </div>
                              <div class="au-task__item au-task__item--warning">
                                  <div class="au-task__item-inner">
                                      <h5 class="task">
                                          <a href="#">Create new task for Dashboard</a>
                                      </h5>
                                      <span class="time">11:00 AM</span>
                                  </div>
                              </div>
                              <div class="au-task__item au-task__item--primary">
                                  <div class="au-task__item-inner">
                                      <h5 class="task">
                                          <a href="#">Meeting about plan for Admin Template 2018</a>
                                      </h5>
                                      <span class="time">02:00 PM</span>
                                  </div>
                              </div>
                              <div class="au-task__item au-task__item--success">
                                  <div class="au-task__item-inner">
                                      <h5 class="task">
                                          <a href="#">Create new task for Dashboard</a>
                                      </h5>
                                      <span class="time">03:30 PM</span>
                                  </div>
                              </div>
                              <div class="au-task__item au-task__item--danger js-load-item">
                                  <div class="au-task__item-inner">
                                      <h5 class="task">
                                          <a href="#">Meeting about plan for Admin Template 2018</a>
                                      </h5>
                                      <span class="time">10:00 AM</span>
                                  </div>
                              </div>
                              <div class="au-task__item au-task__item--warning js-load-item">
                                  <div class="au-task__item-inner">
                                      <h5 class="task">
                                          <a href="#">Create new task for Dashboard</a>
                                      </h5>
                                      <span class="time">11:00 AM</span>
                                  </div>
                              </div>
                          </div>
                          <div class="au-task__footer">
                              <button class="au-btn au-btn-load js-load-btn">load more</button>
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
