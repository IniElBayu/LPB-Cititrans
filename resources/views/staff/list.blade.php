@extends('layouts.app3')

@section('content')

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

<title>CS Portal — Barang Lost & Found</title>

<style>
    /* ===== ROOT VARIABLES ===== */
    :root {
        --gold:        #FDB813;
        --gold-dark:   #e0a800;
        --gold-light:  #fff8e1;
        --gold-glow:   0 4px 16px rgba(253,184,19,.40);
        --dark:        #1a1d23;
        --text-muted:  #6b7280;
        --border:      #e9ecef;
        --radius-sm:   8px;
        --radius-md:   12px;
        --radius-lg:   20px;
        --shadow-sm:   0 2px 8px rgba(0,0,0,.06);
        --shadow-md:   0 4px 20px rgba(0,0,0,.08);
        --shadow-gold: 0 4px 16px rgba(253,184,19,.35);
    }

    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    /* ===== LAYOUT ===== */
    .page-wrapper {
        padding: 28px 24px 100px;
        min-height: 100vh;
        background: #f5f6fa;
    }
    @media (max-width: 768px) {
        .page-wrapper { padding: 80px 16px 100px; }
    }

    /* ===== PAGE HEADER ===== */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 24px;
        padding-bottom: 20px;
        border-bottom: 2px solid var(--border);
    }
    .page-header p {
        font-size: 0.82rem;
        color: var(--text-muted);
        margin: 2px 0 0;
    }

    /* ===== HEADER CONTROLS ===== */
.header-controls {

    display: flex;

    align-items: center;

    gap: 8px;

    flex-wrap: wrap;

}

