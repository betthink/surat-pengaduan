      <!-- MENU SIDEBAR-->
      <aside class="menu-sidebar d-none d-lg-block">
          <div class="logo">
              <a href="{{ route('dashboard') }}">
                  <img src="{{ asset('cool-admin/images/icon/logo.png ') }}" alt="Cool Admin" />
              </a>
          </div>
          <div class="menu-sidebar__content js-scrollbar1">
              <nav class="navbar-sidebar">
                  <ul class="list-unstyled navbar__list">
                      <li class="{{ $title === 'Dashboard' ? 'active' : '' }} has-sub">
                          <a class="js-arrow" href="#">
                              <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                          <ul class="list-unstyled navbar__sub-list js-sub-list">
                              <li>
                                  <a href="index.html">Dashboard 1</a>
                              </li>
                              <li>
                                  <a href="index2.html">Dashboard 2</a>
                              </li>
                          </ul>
                      </li>
                      <li class="{{ $title === 'Pengaduan' ? 'active' : '' }} ">
                          <a href="{{ route('kelola-pengaduan') }}">
                              <i class="fas fa-chart-bar"></i>Pengaduan</a>
                      </li>
                      <li class="{{ $title === 'Halaman Masyarakat' ? 'active' : '' }} ">
                          <a href="{{ route('kelola-masyarakat') }}">
                              <i class="fas fa-table"></i>Masyarakat</a>
                      </li>
                      <li class="{{ $title === 'Halaman kelola kata kunci' ? 'active' : '' }}">
                          <a href="{{ route('kelola-kata-kunci') }}">
                              <i class="far fa-check-square"></i>Kata kunci</a>
                      </li>
                     
                          </ul>
                      </li>
                  </ul>
              </nav>
          </div>
      </aside>
      <!-- END MENU SIDEBAR-->
