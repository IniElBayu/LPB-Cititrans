@extends('layouts.app2')

@section('content')

<style>
    /* ===== HEADER ===== */
    .page-title { font-size: 1.85rem; letter-spacing: -.5px; }

    /* ===== FILTER CARD ===== */
    .filter-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(0,0,0,.05);
        border: none;
        padding: 16px 20px;
    }

    /* ===== TABLE ===== */
    .table thead th {
        background: #111827;
        color: #fff;
        font-size: .75rem;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 14px 16px;
        border: none;
        white-space: nowrap;
    }
    .table tbody td {
        vertical-align: middle;
        border-color: #f3f4f6;
        padding: 12px 16px;
        font-size: .875rem;
    }
    .table tbody tr:hover { background: #fffbea; }

    /* ===== FOTO BARANG ===== */
/* ===== FOTO BARANG ===== */

.img-table {

    width: 56px;

    height: 56px;

    object-fit: cover;

    border-radius: 10px;

    box-shadow: 0 2px 8px rgba(0,0,0,.08);

    border: 2px solid #f0f0f0;

}

/* ===== IMAGE ZOOM ===== */

.zoom-image {

    cursor: zoom-in;

    transition: all .25s ease;

}

.zoom-image:hover {

    transform: scale(1.08);

    box-shadow: 0 6px 20px rgba(0,0,0,.18);

}

/* ===== IMAGE MODAL ===== */

.image-modal {

    position: fixed;

    inset: 0;

    background: rgba(0,0,0,.82);

    display: none;

    align-items: center;

    justify-content: center;

    z-index: 999999;

    padding: 20px;

    backdrop-filter: blur(4px);

}

.image-modal img {

    max-width: 90%;

    max-height: 90vh;

    border-radius: 16px;

    box-shadow: 0 10px 40px rgba(0,0,0,.35);

    animation: zoomFade .25s ease;

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

    top: 20px;

    right: 25px;

    color: #fff;

    font-size: 2rem;

    cursor: pointer;

    transition: .2s ease;

}

.image-modal .close-btn:hover {

    transform: scale(1.1);

    color: #FDB813;

}

    /* ===== BADGE KATEGORI ===== */
    .badge-kategori {
        display: inline-block;
        background: #fff8e5;
        color: #a87800;
        border: 1px solid #f3d37c;
        font-weight: 600;
        font-size: .72rem;
        border-radius: 50px;
        padding: 4px 12px;
        letter-spacing: .3px;
    }

    /* ===== BADGE STATUS ===== */
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #FDB813;
        color: #000;
        font-weight: 700;
        font-size: .78rem;
        border-radius: 50px;
        padding: 5px 14px;
        letter-spacing: .3px;
        box-shadow: 0 2px 8px rgba(253,184,19,.25);
    }
    /* =========================================
   MOBILE STATUS BADGE
========================================= */