@media (max-width:768px){

    .header-controls{

        width:100%;

        justify-content:space-between;

    }

}

    /* Language Dropdown */
    /* =========================================
   LANGUAGE DROPDOWN
========================================= */

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

    /* Live Clock */
    .live-clock {
        height: 38px;
        padding: 0 16px;
        border-radius: var(--radius-sm);
        background: var(--gold);
        color: var(--dark);
        font-weight: 700;
        font-size: 0.82rem;
        display: flex; align-items: center; gap: 6px;
        box-shadow: var(--shadow-gold);
        white-space: nowrap;
    }

    /* ===== TOOLBAR ===== */
    .toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 16px;
    }

    /* Search input */
    .search-group {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        padding: 6px 10px;
        box-shadow: var(--shadow-sm);
        min-width: 260px;
        transition: border-color .2s;
    }
    .search-group:focus-within { border-color: var(--gold); }
    .search-group .bi-search { color: var(--text-muted); font-size: .9rem; }
    .search-group input {
        border: none; outline: none;
        background: transparent;
        font-size: 0.85rem;
        width: 100%;
        color: var(--dark);
    }
    .btn-search {
        height: 32px;
        padding: 0 14px;
        border-radius: 6px;
        background: var(--gold);
        color: var(--dark);
        border: none;
        font-weight: 700;
        font-size: 0.8rem;
        transition: all .2s;
        white-space: nowrap;
    }
    .btn-search:hover { background: var(--gold-dark); }
    .btn-reset {
        height: 32px;
        padding: 0 10px;
        border-radius: 6px;
        border: 1px solid var(--border);
        background: #fff;
        color: var(--text-muted);
        font-size: 0.8rem;
        transition: all .2s;
    }
    .btn-reset:hover { border-color: #dc3545; color: #dc3545; }

    /* Stats pill */
    .stats-pill {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 50px;
        padding: 5px 14px;
        font-size: 0.78rem;
        font-weight: 600;
        color: var(--text-muted);
        box-shadow: var(--shadow-sm);
    }
    .stats-pill strong { color: var(--dark); }

    /* ===== ALERT ===== */
    .alert-success-custom {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: var(--radius-md);
        background: #ecfdf5;
        border: 1px solid #6ee7b7;
        color: #065f46;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 16px;
        animation: slideDown .3s ease;
    }
    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-8px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ===== TABLE CARD ===== */
    .table-card {
        background: #fff;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        overflow: hidden;
    }
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    .table { margin: 0; font-size: 0.875rem; }
    .table thead tr { background: var(--dark); }
    .table thead th {
        color: #fff;
        font-weight: 700;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: .6px;
        padding: 14px 16px;
        white-space: nowrap;
        border: none;
    }
    .table tbody tr {
        border-bottom: 1px solid #f1f3f5;
        transition: background .15s;
    }
    .table tbody tr:last-child { border-bottom: none; }
    .table tbody tr:hover { background: #fffdf5; }
    .table td { padding: 14px 16px; border: none; vertical-align: middle; }

    /* ===== TABLE CELLS ===== */
    .no-cell { color: var(--text-muted); font-size: 0.8rem; font-weight: 600; }
    .item-name { font-weight: 700; color: var(--dark); font-size: 0.875rem; }

    .badge-kategori {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 50px;
        background: var(--gold-light);
        color: #92650a;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: .3px;
    }

    .penemu-name { color: var(--dark); font-weight: 500; }
    .lokasi-text {
        color: var(--text-muted);
        font-size: 0.8rem;
        max-width: 150px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .waktu-date { font-weight: 700; color: var(--dark); font-size: 0.82rem; }
    .waktu-time { color: var(--text-muted); font-size: 0.75rem; }

    /* ===== STATUS DROPDOWN ===== */
    .status-btn {
        border: none;
        border-radius: 50px;
        padding: 5px 14px;
        font-size: 0.75rem;
        font-weight: 700;
        min-width: 110px;
        transition: all .2s;
        cursor: pointer;
    }
    .status-btn:hover { opacity: .85; transform: translateY(-1px); }
    .status-diproses  { background: #dbeafe; color: #1d4ed8; }
    .status-claimed   { background: #d1fae5; color: #065f46; }
    .status-hilang    { background: #fee2e2; color: #991b1b; }
    .status-default   { background: var(--gold-light); color: #92650a; }

    @keyframes pulse-status {
        0%, 100% { opacity: 1; }
        50%       { opacity: .6; }
    }
    .animate-pulse { animation: pulse-status 1.6s ease-in-out infinite; }

    .status-dropdown-menu {
        border: none;
        border-radius: var(--radius-md);
        box-shadow: 0 8px 30px rgba(0,0,0,.12);
        padding: 6px;
        min-width: 170px;
    }
    .status-dropdown-menu .dropdown-item {
        border-radius: var(--radius-sm);
        font-size: 0.82rem;
        font-weight: 600;
        padding: 8px 12px;
        transition: background .15s;
    }
    .status-dropdown-menu .dropdown-item:hover { background: var(--gold-light); }

    /* =========================================
   FOTO TABLE
========================================= */

.img-table {

    width: 54px;

    height: 54px;

    object-fit: cover;

    border-radius: 14px;

    border: 2px solid #f3f4f6;

    box-shadow: 0 4px 14px rgba(0,0,0,.08);

    transition: all .25s ease;

}

/* =========================================
   IMAGE ZOOM
========================================= */

.zoom-image {

    cursor: zoom-in;

}

.zoom-image:hover {

    transform: scale(1.08);

    border-color: var(--gold);

    box-shadow: 0 10px 28px rgba(0,0,0,.18);

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

    color: var(--gold);

}

/* =========================================
   FILE SIZE
========================================= */

.file-size {

    font-size: .70rem;

    color: var(--text-muted);

    margin-top: 4px;

    font-weight: 600;

}
    /* ===================================================
       ACTION BUTTONS — Semua kuning emas Cititrans
    =================================================== */
    .action-group {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    /* Base tombol aksi */
    .btn-act {
        width: 34px; height: 34px;
        display: inline-flex; align-items: center; justify-content: center;
        border-radius: var(--radius-sm);
        border: 1px solid var(--gold-dark);
        font-size: 0.88rem;
        cursor: pointer;
        text-decoration: none;
        transition: background .2s, transform .2s, box-shadow .2s;

        /* DEFAULT: background kuning emas solid */
        background: var(--gold);
        color: #000 !important;
    }
    .btn-act:hover {
        background: var(--gold-dark);
        color: #000 !important;
        transform: translateY(-3px);
        box-shadow: var(--shadow-gold);
        border-color: #b8860b;
    }
    .btn-act:active {
        transform: translateY(0);
        box-shadow: none;
    }

    /* Tombol hapus: base tetap emas, hover cukup lebih gelap */
    .btn-act-delete {
        background: var(--gold);
        border-color: var(--gold-dark);
        color: #000 !important;
    }
    .btn-act-delete:hover {
        background: #dc3545;
        border-color: #c82333;
        color: #fff !important;
        box-shadow: 0 4px 12px rgba(220,53,69,.35);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        padding: 60px 20px;
        text-align: center;
        color: var(--text-muted);
    }
    .empty-state i { font-size: 3rem; opacity: .25; margin-bottom: 12px; display: block; }
    .empty-state p { font-size: 0.875rem; }

    /* ===== PAGINATION ===== */
    .pagination-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        padding: 20px 24px;
        border-top: 1px solid var(--border);
    }
    .page-info { font-size: 0.8rem; color: var(--text-muted); }
    .page-info strong { color: var(--dark); }

    .pagination { gap: 4px; margin: 0; }
    .page-item .page-link {
        width: 36px; height: 36px;
        display: flex; align-items: center; justify-content: center;
        border-radius: var(--radius-sm) !important;
        border: 1px solid var(--border);
        color: var(--dark);
        font-weight: 600;
        font-size: 0.82rem;
        transition: all .2s;
        padding: 0;
    }
    .page-item .page-link:hover     { background: var(--gold-light); border-color: var(--gold); color: var(--dark); }
    .page-item.active .page-link    { background: var(--gold) !important; border-color: var(--gold) !important; color: var(--dark) !important; box-shadow: var(--shadow-gold); }
    .page-item.disabled .page-link  { background: #f9fafb; color: #d1d5db; }

    .total-badge {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 5px 14px;
        border-radius: 50px;
        border: 1px solid var(--border);
        background: #fff;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--text-muted);
        box-shadow: var(--shadow-sm);
    }
    .total-badge strong { color: var(--dark); }
   /* ===== FIX DROPDOWN MOBILE ===== */
@media (max-width: 768px) {

    .table-responsive {

        overflow-x: auto !important;
        overflow-y: visible !important;
        padding-bottom: 120px;

    }

    .dropdown {

        position: static !important;

    }

    .status-dropdown-menu {

        position: absolute !important;
        z-index: 99999 !important;

    }
.dropdown-menu.show {

    display: block !important;
    animation: fadeDown .15s ease;

}
.dropdown-menu {

    z-index: 999999 !important;

}

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

}

.delete-modal-card{

    width:100%;

    max-width:430px;

    background:#fff;

    border-radius:34px;

    padding:42px 30px;

    text-align:center;

    box-shadow:
        0 20px 60px rgba(0,0,0,.18);

    animation:popupScale .28s ease;

}

.delete-icon{

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

.delete-desc{

    color:#9b9b9b;

    font-size:1rem;

    line-height:1.7;

    margin-bottom:28px;

}

.delete-actions{

    display:flex;

    gap:12px;

}

.delete-actions button{

    flex:1;

    height:52px;

    border:none;

    border-radius:50px;

    font-weight:700;

    transition:.25s ease;

}

.btn-cancel-delete{

    background:#f3f4f6;

    color:#111;

}

.btn-cancel-delete:hover{

    background:#e5e7eb;

}

.btn-confirm-delete{

    background:#FDB813;

    color:#000;

}

.btn-confirm-delete:hover{

    background:#ffcc33;

    transform:translateY(-2px);

}    
</style>

{{-- ===== PAGE WRAPPER ===== --}}
<div class="container-fluid py-4">

    {{-- ===== PAGE HEADER ===== --}}
    <div class="page-header">
        <div>
            <h1 class="fw-bold mb-0" style="letter-spacing: -1px;">{{ __('Barang Lost & Found') }}</h1>
            <p>{{ __('Kelola laporan barang temuan yang masuk') }}</p>
        </div>

        <div class="header-controls">
            {{-- Language Switcher --}}
            <div class="lang-wrapper" id="langWrapper">
                <div class="lang-btn" id="langBtn" onclick="toggleLangMenu()">
                    <img src="https://flagcdn.com/w20/{{ app()->getLocale() == 'id' ? 'id' : 'gb' }}.png"
                         width="18" class="rounded-1"
                         onerror="this.style.display='none'">
                    <span>{{ strtoupper(app()->getLocale()) }}</span>
                    <i class="bi bi-chevron-down chevron"></i>
                </div>
                <div class="lang-menu" id="langMenu">
                    <a href="{{ route('lang.switch', 'id') }}"
                       class="{{ app()->getLocale() == 'id' ? 'active-lang' : '' }}">
                        <img src="https://flagcdn.com/w20/id.png" width="18" class="rounded-1"> Indonesia
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}"
                       class="{{ app()->getLocale() == 'en' ? 'active-lang' : '' }}">
                        <img src="https://flagcdn.com/w20/gb.png" width="18" class="rounded-1"> English
                    </a>
                </div>
            </div>

            {{-- Live Clock --}}
            <div class="live-clock">
                <i class="bi bi-clock"></i>
                <span id="live-clock">{{ date('d M Y | H:i:s') }}</span>
            </div>
        </div>
    </div>

    {{-- ===== SUCCESS ALERT ===== --}}
    @if(session('success'))
        <div class="alert-success-custom" id="successAlert">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- ===== TOOLBAR ===== --}}
    <div class="toolbar">
        {{-- Search Form --}}
       <form method="GET"
      action="{{ route('staff.list') }}"
      class="d-flex align-items-center gap-2 flex-wrap">

    {{-- SEARCH --}}
    <div class="search-group">

        <i class="bi bi-search"></i>

        <input type="text"
               name="search"
               placeholder="{{ __('Cari nama barang...') }}"
               value="{{ request('search') }}"
               autocomplete="off">

    </div>

    {{-- FILTER STATUS --}}
    <select name="status"
            class="form-select shadow-sm border-0"
            style="
                height:44px;
                min-width:50px;
                border-radius:10px;
                font-size:.82rem;
                font-weight:600;
            ">

        <option value="">

            {{ __('Semua Status') }}

        </option>

        <option value="diproses"
            {{ request('status') == 'diproses'
                ? 'selected'
                : '' }}>

            🔵 {{ __('Diproses') }}

        </option>

        <option value="claimed"
            {{ request('status') == 'claimed'
                ? 'selected'
                : '' }}>

            🟢 {{ __('Diambil') }}

        </option>

        <option value="hilang"
            {{ request('status') == 'hilang'
                ? 'selected'
                : '' }}>

            🔴 {{ __('Hangus') }}

        </option>

    </select>

    {{-- BUTTON SEARCH --}}
    <button type="submit"
            class="btn-search">

        <i class="bi bi-funnel me-1"></i>

        {{ __('Filter') }}

    </button>

    {{-- RESET --}}
    @if(request('search') || request('status'))

        <a href="{{ route('staff.list') }}"
           class="btn-reset">

            <i class="bi bi-arrow-clockwise"></i>

        </a>

    @endif

</form>

        {{-- Stats --}}
        <div class="stats-pill">
            <i class="bi bi-layers text-warning"></i>
            {{ __('Total') }}: <strong>{{ $reports->total() }}</strong> {{ __('Entri') }}
        </div>
    </div>

    {{-- ===== TABLE CARD ===== --}}
    <div class="table-card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:50px;">{{ __('No') }}</th>
                        <th>{{ __('Nama Barang') }}</th>
                        <th class="text-center">{{ __('Kategori') }}</th>
                        <th class="text-center d-none d-md-table-cell">{{ __('Nama Penemu') }}</th>
                        <th class="text-center">{{ __('Lokasi / Unit') }}</th>
                        <th class="text-center">{{ __('Waktu Input') }}</th>
                        <th class="text-center">{{ __('Status') }}</th>
                        <th class="text-center" style="width:70px;">{{ __('Foto') }}</th>
                        <th class="text-center" style="width:120px;">{{ __('Aksi') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $i => $item)
                    <tr>
                        {{-- No --}}
                        <td class="ps-4">
                            <span class="no-cell">
                                {{ ($reports->currentPage() - 1) * $reports->perPage() + $i + 1 }}
                            </span>
                        </td>

                        {{-- Nama Barang --}}
                        <td>
                            <span class="item-name">{{ $item->nama_barang }}</span>
                        </td>

                        {{-- Kategori --}}
                        <td class="text-center">
                            <span class="badge-kategori">{{ __($item->kategori) }}</span>
                        </td>

                        {{-- Nama Penemu --}}
                        <td class="text-center d-none d-md-table-cell">
                            <span class="penemu-name">{{ $item->cs_name }}</span>
                        </td>

                        {{-- Lokasi --}}
                        <td class="text-center">
                            <span class="lokasi-text" title="{{ $item->lokasi_ditemukan }}">
                                {{ $item->lokasi_ditemukan }}
                            </span>
                        </td>

                        {{-- Waktu --}}
                        <td class="text-center">
                            <div class="waktu-date">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </div>
                            <div class="waktu-time">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }} WIB
                            </div>
                        </td>

                        {{-- Status --}}
                        <td class="text-center">
                            @php
                                $statusClass = match($item->status) {
                                    'diproses' => 'status-diproses',
                                    'claimed'  => 'status-claimed',
                                    'hilang'   => 'status-hilang',
                                    default    => 'status-default',
                                };
                                $statusLabel = match($item->status) {
                                    'diproses' => '🔵 '.__('Diproses'),
                                    'claimed'  => '🟢 '.__('Diambil'),
                                    'hilang'   => '🔴 '.__('Hangus'),
                                    default    => __('Pending'),
                                };
                            @endphp
                            <div class="dropdown">
                               <button type="button"
                                    class="status-btn {{ $statusClass }} {{ $item->status == 'diproses' ? 'animate-pulse' : '' }} dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    data-bs-auto-close="true"
                                    aria-expanded="false">

                                {{ $statusLabel }}

                            </button>
                                <ul class="dropdown-menu dropdown-menu-end status-dropdown-menu">
                                    <li>
                                       <form action="{{ route('reports.updateStatus', $item->id) }}"
                                        method="POST"
                                        onsubmit="showLoading()">
                                            @csrf
                                            <input type="hidden" name="status" value="diproses">
                                            <button class="dropdown-item" type="submit">
                                                🔵 {{ __('Set Diproses') }}
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                    <form action="{{ route('reports.updateStatus', $item->id) }}"
                                        method="POST"
                                        onsubmit="showLoading()">
                                            @csrf
                                            <input type="hidden" name="status" value="claimed">
                                            <button class="dropdown-item" type="submit">
                                                🟢 {{ __('Set Diambil') }}
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                     <form action="{{ route('reports.updateStatus', $item->id) }}"
                                    method="POST"
                                    onsubmit="showLoading()">
                                            @csrf
                                            <input type="hidden" name="status" value="hilang">
                                            <button class="dropdown-item" type="submit">
                                                🔴 {{ __('Set Hangus') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>

                        {{-- Foto --}}
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


                        {{-- Aksi — semua tombol kuning emas Cititrans --}}
                        <td class="text-center">
                            <div class="action-group">

                                {{-- Edit --}}
                                <a href="{{ route('staff.edit', $item->id) }}"
                                   class="btn-act"
                                   title="{{ __('Edit') }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                {{-- Hapus --}}
<form action="{{ route('staff.destroy', $item->id) }}"
      method="POST"
      class="m-0 p-0 deleteForm">

    @csrf
    @method('DELETE')

    <button type="button"
            class="btn-act btn-act-delete deleteBtn"
            title="{{ __('Hapus') }}">

        <i class="bi bi-trash"></i>

    </button>

</form>

                                {{-- Cetak --}}
                                <a href="{{ route('report.print', $item->id) }}"
                                   target="_blank"
                                   class="btn-act"
                                   title="{{ __('Cetak') }}">
                                    <i class="bi bi-printer"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">
                            <div class="empty-state">
                                <i class="bi bi-clipboard-x"></i>
                               <h6 class="fw-bold text-dark mb-2">
                            Belum Ada Data
                        </h6>

                        <p class="text-muted mb-0">
                            Belum ada laporan barang yang tersedia saat ini.
                        </p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ===== PAGINATION ===== --}}
        <div class="pagination-wrapper">
            <p class="page-info">
                {{ __('Halaman') }} <strong>{{ $reports->currentPage() }}</strong>
                {{ __('dari') }} <strong>{{ $reports->lastPage() }}</strong>
            </p>

            <nav>
                <ul class="pagination justify-content-center">
                    {{-- Previous --}}
                    @if ($reports->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link"><i class="bi bi-chevron-left" style="font-size:.75rem;"></i></span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $reports->previousPageUrl() }}" rel="prev">
                                <i class="bi bi-chevron-left" style="font-size:.75rem;"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Page Numbers --}}
                    @php
                        $currentBlock = ceil($reports->currentPage() / 5);
                        $startPage    = ($currentBlock - 1) * 5 + 1;
                        $endPage      = min($startPage + 4, $reports->lastPage());
                    @endphp
                    @for ($p = $startPage; $p <= $endPage; $p++)
                        <li class="page-item {{ $reports->currentPage() == $p ? 'active' : '' }}">
                            <a class="page-link" href="{{ $reports->url($p) }}">{{ $p }}</a>
                        </li>
                    @endfor

                    {{-- Next --}}
                    @if ($reports->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $reports->nextPageUrl() }}" rel="next">
                                <i class="bi bi-chevron-right" style="font-size:.75rem;"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link"><i class="bi bi-chevron-right" style="font-size:.75rem;"></i></span>
                        </li>
                    @endif
                </ul>
            </nav>

            <div class="total-badge">
                <i class="bi bi-layers text-warning"></i>
                {{ __('Total') }}: <strong>{{ $reports->total() }}</strong> {{ __('Entri') }}
            </div>
        </div>
    </div>

</div>{{-- end page-wrapper --}}

{{--
    ===== SCRIPTS =====
    Bootstrap bundle dimuat SEKALI (sudah include Popper).
    Jangan muat popper.min.js + bootstrap.min.js terpisah.
--}}

<script src="{{ asset('assets/js/theme.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── 1. Inisialisasi Bootstrap Dropdown untuk semua tombol status ──
   
    // ── 2. Scroll ke tabel jika ada parameter search di URL ──
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('search')) {

        const tableEl = document.querySelector('.table-card');

        if (tableEl) {

            tableEl.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });

        }

    }

    // ── 3. Auto-hide success alert smooth ──
    const alertEl = document.getElementById('successAlert');

    if (alertEl) {

        setTimeout(function () {

            alertEl.style.transition = 'all .3s ease';

            alertEl.style.opacity = '0';

            alertEl.style.transform = 'translateY(-10px)';

            setTimeout(() => {

                alertEl.remove();

            }, 300);

        }, 3500);

    }

});

