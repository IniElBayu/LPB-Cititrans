@extends('layouts.app')

@section('content')

<style>

/* ===== TABLE WRAPPER ===== */
.custom-table {
    padding: 10px 5px;
}

/* ===== TABLE BASE ===== */
.table-modern {
    border-collapse: separate;
    border-spacing: 0 12px;
}

.table thead {
        background: #212529;
        color: #fff;
        white-space: nowrap;
    }


/* ===== ROW STYLE ===== */
.table-modern tbody tr {
    background: #fff;
    border-radius: 14px;
    transition: all 0.25s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    overflow: hidden;
}

/* IDENTITAS (tidak ubah warna, tetap brand) */
.table-modern tbody tr {
    border-left: 4px solid #FDB813;
}

/* HOVER */
.table-modern tbody tr:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* CELL */
.table-modern td {
    border: none;
    padding: 16px 18px;
    vertical-align: middle;
}

/* ===== USER BLOCK ===== */
.user-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #FDB813;
}

/* NAME */
.user-name {
    font-size: 0.9rem;
    font-weight: 600;
}

/* ROLE */
.user-role {
    font-size: 0.7rem;
    opacity: 0.7;
}

/* ===== ACTION BADGE (tetap pakai warna kamu) ===== */
.badge {
    font-size: 0.7rem;
    letter-spacing: 0.5px;
}

/* ===== DESCRIPTION ===== */
.activity-desc {
    font-size: 0.85rem;
    line-height: 1.4;
    opacity: 0.85;
}

/* ===== TIME ===== */
.time-main {
    font-size: 0.85rem;
    font-weight: 600;
}

.time-sub {
    font-size: 0.7rem;
    opacity: 0.6;
}

/* ===== MOBILE MODE ===== */
@media (max-width: 768px) {

    .table-modern thead {
        display: none;
    }

    .table-modern tbody tr {
        display: block;
        padding: 12px;
        margin-bottom: 12px;
    }

    .table-modern td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 10px;
    }

    .table-modern td::before {
        content: attr(data-label);
        font-weight: 600;
        font-size: 0.7rem;
        color: #888;
    }
}

/* ===== GLASS EFFECT HEADER ===== */
.card-header {
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(10px);
}

