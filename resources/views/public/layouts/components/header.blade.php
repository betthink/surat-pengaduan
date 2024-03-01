    <!-- HEADER DESKTOP-->
    <header class="header-desktop3 d-none d-lg-block">
        <div class="section__content section__content--p35">
            <div class="header3-wrap">
                <div class="header__logo ">
                    <a class="text-light d-flex justify-content-between align-items-center w-75"
                        href="{{ route('Beranda') }}">
                        {{-- <img src="{{ asset('cool-admin/images/icon/logo.png ') }}" alt="Cool Admin" /> --}}
                        <i class="fa fa-book fa-2xl" aria-hidden="true"></i>
                        <h3 class="text-light">Pengaduan</h3>

                    </a>
                </div>
                <div class="header__navbar">
                    <ul class="list-unstyled">
                        <li class="has-sub">
                            <a href="{{ route('Beranda') }}">
                                <i class="fas fa-tachometer-alt"></i>Beranda
                                <span class="bot-line"></span>
                            </a>
                            {{-- <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                            </ul> --}}
                        </li>
                        <li>
                            <a href="{{ route('public-pengaduan') }}">
                                <i class="fas fa-shopping-basket"></i>
                                <span class="bot-line"></span>Pengaduan</a>
                        </li>
                        <li>
                            <a href="{{ route('public-hasil') }}">
                                <i class="fas fa-trophy"></i>
                                <span class="bot-line"></span>Hasil</a>
                        </li>
                        {{-- <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-copy"></i>
                                <span class="bot-line"></span>Pages</a>
                            <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-desktop"></i>
                                <span class="bot-line"></span>UI Elements</a>
                            <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">FontAwesome</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </div>
                <div class="header__tool">
                    <div class="account-wrap">
                        <div class="account-item account-item--style2 clearfix js-item-menu">
                            <div class="content">
                                <a class="js-acc-btn" href="#"> @isset($user)
                                        {{ $user['username'] }}
                                    @endisset
                                </a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">
                                                @isset($user)
                                                    {{ $user['username'] }}
                                                @endisset
                                            </a>
                                        </h5>
                                    </div>
                                </div>

                                <div class="account-dropdown__footer">
                                    <a href="{{ route('daftar-surat') }}">
                                        <i class="zmdi zmdi-power"></i>Surat</a>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                                        <i class="zmdi zmdi-power"></i>Profile</a>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('public-logout') }}">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER MOBILE-->
    <header class="header-mobile header-mobile-2 d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>

    </header>
