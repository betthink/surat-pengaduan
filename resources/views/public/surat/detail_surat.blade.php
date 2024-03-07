  @extends('public.layouts.wrapperPublic')
  @section('content')
      <!-- PAGE CONTENT-->
      <div class="page-content--bgf7 pt-5">
          <div class="container">
              {{-- @php
                  var_dump($datas);
              @endphp --}}
              <div class="row">
                  <div class="col-lg-6">
                      <div class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border">
                          <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                              <div class="bg-overlay bg-overlay--blue"></div>
                              <div class="">
                                  <h3 class="row flex justify-content-between">
                                      <span> Kasus {{ $datas->hasil }} </span>
                                      <a class="" href="{{ route('public-unduh-pdf', ['id' => $datas->id]) }}">
                                          <i class="fas fa-download"></i></a>
                                  </h3>

                              </div>
                              {{-- <a href="{{ route('public-unduh-pdf', ['id' => $datas->id]) }}" class="au-btn-plus">
                                  <i class="zmdi zmdi-plus"></i>
                              </a> --}}
                          </div>
                          <div class="au-task js-list-load au-task--border">

                              <div class="au-task-list js-scrollbar3">
                                  <div class="au-task__item au-task__item--danger">
                                      <div class="au-task__item-inner">
                                          <h5 class="task">
                                              <a href="#">Judul perkara</a>
                                          </h5>
                                          <span class="time">{{ $datas->judul_perkara }}</span>
                                      </div>
                                  </div>
                                  <div class="au-task__item au-task__item--warning">
                                      <div class="au-task__item-inner">
                                          <h5 class="task">
                                              <a href="#">Deskripsi</a>
                                          </h5>
                                          <span class="time">{{ $datas->deskripsi }}</span>
                                      </div>

                                  </div>
                                  <div class="au-task__item au-task__item--primary">
                                      <div class="au-task__item-inner">
                                          <h5 class="task">
                                              <a href="#">Tanggal</a>
                                          </h5>
                                          <span class="time">{{ $datas->tanggal }}</span>
                                      </div>
                                  </div>
                                  <div class="au-task__item au-task__item--success">
                                      <div class="au-task__item-inner">
                                          <h5 class="task">
                                              <a href="#">Status</a>
                                          </h5>
                                          <span class="time">{{ $datas->status }}</span>
                                      </div>

                                  </div>
                                  <div class="au-task__item au-task__item--danger js-load-item">
                                      <div class="au-task__item-inner">
                                          <h5 class="task">
                                              <a href="#">Rujukan</a>
                                          </h5>
                                          <span class="time">{{ $datas->rujukan }}</span>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  @endsection
