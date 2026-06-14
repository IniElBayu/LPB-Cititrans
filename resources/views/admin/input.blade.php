@extends('layouts.app')

@section('content')


<style>
    /* ==================== KAMERA ==================== */
    #videoPreview {
        background-color: #000;
        object-fit: cover;
        will-change: transform;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    /* ==================== ALERT ==================== */
    #alertBox {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
    }

    /* ==================== BUTTONS ==================== */
    .btn-gold {
        background-color: #FDB813;
        color: #000;
        font-weight: bold;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-gold:hover {
        background-color: #D49B00;
        color: #000;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    .btn-yellow {
        background: #f3db00;
        border: none;
        color: #000;
        font-weight: 600;
    }
    .btn-yellow:hover { background: #e0c800; }

    .btn-warning {
        background-color: #e9b526 !important;
        border-color: #f3db00 !important;
        color: #000 !important;
    }
    .btn-warning:hover {
        background-color: #e0c800 !important;
        border-color: #e0c800 !important;
    }

    .btn-hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    }
    .btn-hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    /* ==================== FORM ==================== */
    .text-danger {
        color: #ff4d4d !important;
        margin-left: 2px;
        font-weight: bold;
    }
    input:invalid:focus {
        border-color: #ff4d4d;
        box-shadow: 0 0 0 0.25rem rgba(255,77,77,0.25);
    }

    /* ==================== DROPDOWN ==================== */
    .dropdown-item:hover {
        background-color: #FDB813;
        color: #fff;
    }
    /* Scoped agar tidak konflik dengan sidebar toggle */
    .dropdown-menu {
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .dropdown-menu.show {
        display: block !important;
    }

    /* ==================== CARDS ==================== */
    .card-main {
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border: none;
        background: #fff;
    }
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
    .info-card:hover h5 {
        color: #f3db00;
        letter-spacing: 1px;
    }
    .info-card:hover .icon-box {
        transform: rotate(10deg) scale(1.1);
    }

    /* ==================== TABLE ==================== */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        padding-bottom: 60px;
        margin-bottom: -60px;
    }
    .table thead {
        background: #212529;
        color: white;
        white-space: nowrap;
    }
    .table th, .table td {
        vertical-align: middle;
        padding: 12px 15px;
    }
    .img-table {
        width: 55px;
        height: 55px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* ==================== ACTION BUTTONS ==================== */
    .btn-action {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-edit-new { background-color: #f8f9fa; color: #0d6efd; }
    .btn-edit-new:hover {
        background-color: #FDB813; color: #000;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(253,184,19,0.4);
    }
    .btn-delete-new { background-color: #f8f9fa; color: #dc3545; }
    .btn-delete-new:hover {
        background-color: #FDB813; color: #000;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(253,184,19,0.4);
    }

    /* ==================== ANIMATIONS ==================== */
    .attention-card { animation: float 2s ease-in-out infinite; }
    @keyframes float {
        0%   { transform: translateY(0px); }
        50%  { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    @keyframes pulse-gold {
        0%   { opacity: 1; }
        50%  { opacity: 0.5; }
        100% { opacity: 1; }
    }
    .animate-pulse { animation: pulse-gold 1.5s infinite; }

    /* ==================== DASHBOARD CARDS ==================== */
    .dashboard-card { transition: all 0.3s ease; cursor: pointer; }

    .card-total:hover { background-color: #FDB813 !important; color: #000; }
    .card-total:hover i,
    .card-total:hover h6,
    .card-total:hover h2 { color: #000 !important; }

    .card-proses:hover { background-color: rgb(214,204,204) !important; color: #000; border: 1px solid #ddd; }
    .card-proses:hover i,
    .card-proses:hover h6,
    .card-proses:hover h2 { color: #000 !important; }

    .card-claimed:hover { background-color: #6c757d !important; color: #fff; }
    .card-claimed:hover i,
    .card-claimed:hover h6,
    .card-claimed:hover h2 { color: #fff !important; }

    /* ==================== MISC ==================== */
    body { background-color: #f8f9fa; }

    .bg-cititrans {
        background-color: #FDB813;
        background: linear-gradient(135deg, #FDB813 0%, #FFA500 100%);
    }
    .profile-frame:hover { transform: scale(1.05); transition: 0.2s; }
    .navbar-brand img { height: 35px; }

    /*
     * PENTING: .modal-body diberi scope ke #cameraModal
     * Tanpa scope, display:flex pada .modal-body akan merusak
     * layout seluruh halaman dan menghalangi klik tombol sidebar.
     */
    #cameraModal .modal-content { border-radius: 15px; }
    #cameraModal .modal-body {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ==================== HEADER ==================== */
    .top-header {
        transition: transform 0.3s ease-in-out;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1050;
    }
    .header-hidden { transform: translateY(-100%); }
    .content-wrapper { padding-top: 70px; }

    /* ==================== SIDEBAR ==================== */
    .sidebar {
        width: 280px;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        background: #fff;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease;
        overflow-y: auto;
        overflow-x: hidden;
        -webkit-overflow-scrolling: touch;
    }
    .sidebar-header {
        padding: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .sidebar-nav .nav-link {
        padding: 12px 15px;
        border-radius: 10px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        color: #555;
        font-weight: 500;
    }
    .sidebar-nav .nav-link i { width: 20px; text-align: center; }
    .sidebar-nav .nav-link:hover {
        background-color: rgba(253,184,19,0.1);
        color: #FDB813;
        transform: translateX(5px);
    }
    .sidebar-nav .nav-link.active {
        background-color: #FDB813;
        color: #000 !important;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(253,184,19,0.2);
    }
    .sidebar-nav .nav-link.active i { color: #000; }

    .sidebar-avatar {
        width: 50px; height: 50px;
        object-fit: cover;
        border: 3px solid #FDB813;
    }
    .avatar-placeholder {
        background: #FDB813;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: bold;
        font-size: 1.2rem;
    }
    .btn-lang-gold {
        background-color: #FDB813;
        border: none;
        border-radius: 12px;
        font-weight: bold;
        padding: 10px;
    }
    .btn-lang-gold:hover { background-color: #e5a700; }

    .main-wrapper {
        margin-left: 280px;
        transition: all 0.3s ease;
        min-height: 100vh;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 991.98px) {
        .sidebar { left: -280px; }
        .sidebar.active { left: 0; }
        .main-wrapper { margin-left: 0; }
    }
    @media (max-width: 768px) {
        .section-spacing { margin-top: 50px; margin-bottom: 50px; }
    }
    /* =========================================
   CAMERA ALERT
========================================= */

.camera-alert-overlay{

position:fixed;

inset:0;

background:rgba(0,0,0,.45);

backdrop-filter:blur(6px);

z-index:999999;

display:none;

align-items:center;

justify-content:center;

padding:20px;

}

.camera-alert-card{

width:100%;

max-width:420px;

background:#fff;

border-radius:28px;

padding:35px 28px;

text-align:center;

box-shadow:
    0 20px 60px rgba(0,0,0,.18);

animation:popupScale .25s ease;

}

.camera-alert-icon{

width:85px;

height:85px;

margin:auto;

border-radius:50%;

background:
    linear-gradient(
        135deg,
        #FDB813,
        #ffcf40
    );

display:flex;

align-items:center;

justify-content:center;

font-size:2.2rem;

color:#fff;

margin-bottom:18px;

}

@keyframes popupScale{

from{

    opacity:0;

    transform:
        scale(.85)
        translateY(20px);

}

to{

    opacity:1;

    transform:
        scale(1)
        translateY(0);

}

}.success-popup-overlay{

position:fixed;

inset:0;

background:rgba(0,0,0,.45);

backdrop-filter:blur(5px);

z-index:999999;

display:flex;

align-items:center;

justify-content:center;

}

.success-popup-card{

background:#fff;

width:100%;

max-width:420px;

border-radius:28px;

padding:38px 28px;

text-align:center;

}

.success-check{

width:90px;

height:90px;

border-radius:50%;

margin:auto;

background:
    linear-gradient(
        135deg,
        #FDB813,
        #ffcf40
    );

display:flex;

align-items:center;

justify-content:center;

font-size:2.5rem;

color:#fff;

}
</style>

{{-- Di dalam body app.blade.php --}}
<div class="container-fluid px-lg-4 mt-3">
    {{-- Header Global --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 border-bottom pb-3">
        <div>
            <h1 class="fw-bold mb-0" style="letter-spacing: -1px;">{{ __('Form LPB') }}</h1>
            <p class="text-muted small mb-0">{{ __('Form Input Data Barang') }}</p>
        </div>

        <div class="d-flex align-items-center gap-2 mt-2 mt-md-0">
            {{-- Dropdown Bahasa --}}
            <div class="dropdown">
                <button class="btn btn-light btn-sm border shadow-sm px-3 d-flex align-items-center dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" style="border-radius: 8px; height: 38px;">
                    <img src="https://flagcdn.com/w20/{{ app()->getLocale() == 'id' ? 'id' : 'gb' }}.png" width="20" class="me-2 rounded-1">
                    <span class="fw-bold">{{ strtoupper(app()->getLocale()) }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch', 'id') }}">
                        <img src="https://flagcdn.com/w20/id.png" width="20" class="me-2"> Indonesia</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch', 'en') }}">
                        <img src="https://flagcdn.com/w20/gb.png" width="20" class="me-2"> English</a></li>
                </ul>
            </div>

            {{-- Jam Live --}}
            <div class="d-flex align-items-center shadow-sm px-3"
                 style="background-color: #FDB813; color: #000; border-radius: 8px; height: 38px;">
                <span id="live-clock" class="fw-bold small">{{ date('d M Y | H:i:s') }}</span>
            </div>
        </div>
    </div>

    {{-- Alert System --}}
    @if(session('success') || $errors->any())
        <div class="position-fixed" style="top:20px; right:20px; z-index:9999; min-width:300px;">
        @if(session('success'))

<div class="success-popup-overlay"
     id="successPopup">

    <div class="success-popup-card">

        <div class="success-check">

            <i class="bi bi-check-lg"></i>

        </div>

        <h4 class="fw-bold mt-4 mb-2">

            {{ __('Berhasil!') }}

        </h4>

        <p class="text-muted mb-4">

            {{ session('success') }}

        </p>

        <button class="btn btn-warning rounded-pill px-4 fw-bold"
                onclick="closeSuccessPopup()">

            OK

        </button>

    </div>

</div>

@endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm">
                    <ul class="mb-0 small ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>
    @endif

    @yield('content')
</div>

{{-- ============================================================
     SECTION FORM
     ============================================================ --}}
<section id="form-laporan" class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row g-5">

            {{-- Sidebar Perhatian --}}
            <div class="col-lg-4">
                <div class="card shadow-lg border-0 rounded-4 p-4 sticky-lg-top" style="top: 20px;">
                    <h5 class="fw-bold mb-3"><span class="text-warning">&#9888;</span> {{ __('Perhatian') }}</h5>
                    <p class="small text-muted">{{ __('Harap pastikan semua kolom pada formulir di samping telah diisi dengan akurat dan lengkap.') }}</p>
                    <ul class="small ps-3 mb-0" style="line-height: 2;">
                        <li>{{ __('Periksa data diri pelapor.') }}</li>
                        <li>{{ __('Pastikan foto barang jelas.') }}</li>
                        <li>{{ __('Deskripsi barang harus mendetail.') }}</li>
                    </ul>
                </div>
            </div>

            {{-- Card Form --}}
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0 text-uppercase" style="letter-spacing: 1px;">{{ __('Detail Laporan Barang') }}</h4>
                    </div>

                    {{-- ============ FORM ============ --}}
                    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Group 1: Informasi Barang --}}
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="bi bi-box-seam me-2 text-warning"></i>{{ __('Informasi Barang') }}
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Nama Barang') }} <span class="text-danger">*</span></label>
                                <input type="text" name="nama_barang" class="form-control bg-light border-0 shadow-sm"
                                       placeholder="{{ __('Cth: Dompet Hitam') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Kategori') }} <span class="text-danger">*</span></label>
                                <select name="kategori" class="form-select bg-light border-0 shadow-sm" required>
                                    <option value="" selected disabled>{{ __('Pilih Kategori') }}</option>
                                    <option value="Elektronik">{{ __('Elektronik') }}</option>
                                    <option value="Dokumen">{{ __('Dokumen') }}</option>
                                    <option value="Pakaian">{{ __('Pakaian') }}</option>
                                    <option value="Lainnya">{{ __('Lainnya') }}</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">{{ __('Deskripsi Barang') }} <span class="text-danger">*</span></label>
                                <textarea name="deskripsi" class="form-control bg-light border-0 shadow-sm"
                                          rows="3" placeholder="{{ __('Jelaskan ciri-ciri khusus barang...') }}" required></textarea>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        {{-- Group 2: Waktu & Pelapor --}}
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="bi bi-person-badge me-2 text-warning"></i>{{ __('Waktu & Data Pelapor') }}
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Tanggal Laporan') }} <span class="text-danger">*</span></label>
                                <div class="shadow-sm rounded">
                                    
                                    <input type="date"
                                    name="tanggal_laporan"
                                    class="form-control bg-light border-0"
                                    onclick="this.showPicker()"
                                    required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('NIK Pelapor') }} <span class="text-danger">*</span></label>
                                <input type="text" name="nik_pelapor" class="form-control bg-light border-0 shadow-sm"
                                       placeholder="{{ __('Masukkan NIK') }}"
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                       maxlength="16" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Nama Pelapor') }} <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pelapor" class="form-control bg-light border-0 shadow-sm"
                                       placeholder="{{ __('Nama Lengkap') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Jabatan Pelapor') }} <span class="text-danger">*</span></label>
                                <input type="text" name="jabatan_pelapor" class="form-control bg-light border-0 shadow-sm"
                                       placeholder="{{ __('Cth: Pengemudi / Staff') }}" required>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        {{-- Group 3: Lokasi & Kendaraan --}}
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="bi bi-geo-alt me-2 text-warning"></i>{{ __('Detail Lokasi & Rute') }}
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Tipe Lokasi') }} <span class="text-danger">*</span></label>
                                <select name="tipe_lokasi" id="tipe_lokasi" class="form-select bg-light border-0 shadow-sm"
                                        onchange="toggleLokasiInput()" required>
                                    <option value="unit">{{ __('Unit') }}</option>
                                    <option value="pool">{{ __('Pool') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Nama Lokasi / Nomor Kendaraan') }} <span class="text-danger">*</span></label>
                                <div id="wrapper_unit">
                                    <select name="nomor_kendaraan" class="form-select bg-light border-0 shadow-sm">
                                        <option value="" disabled selected>{{ __('Pilih Unit') }}</option>
                                        <option value="CT-121">CT-121</option>
                                        <option value="CT-122">CT-122</option>
                                    </select>
                                </div>
                                <div id="wrapper_pool" style="display: none;">
                                    <select name="nama_pool" class="form-select bg-light border-0 shadow-sm">
                                        <option value="" disabled selected>{{ __('Pilih Pool') }}</option>
                                        <option value="POOL DU">POOL DU</option>
                                        <option value="POOL PASTEUR">POOL PASTEUR</option>
                                        <option value="POOL JAKARTA">POOL JAKARTA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">{{ __('Lokasi Spesifik Ditemukan') }} <span class="text-danger">*</span></label>
                                <input type="text" name="lokasi_ditemukan" class="form-control bg-light border-0 shadow-sm"
                                       placeholder="{{ __('Cth: Di bawah kursi no 2') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Rute Kendaraan') }}</label>
                                <select name="rute" class="form-select bg-light border-0 shadow-sm">
                                    <option value="" selected disabled>{{ __('Pilih Rute') }}</option>
                                    <option value="Jakarta - Bandung">Jakarta - Bandung</option>
                                    <option value="Bandung - Jakarta">Bandung - Jakarta</option>
                                    <option value="Pasteur - Jakarta">Pasteur - Jakarta</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Tanggal Rute') }} <span class="text-danger">*</span></label>
                                <div class="shadow-sm rounded">
                                    
                                    <input type="date"
       name="tanggal_rute"
       class="form-control bg-light border-0"
       onclick="this.showPicker()"
       required>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">{{ __('Nama Staff') }} <span class="text-danger">*</span></label>
                                <input type="text" name="cs_name" class="form-control bg-light border-0 shadow-sm"
                                       placeholder="{{ __('Nama Staff') }}" required>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        {{-- ============ SECTION FOTO ============ --}}
                        {{--
                            SATU input file (name="foto_barang", id="aksesFile").
                            Dipakai bersama oleh: tombol Pilih File & fungsi kamera.
                            Foto kamera dikompresi ke ≤1MB sebelum dimasukkan ke input.
                        --}}
                        <div class="mb-4">
                            <label class="form-label small fw-bold">
                                {{ __('Bukti Foto') }} <span class="text-danger">*</span>
                            </label>

                            {{-- Preview --}}
                            <div id="photoPreviewContainer" class="mb-3 d-none">
                                <div class="position-relative">
                                    <img id="photoPreview"
                                         class="w-100 rounded shadow-sm"
                                         style="max-height: 250px; object-fit: cover; border: 2px solid #FDB813;">
                                    <button type="button"
                                            class="btn btn-danger position-absolute top-0 end-0 m-2 rounded-circle"
                                            onclick="clearPhoto()"
                                            style="width:38px; height:38px;">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                                
                            </div>

                            {{-- Input tersembunyi — satu untuk semua sumber --}}
                            <input type="file"
                                   name="foto_barang"
                                   id="aksesFile"
                                   accept="image/*"
                                   hidden
                                   onchange="handleFileSelect(event)"
                                   required>

                            {{-- Tombol Aksi --}}
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="button"
                                        class="btn btn-warning flex-fill"
                                        id="openCameraBtn"
                                        onclick="openCameraModal()">
                                    <i class="bi bi-camera-fill me-2"></i>{{ __('Ambil Foto') }}
                                </button>

                                <label for="aksesFile"
                                       class="btn btn-gold flex-fill mb-0"
                                       id="pilihFileBtn"
                                       style="cursor: pointer;">
                                    <i class="bi bi-folder2-open me-2"></i>{{ __('Pilih File') }}
                                </label>
                            </div>

                            <small class="text-muted d-block mt-2">
                              {{ __('NB: Format JPG/PNG • Maks 2MB') }}<span class="text-danger">*</span>
                            </small>
                        </div>

                        {{-- Tombol Submit — DALAM <form> --}}
                        <div class="text-center mt-5">
                            <button type="submit"
                                    class="btn btn-warning px-5 py-3 fw-bold text-black rounded-pill shadow-sm">
                                <i class="bi bi-send-fill me-2"></i> {{ __('KIRIM LAPORAN SEKARANG') }}
                            </button>
                        </div>

                    </form>
                    {{-- </form> di sini, setelah tombol submit --}}

                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     MODAL KAMERA — di luar <form> agar tidak ikut di-submit
     ============================================================ --}}
<div class="modal fade" id="cameraModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">

            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-camera-fill text-warning me-2"></i>{{ __('Ambil Foto') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                {{-- Loading --}}
                <div id="cameraLoading" class="py-5 d-none">
                    <div class="spinner-border text-warning mb-3"></div>
                    <p class="text-muted">{{ __('Mengaktifkan kamera...') }}</p>
                </div>
                {{-- Error --}}
                <div id="cameraError" class="alert alert-danger d-none">
                    <div id="errorMessage"></div>
                </div>
                {{-- Video --}}
                <div id="videoContainer" class="d-none">
                    <video id="videoPreview" autoplay playsinline muted
                           class="w-100 rounded"
                           style="background:#000; min-height:300px;"></video>
                    <div class="mt-3 d-none" id="cameraToggle">
                        <button type="button" class="btn btn-outline-warning btn-sm" onclick="switchCamera()">
                            <i class="bi bi-arrow-repeat me-1"></i>{{ __('Ganti Kamera') }}
                        </button>
                    </div>
                </div>
                <canvas id="canvasCapture" class="d-none"></canvas>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Batal') }}</button>
                <button type="button" id="captureBtn" class="btn btn-warning d-none" onclick="takeSnapshot()">
                    <i class="bi bi-camera-fill me-2"></i>{{ __('Ambil Gambar') }}
                </button>
            </div>
        </div>
    </div>
</div>


{{-- ============================================================
     SCRIPTS
     ============================================================ --}}
<script>
// ============================================================
// LOKASI TOGGLE
// ============================================================
function toggleLokasiInput() {
    const tipe        = document.getElementById('tipe_lokasi');
    const wrapperUnit = document.getElementById('wrapper_unit');
    const wrapperPool = document.getElementById('wrapper_pool');
    if (!tipe || !wrapperUnit || !wrapperPool) return;

    const isUnit = tipe.value === 'unit';
    wrapperUnit.style.display = isUnit ? 'block' : 'none';
    wrapperPool.style.display = isUnit ? 'none'  : 'block';

    const selectUnit = wrapperUnit.querySelector('select');
    const selectPool = wrapperPool.querySelector('select');
    if (selectUnit) selectUnit.disabled = !isUnit;
    if (selectPool) selectPool.disabled =  isUnit;
}

// ============================================================
// ALERT AUTO-CLOSE
// ============================================================
setTimeout(function () {
    const alertEl = document.getElementById('alertBox');
    if (alertEl && window.bootstrap && bootstrap.Alert) {
        new bootstrap.Alert(alertEl).close();
    }
}, 3000);

// ============================================================
// TANGGAL DEFAULT
// ============================================================
document.addEventListener('DOMContentLoaded', function () {
    const inputTanggal = document.getElementById('tanggalLaporan');
    if (inputTanggal && !inputTanggal.value) {
        const t  = new Date();
        const yy = t.getFullYear();
        const mm = String(t.getMonth() + 1).padStart(2, '0');
        const dd = String(t.getDate()).padStart(2, '0');
        inputTanggal.value = `${yy}-${mm}-${dd}`;
    }
    toggleLokasiInput();
});

// ============================================================
// KAMERA
// ============================================================
let currentStream     = null;
let currentFacingMode = 'environment';
let currentPreviewURL = null;
const isMobile        = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

function checkCameraSupport() {
    return !!(navigator.mediaDevices &&
              navigator.mediaDevices.getUserMedia &&
              window.isSecureContext);
}

function openCameraModal() {

if (!checkCameraSupport()) {

    showCameraAlert(
        'Akses Kamera Belum Diizinkan',
        'Pastikan Anda memberikan izin akses kamera pada browser agar fitur ambil foto dapat digunakan.'
    );

    return;
}

new bootstrap.Modal(
    document.getElementById('cameraModal')
).show();
}

document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('cameraModal');
    if (!modalEl) return;
    modalEl.addEventListener('shown.bs.modal',  startCamera);
    modalEl.addEventListener('hidden.bs.modal', () => { stopCamera(); resetCameraUI(); });
});

async function startCamera() {
    showLoading();
    try {
        stopCamera();
        currentStream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: { ideal: currentFacingMode }, width: { ideal: 1280 }, height: { ideal: 720 } },
            audio: false
        });
        const video = document.getElementById('videoPreview');
        video.srcObject = currentStream;
        await video.play();
        showVideo();
        if (isMobile) document.getElementById('cameraToggle').classList.remove('d-none');
    } catch (err) {
        handleCameraError(err);
    }
}

function stopCamera() {
    if (currentStream) {
        currentStream.getTracks().forEach(t => t.stop());
        currentStream = null;
    }
}

async function switchCamera() {
    currentFacingMode = currentFacingMode === 'environment' ? 'user' : 'environment';
    stopCamera();
    setTimeout(startCamera, 300);
}

// ============================================================
// SNAPSHOT + KOMPRESI ≤ 1MB
// Logika kompresi murni di JS: iterasi turunkan quality sampai
// ukuran blob ≤ 1MB, tanpa menyentuh controller sama sekali.
// ============================================================
function takeSnapshot() {
    const video  = document.getElementById('videoPreview');
    const canvas = document.getElementById('canvasCapture');

    canvas.width  = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    compressToTarget(canvas, 1 * 1024 * 1024, function (blob) {
        processCapturedFile(blob);
    });
}

/**
 * compressToTarget — kompres canvas ke blob ≤ maxBytes
 * Cara kerja:
 *   1. Mulai quality 0.85
 *   2. Jika blob > maxBytes, scale canvas 0.85x dan turun quality 0.05
 *   3. Ulangi sampai ≤ maxBytes atau quality < 0.3 (floor)
 * Tidak ada request ke server, semua di browser.
 */
function compressToTarget(sourceCanvas, maxBytes, callback) {
    const MAX_QUALITY = 0.85;
    const MIN_QUALITY = 0.30;
    const QUALITY_STEP = 0.05;
    const SCALE_STEP   = 0.85;

    // Buat canvas kerja agar tidak memodifikasi canvas asli
    const workCanvas = document.createElement('canvas');
    const workCtx    = workCanvas.getContext('2d');
    workCanvas.width  = sourceCanvas.width;
    workCanvas.height = sourceCanvas.height;
    workCtx.drawImage(sourceCanvas, 0, 0);

    let quality = MAX_QUALITY;

    function tryCompress() {
        workCanvas.toBlob(function (blob) {
            if (!blob) { callback(null); return; }

            if (blob.size <= maxBytes || quality <= MIN_QUALITY) {
                // Ukuran sudah OK atau sudah mentok floor
                callback(blob);
                return;
            }

            // Masih terlalu besar → scale down canvas + turunkan quality
            quality = Math.max(quality - QUALITY_STEP, MIN_QUALITY);

            const newW = Math.round(workCanvas.width  * SCALE_STEP);
            const newH = Math.round(workCanvas.height * SCALE_STEP);

            const tmpCanvas = document.createElement('canvas');
            tmpCanvas.width  = newW;
            tmpCanvas.height = newH;
            tmpCanvas.getContext('2d').drawImage(workCanvas, 0, 0, newW, newH);

            workCanvas.width  = newW;
            workCanvas.height = newH;
            workCtx.drawImage(tmpCanvas, 0, 0);

            tryCompress(); // rekursi
        }, 'image/jpeg', quality);
    }

    tryCompress();
}

// ============================================================
// PROCESS CAPTURED FILE
// ============================================================
function processCapturedFile(blob) {
    if (!blob) { alert('Gagal memproses foto. Coba lagi.'); return; }

    const fileInput = document.getElementById('aksesFile');
    const file      = new File([blob], `LPB_${Date.now()}.jpg`, { type: 'image/jpeg' });
    const dt        = new DataTransfer();
    dt.items.add(file);
    fileInput.files = dt.files;

    const url = URL.createObjectURL(blob);
    showPhotoPreview(url);

    // Tampilkan info ukuran setelah kompresi
    const sizeKB = (blob.size / 1024).toFixed(0);
    const infoEl = document.getElementById('photoSizeInfo');
    if (infoEl) infoEl.textContent = `Ukuran: ${sizeKB} KB`;

    const modal = bootstrap.Modal.getInstance(document.getElementById('cameraModal'));
    if (modal) modal.hide();
}

// ============================================================
// PILIH FILE DARI GALERI / EXPLORER
// ============================================================
async function handleFileSelect(event) {

    const file = event.target.files[0];

    if (!file) return;

    const img = new Image();

    const reader = new FileReader();

    reader.onload = function(e){

        img.onload = function(){

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            let width = img.width;
            let height = img.height;

            const MAX_WIDTH = 1280;

            if(width > MAX_WIDTH){

                height *= MAX_WIDTH / width;
                width = MAX_WIDTH;
            }

            canvas.width = width;
            canvas.height = height;

            ctx.drawImage(img, 0, 0, width, height);

            compressImage(canvas, 0.8);
        };

        img.src = e.target.result;
    };

    reader.readAsDataURL(file);
}

function compressImage(canvas, quality){

    canvas.toBlob(function(blob){

        if(!blob){
            alert('Gagal compress gambar');
            return;
        }

        // jika masih lebih 2MB
        if(blob.size > 2 * 1024 * 1024){

            quality -= 0.1;

            if(quality < 0.2){
                alert('Gambar terlalu besar');
                return;
            }

            compressImage(canvas, quality);
            return;
        }

        const compressedFile = new File(
            [blob],
            'compressed.jpg',
            {
                type: 'image/jpeg',
                lastModified: Date.now()
            }
        );

        const dt = new DataTransfer();

        dt.items.add(compressedFile);

        document.getElementById('aksesFile').files = dt.files;

        showPhotoPreview(URL.createObjectURL(blob));

        const sizeKB = (blob.size / 1024).toFixed(0);

        document.getElementById('photoSizeInfo').textContent =
            `Ukuran setelah kompres: ${sizeKB} KB`;

    }, 'image/jpeg', quality);
}

// ============================================================
// PREVIEW & CLEAR
// ============================================================
function showPhotoPreview(url) {
    if (currentPreviewURL) URL.revokeObjectURL(currentPreviewURL);
    currentPreviewURL = url;

    document.getElementById('photoPreview').src = url;
    document.getElementById('photoPreviewContainer').classList.remove('d-none');
    document.getElementById('openCameraBtn').disabled = true;

    const pilihBtn = document.getElementById('pilihFileBtn');
    if (pilihBtn) pilihBtn.style.pointerEvents = 'none';
}

function clearPhoto() {
    document.getElementById('aksesFile').value = '';
    document.getElementById('photoPreview').src = '';
    document.getElementById('photoPreviewContainer').classList.add('d-none');
    document.getElementById('openCameraBtn').disabled = false;

    const pilihBtn = document.getElementById('pilihFileBtn');
    if (pilihBtn) pilihBtn.style.pointerEvents = '';

    const infoEl = document.getElementById('photoSizeInfo');
    if (infoEl) infoEl.textContent = '';

    if (currentPreviewURL) { URL.revokeObjectURL(currentPreviewURL); currentPreviewURL = null; }
}

// ============================================================
// UI STATES KAMERA
// ============================================================
function showLoading() { toggleUI('cameraLoading'); }
function showVideo() {
    toggleUI('videoContainer');
    document.getElementById('captureBtn').classList.remove('d-none');
}
function showError(msg) {
    toggleUI('cameraError');
    document.getElementById('errorMessage').innerHTML = msg;
}
function resetCameraUI() {
    ['cameraLoading','cameraError','videoContainer','captureBtn','cameraToggle']
        .forEach(id => document.getElementById(id).classList.add('d-none'));
}
function toggleUI(showId) {
    resetCameraUI();
    document.getElementById(showId).classList.remove('d-none');
}

function handleCameraError(err) {
    const msgs = {
        NotAllowedError:  'Izin kamera ditolak.',
        NotFoundError:    'Kamera tidak ditemukan.',
        NotReadableError: 'Kamera sedang digunakan aplikasi lain.',
        SecurityError:    'Akses kamera butuh HTTPS.'
    };
    showError(msgs[err.name] || 'Gagal mengakses kamera.');
}

// ============================================================
// SCROLL OTOMATIS KE FORM
// ============================================================
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('search') || urlParams.has('kategori')) {
        const el = document.getElementById('form-laporan');
        if (el) el.scrollIntoView({ behavior: 'smooth' });
    }
});
</script>
<script>
    function updateClock() {
        const now = new Date();
        const options = { 
            day: '2-digit', 
            month: 'short', 
            year: 'numeric' 
        };
        
        // Format tanggal sesuai dengan gaya d M Y
        const datePart = now.toLocaleDateString('en-GB', options).replace(',', '');
        
        // Format waktu H:i:s
        const timePart = now.toTimeString().split(' ')[0];
        
        // Update teks di dalam elemen
        document.getElementById('live-clock').innerText = datePart + ' | ' + timePart;
    }

    // Jalankan fungsi setiap 1000 milidetik (1 detik)
    setInterval(updateClock, 1000);


function showCameraAlert(title, message){

    document.getElementById(
        'cameraAlertTitle'
    ).innerText = title;

    document.getElementById(
        'cameraAlertMessage'
    ).innerText = message;

    document.getElementById(
        'cameraAlert'
    ).style.display = 'flex';
}

function closeCameraAlert(){

    document.getElementById(
        'cameraAlert'
    ).style.display = 'none';
}

@if(session('success'))



function closeSuccessPopup(){

    window.location.href =
        "{{ route('report.list') }}";
}

setTimeout(() => {

    closeSuccessPopup();

}, 5000);



@endif
</script>

      </section>
      {{-- CAMERA ALERT --}}
<div class="camera-alert-overlay"
     id="cameraAlert">

    <div class="camera-alert-card">

        <div class="camera-alert-icon">

            <i class="bi bi-camera-video-off-fill"></i>

        </div>

        <h4 id="cameraAlertTitle"
            class="fw-bold mb-2">

            Kamera Tidak Bisa Dibuka

        </h4>

        <p id="cameraAlertMessage"
           class="text-muted mb-4">

            Pastikan izin kamera sudah diberikan.

        </p>

        <button class="btn btn-warning px-4 rounded-pill fw-bold"
                onclick="closeCameraAlert()">

            OK

        </button>

    </div>

</div>
    </main>

    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('vendors/gsap/customEase.js') }}"></script>
    <script src="{{ asset('vendors/gsap/scrollToPlugin.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
@endsection