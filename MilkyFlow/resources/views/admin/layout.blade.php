<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin | MilkyFlow</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Gabarito:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>

<body>
    <div class="app">
        <aside class="sidebar">
            <div class="sidebar-logo"> <img src="{{ asset('images/logofiks2.png') }}" alt="MilkyFlow"> </div>
            <ul class="menu">
                <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('admin.peternak') ? 'active' : '' }}">
                    <a href="{{ route('admin.peternak') }}">
                        <i class="fa-solid fa-users"></i>
                        <span>Data & Akun Peternak</span>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('admin.verifikasi') ? 'active' : '' }}">
                    <a href="{{ route('admin.verifikasi') }}">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Verifikasi Setoran</span>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('admin.harga') ? 'active' : '' }}">
                    <a href="{{ route('admin.harga') }}">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        <span>Harga dan Kelompok Susu</span>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('admin.rekap') ? 'active' : '' }}">
                    <a href="{{ route('admin.rekap') }}">
                        <i class="fa-solid fa-chart-column"></i>
                        <span>Rekapitulasi Setoran</span>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
                    <a href="{{ route('admin.laporan') }}">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Laporan Pembayaran</span>
                    </a>
                </li>
            </ul>
        </aside>
        <main class="main">
            <header class="topbar">
                <h3 class="header-title">
                    @yield('page_title')
                </h3>
                <div class="profile-pill">
                    <div class="profile-avatar"> <i class="fa-solid fa-user"></i> </div> <span class="profile-text">Hi,
                        Admin</span> <i class="fa-solid fa-chevron-down"></i>
                </div>
            </header>
            <section class="content"> @yield('content') </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>