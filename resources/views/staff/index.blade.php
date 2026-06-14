@extends('layouts.app3')

@section('content')

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
        <h4 class="fw-bold mt-4 mb-2"
            style="
                font-size:2rem;
                color:#111;
            ">

            {{ __('Laporan Berhasil Dikirim') }}

        </h4>

        {{-- MESSAGE --}}
        <p class="mb-4"
           style="
                color:#9b9b9b;
                font-size:1.05rem;
                line-height:1.7;
           ">

            {{ __('Terima kasih, laporan barang berhasil disimpan ke sistem.') }}

        </p>

        {{-- BUTTON --}}
        <button class="btn fw-bold rounded-pill px-5 py-2 border-0 shadow-sm success-ok-btn"
                onclick="closeSuccessPopup()">

            OK

        </button>

    </div>

</div>

@endif

{{-- =========================================
     CAMERA ALERT POPUP
========================================= --}}

<div class="success-popup-overlay d-none"
     id="cameraAlertPopup">

    <div class="success-popup-card">

        {{-- ICON --}}
        <div class="success-check">

            <i class="bi bi-camera-video-off-fill"></i>

        </div>

        {{-- TITLE --}}
        <h4 class="fw-bold mt-4 mb-2"
            style="
                font-size:2rem;
                color:#111;
            ">

            {{ __('Akses Kamera Belum Diizinkan') }}

        </h4>

        {{-- MESSAGE --}}
        <p class="mb-4"
           style="
                color:#9b9b9b;
                font-size:1.05rem;
                line-height:1.7;
           ">

            {{ __('Pastikan Anda memberikan izin akses kamera pada browser agar fitur ambil foto dapat digunakan.') }}

        </p>

        {{-- BUTTON --}}
        <button class="btn fw-bold rounded-pill px-5 py-2 border-0 shadow-sm success-ok-btn"
                onclick="closeCameraAlert()">

            OK

        </button>

    </div>

</div>

{{-- ===== HEAD ASSETS ===== --}}
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
<link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
<meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
<meta name="theme-color" content="#ffffff">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/user.css') }}" rel="stylesheet" />



