

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>CS Portal Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
<link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
<meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
<meta name="theme-color" content="#ffffff">


<!-- ===============================================-->
<!--    Stylesheets-->
<!-- ===============================================-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&amp;display=swap" rel="stylesheet">
<link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/user.css') }}" rel="stylesheet" />
  </head>

  <style>

  #videoPreview {
  background-color: #000;
  object-fit: cover;
  will-change: transform;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;

}
/* =========================================
   SUCCESS POPUP
========================================= */

.success-popup-overlay{

position:fixed;

inset:0;

background:rgba(0,0,0,.45);

backdrop-filter:blur(5px);

z-index:999999;

display:flex;

align-items:center;

justify-content:center;

padding:20px;

animation:fadeIn .3s ease;

}

.success-popup-card{

background:#fff;

width:100%;

max-width:430px;

border-radius:28px;

padding:40px 30px;

text-align:center;

box-shadow:
    0 20px 60px rgba(0,0,0,.18);

animation:popupScale .35s ease;

}
html{

scroll-behavior:smooth;

}
.success-check{

width:95px;

height:95px;

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

font-size:2.8rem;

color:#fff;

box-shadow:
    0 10px 30px rgba(253,184,19,.4);

animation:checkPop .5s ease;

}

.popup-timer{

font-size:.78rem;

color:#888;

}

/* =========================================
ANIMATION
========================================= */

@keyframes fadeIn{

from{

    opacity:0;

}

to{

    opacity:1;

}

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

}

@keyframes checkPop{

0%{

    transform:scale(.3) rotate(-20deg);

    opacity:0;

}

70%{

    transform:scale(1.1);

}

100%{

    transform:scale(1);

    opacity:1;

}

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

animation:fadeIn .25s ease;

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

animation:popupScale .28s ease;

}

.camera-alert-icon{

width:90px;

height:90px;

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

font-size:2.5rem;

color:#fff;

box-shadow:
    0 10px 30px rgba(253,184,19,.4);

margin-bottom:20px;

}

/* =========================================
ANIMATION
========================================= */

@keyframes fadeIn{

from{

    opacity:0;

}

to{

    opacity:1;

}

}

@keyframes popupScale{

from{

    opacity:0;

    transform:
        scale(.86)
        translateY(18px);

}

to{

    opacity:1;

    transform:
        scale(1)
        translateY(0);

}

}

/* MOBILE */
@media(max-width:768px){

.camera-alert-card{

    border-radius:22px;

    padding:30px 22px;

}

.camera-alert-icon{

    width:75px;

    height:75px;

    font-size:2rem;

}

}
/* =========================================
MOBILE
========================================= */

@media(max-width:768px){

.success-popup-card{

    padding:35px 22px;

    border-radius:22px;

}

.success-check{

    width:82px;

    height:82px;

    font-size:2.2rem;

}

}
dropdown-menu {
        z-index: 9999 !important;
        position: absolute !important;
    }
    
    /* Pastikan link dropdown bisa diklik */
    .nav-item.dropdown {
        z-index: 10000 !important;
        position: relative;

    }
    .btn-gold {
    background-color: #FDB813; /* Warna emas cerah */
    color: #fff;
    font-weight: bold;
    border: none;
    transition: all 0.3s ease;
}

