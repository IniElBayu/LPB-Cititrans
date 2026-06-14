@extends('layouts.app')

@section('content')
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500;600;700&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet" />
<title>CS Portal Sistem</title>

{{-- Bootstrap Icon --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
.main-content {
        /* Ubah dari 100px atau 120px menjadi sekitar 70px - 80px */
        padding-top: 25px;
        min-height: calc(100vh - 190px);
        padding-bottom: 120px;
    }

    /* Tambahan agar di HP jaraknya tetap enak dilihat */
    @media (max-width: 768px) {
        .main-content {
            margin-top: 75px;
        }
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
    /* =========================================
   TABLE MOBILE FIX
========================================= */

.table{

    min-width: 1100px;

}

/* MOBILE */
@media (max-width:768px){

    .table{

        min-width: 980px;

    }

    .table th{

        font-size: .66rem;

        padding: 10px 10px;

    }

    .table td{

        font-size: .72rem;

        padding: 10px 10px;

    }

    /* FOTO */
    .img-table{

        width: 48px;

        height: 48px;

    }

    /* BUTTON AKSI */
    .btn-action{

        width: 32px;

        height: 32px;

        font-size: .72rem;

    }

    /* STATUS */
    .dropdown .btn{

        min-width: 92px !important;

        font-size: .62rem;

        padding: 6px 10px;

    }

    /* BADGE */
    .badge{

        font-size: .62rem !important;

        padding: 5px 8px !important;

    }

}
    .table thead {
        background: #212529;
        color: white;
        white-space: nowrap;
    }

    .table th,
.table td {

    vertical-align: middle;

    padding: 12px 15px;

    white-space: nowrap;

}
    .img-table {

    width: 55px;

    height: 55px;

    object-fit: cover;

    border-radius: 12px;

    border: 2px solid #f1f1f1;

    box-shadow: 0 4px 12px rgba(0,0,0,.08);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;

}

/* =========================================
   IMAGE ZOOM
========================================= */

.zoom-image {

    cursor: zoom-in;

}

.zoom-image:hover {

    transform: scale(1.12) rotate(.5deg);

    border-color: #FDB813;

    box-shadow:
        0 12px 30px rgba(0,0,0,.22),
        0 0 0 4px rgba(253,184,19,.18);

}

/* =========================================
   IMAGE MODAL
========================================= */

.image-modal {

    position: fixed;

    inset: 0;

    background: rgba(0,0,0,.82);

    display: none;

    align-items: center;

    justify-content: center;

    z-index: 999999;

    padding: 20px;

    backdrop-filter: blur(5px);

}

.image-modal img {

    max-width: 92%;

    max-height: 90vh;

    border-radius: 18px;

    box-shadow: 0 10px 40px rgba(0,0,0,.35);

    animation: zoomFade .22s ease;

}

@keyframes zoomFade {

    from {

        opacity: 0;

        transform: scale(.88);

    }

    to {

        opacity: 1;

        transform: scale(1);

    }

}

.image-modal .close-btn {

    position: absolute;

    top: 22px;

    right: 28px;

    color: #fff;

    font-size: 2rem;

    cursor: pointer;

    transition: .2s ease;

}

.image-modal .close-btn:hover {

    transform: scale(1.12);

    color: #FDB813;

}

    .btn-yellow {
        background: #f3db00;
        border: none;
        color: #000;
        font-weight: 600;
    }
    /* Base style untuk tombol aksi bulat */
    .btn-action {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px; /* Rounded kotak lembut */
        transition: all 0.3s ease;
        text-decoration: none;
        border: none;
    }

    /* Tombol Edit: Emas Solid */
    .btn-gold-action {
        background-color: #FDB813;
        color: #000 !important;
    }

    .btn-gold-action:hover {
        background-color: #e5a700;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(253, 184, 19, 0.4) !important;
    }

    /* Tombol Hapus: Emas Outline (Supaya tidak terlalu ramai tapi tetap satu tema) */
    .btn-gold-outline-action {
        background-color: #fff;
        color: #FDB813;
        border: 2px solid #FDB813;
    }

    .btn-gold-outline-action:hover {
        background-color: #FDB813;
        color: #000;
        transform: translateY(-2px);
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
    /* Mengubah warna tombol halaman yang aktif */
    .pagination .page-item.active .page-link {
        background-color: #FDB813 !important;
        border-color: #FDB813 !important;
        color: #000 !important; /* Warna teks hitam agar kontras */
        font-weight: bold;
    }

    /* Mengubah warna teks tombol lainnya agar serasi */
    .pagination .page-item .page-link {
        color: #333 !important;
    }

    /* Efek saat tombol diarahkan kursor (hover) */
    .pagination .page-item .page-link:hover {
        background-color: #ffe08c !important;
        border-color: #FDB813 !important;
        color: #000 !important;
    }
   /* =========================================
   RESPONSIVE MOBILE
========================================= */

@media (max-width:768px){

    .main-content{

        margin-top:70px;

    }

    .table{

        min-width:1150px;

        font-size:13px;

    }

    .table th{

        font-size:.66rem;

        padding:10px 10px;

    }

    .table td{

        font-size:.72rem;

        padding:10px 10px;

        white-space:nowrap;

    }

    /* FOTO */
    .img-table{

        width:45px;

        height:45px;

        border-radius:10px;

    }

    /* FILE SIZE */
    .file-size{

        font-size:.60rem;

    }

    /* STATUS */
    .dropdown .btn{

        min-width:82px !important;

        font-size:.60rem;

        padding:6px 8px;

    }

    /* BADGE */
    .badge{

        font-size:.60rem !important;

        padding:4px 7px !important;

    }

    /* ACTION */
    .action-group{

        display:flex;

        flex-direction:row !important;

        flex-wrap:nowrap !important;

        justify-content:center;

        align-items:center;

        gap:4px;

        min-width:100px;

    }

    .btn-action{

        width:28px;

        height:28px;

        min-width:28px;

        min-height:28px;

        font-size:.68rem;

        border-radius:8px;

        padding:0;

        flex-shrink:0;

    }

}

/* =========================================
   DESKTOP ACTION FIX
========================================= */

.action-group{

    display:flex;

    flex-direction:row;

    flex-wrap:nowrap;

    justify-content:center;

    align-items:center;

    gap:8px;

    min-width:130px;

}
/* =========================================
   DELETE MODAL
========================================= */

.delete-modal-overlay{

    position:fixed;

    inset:0;

    background:rgba(0,0,0,.45);

    backdrop-filter:blur(6px);

    z-index:999999;

    display:none;

    align-items:center;

    justify-content:center;

    padding:20px;

    animation:fadeDelete .2s ease;

}

.delete-modal-card{

    width:100%;

    max-width:420px;

    background:#fff;

    border-radius:28px;

    padding:35px 28px;

    text-align:center;

    box-shadow:
        0 20px 60px rgba(0,0,0,.18);

    animation:scaleDelete .25s ease;

}

.delete-icon{

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

    font-size:2.3rem;

    color:#fff;

    margin-bottom:22px;

}

@keyframes fadeDelete{

    from{

        opacity:0;

    }

    to{

        opacity:1;

    }

}

@keyframes scaleDelete{

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

/* MOBILE */
@media(max-width:768px){

    .delete-modal-card{

        padding:30px 22px;

        border-radius:22px;

    }

    .delete-icon{

        width:78px;

        height:78px;

        font-size:2rem;

    }

}
</style>

{{-- Di dalam body app.blade.php --}}
    <div class="container-fluid px-lg-4 mt-3">
    {{-- Header Global --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 border-bottom pb-3">
        <div>
            {{-- Judul Dinamis --}}
            <h1 class="fw-bold mb-0" style="letter-spacing: -1px;">
            {{ __('Barang Lost & Found') }}
            </h1>
            <p class="text-muted small mb-0">{{ __('Kelola barang') }}</p>
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
                <span id="live-clock" class="fw-bold small">
                 {{ date('d M Y | H:i:s') }}
                </span>
            </div>
        </div>
    </div>
    

   {{-- FILTER --}}
{{-- FILTER --}}
<div class="card shadow-sm p-3 mb-3 border-0 rounded-4">

    <form method="GET"
          action="{{ route('report.list') }}">

        <div class="row g-2 align-items-center">

            {{-- SEARCH --}}
            <div class="col-md-4">

                <input type="text"
                       name="search"
                       class="form-control form-control-sm shadow-sm border-0"
                       placeholder="{{ __('Cari nama barang...') }}"
                       value="{{ request('search') }}"
                       style="height:42px;">

            </div>

            {{-- FILTER STATUS --}}
            <div class="col-md-3">

                <select name="status"
                        class="form-select form-select-sm shadow-sm border-0"
                        style="height:42px;">

                    <option value="">

                        {{ __('Semua Status') }}

                    </option>

                    <option value="diproses"
                        {{ request('status') == 'diproses'
                            ? 'selected'
                            : '' }}>

                        {{ __('Diproses') }}

                    </option>

                    <option value="claimed"
                        {{ request('status') == 'claimed'
                            ? 'selected'
                            : '' }}>

                        {{ __('Diambil') }}

                    </option>

                    <option value="hilang"
                        {{ request('status') == 'hilang'
                            ? 'selected'
                            : '' }}>

                        {{ __('Hangus') }}

                    </option>

                </select>

            </div>

            {{-- BUTTON --}}
            <div class="col-md-auto">

                <button type="submit"
                        class="btn px-4 shadow-sm fw-semibold"
                        style="
                            background:#FDB813;
                            color:#000;
                            height:42px;
                            border:none;
                            border-radius:10px;
                        ">

                    <i class="bi bi-funnel me-1"></i>

                    {{ __('Filter') }}

                </button>

            </div>

            {{-- RESET --}}
            <div class="col-md-auto">

                <a href="{{ route('report.list') }}"
                   class="btn btn-dark px-4 shadow-sm"
                   style="
                        height:42px;
                        border-radius:10px;
                   ">

                    <i class="bi bi-arrow-clockwise"></i>

                </a>

            </div>

        </div>

    </form>

</div>

{{-- ALERT --}}
@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-3 mx-4 mt-3" id="success-alert">
        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            let el = document.getElementById('success-alert');
            if(el) el.remove();
        }, 3000);
    </script>
@endif

{{-- TABLE --}}
<div class="card border-0 shadow-sm card-main overflow-hidden rounded-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0 table-hover">
            <thead class="bg-dark">
                <tr>
                    <th class="ps-4 py-3 text-uppercase small fw-bold text-white" style="width: 50px;">{{ __('No') }}</th>
                    <th class="py-3 text-uppercase small fw-bold text-white text-start">{{ __('Nama Barang') }}</th>
                    <th class="py-3 text-uppercase small fw-bold text-white text-center">{{ __('Kategori') }}</th>
                    <th class="py-3 text-uppercase small fw-bold text-white text-center">{{ __('Nama Penemu') }}</th>
                    <th class="py-3 text-uppercase small fw-bold text-white text-center">{{ __('Lokasi / Unit') }}</th>
                    <th class="py-3 text-uppercase small fw-bold text-white text-center">{{ __('Waktu Input') }}</th>
                    <th class="py-3 text-uppercase small fw-bold text-white text-center">{{ __('Status') }}</th>
                    <th class="py-3 text-uppercase small fw-bold text-white text-center" style="width: 80px;">{{ __('Foto') }}</th>
                    <th class="py-3 text-uppercase small fw-bold text-white text-center" style="width: 100px;">{{ __('Aksi') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $i => $item)
                <tr>
                    {{-- Penomoran --}}
                    <td class="ps-4 text-muted">{{ ($reports->currentPage() - 1) * $reports->perPage() + $i + 1 }}</td>
                    
                    {{-- Nama Barang --}}
                    <td class="text-start">
                        <div class="fw-bold text-dark">{{ $item->nama_barang }}</div>
                    </td>

                    {{-- Kategori --}}
                    <td class="text-center">
                        <span class="badge shadow-sm px-3 py-2" style="background-color: #FDB813; color: #000; font-weight: 600; border-radius: 6px;">
                            {{ __($item->kategori) }}
                        </span>
                    </td>

                    {{-- Nama Penemu --}}
                   <td class="text-center" style="min-width:140px;">{{ $item->cs_name }}</td>

                    {{-- Lokasi --}}
                    <td class="text-center text-truncate text-muted" style="max-width:150px;">
                        {{ $item->lokasi_ditemukan }}
                    </td>

                    {{-- Waktu --}}
                    <td class="text-center">
                        <div class="fw-bold text-dark">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</div>
                        <div class="small text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }} WIB</div>
                    </td>

                    {{-- Status Dropdown --}}
                    <td class="text-center">
                        <div class="dropdown">
                            @php
                                $statusColors = ['diproses' => '#198754', 'claimed' => '#6c757d', 'hilang' => '#dc3545'];
                                $bgColor = $statusColors[$item->status] ?? '#FDB813';
                                $textColor = in_array($item->status, ['diproses', 'claimed', 'hilang']) ? '#fff' : '#000';
                            @endphp
                            <button class="btn btn-sm dropdown-toggle fw-bold px-3 shadow-sm {{ $item->status == 'diproses' ? 'animate-pulse' : '' }}" 
                                    data-bs-toggle="dropdown"
                                    style="background-color: {{ $bgColor }}; color: {{ $textColor }}; border: none; min-width: 120px; border-radius: 6px;">
                                {{ __(ucfirst($item->status ?? 'Status')) }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2">
                                <li>
                                    <form action="{{ route('reports.updateStatus', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="diproses">
                                        <button class="dropdown-item py-2 fw-bold text-dark" type="submit">🔵 {{ __('Set Diproses') }}</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('reports.updateStatus', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="claimed">
                                        <button class="dropdown-item py-2 fw-bold text-dark" type="submit">🟢 {{ __('Set Diambil') }}</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('reports.updateStatus', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="hilang">
                                        <button class="dropdown-item py-2 fw-bold text-dark" type="submit">🔴 {{ __('Set Hangus') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>

                   {{-- FOTO --}}
                    <td class="text-center">

                       <img src="{{ asset('storage/' . $item->foto_barang) }}"
         class="img-table zoom-image"
         alt="foto barang"
         onclick="openImageModal(this.src)">

    @php

        $filePath = storage_path(
            'app/public/' . $item->foto_barang
        );

        $fileSize = file_exists($filePath)
            ? filesize($filePath)
            : 0;

        $sizeKB = round($fileSize / 1024);

        $sizeMB = round($fileSize / 1024 / 1024, 2);

    @endphp

    <div class="file-size">

        @if($sizeMB >= 1)

            {{ $sizeMB }} MB

        @else

            {{ $sizeKB }} KB

        @endif

    </div>
                    </td>

                    {{-- Aksi --}}
                    <td class="text-center">
                  <div class="action-group">
                                <a href="{{ route('reports.edit', $item->id) }}"
                                   class="btn-action btn-gold-outline-action shadow-sm"
                                   title="{{ __('Edit') }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            
                               <form action="{{ route('reports.destroy', $item->id) }}"
                                    method="POST"
                                    class="m-0 deleteForm">

                                    @csrf
                                    @method('DELETE')

                                    <button type="button"
                                            class="btn-action btn-gold-action shadow-sm deleteBtn"
                                            title="{{ __('Hapus') }}">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>
                            <a href="{{ route('report.print', $item->id) }}" target="_blank" class="btn-action btn-gold-action shadow-sm" style="background-color: #FDB813;">
                                <i class="bi bi-printer text-dark"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-5">
                        <div class="opacity-25 mb-2">
                            <i class="bi bi-clipboard-x display-4 text-secondary"></i>
                        </div>
                        <h6 class="text-muted fw-normal">{{ __('Belum ada riwayat aktivitas tercatat') }}</h6>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
   
</div>

<!-- Garis dengan panjang tetap 200px -->

  
<div class="card-footer bg-transparent border-0 py-4 px-4">
        <div class="row align-items-center">
            <div class="col-12 text-center">
        <!-- Teks Keterangan Halaman -->
        <div class="text-muted mb-3" style="font-size: 0.85rem;">
            {{ __('Menampilkan halaman') }} <strong>{{ $reports->currentPage() }}</strong> 
            {{ __('dari') }} <strong>{{ $reports->lastPage() }}</strong>
        </div>

        <!-- Navigasi Pagination -->
        <div class="pagination-yellow">
            <nav>
                <ul class="pagination mb-0 justify-content-center">
                    {{-- Tombol Previous --}}
                    @if ($reports->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $reports->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif

                    {{-- Logika Blok 10 Angka --}}
                    @php
                        $currentBlock = ceil($reports->currentPage() / 150);
                        $startPage = ($currentBlock - 1) * 5 + 1;
                        $endPage = min($startPage + 4, $reports->lastPage());
                    @endphp

                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ ($reports->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $reports->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Tombol Next --}}
                    @if ($reports->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $reports->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </nav>
        </div>

        <!-- Badge Total Entri (Dipindah ke bawah agar simetris) -->
        <div class="mt-3">
            <div class="badge bg-light text-dark border px-3 py-2 rounded-pill shadow-sm" style="font-size: 0.75rem;">
                <i class="bi bi-layers me-1 text-warning"></i> 
                {{ __('Total') }}: <span class="fw-bold ms-1">{{ $reports->total() }}</span> {{ __('Entri') }}
            </div>
        </div>

    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('search')) {
            const tableElement = document.querySelector('.table-responsive');
            if (tableElement) {
                tableElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
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

    // =====================================
// IMAGE MODAL
// =====================================

function openImageModal(src){

    const modal =
        document.getElementById('imageModal');

    const image =
        document.getElementById('modalImage');

    image.src = src;

    modal.style.display = 'flex';

    document.body.style.overflow = 'hidden';

}

function closeImageModal(){

    const modal =
        document.getElementById('imageModal');

    modal.style.display = 'none';

    document.body.style.overflow = 'auto';

}



/* =========================================
   DELETE MODAL
========================================= */
document.addEventListener(
    'DOMContentLoaded',
    function(){

        let currentDeleteForm = null;

        /* OPEN MODAL */
        document.querySelectorAll(
            '.deleteBtn'
        ).forEach(btn => {

            btn.addEventListener(
                'click',
                function(){

                    currentDeleteForm =
                        this.closest(
                            '.deleteForm'
                        );

                    const modal =
                        document.getElementById(
                            'deleteModal'
                        );

                    if(modal){

                        modal.style.display =
                            'flex';

                    }

                }
            );

        });

        /* CLOSE MODAL */
        window.closeDeleteModal =
            function(){

                const modal =
                    document.getElementById(
                        'deleteModal'
                    );

                if(modal){

                    modal.style.display =
                        'none';

                }

            };

        /* CONFIRM DELETE */
        const confirmDeleteBtn =
            document.getElementById(
                'confirmDeleteBtn'
            );

        if(confirmDeleteBtn){

            confirmDeleteBtn.addEventListener(
                'click',
                function(){

                    if(currentDeleteForm){

                        this.innerHTML =
                            `
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            Menghapus...
                            `;

                        this.disabled = true;

                        currentDeleteForm.submit();

                    }

                }
            );

        }

    }
);

// =====================================
// CLOSE BACKDROP
// =====================================

document.addEventListener(
    'DOMContentLoaded',
    function(){

        const modal =
            document.getElementById('imageModal');

        if(modal){

            modal.addEventListener(
                'click',
                function(e){

                    if(e.target.id === 'imageModal'){

                        closeImageModal();

                    }

                }
            );

        }

    }
);

</script>
{{-- IMAGE MODAL --}}
<div class="image-modal"
     id="imageModal">

    <span class="close-btn"
          onclick="closeImageModal()">

        <i class="bi bi-x-lg"></i>

    </span>

    <img src=""
         id="modalImage">

</div>
{{-- =========================================
     DELETE CONFIRM MODAL
========================================= --}}

<div class="delete-modal-overlay"
     id="deleteModal">

    <div class="delete-modal-card">

        {{-- ICON --}}
        <div class="delete-icon">

            <i class="bi bi-trash3-fill"></i>

        </div>

        {{-- TITLE --}}
        <h4 class="fw-bold mb-2">

            {{ __('Hapus Data?') }}

        </h4>

        {{-- MESSAGE --}}
        <p class="text-muted mb-4">

            {{ __('Data yang dihapus tidak dapat dikembalikan.') }}

        </p>

        {{-- BUTTONS --}}
        <div class="d-flex gap-2">

            {{-- CANCEL --}}
            <button class="btn btn-light border flex-fill rounded-pill fw-semibold py-2"
                    onclick="closeDeleteModal()">

                {{ __('Tidak') }}

            </button>

            {{-- CONFIRM --}}
            <button class="btn btn-warning flex-fill rounded-pill fw-bold py-2"
                    id="confirmDeleteBtn">

                {{ __('Ya, Hapus') }}

            </button>

        </div>

    </div>

</div>
@endsection