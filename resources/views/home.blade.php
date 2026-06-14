@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertBox">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertBox">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internal LPB Sistem</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500;600;700&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css">

    {{-- Theme CSS --}}
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet">
</head>

<style>
/* ================================================================
   SATU blok <style> — semua digabung, duplikat & error dihapus
   ================================================================ */

/* ===== ALERT ===== */
#alertBox {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    min-width: 300px;
}

/* ================================================================
   NAVBAR
   ================================================================ */

/* Container navbar — fixed top, transisi hide/show */
#mainNavbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1050;
    background: rgba(255, 255, 255, 0.97);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
    padding: 10px 0;

    /*
     * HIDE / SHOW ON SCROLL
     * transform dikendalikan JavaScript — CSS hanya menyediakan transisi.
     */
    transform: translateY(0);
    transition: transform 0.32s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.3s ease;
    will-change: transform;
}

/* Kelas yang ditambahkan JS saat scroll ke bawah */
#mainNavbar.nav-hidden {
    transform: translateY(-110%);
    box-shadow: none;
}

/* Inner flex row */
.nav-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Logo */
.nav-logo img { height: 34px; }

/* ===== HAMBURGER ===== */
.btn-burger-nav {
    display: none;           /* hidden di desktop */
    width: 40px;
    height: 40px;
    border: 1.5px solid #e0e0e0;
    background: #fff;
    border-radius: 10px;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.1rem;
    color: #333;
    transition: all 0.2s;
    flex-shrink: 0;
}
.btn-burger-nav:hover {
    background: #FDB813;
    border-color: #FDB813;
    color: #000;
}

/* ===== NAV MENU ===== */
.nav-menu {
    display: flex;
    align-items: center;
    gap: 10px;
    list-style: none;
    margin: 0;
    padding: 0;
}

/* ===== LANGUAGE DROPDOWN ===== */
.lang-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 14px;
    border: 1.5px solid #e0e0e0;
    border-radius: 8px;
    background: #f8f9fa;
    font-weight: 600;
    font-size: 0.83rem;
    color: #333;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
    white-space: nowrap;
    user-select: none;
}
.lang-btn:hover {
    background: #FDB813;
    border-color: #FDB813;
    color: #000;
}

.lang-dropdown {
    position: relative;
}

/* =========================================
   HERO COMPACT
========================================= */

.hero-section{

    min-height:55vh;

    display:flex;

    align-items:center;

    justify-content:center;

}

/* MOBILE */
@media(max-width:768px){

    .hero-section{

        min-height:42vh;

    }

}
.lang-menu {
    display: none;
    position: absolute;
    top: calc(100% + 8px);
    right: 0;
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.10);
    min-width: 160px;
    overflow: hidden;
    z-index: 9999;
    animation: fadeDropdown 0.2s ease;
}
.lang-menu.open { display: block; }

@keyframes fadeDropdown {
    from { opacity: 0; transform: translateY(6px); }
    to   { opacity: 1; transform: translateY(0); }
}

