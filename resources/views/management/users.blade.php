@extends('layouts.app2')

@section('content')

<style>
    /* ===== HEADER ===== */
    .page-title { font-size: 1.85rem; letter-spacing: -.5px; }

    /* ===== SECTION CARD ===== */
    .section-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 24px rgba(0,0,0,.06);
        border: none;
        overflow: hidden;
        margin-bottom: 28px;
    }
    .section-card-header {
        padding: 16px 22px;
        border-bottom: 1px solid #f3f4f6;
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fff;
    }
    .section-card-header .header-icon {
        width: 34px; height: 34px;
        border-radius: 10px;
        background: #fff8e5;
        color: #d89b00;
        display: flex; align-items: center; justify-content: center;
        font-size: .9rem;
        flex-shrink: 0;
    }
    .section-card-header h5 {
        font-size: .875rem;
        font-weight: 700;
        margin: 0;
        color: #111827;
    }
    .section-card-header small {
        font-size: .72rem;
        color: #9ca3af;
    }

    /* ===== TABLE ===== */
    .table thead th {
        background: #111827;
        color: #fff;
        font-size: .72rem;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 13px 16px;
        border: none;
        white-space: nowrap;
    }
    .table tbody td {
        vertical-align: middle;
        border-color: #f3f4f6;
        padding: 12px 16px;
        font-size: .875rem;
    }
    .table tbody tr:hover { background: #fffcf0; }

    /* ===== AVATAR ===== */
    .user-avatar-img {
        width: 38px; height: 38px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #FDB813;
    }
    .user-avatar-placeholder {
        width: 38px; height: 38px;
        border-radius: 50%;
        background: #FDB813;
        color: #000;
        font-weight: 800;
        font-size: .85rem;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }

    /* ===== BADGE ===== */
    .badge-gold {
        background: #FDB813;
        color: #000;
        font-weight: 700;
        font-size: .72rem;
        border-radius: 50px;
        padding: 4px 12px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        box-shadow: 0 2px 8px rgba(253,184,19,.20);
    }
   .badge-pending {

    background: #fff3cd;

    color: #856404;

    border: 1px solid #fde68a;

    font-weight: 700;

    font-size: .70rem;

    border-radius: 50px;

    padding: 4px 10px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 4px;

    white-space: nowrap;

    line-height: 1;

}
    .badge-role {
        background: #111827;
        color: #fff;
        font-size: .7rem;
        border-radius: 6px;
        padding: 3px 10px;
        font-weight: 600;
    }
    .badge-jabatan {
        background: #f3f4f6;
        color: #374151;
        border: 1px solid #e5e7eb;
        font-size: .72rem;
        border-radius: 6px;
        padding: 3px 10px;
        font-weight: 500;
    }

    /* ===== BUTTONS ===== */
    .btn-approve {
        background: #FDB813;
        border: none;
        color: #000;
        font-weight: 700;
        font-size: .78rem;
        border-radius: 50px;
        padding: 6px 16px;
        transition: all .2s;
        display: inline-flex; align-items: center; gap: 5px;
    }
    .btn-approve:hover {
        background: #e5a700;
        color: #000;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(253,184,19,.35);
    }
    .btn-reject {
        background: transparent;
        border: 2px solid #FDB813;
        color: #a87800;
        font-weight: 700;
        font-size: .78rem;
        border-radius: 50px;
        padding: 5px 16px;
        transition: all .2s;
        display: inline-flex; align-items: center; gap: 5px;
    }
    .btn-reject:hover {
        background: #FDB813;
        color: #000;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(253,184,19,.25);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        padding: 48px 20px;
        text-align: center;
        color: #9ca3af;
    }
    .empty-state i { font-size: 2rem; margin-bottom: 10px; display: block; }
    .empty-state p { font-size: .875rem; margin: 0; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .table thead th,
        .table tbody td { font-size: .72rem; padding: 10px 10px; }
        .page-title { font-size: 1.4rem; }
        /* ===== MOBILE BADGE ===== */

.badge-pending{

    font-size: .62rem;

    padding: 3px 7px;

    gap: 3px;

}

.badge-pending i{

    font-size: .62rem;

}
    }
</style>

{{-- ====== PAGE HEADER — judul + multilanguage + jam live ====== --}}
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 border-bottom pb-3 gap-2">

    {{-- Judul --}}
    <div>
        <h2 class="fw-bold mb-0 page-title">
            User <span style="color:#FDB813;">Management</span>
        </h2>
        <p class="text-muted small mb-0">{{ __('Kelola persetujuan akun dan daftar pengguna sistem.') }}</p>
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

{{-- ====== ALERT ====== --}}
@if(session('success'))
    <div class="alert border-0 shadow-sm alert-dismissible fade show mb-4"
         style="background:#d1fae5; color:#065f46; border-left:4px solid #10b981 !important; border-radius:12px;"
         role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- ====== SECTION 1: MENUNGGU PERSETUJUAN ====== --}}