// ── Language Dropdown ──
function toggleLangMenu() {
    const btn  = document.getElementById('langBtn');
    const menu = document.getElementById('langMenu');
    if (!btn || !menu) return;
    const isOpen = menu.classList.contains('open');
    menu.classList.toggle('open', !isOpen);
    btn.classList.toggle('open', !isOpen);
}

document.addEventListener('click', function (e) {
    const wrapper = document.getElementById('langWrapper');
    if (wrapper && !wrapper.contains(e.target)) {
        document.getElementById('langMenu')?.classList.remove('open');
        document.getElementById('langBtn')?.classList.remove('open');
    }
});

// ── Live Clock ──
// Catatan: live-clock di halaman ini diperbarui oleh navbar.blade.php juga.
// Fungsi ini sebagai fallback jika navbar tidak memuatnya.
(function () {
    function updateClock() {
        const el = document.getElementById('live-clock');
        if (!el) return;
        const now = new Date();
        const d   = String(now.getDate()).padStart(2, '0');
        const m   = now.toLocaleString('id-ID', { month: 'short' });
        const y   = now.getFullYear();
        const hh  = String(now.getHours()).padStart(2, '0');
        const mm  = String(now.getMinutes()).padStart(2, '0');
        const ss  = String(now.getSeconds()).padStart(2, '0');
        el.textContent = `${d} ${m} ${y} | ${hh}:${mm}:${ss}`;
    }
    updateClock();
    setInterval(updateClock, 1000);
})();

