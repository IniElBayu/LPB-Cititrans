@extends('layouts.app')

@section('content')

{{-- ============================================================
     CSS KHUSUS HALAMAN INI SAJA
     (CSS global seperti sidebar, avatar, dll sudah ada di layout)
     ============================================================ --}}
<style>
    /* ===== TABEL ===== */
    .card-main {
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border: none;
        background: #fff;
    }
    /* =========================================
   SUCCESS POPUP
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

    max-width:430px;

    border-radius:32px;

    padding:42px 30px;

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

.popup-timer{

    font-size:.78rem;

    color:#888;

}
    .table thead {
        background: #212529;
        color: #fff;
        white-space: nowrap;
    }

    .table th,
    .table td {
        vertical-align: middle;
        padding: 12px 15px;
    }

    .table-row:hover {
        background-color: #fffbea;
        transition: background-color 0.2s;
    }

    /* ===== AVATAR ===== */
    .avatar {
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, #f3db00, #ffcc00);
        color: #000;
        font-weight: bold;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    /* ===== TOMBOL AKSI ===== */
    .btn-action {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        transition: all 0.25s ease;
        border: none;
        cursor: pointer;
    }
    /* =========================================
   DELETE USER MODAL
========================================= */

.delete-user-overlay{

    position:fixed;

    inset:0;

    background:rgba(0,0,0,.45);

    backdrop-filter:blur(6px);

    z-index:999999;

    display:none;

    align-items:center;

    justify-content:center;

    padding:20px;

    animation:fadeDeleteUser .2s ease;

}

.delete-user-card{

    width:100%;

    max-width:420px;

    background:#fff;

    border-radius:28px;

    padding:35px 28px;

    text-align:center;

    box-shadow:
        0 20px 60px rgba(0,0,0,.18);

    animation:scaleDeleteUser .25s ease;

}

.delete-user-icon{

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

@keyframes fadeDeleteUser{

    from{

        opacity:0;

    }

    to{

        opacity:1;

    }

}

@keyframes scaleDeleteUser{

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
    /* Edit — outline emas */
    .btn-gold-outline-action {
        background-color: #fff;
        color: #FDB813;
        border: 2px solid #FDB813;
    }
    .btn-gold-outline-action:hover {
        background-color: #FDB813;
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(253, 184, 19, 0.4);
    }

    /* Hapus — solid emas */
    .btn-gold-action {
        background-color: #FDB813;
        color: #000;
    }
    .btn-gold-action:hover {
        background-color: #e5a700;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(253, 184, 19, 0.4);
    }

    /* ===== BADGE ANIMASI ===== */
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50%       { opacity: .5; }
    }

    /* ===== OVERFLOW TABEL DI MOBILE ===== */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
</style>

{{-- ============================================================
     KONTEN UTAMA
     ============================================================ --}}



     {{-- Di dalam body app.blade.php --}}
    <div class="container-fluid px-lg-4 mt-3">
    {{-- Header Global --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 border-bottom pb-3">
        <div>
            {{-- Judul Dinamis --}}
            <h1 class="fw-bold mb-0" style="letter-spacing: -1px;">
            {{ __('User Management') }}
            </h1>
            <p class="text-muted small mb-0">{{ __('Kelola akun pengguna sistem internal') }}</p>
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
    
    


    {{-- Header halaman --}}
    <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

        <a href="{{ route('admin.users_create') }}"
           class="btn fw-semibold shadow-sm"
           style="background-color: #FDB813; color: #000; border-radius: 10px; padding: 10px 24px;">
            <i class="bi bi-person-plus-fill me-2"></i>{{ __('Tambah User') }}
        </a>
    </div>

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

            {{ __('Berhasil!') }}

        </h4>

        {{-- MESSAGE --}}
        <p class="mb-4"
           style="
                color:#9b9b9b;
                font-size:1.05rem;
                line-height:1.7;
           ">

            {{ session('success') }}

        </p>

        {{-- BUTTON --}}
        <button class="btn fw-bold rounded-pill px-5 py-2 border-0 shadow-sm success-ok-btn"
                onclick="closeSuccessPopup()">

            OK

        </button>

        {{-- TIMER --}}
        <div class="popup-timer mt-3">

            {{ __('Popup akan tertutup otomatis') }}

        </div>

    </div>

</div>

@endif
    {{-- Tabel --}}
    <div class="card border-0 shadow-sm card-main overflow-hidden">
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover">
                <thead>
                    <tr class="text-center">
                        <th class="ps-4" style="width: 60px;">{{ __('No') }}</th>
                        <th class="text-start">{{ __('User') }}</th>
                        <th>{{ __('Username') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('NIK') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th style="width: 120px;">{{ __('Aksi') }}</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($users as $index => $user)
                    <tr class="table-row">

                        {{-- No --}}
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>

                        {{-- User --}}
                        <td class="text-start">
                            <div class="d-flex align-items-center gap-3">
                                @if($user->photo)
                                    <img src="{{ asset('storage/photos/' . $user->photo) }}"
                                         class="rounded-circle border shadow-sm"
                                         style="width: 42px; height: 42px; object-fit: cover;">
                                @else
                                    <div class="avatar shadow-sm">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="fw-bold small mb-0">{{ $user->name }}</div>
                                    <small class="text-muted d-block" style="font-size: 0.7rem;">
                                        ID: #{{ $user->id }}
                                    </small>
                                </div>
                            </div>
                        </td>

                        {{-- Username --}}
                        <td class="small">{{ $user->Username }}</td>

                        {{-- Role --}}
                        <td>
                            <span class="badge bg-dark px-3">{{ ucfirst($user->role) }}</span>
                        </td>

                        {{-- NIK --}}
                        <td>
                            <span class="badge bg-dark px-3">{{ $user->nik == 0 ? '-' : $user->nik }}</span>
                        </td>

                        {{-- Status --}}
                        <td>
                            <span class="badge shadow-sm {{ $user->status == 'pending' ? 'animate-pulse' : '' }}"
                                  style="background-color: #FDB813; color: #000; font-weight: 600;">
                                {{ $user->status == 'pending' ? __('Menunggu ACC') : __('Aktif') }}
                            </span>
                        </td>

                        {{-- Aksi --}}
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="btn-action btn-gold-outline-action shadow-sm"
                                   title="{{ __('Edit') }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            <form action="{{ route('admin.users.delete', $user->id) }}"
                                method="POST"
                                class="m-0 deleteUserForm">

                                @csrf
                                @method('DELETE')

                                <button type="button"
                                        class="btn-action btn-gold-action shadow-sm deleteUserBtn"
                                        title="{{ __('Hapus') }}">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-people fs-1 d-block mb-2 opacity-25"></i>
                            {{ __('Belum ada data pengguna.') }}
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <br><br><br><br>
    </div>


{{-- ============================================================
     FOOTER
     (letakkan di dalam @section('content') karena layout tidak
      menyediakan @yield('footer') — jika layout sudah punya
      footer sendiri, hapus bagian ini)
     ============================================================ --}}

     
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

            popup.remove();

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
   DELETE USER MODAL
========================================= */

document.addEventListener(
    'DOMContentLoaded',
    function(){

        let currentDeleteUserForm = null;

        /* OPEN MODAL */
        document.querySelectorAll(
            '.deleteUserBtn'
        ).forEach(btn => {

            btn.addEventListener(
                'click',
                function(){

                    currentDeleteUserForm =
                        this.closest(
                            '.deleteUserForm'
                        );

                    const modal =
                        document.getElementById(
                            'deleteUserModal'
                        );

                    if(modal){

                        modal.style.display =
                            'flex';

                    }

                }
            );

        });

        /* CLOSE MODAL */
        window.closeDeleteUserModal =
            function(){

                const modal =
                    document.getElementById(
                        'deleteUserModal'
                    );

                if(modal){

                    modal.style.display =
                        'none';

                }

            };

        /* CONFIRM DELETE */
        const confirmDeleteBtn =
            document.getElementById(
                'confirmDeleteUserBtn'
            );

        if(confirmDeleteBtn){

            confirmDeleteBtn.addEventListener(
                'click',
                function(){

                    if(currentDeleteUserForm){

                        this.innerHTML =
                            `
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            Menghapus...
                            `;

                        this.disabled = true;

                        currentDeleteUserForm.submit();

                    }

                }
            );

        }

    }
);

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
<script>



</script>

{{-- =========================================
     DELETE USER MODAL
========================================= --}}

<div class="delete-user-overlay"
     id="deleteUserModal">

    <div class="delete-user-card">

        {{-- ICON --}}
        <div class="delete-user-icon">

            <i class="bi bi-person-x-fill"></i>

        </div>

        {{-- TITLE --}}
        <h4 class="fw-bold mb-2">

            {{ __('Hapus User?') }}

        </h4>

        {{-- MESSAGE --}}
        <p class="text-muted mb-4">

            {{ __('Akun user yang dihapus tidak dapat dikembalikan.') }}

        </p>

        {{-- BUTTON --}}
        <div class="d-flex gap-2">

            {{-- CANCEL --}}
            <button type="button"
                    class="btn btn-light border flex-fill rounded-pill fw-semibold py-2"
                    onclick="closeDeleteUserModal()">

                {{ __('Tidak') }}

            </button>

            {{-- CONFIRM --}}
            <button type="button"
                    class="btn btn-warning flex-fill rounded-pill fw-bold py-2"
                    id="confirmDeleteUserBtn">

                {{ __('Ya, Hapus') }}

            </button>

        </div>

    </div>

</div>

@endsection