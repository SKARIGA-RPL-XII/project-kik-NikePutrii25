<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Susu PT. X</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/users/main.css') }}">
</head>

<body>

    @php
        $user = auth()->user();
        $inisial = strtoupper(substr($user->nama, 0, 1));
    @endphp

    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container-wide w-100 d-flex align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('users/dashboard') }}">
                <img src="{{ asset('images/LogoFiks.png') }}" alt="Logo" height="40">
            </a>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ Request::is('users/dashboard') ? 'active-link' : '' }}"
                            href="{{ url('users/dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ Request::is('users/riwayat*') ? 'active-link' : '' }}"
                            href="{{ url('users/riwayat') }}">
                            Riwayat Setoran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ Request::is('users/rekap*') ? 'active-link' : '' }}"
                            href="{{ url('users/rekap') }}">
                            Rekap Pendapatan
                        </a>
                    </li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none dropdown-toggle text-dark"
                    id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">

                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm"
                        style="width: 35px; height: 35px; background-color: var(--primary-navy) !important;">
                        {{ $inisial }}
                    </div>

                    <div class="d-none d-md-flex align-items-center gap-2">
                        <span class="fw-semibold small">{{ $user->nama }}</span>
                        <i class="bi bi-chevron-down" style="font-size: 0.7rem; color: #64748b;"></i>
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-2 p-2"
                    aria-labelledby="dropdownUser"
                    style="border-radius: 12px; min-width: 160px;">

                    <li class="px-2 mb-3">
                        <h6 class="fw-bold mb-0" style="color: var(--primary-navy);">
                            {{ $user->nama }}
                        </h6>
                        <small class="text-muted"
                            style="font-size: 0.75rem; letter-spacing: 0.5px;">
                            {{ ucfirst($user->role) }}
                        </small>
                    </li>

                    <li>
                        <hr class="dropdown-divider opacity-50">
                    </li>

                    <li>
                        <a class="dropdown-item py-2 d-flex align-items-center gap-2"
                            href="{{ url('users/profile') }}">
                            <i class="bi bi-person text-muted"></i> Profil Saya
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider opacity-50">
                    </li>

                    <li>
                            <button type="submit"
                                class="dropdown-item py-2 d-flex align-items-center gap-2 text-danger bg-transparent border-0 w-100">
                                <i class="bi bi-box-arrow-right"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('js_custom')

</body>

</html>