.btn-gold:hover {
    background-color: #D49B00; /* Warna emas sedikit gelap saat hover */
    color: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
    .navbar-light .navbar-nav .nav-link {
        color: #000 !important;
        font-weight: 600;
    }

    /* Memastikan dropdown menu terlihat jelas */
    .dropdown-menu {
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .dropdown-item {
        color: #000;
    }

    .dropdown-item:hover {
        background-color: #FDB813;
        color: #fff;
    }

/* Card hover lebih hidup */
.info-card {
    border-radius: 20px;
    transition: all 0.3s ease;
    cursor: pointer;
}
/* Animasi bergoyang halus saat pertama muncul */
    .attention-card {
        animation: float 2s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
/* Hover utama */
.info-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}
/* Animasi denyut/berkedip */
    @keyframes pulse-gold {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }

    .animate-pulse {
        animation: pulse-gold 1.5s infinite;
    }
    .card-main {
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border: none;
        background: #fff;
    }

    /* Memastikan dropdown tidak terpotong saat tabel di-scroll di mobile */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        padding-bottom: 60px; /* Memberi ruang untuk dropdown ke bawah */
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

    .btn-yellow {
        background: #f3db00;
        border: none;
        color: #000;
        font-weight: 600;
    }
        /* Efek hover naik (Lift) */
    .btn-hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    }

    .btn-hover-lift:hover {
        transform: translateY(-4px); /* Menggerakkan tombol ke atas */
        box-shadow: 0 6px 12px rgba(0,0,0,0.15); /* Menambah bayangan agar terlihat seperti melayang */
    }

    .btn-yellow:hover {
        background: #e0c800;
    }
    /* Style Tombol Aksi */
    .btn-action {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px; /* Bentuk kotak membulat modern */
        transition: all 0.3s ease;
        border: none;
    }

    /* Hover Kuning Cititrans untuk Edit */
    .btn-edit-new {
        background-color: #f8f9fa;
        color: #0d6efd;
    }

    .btn-edit-new:hover {
        background-color: #FDB813;
        color: #000;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(253, 184, 19, 0.4);
    }

    /* Hover Kuning Cititrans untuk Delete */
    .btn-delete-new {
        background-color: #f8f9fa;
        color: #dc3545;
    }

    .btn-delete-new:hover {
        background-color: #FDB813;
        color: #000;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(253, 184, 19, 0.4);
    }
/* Hover khusus judul */
.info-card h5 {
    transition: 0.3s;
}
/* Background subtle saat hover */
.info-card:hover {
    background: linear-gradient(135deg, #fffbea, #ffffff);
}
.info-card:hover h5 {
    color: #f3db00;
    letter-spacing: 1px;
}

/* Icon ikut animasi */
.info-card:hover .icon-box {
    transform: rotate(10deg) scale(1.1);
}
.modal-content {
  border-radius: 15px;
}

.modal-body {
  display: flex;
  align-items: center;
  justify-content: center;
}
/* =========================================
   LANGUAGE DROPDOWN
========================================= */

.lang-dropdown{

position:relative;

}

.lang-btn{

display:inline-flex;

align-items:center;

gap:7px;

padding:8px 14px;

border:1.5px solid #e0e0e0;

border-radius:10px;

background:#fff;

font-weight:600;

font-size:.83rem;

color:#333;

cursor:pointer;

transition:all .2s ease;

text-decoration:none;

white-space:nowrap;

box-shadow:0 2px 8px rgba(0,0,0,.04);

}

.lang-btn:hover{

background:#FDB813;

border-color:#FDB813;

color:#000;

transform:translateY(-1px);

}

.lang-menu{

display:none;

position:absolute;

top:calc(100% + 8px);

left:0;

right:auto;

background:#fff;

border:1px solid #ececec;

border-radius:14px;

box-shadow:0 10px 30px rgba(0,0,0,.12);

min-width:170px;

overflow:hidden;

z-index:99999;

animation:fadeDropdown .2s ease;

}

.lang-menu.open{

display:block;

}

.lang-menu a{

display:flex;

align-items:center;

gap:10px;

padding:11px 16px;

text-decoration:none;

color:#333;

font-size:.85rem;

font-weight:500;

transition:.18s ease;

}

.lang-menu a:hover{

background:#fff8df;

color:#000;

}

.lang-menu a.active{

background:#FDB813;

color:#000;

font-weight:700;

}

.lang-divider{

height:1px;

background:#f1f1f1;

}

@keyframes fadeDropdown{

from{

    opacity:0;

    transform:translateY(6px);

}

to{

    opacity:1;

    transform:translateY(0);

}

}

/* MOBILE */
/* MOBILE */
@media(max-width:768px){

.lang-dropdown{

    position:relative;

}

.lang-btn{

    padding:7px 12px;

    font-size:.75rem;

    min-width:auto;

}

.lang-menu{

    position:absolute;

    top:calc(100% + 6px);

    left:0;

    right:auto;

    min-width:145px;

    max-width:160px;

    border-radius:12px;

}

.lang-menu a{

    font-size:.74rem;

    padding:10px 12px;

    gap:8px;

}

}
/* =========================================
ANIMATION
========================================= */

@keyframes dropdownFade{

from{

    opacity:0;

    transform:
        translateY(8px);

}

to{

    opacity:1;

    transform:
        translateY(0);

}

}

/* =========================================
MOBILE
========================================= */

@media(max-width:768px){

.dropdown-menu{

    min-width:180px;

}

}

/* =========================================
ANIMATION
========================================= */

@keyframes fadeDropdown{

from{

    opacity:0;

    transform:
        translateY(6px);

}

to{

    opacity:1;

    transform:
        translateY(0);

}

}

/* =========================================
MOBILE
========================================= */

@media(max-width:768px){

.dropdown-menu{

    min-width:170px;

}

}
/* Memaksa dropdown menu muncul saat class show aktif */
.dropdown-menu.show {
display: block !important;
margin-top: 10px !important;

}
input[type="date"]{

cursor:pointer;

min-height:44px;

}
.text-danger {
  color: #ff4d4d !important;
  margin-left: 2px;
  font-weight: bold;
}
.btn-warning {
    background-color: #e9b526 !important;
    border-color: #f3db00 !important;
    color: #000 !important;
}

.btn-warning:hover {
    background-color: #e0c800 !important;
    border-color: #e0c800 !important;
}
input:invalid:focus {
  border-color: #ff4d4d;
  box-shadow: 0 0 0 0.25rem rgba(255, 77, 77, 0.25);
}

    /* Transisi agar perpindahan warna halus */
    .dashboard-card {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    /* 1. Kartu Pertama: Hover Emas */
    .card-total:hover {
        background-color: #22211d; /* Warna Emas */
        color: #fff;
    }
    .card-total:hover i, 
    .card-total:hover h6, 
    .card-total:hover h2 {
        color: #000000 !important;
    }

    /* 2. Kartu Kedua: Hover Putih (Teks Hitam) */
    .card-proses:hover {
        background-color: #FDB813; /* Warna Putih */
        color: #000;
        border: 1px solid #ddd;
    }
    .card-proses:hover i, 
    .card-proses:hover h6, 
    .card-proses:hover h2 {
        color: #000 !important;
    }

    /* 3. Kartu Ketiga: Hover Abu-abu */
    .card-claimed:hover {
        background-color: #FDB813; /* Warna Abu-abu */
        color: #fff;
    }
    .card-claimed:hover i, 
    .card-claimed:hover h6, 
    .card-claimed:hover h2 {
        color: #fff !important;
    }

           /* Efek Hover untuk Kartu Statistik */
        .dashboard-card { transition: all 0.3s ease; cursor: pointer; }
        
        .card-total:hover { background-color: #FDB813 !important; color: #000000; }
        .card-total:hover i, .card-total:hover h6, .card-total:hover h2 { color: #000000 !important; }
        
        .card-proses:hover { background-color: rgb(214, 204, 204) !important; color: #000; border: 1px solid #ddd; }
        .card-proses:hover i, .card-proses:hover h6, .card-proses:hover h2 { color: #000 !important; }
        
        .card-claimed:hover { background-color: #6c757d !important; color: #fff; }
        .card-claimed:hover i, .card-claimed:hover h6, .card-claimed:hover h2 { color: #fff !important; }

/* Mobile tetap nyaman */
@media (max-width: 768px) {
    .section-spacing {
        margin-top: 50px;
        margin-bottom: 50px;
        
    }
}
  </style>
<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
 @yield('content')     

 {{-- =========================================
     SUCCESS POPUP
========================================= --}}
@if(session('success'))

<div class="success-popup-overlay"
     id="successPopup">

    <div class="success-popup-card">

        {{-- ICON --}}
        <div class="success-check">

            <i class="bi bi-check-lg"></i>

        </div>

        {{-- TITLE --}}
        <h4 class="fw-bold mt-4 mb-2">

            {{ __('Berhasil!') }}

        </h4>

        {{-- MESSAGE --}}
        <p class="text-muted mb-4">

            {{ session('success') }}

        </p>

        {{-- BUTTON --}}
        <button class="btn btn-warning px-4 fw-bold rounded-pill"
                onclick="closeSuccessPopup()">

            OK

        </button>

        {{-- TIMER --}}
        <div class="popup-timer mt-3">

            {{ __('Popup akan tertutup otomatis dalam 5 detik') }}

        </div>

    </div>

</div>

@endif
<main class="main" id="top">

<section id="form-laporan" class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row g-5">
            {{-- Bagian Sidebar Perhatian --}}
            <div class="col-lg-4">
                <div class="card shadow-lg border-0 rounded-4 p-4 sticky-lg-top" style="top: 20px;">
                    <h5 class="fw-bold mb-3"><span class="text-warning">&#9888;</span> {{ __('Perhatian') }} </h5>
                    <p class="small text-muted">{{ __('Harap pastikan semua kolom pada formulir di samping telah diisi dengan akurat dan lengkap.') }}</p>
                    <ul class="small ps-3 mb-0" style="line-height: 2;">
                        <li>{{ __('Periksa data diri pelapor.') }}</li>
                        <li>{{ __('Pastikan foto barang jelas.') }}</li>
                        <li>{{ __('Deskripsi barang harus mendetail.') }}</li>
                    </ul>
                </div>
            </div>

            {{-- Bagian Card Form --}}
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">

{{-- TITLE --}}
<h4 class="fw-bold mb-0 text-uppercase"
    style="letter-spacing:1px;">

    {{ __('Detail Laporan Barang') }}

</h4>

{{-- ACTION --}}
<div class="d-flex align-items-center gap-2">

{{-- LANGUAGE --}}
{{-- LANGUAGE DROPDOWN --}}
<div class="lang-dropdown position-relative">

    <button class="lang-btn"
            id="langBtn"
            type="button">

        @if(app()->getLocale() == 'id')

            <img src="https://flagcdn.com/w20/id.png"
                 width="18"
                 alt="ID"
                 style="border-radius:2px;">

            <span>ID</span>

        @else

            <img src="https://flagcdn.com/w20/gb.png"
                 width="18"
                 alt="EN"
                 style="border-radius:2px;">

            <span>EN</span>

        @endif

        <i class="bi bi-chevron-down"
           style="font-size:.65rem;"></i>

    </button>

    {{-- DROPDOWN --}}
    <div class="lang-menu"
         id="langMenu">

        {{-- INDONESIA --}}
        <a href="{{ route('lang.switch', 'id') }}"
           class="{{ app()->getLocale() == 'id' ? 'active' : '' }}">

            <img src="https://flagcdn.com/w20/id.png"
                 width="18"
                 alt="ID"
                 style="border-radius:2px;">

            Indonesia

        </a>

        <div class="lang-divider"></div>

        {{-- ENGLISH --}}
        <a href="{{ route('lang.switch', 'en') }}"
           class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">

            <img src="https://flagcdn.com/w20/gb.png"
                 width="18"
                 alt="EN"
                 style="border-radius:2px;">

            English

        </a>

    </div>

</div>
    {{-- BACK --}}
    <a href="{{ route('home') }}"
       class="btn btn-warning btn-sm d-flex align-items-center gap-2 px-3 fw-bold shadow-sm rounded-pill">

        <i class="bi bi-box-arrow-in-left"></i>

        {{ __('Kembali') }}

    </a>

</div>

</div>
                    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Group 1: Informasi Barang --}}
                        <h6 class="fw-bold text-muted mb-3"><i class="bi bi-box-seam me-2 text-warning"></i>{{ __('Informasi Barang') }}</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Nama Barang') }} <span class="text-danger">*</span></label>
                                <input type="text" name="nama_barang" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Cth: Dompet Hitam') }}" required>
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
                                <textarea name="deskripsi" class="form-control bg-light border-0 shadow-sm" rows="3" placeholder="{{ __('Jelaskan ciri-ciri khusus barang...') }}" required></textarea>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        {{-- Group 2: Waktu & Pelapor --}}
                        <h6 class="fw-bold text-muted mb-3"><i class="bi bi-person-badge me-2 text-warning"></i>{{ __('Waktu & Data Pelapor') }}</h6>
                        <div class="row g-3">
                            {{-- Perbaikan 1: Form Tanggal dengan Icon --}}
                            <div class="col-md-6">

<label class="form-label small fw-bold">

    {{ __('Tanggal Laporan') }}

    <span class="text-danger">*</span>

</label>

<div class="shadow-sm rounded">

    <input type="date"
           name="tanggal_laporan"
           class="form-control bg-light border-0"
           value="{{ old('tanggal_laporan') }}"
           onclick="this.showPicker()"
           required>

</div>

                            </div>
                            {{-- Perbaikan 2: NIK Hanya Angka --}}
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('NIK Pelapor') }} <span class="text-danger">*</span></label>
                                <input type="text" name="nik_pelapor" class="form-control bg-light border-0 shadow-sm" 
                                       placeholder="{{ __('Masukkan NIK') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="16" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Nama Pelapor') }} <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pelapor" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Nama Lengkap') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Jabatan Pelapor') }} <span class="text-danger">*</span></label>
                                <input type="text" name="jabatan_pelapor" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Cth: Pengemudi / Staff') }}" required>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        {{-- Group 3: Lokasi & Kendaraan --}}
                        <h6 class="fw-bold text-muted mb-3"><i class="bi bi-geo-alt me-2 text-warning"></i>{{ __('Detail Lokasi & Rute') }}</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Tipe Lokasi') }} <span class="text-danger">*</span></label>
                                <select name="tipe_lokasi" id="tipe_lokasi" class="form-select bg-light border-0 shadow-sm" onchange="toggleLokasiInput()" required>
                                    <option value="unit">{{ __('Unit') }}</option>
                                    <option value="pool">{{ __('Pool') }}</option>
                                </select>
                            </div>
                            
                            {{-- Perbaikan 3: Dropdown Unit vs Pool --}}
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
                                <input type="text" name="lokasi_ditemukan" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Cth: Di bawah kursi no 2') }}" required>
                            </div>

                            {{-- Perbaikan 4: Dropdown Rute --}}
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Rute Kendaraan') }}</label>
                                <select name="rute" class="form-select bg-light border-0 shadow-sm text-dark">
                                    <option value="" selected disabled>{{ __('Pilih Rute') }}</option>
                                    <option value="Jakarta - Bandung">Jakarta - Bandung</option>
                                    <option value="Bandung - Jakarta">Bandung - Jakarta</option>
                                    <option value="Pasteur - Jakarta">Pasteur - Jakarta</option>
                                </select>
                            </div>

                            <div class="col-md-6">

    <label class="form-label small fw-bold">

        {{ __('Tanggal Rute') }}

        <span class="text-danger">*</span>

    </label>

    <div class="shadow-sm rounded">

        <input type="date"
               name="tanggal_rute"
               class="form-control bg-light border-0"
               value="{{ old('tanggal_rute') }}"
               onclick="this.showPicker()"
               required>

    </div>

</div>

                            <div class="col-12">
                                <label class="form-label small fw-bold">{{ __('Nama Staff') }} <span class="text-danger">*</span></label>
                                <input type="text" name="cs_name" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Nama Staff') }}" required>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        {{-- Section Foto --}}
                    {{-- ================= FOTO SECTION ================= --}}
<div class="mb-4">

    <label class="form-label small fw-bold">
        {{ __('Bukti Foto') }}
        <span class="text-danger">*</span>
    </label>

    {{-- Hidden Input --}}
   <input type="file"
       id="aksesFile"
       name="foto_barang"
       accept="image/*"
       onchange="handleFileSelect(event)"
       hidden>

    {{-- BUTTONS --}}
    <div class="d-flex gap-2 flex-wrap mb-3">

        {{-- CAMERA --}}
        <button type="button"
                class="btn btn-warning flex-fill"
                id="openCameraBtn"
                onclick="openCameraModal()">

            <i class="bi bi-camera-fill me-2"></i>

            Ambil Foto

        </button>
    
        {{-- UPLOAD --}}
        <button type="button"
                class="btn btn-gold flex-fill text-dark"
                onclick="document.getElementById('aksesFile').click()">

            <i class="bi bi-upload me-2"></i>

            Choose File

        </button>

    </div>

    {{-- INFO --}}
    <small class="text-muted d-block mb-3">
    <span class="text-danger">*</span>
       NB : Format JPG/PNG 
    
    </small>

    {{-- SIZE INFO --}}
    <small id="photoSizeInfo"
           class="text-success fw-semibold d-block mb-3">
    </small>

    {{-- PREVIEW --}}
    <div id="photoPreviewContainer"
         class="d-none">

        <div class="position-relative">

            <img id="photoPreview"
                 class="w-100 rounded shadow-sm"
                 style="
                    max-height:250px;
                    object-fit:cover;
                    border:2px solid #FDB813;
                 ">

            <button type="button"
                    class="btn btn-danger position-absolute top-0 end-0 m-2 rounded-circle"
                    onclick="clearPhoto()"
                    style="width:40px;height:40px;">

                <i class="bi bi-x-lg"></i>

            </button>

        </div>

    </div>

</div>

{{-- SUBMIT --}}
<div class="text-center mt-5">

    <button type="submit"
            class="btn btn-warning px-5 py-3 fw-bold text-black rounded-pill shadow-sm">

        <i class="bi bi-send-fill me-2"></i>

        {{ __('KIRIM LAPORAN SEKARANG') }}

    </button>

</div>

{{-- ================= MODAL KAMERA ================= --}}
<div class="modal fade" id="cameraModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">

            {{-- Header --}}
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-camera-fill text-warning me-2"></i>
                    Ambil Foto
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            {{-- Body --}}
            <div class="modal-body text-center">

                {{-- Loading --}}
                <div id="cameraLoading" class="py-5 d-none">
                    <div class="spinner-border text-warning mb-3"></div>
                    <p class="text-muted">Mengaktifkan kamera...</p>
                </div>

                {{-- Error --}}
                <div id="cameraError" class="alert alert-danger d-none">
                    <div id="errorMessage"></div>
                </div>

                {{-- Video --}}
                <div id="videoContainer" class="d-none">
                    <video id="videoPreview"
                           autoplay
                           playsinline
                           muted
                           class="w-100 rounded"
                           style="background:#000; min-height:300px;"></video>

                    <div class="mt-3 d-none" id="cameraToggle">
                        <button type="button"
                                class="btn btn-outline-warning btn-sm"
                                onclick="switchCamera()">
                            <i class="bi bi-arrow-repeat me-1"></i>
                            Ganti Kamera
                        </button>
                    </div>
                </div>

                <canvas id="canvasCapture" class="d-none"></canvas>
            </div>

            {{-- Footer --}}
            <div class="modal-footer justify-content-center">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <button type="button"
                        id="captureBtn"
                        class="btn btn-warning d-none"
                        onclick="takeSnapshot()">
                    <i class="bi bi-camera-fill me-2"></i>
                    Ambil Gambar
                </button>
            </div>
        </div>
    </div>
</div>

                      

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- JavaScript untuk Toggle Lokasi --}}
<script>
function toggleLokasiInput() {
    const tipe = document.getElementById('tipe_lokasi').value;
    const unitWrapper = document.getElementById('wrapper_unit');
    const poolWrapper = document.getElementById('wrapper_pool');

    if (tipe === 'unit') {
        unitWrapper.style.display = 'block';
        poolWrapper.style.display = 'none';
    } else {
        unitWrapper.style.display = 'none';
        poolWrapper.style.display = 'block';
    }
}
</script>