<div class="section-card">
    <div class="section-card-header">
        <div class="header-icon"><i class="bi bi-person-plus"></i></div>
        <div>
            <h5>{{ __('Menunggu Persetujuan') }} </h5>
            <small>{{ __('Akun yang telah mendaftar dan menunggu konfirmasi') }}</small>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-center">
                    <th style="width:5%;">No</th>
                    <th class="text-start">{{ __('Nama') }} </th>
                    <th>{{ __('Jabatan') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th style="width:22%;">{{ __('Aksi') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendingUsers as $index => $user)
                    <tr class="text-center">
                        <td class="fw-semibold text-muted">{{ $index + 1 }}</td>

                        <td class="text-start">
                            <div class="d-flex align-items-center gap-3">
                                <div class="user-avatar-placeholder">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="fw-bold small">{{ $user->name }}</div>
                                   
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="badge-jabatan">{{ $user->role }}</span>
                        </td>

                        <td>
                            <span class="badge-pending">
                                <i class="bi bi-hourglass-split me-1"></i> {{ __('Pending') }}
                            </span>
                        </td>

                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                {{-- Setujui --}}
                                <form action="{{ route('management.user.approve', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-approve">
                                        <i class="bi bi-check-lg"></i> {{ __('Setujui') }}
                                    </button>
                                </form>

                                {{-- Tolak --}}
                                <form action="{{ route('management.user.reject', $user->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus pengajuan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-reject">
                                        <i class="bi bi-x-lg"></i> {{ __('Tolak') }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <p>{{ __('Tidak ada pengajuan akun baru.') }}</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ====== SECTION 2: DAFTAR PENGGUNA AKTIF ====== --}}
<div class="section-card">
    <div class="section-card-header">
        <div class="header-icon"><i class="bi bi-people"></i></div>
        <div>
            <h5>{{ __('Daftar Pengguna Aktif') }}</h5>
            <small>{{ __('Semua akun yang telah diverifikasi dan aktif di sistem') }}</small>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-center">
                    <th style="width:5%;">No</th>
                     <th class="text-start">{{ __('User') }}</th>
                    <th class="text-start"></th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($users as $index => $user)
                    <tr>
                        <td class="fw-semibold text-muted">{{ $index + 1 }}</td>

                        <td class="text-start">
                            <div class="d-flex align-items-center gap-3">
                                {{-- Avatar --}}
                                @if($user->photo)
                                    <img src="{{ asset('storage/photos/' . $user->photo) }}"
                                         class="user-avatar-img" alt="foto {{ $user->name }}">
                                @else
                                    <div class="user-avatar-placeholder">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif

                                <div>
                                    <div class="fw-bold small">{{ $user->name }}</div>
                                    <div style="font-size:.7rem; color:#9ca3af;">ID: #{{ $user->id }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="small text-muted">{{ $user->email }}</td>

                        <td>
                            <span class="badge-role">{{ ucfirst($user->role) }}</span>
                        </td>

                        <td>
                            <span class="badge-gold">
                                <i class="bi bi-patch-check-fill"></i>{{ __('Aktif') }} 
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

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
</script>

@endsection