/* ===== BADGE CUSTOM ===== */
.badge-create { background: #e3fcec; color: #00a86b; }
.badge-update { background: #fff4e5; color: #ff8c00; }
.badge-delete { background: #ffeaea; color: #ff4d4f; }
.badge-login  { background: #e6f0ff; color: #3b82f6; }
.badge-logout { background: #f3f4f6; color: #6b7280; }

/* ===== USER BLOCK ===== */
.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.user-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 2px solid #FDB813;
    object-fit: cover;
}

/* ===== MOBILE MODE (CARD STYLE) ===== */
@media (max-width: 768px) {

    .table-modern thead {
        display: none;
    }

    .table-modern tbody tr {
        display: block;
        margin-bottom: 15px;
        padding: 12px;
    }

    .table-modern td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 10px;
        font-size: 0.85rem;
    }

    .table-modern td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #888;
    }
}
/* GLOBAL */
body {
    background: #f8f9fa;
    font-family: 'Poppins', sans-serif;
}

/* SECTION */
.section-dashboard {
        /* Atur jarak atas (Top) */
        margin-top: 0px !important; 

        /* Atur jarak bawah (Bottom) */
        margin-bottom: 30px !important;

        /* Atau gunakan padding jika ingin jarak di dalam section */
        padding-top: 0px;
        padding-bottom: 20px;
    }
    /* Styling agar Pagination rapi dan sesuai tema Cititrans */
    .pagination-yellow .pagination {
        margin-bottom: 0;
        gap: 4px;
    }
    
    .pagination-yellow .page-item .page-link {
        border: 1px solid #f0f0f0;
        color: #555;
        font-size: 0.8rem;
        padding: 6px 14px;
        border-radius: 10px !important; /* Membuat tombol agak kotak membulat */
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }

    .pagination-yellow .page-item.active .page-link {
        background-color: #FDB813 !important; /* Kuning Cititrans */
        border-color: #FDB813 !important;
        color: #000 !important;
        font-weight: 700;
        box-shadow: 0 3px 6px rgba(253, 184, 19, 0.3);
    }

    .pagination-yellow .page-item .page-link:hover:not(.active) {
        background-color: #fff9e6;
        border-color: #FDB813;
        color: #000;
    }

    .pagination-yellow .page-item.disabled .page-link {
        background-color: #fafafa;
        opacity: 0.6;
    }

    /* Animasi kecil saat hover */
    .pagination-yellow .page-item:not(.active):hover {
        transform: translateY(-1px);
    }
/* CARD */
.dashboard-card {
    border-radius: 16px;
    transition: 0.3s;
    background: #fff;
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.08);
}

/* ICON USER */
.icon-user {
    width: 35px;
    height: 35px;
    background: #f3db00;
    color: black;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
 

    .main-content {
        padding-top: 70px !important; /* Sesuaikan dengan tinggi navbar */
    }

    /* Stat Card Modern */
    .stat-card {
        transition: transform 0.2s;
        border-radius: 12px;
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
    }

    .icon-box {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    /* Warna soft background untuk ikon */
    .bg-primary-soft { background-color: rgba(13, 110, 253, 0.1); }
    .bg-warning-soft { background-color: rgba(255, 193, 7, 0.1); }
    .bg-success-soft { background-color: rgba(25, 135, 84, 0.1); }
    .bg-danger-soft { background-color: rgba(220, 53, 69, 0.1); }

    /* Responsivitas angka */
    @media (max-width: 576px) {
        h4 { font-size: 1.2rem; }
        .icon-box { width: 35px; height: 35px; font-size: 1rem; }
    }

/* TABLE */
.table-hover tbody tr:hover {
    background-color: #fffbea;
}

/* CHART */
.chart-box {
    max-width: 280px;
    margin: auto;
}

/* CARD WRAPPER */
.card-section {
    border-radius: 16px;
}
.gold-bg {
    background-color: #FDB813 !important; /* Warna emas Anda */
    color: #000 !important;              /* Teks hitam agar terbaca jelas di atas emas */
}

.text-gold-dark {
    color: #000 !important; /* Memastikan teks di dalam card berwarna gelap */
}

/* Agar ikon juga terlihat kontras */
.icon-box-gold {
    background: rgba(255, 255, 255, 0.3); /* Transparansi putih agar terlihat mewah */
    padding: 10px;
    border-radius: 8px;
/* FOOTER */
.footer {
    margin-top: 90px;
    padding: 40px 20px 20px; /* Padding lebih besar di atas untuk estetika */
    background: linear-gradient(135deg, #111111 0%, #1a1a1a 100%);
    color: #ffffff;
    border-top: 3px solid #FDB813; /* Aksen kuning Cititrans */
    font-family: 'Poppins', sans-serif;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    flex-wrap: wrap; /* Agar otomatis turun ke bawah di layar HP */
    gap: 20px;
}

.footer-logo {
    font-size: 20px;
    font-weight: 700;
    color: #FDB813;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.footer-links {
    display: flex;
    gap: 20px;
}

.footer-links a {
    color: #bbb;
    text-decoration: none;
    transition: 0.3s;
    font-size: 14px;
}

.footer-links a:hover {
    color: #FDB813;
}

.footer-bottom {
    width: 100%;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
    font-size: 13px;
    color: #888;
}

    /* Custom Badge Styles */
    .badge-create { background-color: #ffee07; color: #000000; }
    .badge-update { background-color: #ffc107; color: #000000; }
    .badge-delete { background-color: #817776; color: #ffffff; }
    .badge-login  { background-color: #be902a; color: #ffffff; } /* Contoh Hijau */
    .badge-logout { background-color: #343a40; color: #ffffff; } /* Abu gelap */
    .badge-default { background-color: #6c757d; color: #ffffff; }

/* Responsive untuk HP (Layar di bawah 768px) */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-links {
        justify-content: center;
    }
}
</style>




<!-- ALERT -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show position-fixed"
     style="top:20px; right:20px; z-index:9999;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show position-fixed"
     style="top:20px; right:20px; z-index:9999;">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<section class="section-dashboard mt-2 pb-4">
    <div class="container-fluid px-lg-4">

        {{-- Header: Judul di Kiri, Bahasa & Jam di Kanan --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 border-bottom pb-3">
            
            {{-- Sisi Kiri: Judul --}}
            <div>
                <h1 class="fw-bold mb-0" style="letter-spacing: -1px;">{{ __('Dashboard') }}</h1>
                <p class="text-muted small mb-0">{{ __('Monitoring Lost & Found System') }}</p>
            </div>

            {{-- Sisi Kanan: Multi-language & Clock --}}
            <div class="d-flex align-items-center gap-2 mt-2 mt-md-0">
                
                {{-- Dropdown Language --}}
                <div class="dropdown">
                    <button class="btn btn-light btn-sm border shadow-sm px-3 d-flex align-items-center dropdown-toggle" 
                            type="button" data-bs-toggle="dropdown" style="border-radius: 8px; height: 38px;">
                        @if(app()->getLocale() == 'id')
                            <img src="https://flagcdn.com/w20/id.png" width="20" class="me-2 rounded-1">
                            <span class="fw-bold">ID</span>
                        @else
                            <img src="https://flagcdn.com/w20/gb.png" width="20" class="me-2 rounded-1">
                            <span class="fw-bold">EN</span>
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch', 'id') }}">
                                <img src="https://flagcdn.com/w20/id.png" width="20" class="me-2"> Indonesia
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch', 'en') }}">
                                <img src="https://flagcdn.com/w20/gb.png" width="20" class="me-2"> English
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Live Clock --}}
                <div class="d-flex align-items-center shadow-sm" 
                     style="background-color: #FDB813; color: #000; padding: 0 15px; border-radius: 8px; height: 38px;">
                    <span id="live-clock" class="fw-bold" style="font-size: 0.85rem; white-space: nowrap;">
                        
                        {{ date('d M Y | H:i:s') }}
                    </span>
                </div>
            </div>
        </div>

    <div class="row g-2 mb-4">
    <div class="col-6 col-md-3">
        <div class="card stat-card shadow-sm border-0 h-100 gold-bg">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="icon-box icon-box-gold me-3 "style="background-color: #000000;">
                    <i class="fas fa-boxes text-light"></i>
                </div>
                <div>
                    <p class="mb-0 small fw-semibold">{{ __('Total') }}</p>
                    <h4 class="fw-bold mb-0">{{ $total }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card stat-card shadow-sm border-0 h-100 gold-bg">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="icon-box icon-box-gold me-3 "style="background-color: #000000;">
                    <i class="fas fa-spinner fa-spin text-light"></i>
                </div>
                <div>
                    <p class="mb-0 small fw-semibold">{{ __('In Progress') }}</p>
                    <h4 class="fw-bold mb-0">{{ $diproses }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card stat-card shadow-sm border-0 h-100 gold-bg">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="icon-box bg-success-soft me-3 "style="background-color: #000000;">
                    <i class="fas fa-check-double text-success "></i> {{-- Font Awesome: Check Double --}}
                </div>
                <div>
                    <p class="mb-0 small fw-semibold">{{ __('Claimed') }}</p>
                    <h4 class="fw-bold mb-0">{{ $claimed }}</h4>
                </div>
            </div>
        </div>
    </div>


    <div class="col-6 col-md-3">
        <div class="card stat-card shadow-sm border-0 h-100 gold-bg">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="icon-box bg-success-soft me-3">
                <div class="d-inline-flex p-2 rounded" style="background-color: #000000;">
                    <i class="fas fa-exclamation-triangle text-danger"></i>
                </div> {{-- Font Awesome: Check Double --}}
                </div>
                <div>
                <p class="mb-0 small fw-semibold">{{ __('Lost') }}</p>
                <h4 class="fw-bold mb-0">{{ $hilang }}</h4>
                </div>
            </div>
        </div>
    </div>
    
    

        <div class="row g-3">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm p-3 h-100">
                    <h6 class="fw-bold small mb-3">{{ __('Item Status Statistics') }}</h6>
                    <div style="height: 250px;">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-3 h-100">
                    <h6 class="fw-bold small mb-3">{{ __('Monthly Item Input') }}</h6>
                    <div style="height: 250px;">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>

    

    <!-- Card Header (Sudah diperbaiki alignment-nya) -->
<div class="card card-section shadow-sm border-0 rounded-4 overflow-hidden mb-3">
    <div class="card-header bg-white py-3 px-4 border-bottom-0 mt-2">
        <div class="d-flex align-items-center">
            <div class="icon-box me-3">
                <i class="bi bi-clock-history fs-2 text-muted"></i>
            </div>
            <div>
                <h2 class="fw-bold mb-0" style="line-height: 1.2;">
                    {{ __('Activity') }} <span style="color: #FDB813;">{{ __('Logs') }}</span>
                </h2>
                <p class="text-muted small mb-0">
                    {{ __('Riwayat perubahan data oleh pengguna sistem') }}
                </p>
            </div>
        </div>
    </div>


<!-- Card Tabel (Perbaikan pada Thead) -->
<div class="card border-0 shadow-sm card-main overflow-hidden rounded-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0 table-hover">
            <!-- Menambahkan class table-dark agar warna hitam konsisten di semua sel header -->
            <thead class="table-dark text-center align-middle">
                <tr style="border: none;">
                    <th class="py-3 px-4 text-start fw-semibold text-white border-0" style="min-width: 180px;">
                        {{ __('Nama & Jabatan') }}
                    </th>
                    <th class="fw-semibold text-white border-0">
                        {{ __('Action') }}
                    </th>
                    <th class="fw-semibold text-white border-0" style="min-width: 250px;">
                        {{ __('Deskripsi Aktivitas') }}
                    </th>
                    <th class="fw-semibold text-white border-0" style="min-width: 150px;">
                        {{ __('Tanggal & Waktu') }}
                    </th>
                </tr>
            </thead>


                <tbody class="text-center">
                    @forelse($logs as $log)
                    <tr>
                       <td class="text-start px-4">
    <div class="d-flex align-items-center">
        <div class="me-3">
            @if($log->user && $log->user->photo && file_exists(public_path('storage/photos/' . $log->user->photo)))
                <img src="{{ asset('storage/photos/' . $log->user->photo) }}" 
                     class="rounded-circle shadow-sm" 
                     style="width: 35px; height: 35px; object-fit: cover; border: 2px solid #FDB813;">
            @else
                <div class="d-flex align-items-center justify-content-center rounded-circle shadow-sm fw-bold text-dark" 
                     style="width: 35px; height: 35px; background: #FDB813; border: 1px solid #eee; font-size: 0.8rem;">
                    {{ strtoupper(substr($log->user->name ?? 'G', 0, 1)) }}
                </div>
            @endif
        </div>

        <div>
            <div class="fw-bold text-dark mb-0" style="font-size: 0.9rem;">{{ $log->user->name ?? 'Guest' }}</div>
            <span class="badge bg-light text-dark border-0 p-0" style="font-size: 0.7rem;">
                <i class="bi bi-shield-lock me-1"></i>{{ ucfirst($log->role ?? 'N/A') }}
            </span>
        </div>
    </div>
</td>

            <td class="py-3">
                    @php
                        // Mapping warna untuk setiap aktivitas
                        // Kita gunakan warna emas (#FDB813) sebagai aksen untuk aktivitas positif/utama
                        // Dan warna gelap/hitam untuk aktivitas lainnya agar terlihat elegan
                        $badgeColors = [
                            'create' => '#FDB813', // Emas
                            'update' => '#FDB813', // Emas
                            'delete' => '#dc3545', // Merah (untuk delete agar tetap intuitif)
                            'login'  => '#212529', // Gelap
                            'logout' => '#6c757d', // Abu-abu
                        ];

                        $color = $badgeColors[$log->activity] ?? '#6c757d';
                    @endphp

                    <span class="badge px-3 py-2 rounded-pill fw-bold shadow-sm" 
                        style="background-color: {{ $color }}; color: {{ $log->activity == 'create' || $log->activity == 'update' ? '#000' : '#fff' }};">
                        {{ strtoupper(__($log->activity)) }}
                    </span>
                </td>
                            
                            <td class="text-start">
                    <div class="text-center small lh-sm">
                        <i class="bi bi-info-circle me-1"></i>
                        @php
                            // Kita pisahkan kalimat statis dengan nama barangnya
                            // Mencari kata "Admin mengupdate data barang: "
                            $statis = "Admin mengupdate data barang: ";
                            
                            if (str_contains($log->description, $statis)) {
                                // Terjemahkan pengantarnya saja, lalu sambung dengan nama barang aslinya
                                $namaBarang = str_replace($statis, "", $log->description);
                                echo __($statis) . ' ' . $namaBarang;
                            } else {
                                // Jika tidak mengandung kalimat tersebut, tampilkan apa adanya
                                echo __($log->description);
                            }
                        @endphp
                    </div>
                </td>

                    <td>
                        <div class="small fw-semibold text-dark">
                            {{-- Format tanggal menggunakan format standar --}}
                            {{ $log->created_at->translatedFormat('d M Y') }}
                        </div>
                        <div class="extra-small text-muted" style="font-size: 0.7rem;">
                            <i class="bi bi-alarm me-1"></i>{{ $log->created_at->format('H:i') }} WIB
                        </div>
                    </td>

                    {{-- Bagian Empty State --}}
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <div class="opacity-25 mb-2">
                                <i class="bi bi-clipboard-x display-4"></i>
                            </div>
                            <h6 class="text-muted">{{ __('Belum ada riwayat aktivitas tercatat') }}</h6>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="card-footer bg-transparent border-top-0 py-2" style="border-radius: 0 0 15px 15px;">
    <!-- Bungkus dengan text-center dan d-flex flex-column untuk rata tengah -->
    <div class="d-flex flex-column align-items-center justify-content-center text-center">
        
        <!-- Teks Keterangan Halaman -->
        <div class="text-muted mb-3" style="font-size: 0.85rem;">
            {{ __('Menampilkan halaman') }} <strong>{{ $logs->currentPage() }}</strong> 
            {{ __('dari') }} <strong>{{ $logs->lastPage() }}</strong>
        </div>

        <!-- Navigasi Pagination -->
        <div class="pagination-yellow">
            <nav>
                <ul class="pagination mb-0 justify-content-center">
                    {{-- Tombol Previous --}}
                    @if ($logs->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $logs->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif

                    {{-- Logika Blok 10 Angka --}}
                    @php
                        $currentBlock = ceil($logs->currentPage() / 5);
                        $startPage = ($currentBlock - 1) * 5 + 1;
                        $endPage = min($startPage + 4, $logs->lastPage());
                    @endphp

                    @for ($i = $startPage; $i <= $endPage; $i++)
                        <li class="page-item {{ ($logs->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $logs->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Tombol Next --}}
                    @if ($logs->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $logs->nextPageUrl() }}" rel="next">&raquo;</a></li>
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
                {{ __('Total') }}: <span class="fw-bold ms-1">{{ $logs->total() }}</span> {{ __('Entri') }}
            </div>
        </div>

    </div>
</div>
</section>
<!-- ============================================-->



<!-- SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// 1. Doughnut Chart
new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: {
        // Tambahkan tanda kutip di sekitar fungsi __()
        labels: [
            "{{ __('Diproses') }}", 
            "{{ __('Claimed') }}", 
            "{{ __('Hilang') }}"
        ],
        datasets: [{
            data: [{{ $diproses }}, {{ $claimed }}, {{ $hilang }}],
            backgroundColor: ['#FF8C00', '#FFD700', '#A9A9A9'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%',
        plugins: { 
            legend: { 
                position: 'bottom',
                labels: {
                    padding: 20,
                    font: { size: 12 }
                }
            } 
        }
    }
});

// 2. Bar Chart
const labels = {!! json_encode($labels) !!};
const dataValues = {!! json_encode($data) !!};

const ctx = document.getElementById('barChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            // Terjemahkan label dataset
            label: "{{ __('Jumlah Input') }}", 
            data: dataValues,
            backgroundColor: '#A9A9A9',
            borderRadius: 5 // Membuat bar sedikit melengkung agar modern
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1 // Cocok untuk jumlah barang (angka bulat)
                }
            }
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
</script>
@endsection