<script>
    // 1. Mencegah Konflik Dropdown
    document.addEventListener('click', function (e) {
        if (e.target.matches('.dropdown-toggle')) {
            e.stopPropagation();
            // Tidak perlu preventDefault agar dropdown Bootstrap tetap jalan
        }
    });

    // 2. Script Alert Otomatis
   

/* =========================================
   SUCCESS POPUP
========================================= */

function closeSuccessPopup(){

    const popup =
        document.getElementById(
            'successPopup'
        );

    if(popup){

        popup.style.opacity = '0';

        popup.style.transition =
            '.3s ease';

        setTimeout(() => {

            popup.remove();

            window.location.href =
    "{{ route('home') }}#form-laporan";

        }, 300);

    }

}

/* AUTO CLOSE 5 DETIK */
setTimeout(() => {

    closeSuccessPopup();

}, 5000);



    // 3. Set Tanggal Default
    document.addEventListener('DOMContentLoaded', function() {
        const inputTanggal = document.getElementById('tanggalLaporan');
        if (inputTanggal) {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            inputTanggal.value = `${year}-${month}-${day}`;
        }
    });

    // 4. Script Kamera & Snapshot
    let currentStream = null;
let currentFacingMode = 'environment';
let currentPreviewURL = null;

const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

// ============================
// CAMERA SUPPORT
// ============================
function checkCameraSupport() {
    return !!(
        navigator.mediaDevices &&
        navigator.mediaDevices.getUserMedia &&
        window.isSecureContext
    );
}

