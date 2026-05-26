<aside class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('landing') }}" class="sidebar-logo">ANTRIIN</a>
    </div>
    <ul class="sidebar-menu">
        @if(auth()->user()->isAdmin())
            <li class="sidebar-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa fa-gauge"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-users"></i> Kelola User
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-concierge-bell"></i> Kelola Layanan
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-calendar-alt"></i> Kelola Jadwal
                </a>
            </li>
        @elseif(auth()->user()->isOwner())
            <li class="sidebar-item">
                <a href="{{ route('owner.dashboard') }}" class="sidebar-link {{ request()->routeIs('owner.dashboard') ? 'active' : '' }}">
                    <i class="fa fa-gauge"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-chart-line"></i> Laporan
                </a>
            </li>
        @elseif(auth()->user()->isPetugas())
            <li class="sidebar-item">
                <a href="{{ route('petugas.dashboard') }}" class="sidebar-link {{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}">
                    <i class="fa fa-gauge"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-list-ol"></i> Kelola Antrian
                </a>
            </li>
        @elseif(auth()->user()->isPelanggan())
            <li class="sidebar-item">
                <a href="{{ route('pelanggan.dashboard') }}" class="sidebar-link {{ request()->routeIs('pelanggan.dashboard') ? 'active' : '' }}">
                    <i class="fa fa-gauge"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-calendar-check"></i> Booking Saya
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-list-ol"></i> Antrian Saya
                </a>
            </li>
        @endif
    </ul>
</aside>
