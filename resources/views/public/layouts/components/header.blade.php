    <!-- HEADER DESKTOP-->
    <header class="header-desktop3 d-none d-lg-block ">
        <div class="section__content section__content--p35 ">
            <div class="header3-wrap ">
                <div class="header__logo ">
                    <a class="text-light d-flex justify-content-between align-items-center w-75"
                        href="{{ route('Beranda') }}">
                        <i class="fa fa-book fa-2xl" aria-hidden="true"></i>
                        <h3 class="text-light">Pengaduan</h3>

                    </a>
                </div>
                <div class="header__navbar">
                    <ul class="list-unstyled">
                        <li class="">
                            <a href="{{ route('Beranda') }}">
                                <i class="fas fa-home"></i>Beranda
                                <span class="bot-line"></span>
                            </a>

                        </li>
                        <li>
                            <a href="{{ route('public-pengaduan') }}">
                                <i class="far fa-envelope-open"></i>
                                <span class="bot-line"></span>Pengaduan</a>
                        </li>
                        <li>
                            <a href="{{ route('public-hasil') }}">
                                <i class="fas fa-balance-scale"></i>
                                <span class="bot-line"></span>Hasil</a>
                        </li>

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
                                            @isset($user)
                                                {{ $user['username'] }}
                                            @endisset
                                        </h5>
                                    </div>
                                </div>

                                {{-- <div class="account-dropdown__footer">
                                    <a href="{{ route('daftar-surat') }}">
                                        <i class="zmdi zmdi-power"></i>Surat</a>
                                </div> --}}
                                <div class="account-dropdown__footer">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                                        <i class="far fa-user"></i>Profile</a>
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
                    <a class="text-light d-flex justify-content-between align-items-center w-75"
                        href="{{ route('Beranda') }}">
                        <i class="fa fa-book fa-2xl" aria-hidden="true"></i>
                        <h3 class="text-light">Pengaduan</h3>

                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a href="{{ route('Beranda') }}">
                            <i class="fas fa-home"></i>Beranda
                            <span class="bot-line"></span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('public-pengaduan') }}">
                            <i class="far fa-envelope-open"></i>
                            <span class="bot-line"></span>Pengaduan</a>
                    </li>
                    <li>
                        <a href="{{ route('public-hasil') }}">
                            <i class="fas fa-balance-scale"></i>
                            <span class="bot-line"></span>Hasil</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="sub-header-mobile-2 d-block d-lg-none">
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
                                    @isset($user)
                                        {{ $user['username'] }}
                                    @endisset
                                </h5>
                            </div>
                        </div>
                        <div class="account-dropdown__footer">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                                <i class="far fa-user"></i>Profile</a>
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