// ============================
// OPEN CAMERA
// ============================
function openCameraModal() {
    if (!checkCameraSupport()) {
        showCameraAlert(
    'Akses Kamera Belum Diizinkan',
    'Pastikan Anda memberikan izin akses kamera pada browser agar fitur ambil foto dapat digunakan.'
);
        
        return;
    }

    const modal = new bootstrap.Modal(document.getElementById('cameraModal'));
    modal.show();
}

// ============================
// MODAL EVENTS
// ============================
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('cameraModal');

    modal.addEventListener('shown.bs.modal', startCamera);
    modal.addEventListener('hidden.bs.modal', () => {
        stopCamera();
        resetCameraUI();
    });
});

// ============================
// START CAMERA
// ============================
async function startCamera() {
    showLoading();

    try {
        stopCamera();

        const constraints = {
            video: {
                facingMode: { ideal: currentFacingMode },
                width: { ideal: 1280 },
                height: { ideal: 720 }
            },
            audio: false
        };

        currentStream = await navigator.mediaDevices.getUserMedia(constraints);

        const video = document.getElementById('videoPreview');
        video.srcObject = currentStream;

        await video.play();

        showVideo();

        if (isMobile) {
            document.getElementById('cameraToggle').classList.remove('d-none');
        }

    } catch (err) {
        handleCameraError(err);
    }
}