// LOADING OVERLAY
function showLoading() {

    const overlay = document.getElementById('loadingOverlay');

    if (overlay) {

        overlay.style.display = 'block';

    }

}
// AUTO REFRESH DATA
setInterval(() => {

    if (!document.hidden) {

        location.reload();

    }

}, 300000);

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

// =====================================
// LOAD EVENT
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

<script>

/* =========================================
   DELETE MODAL
========================================= */

document.addEventListener(
    'DOMContentLoaded',
    function(){

        let currentDeleteForm = null;

        /* OPEN */
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

                    document
                        .getElementById(
                            'deleteModal'
                        )
                        .style.display = 'flex';

                }
            );

        });

        /* CONFIRM */
        const confirmBtn =
            document.getElementById(
                'confirmDeleteBtn'
            );

        if(confirmBtn){

            confirmBtn.addEventListener(
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

/* CLOSE */
function closeDeleteModal(){

    document.getElementById(
        'deleteModal'
    ).style.display = 'none';

}

</script>
<!-- LOADING OVERLAY -->
<div id="loadingOverlay"
     style="
        display:none;
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(255,255,255,.7);
        z-index:99999;
        backdrop-filter:blur(3px);
     ">

    <div class="d-flex justify-content-center align-items-center h-100">

        <div class="text-center">

            <div class="spinner-border text-warning mb-3"
                 style="width:3rem;height:3rem;">
            </div>

            <div class="fw-bold text-dark">
                Memproses...
            </div>

        </div>

    </div>

</div>

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
     DELETE MODAL
========================================= --}}

<div class="delete-modal-overlay"
     id="deleteModal">

    <div class="delete-modal-card">

        {{-- ICON --}}
        <div class="delete-icon">

            <i class="bi bi-trash3-fill"></i>

        </div>

        {{-- TITLE --}}
        <h4 class="fw-bold mt-4 mb-2">

            {{ __('Hapus Data?') }}

        </h4>

        {{-- DESC --}}
        <p class="delete-desc">

            {{ __('Data yang dihapus tidak dapat dikembalikan.') }}

        </p>

        {{-- ACTION --}}
        <div class="delete-actions">

            <button type="button"
                    class="btn-cancel-delete"
                    onclick="closeDeleteModal()">

                {{ __('Tidak') }}

            </button>

            <button type="button"
                    class="btn-confirm-delete"
                    id="confirmDeleteBtn">

                {{ __('Ya, Hapus') }}

            </button>

        </div>

    </div>

</div>
@endsection