.lang-menu a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
    font-size: 0.85rem;
    transition: background 0.15s;
}
.lang-menu a:hover { background: #fffbea; color: #000; }
.lang-menu a.active { background: #FDB813; color: #000; font-weight: 700; }
.lang-menu .lang-divider { height: 1px; background: #f0f0f0; margin: 0; }

/* ===== LOGIN BUTTON ===== */
.btn-login {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 18px;
    background: #5c5953;
    color: #fff;
    font-weight: 600;
    font-size: 0.83rem;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.2s;
    white-space: nowrap;
}
.btn-login:hover {
    background: #3d3a36;
    color: #FDB813;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

/* ================================================================
   MOBILE NAV (≤ 991px)
   ================================================================ */
@media (max-width: 991.98px) {

    .btn-burger-nav { display: flex; }

    /*
     * Panel menu mobile — tersembunyi default, muncul dengan
     * CSS max-height agar transisi slide halus.
     */
    .nav-menu {
        flex-direction: column;
        align-items: stretch;
        gap: 6px;

        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        border-top: 1px solid #f0f0f0;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        padding: 0 16px;

        /* Animasi slide — toggle oleh JS lewat max-height */
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    padding 0.3s ease;
    }

    /* Kelas "open" ditambahkan JS — angka 400px cukup untuk 3 item */
    .nav-menu.open {
        max-height: 400px;
        padding: 12px 16px 16px;
    }

    /* Tombol bahasa & login full-width di mobile */
    .lang-btn,
    .btn-login {
        width: 100%;
        justify-content: center;
    }

    /* Dropdown bahasa di mobile: relative, tidak absolute */
    .lang-menu {
        position: static;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        box-shadow: none;
        margin-top: 6px;
    }
}

/* ================================================================
   BODY OFFSET — konten tidak tertutup navbar fixed
   ================================================================ */
body { padding-top: 62px; }

/* ================================================================
   CONTENT STYLES
   ================================================================ */
#videoPreview {
    background-color: #000;
    object-fit: cover;
    will-change: transform;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

/* Hero section */
#home {
    min-height: 40vh;
    display: flex;
    align-items: center;
}

/* Info cards */
.info-card {
    border-radius: 20px;
    transition: all 0.3s ease;
    cursor: pointer;
}
.info-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    background: linear-gradient(135deg, #fffbea, #ffffff);
}
.info-card h5 { transition: 0.3s; }
.info-card:hover h5 { color: #f3db00; letter-spacing: 1px; }
.info-card:hover .icon-box { transform: rotate(10deg) scale(1.1); }

.attention-card { animation: float 2s ease-in-out infinite; }
@keyframes float {
    0%   { transform: translateY(0px); }
    50%  { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

/* Pulse */
@keyframes pulse-gold {
    0%   { opacity: 1; }
    50%  { opacity: 0.5; }
    100% { opacity: 1; }
}
.animate-pulse { animation: pulse-gold 1.5s infinite; }

/* Cards */
.card-main {
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: none;
    background: #fff;
}

/* Table */
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 60px;
    margin-bottom: -60px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.05);
}
.table thead { background: #212529; color: white; white-space: nowrap; }
.table th, .table td { vertical-align: middle; padding: 12px 15px; }

.img-table {
    width: 55px; height: 55px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* Buttons */
.btn-yellow { background: #f3db00; border: none; color: #000; font-weight: 600; }
.btn-yellow:hover { background: #e0c800; }

.btn-hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease !important; }
.btn-hover-lift:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.btn-action {
    width: 36px; height: 36px;
    display: inline-flex; align-items: center; justify-content: center;
    border-radius: 10px;
    transition: all 0.3s ease;
    border: none;
}
.btn-edit-new  { background-color: #f8f9fa; color: #0d6efd; }
.btn-delete-new { background-color: #f8f9fa; color: #dc3545; }
.btn-edit-new:hover,
.btn-delete-new:hover {
    background-color: #FDB813; color: #000;
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(253,184,19,0.4);
}

/* Bootstrap overrides */
.btn-warning {
    background-color: #e9b526 !important;
    border-color: #f3db00 !important;
    color: #000 !important;
}
.btn-warning:hover {
    background-color: #e0c800 !important;
    border-color: #e0c800 !important;
}

/* Modal */
#cameraModal .modal-content { border-radius: 15px; }
#cameraModal .modal-body { display: flex; align-items: center; justify-content: center; }

/* Dropdown menu global (Bootstrap) */
.dropdown-menu { background-color: #fff; border: 1px solid #ddd; }
.dropdown-item  { color: #000; }
.dropdown-item:hover { background-color: #FDB813; color: #fff; }

/* Dashboard cards */
.dashboard-card { transition: all 0.3s ease; cursor: pointer; }
.card-total:hover  { background-color: #FDB813 !important; color: #000; }
.card-proses:hover { background-color: rgb(214,204,204) !important; color: #000; border: 1px solid #ddd; }
.card-claimed:hover { background-color: #6c757d !important; color: #fff; }
.card-total:hover  i, .card-total:hover  h6, .card-total:hover  h2 { color: #000 !important; }
.card-proses:hover i, .card-proses:hover h6, .card-proses:hover h2 { color: #000 !important; }
.card-claimed:hover i, .card-claimed:hover h6, .card-claimed:hover h2 { color: #fff !important; }

/* Input */
input:invalid:focus { border-color: #ff4d4d; box-shadow: 0 0 0 0.25rem rgba(255,77,77,0.25); }
.text-danger { color: #ff4d4d !important; margin-left: 2px; font-weight: bold; }

/* Status badges */
.bg-soft-warning { background-color: #fff9e6; }
.bg-soft-success { background-color: #e6ffed; }
.extra-small { font-size: 0.75rem; }
.italic { font-style: italic; }

/* Language dropdown hover (Bootstrap version) */
.custom-lang-menu .dropdown-item:hover { background-color: #FDB813 !important; color: #000 !important; }
.custom-lang-menu .dropdown-item.active { background-color: #d4af37 !important; color: #fff !important; }

/* Container max width di layar besar */
@media (min-width: 1400px) { .container { max-width: 1200px !important; } }

/* Mobile section spacing */
@media (max-width: 768px) {
    .section-spacing { margin-top: 50px; margin-bottom: 50px; }
}
</style>

<body>

{{-- ================================================================
     NAVBAR
     - Toggle burger: 1 klik buka, 1 klik lagi tutup (benar-benar toggle)
     - Scroll ke bawah: navbar hilang (translateY -110%)
     - Scroll ke atas : navbar muncul kembali
     ================================================================ --}}
<nav id="mainNavbar">
    <div class="nav-inner">

        {{-- Logo --}}
        <a class="nav-logo" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/icons/logo-black.svg') }}" alt="Cititrans Logo">
        </a>

        {{-- Hamburger (mobile only) --}}
        <button class="btn-burger-nav" id="navBurger" aria-label="Buka menu">
            <i class="bi bi-list" id="burgerIcon"></i>
        </button>

        {{-- Menu Items --}}
        <ul class="nav-menu" id="navMenu">

            {{-- DROPDOWN BAHASA --}}
            <li class="lang-dropdown">
                <button class="lang-btn" id="langBtn" type="button" aria-label="Ganti Bahasa">
                    @if(app()->getLocale() == 'id')
                        <img src="https://flagcdn.com/w20/id.png" width="18" alt="ID" style="border-radius:2px;">
                        <span>ID</span>
                    @else
                        <img src="https://flagcdn.com/w20/gb.png" width="18" alt="EN" style="border-radius:2px;">
                        <span>EN</span>
                    @endif
                    <i class="bi bi-chevron-down" style="font-size:.65rem;"></i>
                </button>

                <div class="lang-menu" id="langMenu">
                    <a href="{{ route('lang.switch', 'id') }}"
                       class="{{ app()->getLocale() == 'id' ? 'active' : '' }}">
                        <img src="https://flagcdn.com/w20/id.png" width="18" alt="ID" style="border-radius:2px;">
                        Indonesia
                    </a>
                    <div class="lang-divider"></div>
                    <a href="{{ route('lang.switch', 'en') }}"
                       class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">
                        <img src="https://flagcdn.com/w20/gb.png" width="18" alt="EN" style="border-radius:2px;">
                        English
                    </a>
                </div>
            </li>

            {{-- TOMBOL LOGIN --}}
            <li>
                <a href="{{ route('login') }}" class="btn-login btn-hover-lift">
                    <i class="bi bi-person-fill-lock"></i> Log In
                </a>
            </li>

        </ul>
    </div>
</nav>

{{-- ================================================================
     MAIN CONTENT
     ================================================================ --}}
<main class="main" id="top">

    {{-- HERO --}}
  <section class="py-3 py-lg-4 hero-section"
         id="home">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-xxl-5 text-center py-3 pt-4">
                    <h1 class="fw-bold mb-1">{{ __('Lost And Found') }}</h1>
                    <h1 class="fs-5 fs-md-7 fs-xxl-6 mb-4">Cititrans</h1>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('input_g') }}"
                           class="btn btn-sm fw-bold px-3 py-2 text-dark btn-hover-lift"
                           style="background-color:#FDB813; border:none; font-size:.85rem; transition:.3s;">
                            <i class="fas fa-plus me-1"></i> {{ __('Buat Laporan') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- DASHBOARD STATS --}}
    <section id="dashboard-stats"
         class="py-3" style="background-color:#f8f9fa;">
        <div class="container">
            <h3 class="text-center fw-bold mb-2">{{ __('List Barang Lost & Found') }}</h3>
          <p class="text-center text-muted mb-3">{{ __('Monitoring data barang yang ditemukan, diproses, dan telah diklaim.') }}</p>

            <div class="card border-0 shadow-sm mb-4 rounded-4">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle-fill text-warning fs-2 me-3"></i>
                        <div class="row w-100 text-muted small">
                            <div class="col-md-4"><strong>{{ __('Total Barang') }}</strong> {{ __('Jumlah keseluruhan barang terdata.') }}</div>
                            <div class="col-md-4"><strong>{{ __('Diproses') }}</strong> {{ __('Barang dalam tahap pencarian pemilik.') }}</div>
                            <div class="col-md-4"><strong>{{ __('Sudah Diambil') }}</strong> {{ __('Barang yang telah berhasil diklaim.') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center mb-4">{{ session('success') }}</div>
            @endif

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card dashboard-card card-total border-0 shadow-sm text-center p-4">
                        <i class="bi bi-box-seam fs-1 text-warning"></i>
                        <h6 class="mt-3 text-muted">{{ __('Total Barang') }}</h6>
                        <h2 class="fw-bold">{{ $total }}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card card-proses border-0 shadow-sm text-center p-4">
                        <i class="bi bi-hourglass-split fs-1 text-warning"></i>
                        <h6 class="mt-3 text-muted">{{ __('Diproses') }}</h6>
                        <h2 class="fw-bold">{{ $diproses }}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card card-claimed border-0 shadow-sm text-center p-4">
                        <i class="bi bi-check-circle fs-1 text-warning"></i>
                        <h6 class="mt-3 text-muted">{{ __('Sudah Diambil') }}</h6>
                        <h2 class="fw-bold">{{ $claimed }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TABLE LAPORAN --}}
    <section id="form-laporan" class="py-5" style="background-color:#f8f9fa;">
        <div class="container">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white py-4 border-0">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold mb-0 text-dark">
                            <i class="bi bi-clock-history me-2 text-warning"></i>{{ __('LPB Terbaru') }}
                        </h4>
                    </div>

                    <form method="GET" action="{{ route('home') }}#form-laporan">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-3">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                                    <input type="text" name="search" class="form-control border-start-0"
                                           placeholder="{{ __('Cari nama barang...') }}" value="{{ request('search') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select name="kategori" class="form-select form-select-sm shadow-none">
                                    <option value="">{{ __('Semua Kategori') }}</option>
                                    <option value="Elektronik" {{ request('kategori') == 'Elektronik' ? 'selected' : '' }}>{{ __('Elektronik') }}</option>
                                    <option value="Dokumen"    {{ request('kategori') == 'Dokumen'    ? 'selected' : '' }}>{{ __('Dokumen') }}</option>
                                    <option value="Pakaian"    {{ request('kategori') == 'Pakaian'    ? 'selected' : '' }}>{{ __('Pakaian') }}</option>
                                    <option value="Lainnya"    {{ request('kategori') == 'Lainnya'    ? 'selected' : '' }}>{{ __('Lainnya') }}</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-warning btn-sm px-3 fw-bold text-black">
                                    <i class="bi bi-search me-1"></i> {{ __('Filter') }}
                                </button>
                                <a href="{{ route('home') }}"
                                   class="btn btn-sm px-3 fw-bold text-dark"
                                   style="background-color:#FDB813; border:1px solid #e0a40d; transition:.3s;">
                                    <i class="bi bi-arrow-clockwise me-1"></i> {{ __('Reset') }}
                                </a>
                            </div>
                            <div class="col text-end">
                                <span class="badge bg-light text-dark border p-2">
                                    <i class="bi bi-info-circle me-1"></i> {{ __('Menampilkan 5 Laporan Terbaru') }}
                                </span>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card border-0 shadow-sm card-main overflow-hidden rounded-4">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-hover">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="ps-4 py-3 text-uppercase small fw-bold text-white" style="width:50px;">{{ __('No') }}</th>
                                    <th class="py-3 text-uppercase small fw-bold text-white">{{ __('Nama Penemu') }}</th>
                                    <th class="py-3 text-uppercase small fw-bold text-white">{{ __('Detail Barang') }}</th>
                                    <th class="py-3 text-uppercase small fw-bold text-white">{{ __('Lokasi / Unit') }}</th>
                                    <th class="py-3 text-uppercase small fw-bold text-white">{{ __('Waktu Input') }}</th>
                                    <th class="py-3 text-uppercase small fw-bold text-white">{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reports as $index => $report)
                                <tr>
                                    <td class="ps-4 small text-muted">
                                        @if($reports instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                            {{ $reports->firstItem() + $index }}
                                        @else
                                            {{ $index + 1 }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="mt-1">
                                            <span class="badge d-inline-flex align-items-center"
                                                  style="background-color:#FDB813; color:#000; font-size:.7rem; padding:4px 8px; border-radius:4px; font-weight:700; letter-spacing:.3px;">
                                                <i class="bi bi-person-fill me-1"></i>
                                                {{ strtoupper($report->cs_name) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ $report->nama_barang }}</div>
                                        <div class="text-muted small text-uppercase" style="font-size:.75rem;">{{ __($report->kategori) }}</div>
                                        <div class="text-muted small italic">"{{ Str::limit($report->deskripsi, 30) }}"</div>
                                    </td>
                                    <td>
                                        <div class="fw-bold"><i class="bi bi-bus-front me-1"></i>{{ str_replace('Pool', __('Pool'), $report->nomor_kendaraan) }}</div>
                                        <div class="small text-muted">{{ __($report->lokasi_ditemukan) }}</div>
                                    </td>
                                    <td>
                                        <div class="small fw-bold text-dark">
                                            {{ \Carbon\Carbon::parse($report->tanggal_laporan)->translatedFormat('d M Y') }}
                                            <span class="text-muted fw-normal">({{ \Carbon\Carbon::parse($report->created_at)->format('H:i') }})</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if($report->status == 'diproses')
                                            <span class="badge bg-soft-warning text-warning border border-warning px-3 py-2 rounded-pill" style="font-size:.7rem;">
                                                <i class="bi bi-hourglass-split me-1"></i> {{ __('Diproses') }}
                                            </span>
                                        @else
                                            <span class="badge bg-soft-warning text-warning border border-warning px-3 py-2 rounded-pill" style="font-size:.7rem;">
                                                <i class="bi bi-check-circle me-1"></i> {{ __('Diambil') }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted italic">
                                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                        {{ __('Belum ada laporan barang yang ditemukan.') }}
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white py-3 border-0"></div>
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section class="py-5 bg-white section-spacing">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h3 class="fw-bold">
                        {{ __('Sistem Lost') }} <span style="color:#FDB813;"> {{ __('& Found') }} </span>
                    </h3>
                    <p class="text-muted mt-3">
                        {{ __('Website ini merupakan platform digital untuk pendataan barang hilang dan ditemukan di lingkungan Cititrans, yang membantu proses pencatatan, pelacakan, dan pengembalian barang secara lebih cepat dan terstruktur.') }}
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card info-card h-100 border-0 shadow-sm text-center p-4">
                        <div class="icon-box mb-3"><i class="bi bi-lightbulb"></i></div>
                        <h5 class="fw-bold">{{ __('Manfaat') }}</h5>
                        <p class="text-muted small">{{ __('Mempermudah pencatatan barang hilang, mengurangi risiko kehilangan data, dan mempercepat proses pengembalian kepada pemilik.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-card h-100 border-0 shadow-sm text-center p-4">
                        <div class="icon-box mb-3"><i class="bi bi-bullseye"></i></div>
                        <h5 class="fw-bold">{{ __('Tujuan') }}</h5>
                        <p class="text-muted small">{{ __('Meningkatkan efisiensi pengelolaan barang lost & found serta memberikan transparansi informasi kepada pengguna dan petugas.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-card h-100 border-0 shadow-sm text-center p-4">
                        <div class="icon-box mb-3"><i class="bi bi-speedometer2"></i></div>
                        <h5 class="fw-bold">{{ __('Keunggulan') }}</h5>
                        <p class="text-muted small">{{ __('Sistem digital terintegrasi, mudah diakses, serta mendukung monitoring status barang secara real-time.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <section class="py-0 bg-1100">

<footer class="py-4"
        style="
            background-color:#1a1a1a;
            border-top:4px solid #FDB813;
        ">

    <div class="container text-center">

        {{-- COPYRIGHT + RIGHTS --}}
<p class="small mb-1 text-light">

    &copy; {{ date('Y') }}
    Internal LPB Sistem

    <span style="color:rgba(255,255,255,.45);">

        - All rights reserved.

    </span>

</p>

        {{-- POWERED --}}
        <div style="
                color:#FDB813;
                font-size:.80rem;
                font-weight:600;
           ">

            Powered By IT Division

        </div>

    </div>

</footer>

</main>

{{-- ================================================================
     SCRIPTS
     ================================================================ --}}
<script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('vendors/is/is.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>
<script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
<script src="{{ asset('vendors/gsap/customEase.js') }}"></script>
<script src="{{ asset('vendors/gsap/scrollToPlugin.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ============================================================
       1. NAVBAR — HIDE ON SCROLL DOWN / SHOW ON SCROLL UP
       Menggunakan requestAnimationFrame agar tidak choppy.
       ============================================================ */
    const navbar   = document.getElementById('mainNavbar');
    let lastScroll = 0;
    let ticking    = false;

    window.addEventListener('scroll', function () {
        if (!ticking) {
            window.requestAnimationFrame(function () {
                const current = window.scrollY;

                if (current <= 10) {
                    /* Posisi paling atas — selalu tampilkan */
                    navbar.classList.remove('nav-hidden');

                } else if (current > lastScroll) {
                    /* Scroll ke BAWAH → sembunyikan navbar */
                    navbar.classList.add('nav-hidden');

                    /* Tutup menu mobile & dropdown bahasa saat navbar hilang */
                    navMenu.classList.remove('open');
                    langMenu.classList.remove('open');
                    burgerIcon.className = 'bi bi-list';

                } else {
                    /* Scroll ke ATAS → tampilkan navbar */
                    navbar.classList.remove('nav-hidden');
                }

                lastScroll = Math.max(current, 0);
                ticking    = false;
            });
            ticking = true;
        }
    }, { passive: true });

    /* ============================================================
       2. BURGER TOGGLE (mobile)
       - 1 klik → buka
       - 1 klik lagi → tutup
       - Klik di luar → tutup
       ============================================================ */
    const burger    = document.getElementById('navBurger');
    const navMenu   = document.getElementById('navMenu');
    const burgerIcon = document.getElementById('burgerIcon');

    burger.addEventListener('click', function (e) {
        e.stopPropagation();

        const isOpen = navMenu.classList.toggle('open');

        /* Ganti ikon: hamburger ↔ X */
        burgerIcon.className = isOpen ? 'bi bi-x-lg' : 'bi bi-list';
    });

    /* Klik di luar menu → tutup */
    document.addEventListener('click', function (e) {
        if (!navMenu.contains(e.target) && !burger.contains(e.target)) {
            navMenu.classList.remove('open');
            burgerIcon.className = 'bi bi-list';
        }
    });

    /* ============================================================
       3. DROPDOWN BAHASA
       - Tombol lang → toggle open/close
       - Klik di luar → tutup
       - Tidak mengganggu burger atau scroll
       ============================================================ */
    const langBtn  = document.getElementById('langBtn');
    const langMenu = document.getElementById('langMenu');

    langBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        langMenu.classList.toggle('open');
    });

    /* Klik di luar dropdown bahasa → tutup */
    document.addEventListener('click', function (e) {
        if (!langMenu.contains(e.target) && !langBtn.contains(e.target)) {
            langMenu.classList.remove('open');
        }
    });

    /* ============================================================
       4. ALERT AUTO-CLOSE
       ============================================================ */
    setTimeout(function () {
        const alertEl = document.getElementById('alertBox');
        if (alertEl && window.bootstrap && bootstrap.Alert) {
            new bootstrap.Alert(alertEl).close();
        }
    }, 3000);

    /* ============================================================
       5. SCROLL OTOMATIS KE FORM
       ============================================================ */
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('search') || urlParams.has('kategori')) {
        const el = document.getElementById('form-laporan');
        if (el) el.scrollIntoView({ behavior: 'smooth' });
    }

    /* ============================================================
       6. KAMERA (tidak diubah, hanya dipindah ke dalam DOMContentLoaded)
       ============================================================ */
    const cameraModalEl = document.getElementById('cameraModal');
    if (cameraModalEl) {
        cameraModalEl.addEventListener('hidden.bs.modal', stopCamera);
    }
});

/* ============================================================
   CAMERA FUNCTIONS (global agar bisa dipanggil dari inline HTML)
   ============================================================ */
let currentStream = null;

async function startCamera() {
    const video = document.getElementById('videoPreview');
    try {
        if (currentStream) stopCamera();
        currentStream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
        video.srcObject = currentStream;
        video.play();
    } catch (err) {
        console.error('Gagal akses kamera:', err);
        alert('Izin kamera tidak diberikan.');
    }
}

function stopCamera() {
    if (currentStream) {
        currentStream.getTracks().forEach(t => t.stop());
        currentStream = null;
    }
}

function takeSnapshot() {
    const video     = document.getElementById('videoPreview');
    const canvas    = document.getElementById('canvasCapture');
    const fileInput = document.getElementById('aksesFile');
    const ctx       = canvas.getContext('2d');

    if (video.readyState === video.HAVE_ENOUGH_DATA) {
        canvas.width  = video.videoWidth;
        canvas.height = video.videoHeight;
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        canvas.toBlob(function (blob) {
            const file = new File([blob], `capture_${Date.now()}.jpg`, { type: 'image/jpeg' });
            const dt   = new DataTransfer();
            dt.items.add(file);
            fileInput.files = dt.files;
            stopCamera();
            bootstrap.Modal.getInstance(document.getElementById('cameraModal')).hide();
        }, 'image/jpeg', 0.9);
    }
}
</script>

</body>
</html>