// ============================
// STOP CAMERA
// ============================
function stopCamera() {
    if (currentStream) {
        currentStream.getTracks().forEach(track => track.stop());
        currentStream = null;
    }
}

// ============================
// SWITCH CAMERA
// ============================
async function switchCamera() {
    currentFacingMode =
        currentFacingMode === 'environment'
            ? 'user'
            : 'environment';

    stopCamera();

    setTimeout(startCamera, 300);
}

// ============================
// SNAPSHOT
// ============================
function takeSnapshot() {
    const video = document.getElementById('videoPreview');
    const canvas = document.getElementById('canvasCapture');

    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    const ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0, 0);

    canvas.toBlob(blob => {
       handleCapturedPhoto(blob);
    }, 'image/jpeg', 0.85);
}

// ============================
// PROCESS FILE
// ============================
function processCapturedFile(blob) {
    const fileInput = document.getElementById('aksesFile');

    const file = new File(
        [blob],
        `LPB_${Date.now()}.jpg`,
        { type: 'image/jpeg' }
    );

    const dt = new DataTransfer();
    dt.items.add(file);
    fileInput.files = dt.files;

    showPhotoPreview(URL.createObjectURL(blob));

    const modal = bootstrap.Modal.getInstance(
        document.getElementById('cameraModal')
    );

    if (modal) modal.hide();
}