@media (max-width: 768px){

    .badge-status{

        font-size: .62rem !important;

        padding: 4px 8px !important;

        border-radius: 999px;

        gap: 4px;

        font-weight: 700;

        white-space: nowrap;

    }

    .badge-status .spinner-grow{

        width: 5px !important;

        height: 5px !important;

    }

}
    .badge-status.status-claimed  { background: #d1fae5; color: #065f46; }
    .badge-status.status-hangus   { background: #fee2e2; color: #991b1b; }

    /* ===== PULSE ANIMASI ===== */
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50%       { opacity: .5; }
    }
    .animate-pulse { animation: pulse 1.5s infinite; }

    /* ===== PAGINATION ===== */
    .pagination .page-link {
        color: #555;
        border: 1px solid #e5e7eb;
        border-radius: 8px !important;
        margin: 0 2px;
        font-size: .82rem;
        transition: all .2s;
    }
    .pagination .page-item.active .page-link {
        background: #FDB813 !important;
        border-color: #FDB813 !important;
        color: #000 !important;
        font-weight: 700;
        box-shadow: 0 4px 14px rgba(253,184,19,.30);
    }
    .pagination .page-item.disabled .page-link { color: #ccc; background: #f9fafb; }
    .pagination .page-link:hover:not(.disabled) {
        background: rgba(253,184,19,.12);
        border-color: #FDB813;
        color: #111;
    }

    /* ===== RESPONSIVE TABLE ===== */
    @media (max-width: 768px) {
        .table thead th,
        .table tbody td { font-size: .75rem; padding: 10px 10px; }
        .img-table { width: 44px; height: 44px; }
        .page-title { font-size: 1.4rem; }
    }
</style>

{{-- ====== PAGE HEADER — judul + multilanguage + jam live ====== --}}
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 border-bottom pb-3 gap-2">

    {{-- Judul --}}
    <div>
        <h2 class="fw-bold mb-0 page-title">
            Data Lost &amp; <span style="color:#FDB813;">Found</span>
        </h2>
        <p class="text-muted small mb-0">{{ __('Monitoring seluruh laporan Lost & Found sistem.') }}</p>
    </div>

    {{-- Kanan: bahasa + jam --}}
    <div class="d-flex align-items-center gap-2 mt-2 mt-md-0 flex-wrap">

        {{-- Dropdown Bahasa --}}
        <div class="dropdown">
            <button class="btn btn-light btn-sm border shadow-sm px-3 d-flex align-items-center dropdown-toggle"
                    type="button" data-bs-toggle="dropdown"
                    style="border-radius:8px; height:38px;">
                <img src="https://flagcdn.com/w20/{{ app()->getLocale() == 'id' ? 'id' : 'gb' }}.png"
                     width="20" class="me-2 rounded-1">
                <span class="fw-bold">{{ strtoupper(app()->getLocale()) }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                <li>
                    <a class="dropdown-item d-flex align-items-center"
                       href="{{ route('lang.switch', 'id') }}">
                        <img src="https://flagcdn.com/w20/id.png" width="20" class="me-2"> Indonesia
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center"
                       href="{{ route('lang.switch', 'en') }}">
                        <img src="https://flagcdn.com/w20/gb.png" width="20" class="me-2"> English
                    </a>
                </li>
            </ul>
        </div>

        {{-- Jam Live --}}
        <div class="d-flex align-items-center shadow-sm px-3"
             style="background-color:#FDB813; color:#000; border-radius:8px; height:38px;">
            <span id="live-clock" class="fw-bold small">
                {{ date('d M Y | H:i:s') }}
            </span>
        </div>

    </div>
</div>

{{-- ====== FILTER CARD ====== --}}
{{-- ====== FILTER CARD ====== --}}
<div class="filter-card mb-4">

    <form method="GET"
          action="{{ route('management.list') }}">

        <div class="row g-2 align-items-center">

            {{-- SEARCH --}}
            <div class="col-12 col-md-4">

                <div class="input-group input-group-sm">

                    <span class="input-group-text
                                 bg-white
                                 border-end-0"
                          style="
                                border-radius:
                                10px 0 0 10px;
                          ">

                        <i class="bi bi-search text-muted"></i>

                    </span>

                    <input type="text"
                           name="search"
                           class="form-control border-start-0"
                           placeholder="{{ __('Cari nama barang...') }}"
                           value="{{ request('search') }}"
                           autocomplete="off"
                           style="
                                border-radius:
                                0 10px 10px 0;
                           ">

                </div>

            </div>

            {{-- KATEGORI --}}
            <div class="col-12 col-sm-6 col-md-3">

                <select name="kategori"
                        class="form-select form-select-sm shadow-none"
                        style="border-radius:10px;">

                    <option value="">

                        {{ __('Semua Kategori') }}

                    </option>

                    <option value="Elektronik"
                        {{ request('kategori') == 'Elektronik'
                            ? 'selected'
                            : '' }}>

                        {{ __('Elektronik') }}

                    </option>

                    <option value="Dokumen"
                        {{ request('kategori') == 'Dokumen'
                            ? 'selected'
                            : '' }}>

                        {{ __('Dokumen') }}

                    </option>

                    <option value="Pakaian"
                        {{ request('kategori') == 'Pakaian'
                            ? 'selected'
                            : '' }}>

                        {{ __('Pakaian') }}

                    </option>

                    <option value="Lainnya"
                        {{ request('kategori') == 'Lainnya'
                            ? 'selected'
                            : '' }}>

                        {{ __('Lainnya') }}

                    </option>

                </select>

            </div>

            {{-- STATUS --}}
            <div class="col-12 col-sm-6 col-md-3">

                <select name="status"
                        class="form-select form-select-sm shadow-none"
                        style="border-radius:10px;">

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

                    <option value="hangus"
                        {{ request('status') == 'hangus'
                            ? 'selected'
                            : '' }}>

                        🔴 {{ __('Hangus') }}

                    </option>

                </select>

            </div>

            {{-- ACTION BUTTON --}}
            <div class="col-12 col-md-2">

                <div class="d-flex gap-2">

                    {{-- FILTER --}}
                    <button type="submit"
                            class="btn btn-warning
                                   btn-sm
                                   w-100
                                   fw-bold
                                   text-black
                                   shadow-sm"
                            style="
                                border-radius:10px;
                                height:38px;
                            ">

                        <i class="bi bi-funnel me-1"></i>

                        {{ __('Filter') }}

                    </button>

                    {{-- RESET --}}
                    <a href="{{ route('management.list') }}"
                       class="btn btn-sm
                              fw-bold
                              text-dark
                              shadow-sm"
                       style="
                            background:#FDB813;
                            border:1px solid #e0a40d;
                            border-radius:10px;
                            height:38px;
                            min-width:42px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                       ">

                        <i class="bi bi-arrow-clockwise"></i>

                    </a>

                </div>

            </div>

        </div>

    </form>

</div>
{{-- ====== TABLE CARD ====== --}}
<div class="modern-card overflow-hidden mb-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle text-center mb-0">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-start">{{ __('Nama Barang') }}</th>
                    <th>{{ __('Kategori') }}</th>
                    <th>{{ __('Tanggal') }}</th>
                    <th class="text-start">{{ __('Lokasi') }}</th>
                    <th>{{ __('Pelapor') }}</th>
                    <th>Foto</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $index => $item)
                    @php
                        $statusClass = match($item->status) {
                            'claimed' => 'status-claimed',
                            'hangus'  => 'status-hangus',
                            default   => ''
                        };
                        $statusText = match($item->status) {
                            'diproses' => __('Diproses'),
                            'claimed'  => __('Diambil'),
                            'hangus'   => __('Hangus'),
                            default    => ucfirst($item->status)
                        };
                        $isPulse = $item->status === 'diproses';
                    @endphp
                    <tr>
                        {{-- No --}}
                        <td class="fw-semibold text-muted" style="width:50px;">
                            {{ $reports->firstItem() + $index }}
                        </td>

                        {{-- Nama Barang --}}
                        <td class="text-start fw-semibold text-dark">
                            {{ $item->nama_barang }}
                        </td>

                        {{-- Kategori --}}
                        <td>
                            <span class="badge-kategori">{{ __($item->kategori) }}</span>
                        </td>

                        {{-- Tanggal --}}
                        <td class="text-muted small text-nowrap">
                            {{ \Carbon\Carbon::parse($item->tanggal_laporan)->format('d M Y') }}
                        </td>

                        {{-- Lokasi --}}
                        <td class="text-start small text-truncate" style="max-width:160px;">
                            {{ $item->lokasi_ditemukan }}
                        </td>

                        {{-- Pelapor --}}
                        <td class="small">{{ $item->nama_pelapor }}</td>

                        {{-- Foto --}}
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

                        {{-- Status --}}
                        <td>
                            <span class="badge-status {{ $statusClass }} {{ $isPulse ? 'animate-pulse' : '' }}">
                                @if($isPulse)
                                    <span class="spinner-grow spinner-grow-sm"
                                          style="width:7px;height:7px;" role="status"></span>
                                @endif
                                {{ $statusText }}
                            </span>
                        </td>
                    </tr>
                @endforeach

                @if($reports->isEmpty())
                    <tr>
                        <td colspan="8" class="py-5 text-center text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                            {{ __('Data tidak ditemukan atau belum ada laporan.') }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

{{-- ====== PAGINATION ====== --}}
@if($reports->count() > 0)
<div class="d-flex flex-column align-items-center pb-4 gap-2">

    {{-- Info halaman --}}
    <p class="text-muted mb-0" style="font-size:.82rem;">
        {{ __('Menampilkan halaman') }}
        <strong>{{ $reports->currentPage() }}</strong>
        {{ __('dari') }}
        <strong>{{ $reports->lastPage() }}</strong>
    </p>

    {{-- Tombol pagination --}}
    <nav>
        <ul class="pagination justify-content-center mb-0">

            {{-- Prev --}}
            @if($reports->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $reports->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Nomor halaman (blok 5) --}}
            @php
                $block     = ceil($reports->currentPage() / 5);
                $startPage = ($block - 1) * 5 + 1;
                $endPage   = min($startPage + 4, $reports->lastPage());
            @endphp

            @for($i = $startPage; $i <= $endPage; $i++)
                <li class="page-item {{ $reports->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $reports->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- Next --}}
            @if($reports->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $reports->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif

        </ul>
    </nav>
    <br>
    {{-- Total entri --}}
    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill shadow-sm"
          style="font-size:.75rem;">
        <i class="bi bi-layers me-1 text-warning"></i>
        {{ __('Total') }}: <strong class="ms-1">{{ $reports->total() }}</strong> {{ __('Entri') }}
    </span>

</div>
@endif

{{-- Script jam live --}}
<script>
    (function () {
        const el = document.getElementById('live-clock');
        if (!el) return;
        const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        function tick() {
            const now = new Date();
            const dd  = String(now.getDate()).padStart(2,'0');
            const mm  = months[now.getMonth()];
            const yy  = now.getFullYear();
            const hh  = String(now.getHours()).padStart(2,'0');
            const mi  = String(now.getMinutes()).padStart(2,'0');
            const ss  = String(now.getSeconds()).padStart(2,'0');
            el.textContent = `${dd} ${mm} ${yy} | ${hh}:${mi}:${ss}`;
        }
        tick();
        setInterval(tick, 1000);
    })();

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
@endsection