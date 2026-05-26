<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <span class="navbar-brand text-white fw-bold">@yield('title')</span>
        
        <div class="ms-auto d-flex align-items-center">
            <div class="dropdown me-3">
                <a href="#" class="text-white text-decoration-none position-relative" id="notifDropdown" data-bs-toggle="dropdown">
                    <i class="fa fa-bell fa-lg"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                        0
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark bg-secondary border-secondary">
                    <li><span class="dropdown-item-text text-muted">Tidak ada notifikasi baru</span></li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown">
                    <img src="{{ auth()->user()->foto_profil ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->nama_lengkap).'&background=00d4d4&color=fff' }}" alt="Avatar" class="rounded-circle me-2" width="32" height="32">
                    <span>{{ auth()->user()->nama_lengkap }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark bg-secondary border-secondary">
                    <li><a class="dropdown-item" href="#"><i class="fa fa-user me-2"></i> Profil</a></li>
                    <li><hr class="dropdown-divider border-secondary"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger"><i class="fa fa-sign-out-alt me-2"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