// ============================
// FILE UPLOAD
// ============================

// ============================
// HANDLE CAMERA PHOTO
// ============================

function handleCapturedPhoto(blob){

    const file = new File(
        [blob],
        `LPB_${Date.now()}.jpg`,
        {
            type:'image/jpeg'
        }
    );

    const dt = new DataTransfer();

    dt.items.add(file);

    document.getElementById('aksesFile').files =
        dt.files;

    showPhotoPreview(
        URL.createObjectURL(blob)
    );

    const sizeKB =
        (blob.size / 1024).toFixed(0);

    const sizeMB =
        (blob.size / 1024 / 1024).toFixed(2);

    document.getElementById('photoSizeInfo')
        .innerHTML =
            `
            <i class="bi bi-camera-fill me-1"></i>
            Foto kamera berhasil:
            <b>${sizeKB} KB (${sizeMB} MB)</b>
            `;

    const modal =
        bootstrap.Modal.getInstance(
            document.getElementById('cameraModal')
        );

    if(modal){

        modal.hide();
    }
}

// ============================
// HANDLE FILE SELECT
// ============================

async function handleFileSelect(event) {

    const file = event.target.files[0];

    if (!file) return;

    if (!file.type.startsWith('image/')) {

        alert('File harus berupa gambar');

        return;
    }

    const img = new Image();

    const reader = new FileReader();

    reader.onload = function(e){

        img.onload = function(){

            const canvas =
                document.createElement('canvas');

            const ctx =
                canvas.getContext('2d');

            let width = img.width;
            let height = img.height;

            // resize
            const MAX_WIDTH = 1600;

            if(width > MAX_WIDTH){

                height *= MAX_WIDTH / width;

                width = MAX_WIDTH;
            }

            canvas.width = width;
            canvas.height = height;

            ctx.imageSmoothingEnabled = true;
            ctx.imageSmoothingQuality = 'high';

            ctx.drawImage(
                img,
                0,
                0,
                width,
                height
            );

            compressLoop(canvas, file, 0.92);

        };

        img.src = e.target.result;

    };

    reader.readAsDataURL(file);
}

