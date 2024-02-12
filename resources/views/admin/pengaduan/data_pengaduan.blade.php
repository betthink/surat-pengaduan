  @extends('admin.pengaduan.layout.wrapper_Cool_Admin')
  @section('content')
      <!-- DATA TABLE-->
      <section class="p-t-20">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <h3 class="title-5 m-b-35">data table</h3>
                      <div class="table-data__tool">

                          <div class="table-data__tool-right">
                              <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                  <i class="zmdi zmdi-plus"></i>Tambah penduduk</button>
                          </div>
                      </div>
                      <div class="table-responsive table-responsive-data2">
                          <table class="table table-data2">
                              <thead>
                                  <tr>
                                      <th>name</th>
                                      <th>email</th>
                                      <th>description</th>
                                      <th>date</th>
                                      <th>status</th>
                                      <th>price</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr class="tr-shadow">
                                     
                                      <td>Lori Lynch</td>
                                      <td>
                                          <span class="block-email">lori@example.com</span>
                                      </td>
                                      <td class="desc">Samsung S8 Black</td>
                                      <td>2018-09-27 02:12</td>
                                      <td>
                                          <span class="status--process">Processed</span>
                                      </td>
                                      <td>$679.00</td>
                                      <td>
                                          <div class="table-data-feature">
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="Send">
                                                  <i class="zmdi zmdi-mail-send"></i>
                                              </button>
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="Edit">
                                                  <i class="zmdi zmdi-edit"></i>
                                              </button>
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="Delete">
                                                  <i class="zmdi zmdi-delete"></i>
                                              </button>
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="More">
                                                  <i class="zmdi zmdi-more"></i>
                                              </button>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr class="spacer"></tr>
                                  <tr class="tr-shadow">
                                   
                                      <td>Lori Lynch</td>
                                      <td>
                                          <span class="block-email">john@example.com</span>
                                      </td>
                                      <td class="desc">iPhone X 64Gb Grey</td>
                                      <td>2018-09-29 05:57</td>
                                      <td>
                                          <span class="status--process">Processed</span>
                                      </td>
                                      <td>$999.00</td>
                                      <td>
                                          <div class="table-data-feature">
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="Send">
                                                  <i class="zmdi zmdi-mail-send"></i>
                                              </button>
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="Edit">
                                                  <i class="zmdi zmdi-edit"></i>
                                              </button>
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="Delete">
                                                  <i class="zmdi zmdi-delete"></i>
                                              </button>
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="More">
                                                  <i class="zmdi zmdi-more"></i>
                                              </button>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr class="spacer"></tr>
                                  <tr class="tr-shadow">
                                   
                                      <td>Lori Lynch</td>
                                      <td>
                                          <span class="block-email">lyn@example.com</span>
                                      </td>
                                      <td class="desc">iPhone X 256Gb Black</td>
                                      <td>2018-09-25 19:03</td>
                                      <td>
                                          <span class="status--denied">Denied</span>
                                      </td>
                                      <td>$1199.00</td>
                                      <td>
                                          <div class="table-data-feature">
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="Send">
                                                  <i class="zmdi zmdi-mail-send"></i>
                                              </button>
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="Edit">
                                                  <i class="zmdi zmdi-edit"></i>
                                              </button>
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="Delete">
                                                  <i class="zmdi zmdi-delete"></i>
                                              </button>
                                              <button class="item" data-toggle="tooltip" data-placement="top"
                                                  title="More">
                                                  <i class="zmdi zmdi-more"></i>
                                              </button>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr class="spacer"></tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- END DATA TABLE-->
  @endsection
