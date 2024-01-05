<nav class="navbar navbar-dark navbar-expand-lg bg-nav w-100">
    <div class="container py-1 d-flex w-100 justify-content-between">
        <a class="navbar-brand" href="#">Mantap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav justify-content-end w-100">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link  {{ $title === 'Beranda' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('Beranda') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Pengaduan' ? 'active' : '' }}"
                        href="{{ route('public-pengaduan') }}">Pengaduan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Hasil' ? 'active' : '' }}"
                        href="{{ route('public-hasil') }}">Hasil</a>
                </li>
                <li class="ml-5 nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            @isset($user)
                                {{ $user['username'] }}
                            @endisset
                        </span> --}}
                        <img class="img-profile rounded-circle" src="{{ asset('assets/img/undraw_profile.svg') }}">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('public-logout') }}">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
        </div>
     
    </div>
</nav>