// ============================
// COMPRESS LOOP
// ============================

function compressLoop(canvas, originalFile, quality){

    canvas.toBlob(function(blob){

        if(!blob){

            alert('Gagal compress gambar');

            return;
        }

        // target <1MB
        if(blob.size > 1024 * 1024){

            quality -= 0.05;

            if(quality > 0.45){

                compressLoop(
                    canvas,
                    originalFile,
                    quality
                );

                return;
            }
        }

        const compressedFile = new File(
            [blob],
            originalFile.name,
            {
                type: 'image/jpeg',
                lastModified: Date.now()
            }
        );

        const dataTransfer =
            new DataTransfer();

        dataTransfer.items.add(compressedFile);

        document.getElementById('aksesFile').files =
            dataTransfer.files;

        showPhotoPreview(
            URL.createObjectURL(blob)
        );

        // size info
        const sizeKB =
            (blob.size / 1024).toFixed(0);

        const sizeMB =
            (blob.size / 1024 / 1024).toFixed(2);

        document.getElementById('photoSizeInfo')
            .innerHTML =
                `
            
             
                `;

    }, 'image/jpeg', quality);

}



// ============================
// PREVIEW
// ============================
function showPhotoPreview(url) {
    if (currentPreviewURL) {
        URL.revokeObjectURL(currentPreviewURL);
    }

    currentPreviewURL = url;

    document.getElementById('photoPreview').src = url;
    document.getElementById('photoPreviewContainer')
        .classList.remove('d-none');

    document.getElementById('openCameraBtn').disabled = true;
}

// ============================
// CLEAR PHOTO
// ============================
function clearPhoto() {
    document.getElementById('aksesFile').value = '';
    document.getElementById('photoPreview').src = '';
    document.getElementById('photoPreviewContainer')
        .classList.add('d-none');

    document.getElementById('openCameraBtn').disabled = false;

    if (currentPreviewURL) {
        URL.revokeObjectURL(currentPreviewURL);
        currentPreviewURL = null;
    }
}