<style>
    /* ===== NAVBAR ===== */
    .navbar-light .navbar-nav .nav-link { color: #000 !important; font-weight: 600; }
    .dropdown-menu { background-color: #fff; border: 1px solid #ddd; z-index: 9999 !important; }
    .dropdown-item { color: #000; }
    .dropdown-item:hover { background-color: #FDB813; color: #fff; }
    .nav-item.dropdown { position: relative; z-index: 10000 !important; }

    /* ===== BUTTONS ===== */
    .btn-gold { background-color: #FDB813; color: #000; font-weight: bold; border: none; transition: all 0.3s ease; }
    .btn-gold:hover { background-color: #D49B00; color: #000; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
    .btn-warning { background-color: #FDB813 !important; border-color: #FDB813 !important; color: #000 !important; }
    .btn-warning:hover { background-color: #e0a800 !important; border-color: #e0a800 !important; }
    .btn-hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease !important; }
    .btn-hover-lift:hover { transform: translateY(-4px); box-shadow: 0 6px 12px rgba(0,0,0,0.15); }

    /* ===== CARDS ===== */
    .info-card { border-radius: 20px; transition: all 0.3s ease; cursor: pointer; }
    .info-card:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 15px 35px rgba(0,0,0,0.1); background: linear-gradient(135deg, #fffbea, #ffffff); }
    .info-card:hover h5 { color: #FDB813; letter-spacing: 1px; }
    .info-card:hover .icon-box { transform: rotate(10deg) scale(1.1); }
    .card-main { border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; background: #fff; }

    /* ===== TABLE ===== */
    .table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; padding-bottom: 60px; margin-bottom: -60px; }
    .table thead { background: #212529; color: white; white-space: nowrap; }
    .table th, .table td { vertical-align: middle; padding: 12px 15px; }
    .img-table { width: 55px; height: 55px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }

    /* ===== ANIMATIONS ===== */
    .attention-card { animation: float 2s ease-in-out infinite; }
    @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-10px); } 100% { transform: translateY(0px); } }
    @keyframes pulse-gold { 0% { opacity: 1; } 50% { opacity: 0.5; } 100% { opacity: 1; } }
    .animate-pulse { animation: pulse-gold 1.5s infinite; }

    /* ===== FORM ===== */
    .text-danger { color: #ff4d4d !important; margin-left: 2px; font-weight: bold; }
    input:invalid:focus { border-color: #ff4d4d; box-shadow: 0 0 0 0.25rem rgba(255,77,77,0.25); }

    /* ===== MODAL ===== */
    .modal-content { border-radius: 15px; }

    /* ===== CAMERA ===== */
    #videoPreview { background-color: #000; object-fit: cover; will-change: transform; -webkit-backface-visibility: hidden; backface-visibility: hidden; }

    /* ===== PHOTO PREVIEW ===== */
    #photoPreviewContainer img { max-height: 220px; width: 100%; object-fit: cover; border: 2px solid #FDB813; border-radius: 10px; }

    /* ===== SUBMIT BUTTON ===== */
    .btn-submit-laporan {
        background: linear-gradient(135deg, #FDB813, #e0a800);
        color: #000; font-weight: 700; font-size: 1rem;
        letter-spacing: 1px; border: none; border-radius: 50px;
        padding: 14px 48px; transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(253,184,19,0.4);
    }
    .btn-submit-laporan:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(253,184,19,0.5); color: #000; }
    .btn-submit-laporan:active { transform: translateY(0); }

    @media (max-width: 768px) { .section-spacing { margin-top: 50px; margin-bottom: 50px; } }

    /* ===== PAGE HEADER ===== */
    .page-header {
        display: flex; justify-content: space-between; align-items: center;
        flex-wrap: wrap; gap: 12px; padding: 20px 24px 18px;
        background: #fff; border-bottom: 1px solid #e9ecef; margin-bottom: 0;
    }
    .header-controls { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }

   .lang-wrapper {

    position: relative;

    display: flex;

    justify-content: flex-end;

}

.lang-btn {

    height: 38px;

    padding: 0 14px;

    border-radius: var(--radius-sm);

    border: 1px solid var(--border);

    background: #fff;

    font-weight: 600;

    font-size: 0.82rem;

    box-shadow: var(--shadow-sm);

    display: flex;

    align-items: center;

    gap: 8px;

    transition: all .2s ease;

    cursor: pointer;

    user-select: none;

    white-space: nowrap;

}

.lang-btn:hover {

    border-color: var(--gold);

    box-shadow: var(--shadow-gold);

}

.lang-btn .chevron {

    font-size: 0.65rem;

    color: var(--text-muted);

    transition: transform .2s;

}

.lang-btn.open .chevron {

    transform: rotate(180deg);

}

/* =========================
   DROPDOWN MENU
========================= */
.lang-menu {

    display: none;

    position: absolute;

    top: calc(100% + 10px);

    right: 0;

    background: #fff;

    border: 1px solid var(--border);

    border-radius: 14px;

    box-shadow: 0 10px 30px rgba(0,0,0,.12);

    min-width: 170px;

    overflow: hidden;

    z-index: 999999;

    animation: fadeDown .18s ease;

}

.lang-menu.open {

    display: block;

}

@keyframes fadeDown {

    from {

        opacity: 0;

        transform: translateY(-8px);

    }

    to {

        opacity: 1;

        transform: translateY(0);

    }

}

.lang-menu a {

    display: flex;

    align-items: center;

    gap: 10px;

    padding: 12px 14px;

    font-size: 0.82rem;

    font-weight: 600;

    color: var(--dark);

    text-decoration: none;

    transition: all .15s ease;

}

.lang-menu a:hover {

    background: var(--gold-light);

}

.lang-menu a.active-lang {

    background: var(--gold-light);

    color: #92650a;

}

/* =========================================
   MOBILE FIX
========================================= */
@media (max-width:768px){

    .header-controls{

        width:100%;

        justify-content:space-between;

        align-items:center;

    }

    .lang-wrapper{

        margin-left:auto;

    }

    .lang-menu{

        right:-8px !important;

        left:auto !important;

        min-width:155px;

        width:max-content;

        max-width:88vw;

        border-radius:12px;

    }

    .lang-menu a{

        padding:12px 14px;

        font-size:.78rem;

        white-space:nowrap;

    }

}

    /* Live clock */
    .live-clock {
        height: 36px; padding: 0 14px; border-radius: 8px;
        background: #FDB813; color: #000;
        font-weight: 700; font-size: 0.78rem;
        display: flex; align-items: center; gap: 6px;
        white-space: nowrap; box-shadow: 0 2px 8px rgba(253,184,19,.3);
    }
/* =========================================
   SUCCESS / CAMERA POPUP
========================================= */

.success-popup-overlay{

    position:fixed;

    inset:0;

    background:rgba(0,0,0,.45);

    backdrop-filter:blur(6px);

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

    max-width:520px;

    border-radius:36px;

    padding:48px 34px;

    text-align:center;

    box-shadow:
        0 20px 60px rgba(0,0,0,.18);

    animation:popupScale .35s ease;

}

.success-check{

    width:110px;

    height:110px;

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

    font-size:3rem;

    color:#fff;

    box-shadow:
        0 15px 35px rgba(253,184,19,.35);

}

.success-ok-btn{

    background:#FDB813;

    color:#000;

    font-size:1rem;

    transition:.25s ease;

}

.success-ok-btn:hover{

    transform:translateY(-2px);

    background:#ffcc33;

}

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
  </style>



{{-- ===== MAIN CONTENT ===== --}}


{{-- ===== PAGE HEADER (Language + Clock) ===== --}}
<div class="page-header">
    <div>
        <h1 class="fw-bold mb-0" style="letter-spacing: -1px;">{{ __('Input Laporan Barang') }}</h1>
        <p>{{ __('Isi formulir berikut untuk mencatat barang temuan') }}</p>
    </div>
    <div class="header-controls">
        {{-- Language Switcher --}}
        <div class="lang-wrapper" id="langWrapperForm">
            <div class="lang-btn" id="langBtnForm" onclick="toggleLangForm()">
                <img src="https://flagcdn.com/w20/{{ app()->getLocale() == 'id' ? 'id' : 'gb' }}.png"
                     width="18" class="rounded-1" onerror="this.style.display='none'">
                <span>{{ strtoupper(app()->getLocale()) }}</span>
                <i class="bi bi-chevron-down lchev"></i>
            </div>
            <div class="lang-menu" id="langMenuForm">
                <a href="{{ route('lang.switch', 'id') }}" class="{{ app()->getLocale() == 'id' ? 'active-lang' : '' }}">
                    <img src="https://flagcdn.com/w20/id.png" width="18" class="rounded-1"> Indonesia
                </a>
                <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active-lang' : '' }}">
                    <img src="https://flagcdn.com/w20/gb.png" width="18" class="rounded-1"> English
                </a>
            </div>
        </div>

        {{-- Live Clock --}}
        <div class="live-clock">
            <i class="bi bi-clock"></i>
            <span id="formLiveClock">{{ date('d M Y | H:i:s') }}</span>
        </div>
    </div>
</div>

<section id="form-laporan" class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row g-5">

            {{-- Sidebar Perhatian --}}
            <div class="col-lg-4">
                <div class="card shadow-lg border-0 rounded-4 p-4 sticky-lg-top" style="top: 20px;">
                    <h5 class="fw-bold mb-3">
                        <span class="text-warning">&#9888;</span> {{ __('Perhatian') }}
                    </h5>
                    <p class="small text-muted">
                        {{ __('Harap pastikan semua kolom pada formulir di samping telah diisi dengan akurat dan lengkap.') }}
                    </p>
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
                        <h4 class="fw-bold mb-0 text-uppercase" style="letter-spacing: 1px;">
                            {{ __('Detail Laporan Barang') }}
                        </h4>
                    </div>

                    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data" id="formLaporan">
                        @csrf

                        {{-- Group 1: Informasi Barang --}}
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="bi bi-box-seam me-2 text-warning"></i>{{ __('Informasi Barang') }}
                        </h6>
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
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="bi bi-person-badge me-2 text-warning"></i>{{ __('Waktu & Data Pelapor') }}
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Tanggal Laporan') }} <span class="text-danger">*</span></label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light border-0"><i class="bi bi-calendar-event"></i></span>
                                    <input type="date" name="tanggal_laporan" class="form-control bg-light border-0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('NIK Pelapor') }} <span class="text-danger">*</span></label>
                                <input type="text" name="nik_pelapor" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Masukkan NIK') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="16" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Nama Pelapor') }} <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pelapor" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Nama Lengkap') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">{{ __('Jabatan Pelapor') }} <span class="text-danger">*</span></label>
                                <input type="text" name="jabatan_pelapor" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Cth: Pengemudi / Penumpang') }}" required>
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
                                <select name="tipe_lokasi" id="tipe_lokasi" class="form-select bg-light border-0 shadow-sm" onchange="toggleLokasiInput()" required>
                                    <option value="unit">{{ __('Unit (Kendaraan)') }}</option>
                                    <option value="pool">{{ __('Pool (Kantor)') }}</option>
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
                                <label class="form-label small fw-bold">{{ __('Titik Penemuan Spesifik') }} <span class="text-danger">*</span></label>
                                <input type="text" name="lokasi_ditemukan" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Cth: Di bawah kursi no 12') }}" required>
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
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light border-0"><i class="bi bi-calendar-event"></i></span>
                                    <input type="date" name="tanggal_rute" class="form-control bg-light border-0" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">{{ __('Nama CS Input') }} <span class="text-danger">*</span></label>
                                <input type="text" name="cs_name" class="form-control bg-light border-0 shadow-sm" placeholder="{{ __('Nama Staff') }}" required>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        {{-- Section Foto --}}
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="bi bi-image me-2 text-warning"></i>{{ __('Bukti Foto') }}
                        </h6>

                        <div id="photoPreviewContainer" class="mb-3 d-none">
                            <div class="position-relative">
                                <img id="photoPreview" class="w-100 rounded shadow-sm"
                                     style="max-height: 250px; object-fit: cover; border: 2px solid #FDB813;"
                                     src="" alt="Preview Foto">
                                <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-2 rounded-circle"
                                        onclick="clearPhoto()" style="width:38px;height:38px;padding:0;">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <small class="text-success d-block mt-2">
                                <i class="bi bi-check-circle-fill me-1"></i>{{ __('Foto berhasil dipilih') }}
                            </small>
                        </div>

                       <input type="file"
                        id="aksesFile"
                        name="foto_barang"
                        accept="image/*"
                        onchange="compressImage(event)"
                        hidden>
                        <div class="d-flex gap-2 flex-wrap mb-2">
                            <button type="button" class="btn btn-warning flex-fill btn-hover-lift" id="openCameraBtn" onclick="openCameraModal()">
                                <i class="bi bi-camera-fill me-2"></i>{{ __('Ambil Foto') }}
                            </button>
                            <button type="button" class="btn btn-gold flex-fill btn-hover-lift" onclick="document.getElementById('aksesFile').click()">
                                <i class="bi bi-upload me-2"></i>{{ __('Upload Foto') }}
                            </button>
                        </div>

                        <small class="text-muted d-block">{{ __('Format JPG/PNG • Maks 5MB') }} <span class="text-danger">*</span></small>

                        <div id="fotoError" class="text-danger small mt-1 d-none">
                            <i class="bi bi-exclamation-circle me-1"></i>{{ __('Foto wajib diunggah sebelum mengirim laporan.') }}
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-submit-laporan" id="btnSubmit">
                                <i class="bi bi-send-fill me-2"></i> {{ __('KIRIM LAPORAN SEKARANG') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ===== MODAL KAMERA ===== --}}
<div class="modal fade" id="cameraModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-camera-fill text-warning me-2"></i>{{ __('Ambil Foto') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-3">
                <div id="cameraLoading" class="py-5 d-none">
                    <div class="spinner-border text-warning mb-3"></div>
                    <p class="text-muted">{{ __('Mengaktifkan kamera...') }}</p>
                </div>
                <div id="cameraError" class="alert alert-danger d-none mx-3">
                    <div id="errorMessage"></div>
                </div>
                <div id="videoContainer" class="d-none">
                    <video id="videoPreview" autoplay playsinline muted class="w-100 rounded"
                           style="background:#000; min-height:300px; max-height:450px;"></video>
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

{{--
    ===== SCRIPTS =====
    Bootstrap bundle (sudah include Popper) dimuat SEKALI.
    Tidak perlu muat popper.min.js atau bootstrap.min.js terpisah.
--}}

<script>
async function compressImage(event) {

    const file = event.target.files[0];

    if (!file) return;

    // hanya image
    if (!file.type.startsWith('image/')) {

        alert('File harus berupa gambar');

        return;
    }

    const img = new Image();

    const reader = new FileReader();

    reader.onload = function(e){

        img.onload = function(){

            const canvas = document.createElement('canvas');

            const ctx = canvas.getContext('2d');

            let width = img.width;
            let height = img.height;

            // resize agar tetap tajam tapi ringan
            const MAX_WIDTH = 1600;

            if(width > MAX_WIDTH){

                height *= MAX_WIDTH / width;

                width = MAX_WIDTH;
            }

            canvas.width = width;
            canvas.height = height;

            // kualitas render lebih bagus
            ctx.imageSmoothingEnabled = true;
            ctx.imageSmoothingQuality = 'high';

            ctx.drawImage(img, 0, 0, width, height);

            // mulai compress
            compressLoop(canvas, file, 0.92);

        };

        img.src = e.target.result;

    };

    reader.readAsDataURL(file);
}

// =====================================================
// LOOP COMPRESS
// =====================================================

function compressLoop(canvas, originalFile, quality){

    canvas.toBlob(function(blob){

        if(!blob){

            alert('Gagal compress gambar');

            return;
        }

        // TARGET < 1MB
        if(blob.size > 1024 * 1024){

            quality -= 0.05;

            // minimal kualitas
            if(quality < 0.45){

                console.log('Mencapai batas minimal quality');

            } else {

                compressLoop(canvas, originalFile, quality);

                return;
            }
        }

        // hasil file compress
        const compressedFile = new File(
            [blob],
            originalFile.name,
            {
                type: 'image/jpeg',
                lastModified: Date.now()
            }
        );

        // inject ke input
        const dataTransfer = new DataTransfer();

        dataTransfer.items.add(compressedFile);

        document.getElementById('aksesFile').files =
            dataTransfer.files;

        // preview size
        const finalSize =
            (blob.size / 1024).toFixed(0);

        console.log(
            'Final Size:',
            finalSize + ' KB'
        );

        // tampil info ukuran
        const info =
            document.getElementById('photoSizeInfo');

        if(info){

            info.innerHTML =
                'Ukuran setelah kompres: <b>' +
                finalSize +
                ' KB</b>';
        }

        // preview image
        const preview =
            document.getElementById('photoPreview');

        if(preview){

            preview.src =
                URL.createObjectURL(blob);
        }
showPhotoPreview(
    URL.createObjectURL(blob)
);
    }, 'image/jpeg', quality);

}


document.addEventListener('DOMContentLoaded', function () {

    // ── 1. Set tanggal default hari ini ──
    const today      = new Date().toISOString().split('T')[0];
    const tglLaporan = document.querySelector('input[name="tanggal_laporan"]');
    const tglRute    = document.querySelector('input[name="tanggal_rute"]');
    if (tglLaporan && !tglLaporan.value) tglLaporan.value = today;
    if (tglRute    && !tglRute.value)    tglRute.value    = today;

    // ── 2. Kamera: bind event modal ──
    const modalEl = document.getElementById('cameraModal');
    if (modalEl) {
        // Gunakan fungsi startCamera & stopCamera dari navbar.blade.php (sudah global)
        modalEl.addEventListener('shown.bs.modal', startCamera);
        modalEl.addEventListener('hidden.bs.modal', function () {
            stopCamera();
            resetCameraUI();
        });
    }

    // ── 3. Alert sukses: auto tutup 3 detik ──
    const alertEl = document.getElementById('alertSukses');
    if (alertEl) setTimeout(tutupAlert, 3000);
});

// ── Alert ──
function tutupAlert() {
    const el = document.getElementById('alertSukses');
    if (!el) return;
    el.classList.add('hiding');
    setTimeout(() => el.remove(), 300);
}

// ── Language Dropdown Form ──
function toggleLangForm() {
    const btn  = document.getElementById('langBtnForm');
    const menu = document.getElementById('langMenuForm');
    if (!btn || !menu) return;
    const isOpen = menu.classList.contains('open');
    menu.classList.toggle('open', !isOpen);
    btn.classList.toggle('open', !isOpen);
}
document.addEventListener('click', function (e) {
    const wrapper = document.getElementById('langWrapperForm');
    if (wrapper && !wrapper.contains(e.target)) {
        document.getElementById('langMenuForm')?.classList.remove('open');
        document.getElementById('langBtnForm')?.classList.remove('open');
    }
});

// ── Live Clock ──
(function () {
    function updateFormClock() {
        const el = document.getElementById('formLiveClock');
        if (!el) return;
        const now = new Date();
        const d  = String(now.getDate()).padStart(2, '0');
        const m  = now.toLocaleString('id-ID', { month: 'short' });
        const y  = now.getFullYear();
        const hh = String(now.getHours()).padStart(2, '0');
        const mm = String(now.getMinutes()).padStart(2, '0');
        const ss = String(now.getSeconds()).padStart(2, '0');
        el.textContent = `${d} ${m} ${y} | ${hh}:${mm}:${ss}`;
    }
    updateFormClock();
    setInterval(updateFormClock, 1000);
})();

// ── Validasi Form Sebelum Submit ──
document.getElementById('formLaporan').addEventListener('submit', function (e) {
    const fileInput = document.getElementById('aksesFile');
    const fotoError = document.getElementById('fotoError');
    if (!fileInput.files || fileInput.files.length === 0) {
        e.preventDefault();
        fotoError.classList.remove('d-none');
        fileInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
        return false;
    }
    fotoError.classList.add('d-none');
    const btn = document.getElementById('btnSubmit');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Mengirim...';
});

// ── openCameraModal ──
function openCameraModal(){

    if(!checkCameraSupport()){

        document
            .getElementById(
                'cameraAlertPopup'
            )
            .classList.remove(
                'd-none'
            );

        return;
    }

    const modal =
        new bootstrap.Modal(
            document.getElementById(
                'cameraModal'
            )
        );

    modal.show();

}

// ── checkCameraSupport ──
function checkCameraSupport() {
    return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia && window.isSecureContext);
}

// ── handleFileSelect ──
function handleFileSelect(event) {
    const file = event.target.files[0];
    if (!file) return;
    if (file.size > 5 * 1024 * 1024) {
        alert('Ukuran file maksimal 5MB.');
        event.target.value = '';
        return;
    }
    showPhotoPreview(URL.createObjectURL(file));
}

// ── showPhotoPreview ──
function showPhotoPreview(url) {
    document.getElementById('photoPreview').src = url;
    document.getElementById('photoPreviewContainer').classList.remove('d-none');
    document.getElementById('openCameraBtn').disabled = true;
    document.getElementById('fotoError').classList.add('d-none');
}

// ── clearPhoto ──
function clearPhoto() {
    document.getElementById('aksesFile').value = '';
    document.getElementById('photoPreview').src = '';
    document.getElementById('photoPreviewContainer').classList.add('d-none');
    document.getElementById('openCameraBtn').disabled = false;
}

// ── resetCameraUI (dipakai saat modal kamera tutup) ──
function resetCameraUI() {
    ['cameraLoading', 'cameraError', 'videoContainer', 'cameraToggle'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.add('d-none');
    });
    const captureBtn = document.getElementById('captureBtn');
    if (captureBtn) captureBtn.classList.add('d-none');
}

// =====================================
// TOGGLE LOKASI INPUT
// =====================================

function toggleLokasiInput(){

    const tipeLokasi =
        document.getElementById('tipe_lokasi').value;

    const wrapperUnit =
        document.getElementById('wrapper_unit');

    const wrapperPool =
        document.getElementById('wrapper_pool');

    // =================================
    // UNIT
    // =================================
    if(tipeLokasi === 'unit'){

        wrapperUnit.style.display =
            'block';

        wrapperPool.style.display =
            'none';

    }

    // =================================
    // POOL
    // =================================
    else if(tipeLokasi === 'pool'){

        wrapperUnit.style.display =
            'none';

        wrapperPool.style.display =
            'block';

    }

}

// =====================================
// AUTO LOAD SAAT PAGE DIBUKA
// =====================================

document.addEventListener(
    'DOMContentLoaded',
    function(){

        toggleLokasiInput();

    }
);

</script>

<script>

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

           window.location.href = "{{ route('staff.index') }}";

        }, 300);

    }

}

/* AUTO CLOSE */
@if(session('success'))

setTimeout(() => {

    closeSuccessPopup();

}, 3500);

@endif

/* =========================================
   CAMERA ALERT
========================================= */

function closeCameraAlert(){

    const popup =
        document.getElementById(
            'cameraAlertPopup'
        );

    popup.classList.add('d-none');

}

</script>
@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif
@endsection