// ============================
// UI STATES
// ============================
function showLoading() {
    toggleUI('cameraLoading');
}

function showVideo() {
    toggleUI('videoContainer');
    document.getElementById('captureBtn')
        .classList.remove('d-none');
}

function showError(msg) {
    toggleUI('cameraError');
    document.getElementById('errorMessage').innerHTML = msg;
}

function resetCameraUI() {
    document.getElementById('cameraLoading').classList.add('d-none');
    document.getElementById('cameraError').classList.add('d-none');
    document.getElementById('videoContainer').classList.add('d-none');
    document.getElementById('captureBtn').classList.add('d-none');
    document.getElementById('cameraToggle').classList.add('d-none');
}

function toggleUI(showId) {
    resetCameraUI();
    document.getElementById(showId).classList.remove('d-none');
}

// ============================
// ERROR HANDLER
// ============================
function handleCameraError(err) {
    let msg = 'Gagal mengakses kamera';

    switch (err.name) {
        case 'NotAllowedError':
            msg = 'Izin kamera ditolak.';
            break;

        case 'NotFoundError':
            msg = 'Kamera tidak ditemukan.';
            break;

        case 'NotReadableError':
            msg = 'Kamera sedang digunakan aplikasi lain.';
            break;

        case 'SecurityError':
            msg = 'Akses kamera butuh HTTPS.';
            break;
    }

    showError(msg);
}

    // 5. Scroll Otomatis ke Form
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('search') || urlParams.has('kategori')) {
            const element = document.getElementById("form-laporan");
            if (element) element.scrollIntoView({ behavior: "smooth" });
        }
        document.getElementById('cameraModal').addEventListener('hidden.bs.modal', stopCamera);
    });
/* =========================================
   LANGUAGE DROPDOWN
========================================= */

document.addEventListener(
    'DOMContentLoaded',
    function(){

        const langBtn =
            document.getElementById('langBtn');

        const langMenu =
            document.getElementById('langMenu');

        if(langBtn && langMenu){

            langBtn.addEventListener(
                'click',
                function(e){

                    e.stopPropagation();

                    langMenu.classList.toggle(
                        'open'
                    );

                }
            );

            document.addEventListener(
                'click',
                function(e){

                    if(
                        !langMenu.contains(e.target)
                        &&
                        !langBtn.contains(e.target)
                    ){

                        langMenu.classList.remove(
                            'open'
                        );

                    }

                }
            );

        }

    }
);


/* =========================================
   CAMERA ALERT
========================================= */

function showCameraAlert(title, message){

    const overlay =
        document.getElementById(
            'cameraAlert'
        );

    document.getElementById(
        'cameraAlertTitle'
    ).innerText = title;

    document.getElementById(
        'cameraAlertMessage'
    ).innerText = message;

    overlay.style.display = 'flex';

}

function closeCameraAlert(){

    const overlay =
        document.getElementById(
            'cameraAlert'
        );

    overlay.style.opacity = '0';

    setTimeout(() => {

        overlay.style.display = 'none';

        overlay.style.opacity = '1';

    }, 250);

}


</script>



      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    

        <!-- ============================================-->
        <!-- <section> begin ============================-->
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

</section>
<!-- <section> close ============================-->
        <!-- <section> close ============================-->
        <!-- ============================================-->
   

     
    </main>
    {{-- =========================================
     CAMERA ALERT MODAL
========================================= --}}

<div class="camera-alert-overlay"
     id="cameraAlert">

    <div class="camera-alert-card">

        {{-- ICON --}}
        <div class="camera-alert-icon">

            <i class="bi bi-camera-video-off-fill"></i>

        </div>

        {{-- TITLE --}}
        <h4 id="cameraAlertTitle"
            class="fw-bold mb-2">

            Kamera Tidak Didukung

        </h4>

        {{-- MESSAGE --}}
        <p id="cameraAlertMessage"
           class="text-muted mb-4">

            Browser tidak mendukung kamera.

        </p>

        {{-- BUTTON --}}
        <button class="btn btn-warning px-4 py-2 rounded-pill fw-bold shadow-sm"
                onclick="closeCameraAlert()">

            OK

        </button>

    </div>

</div>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('vendors/gsap/customEase.js') }}"></script>
    <script src="{{ asset('vendors/gsap/scrollToPlugin.js') }}"></script>
    <!--script(src=`${CWD}vendors/gsap/drawSVGPlugin.js`)-->
    <script src="{{ asset('assets/js/theme.js') }}"></script>

  </body>

</html>