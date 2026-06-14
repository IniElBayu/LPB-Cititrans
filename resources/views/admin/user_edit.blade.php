@extends('layouts.app') 

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

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow rounded-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h1 class="mb-1 fw-bold">{{ __('Edit Data User') }}</h1>
                </div>
                <div class="card-body p-4">
                    
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nama Lengkap --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Nama Lengkap') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        {{-- Username (Tetap menggunakan name="email" sesuai database Anda) --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Username Account') }}</label>
                            <input type="text" 
                                name="Username" 
                                class="form-control" 
                                value="{{ old('Username', $user->Username) }}" 
                                placeholder="{{ __('Masukkan username...') }}" 
                                required>
                        </div>

                        {{-- NIK --}}
<div class="mb-3">

    <label class="form-label fw-semibold">

        {{ __('NIK Staff') }}

    </label>

    <div class="input-group">

        <span class="input-group-text">

            <i class="bi bi-person-vcard-fill text-muted"></i>

        </span>

        <input type="text"
               name="nik"
               class="form-control"
               value="{{ old('nik', $user->nik) }}"
               placeholder="{{ __('Masukkan NIK staff') }}">

    </div>

    <small class="text-muted mt-1 d-block">

        <i class="bi bi-info-circle me-1"></i>

        {{ __('Kosongkan jika bukan akun staff.') }}

    </small>

</div>

                        {{-- Role --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Role') }}</label>
                            <select name="role" class="form-select" required>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>{{ __('Admin') }}</option>
                                <option value="management" {{ old('role', $user->role) == 'management' ? 'selected' : '' }}>{{ __('Management') }}</option>
                                <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>{{ __('Staff') }}</option>
                                <option value="guest" {{ old('role', $user->role) == 'guest' ? 'selected' : '' }}>{{ __('Guest') }}</option>
                            </select>
                        </div>

                        {{-- Status Akun --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Status Akun') }}</label>
                            <select name="status" class="form-select" required>
                                <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>{{ __('Aktif') }}</option>
                                <option value="pending" {{ old('status', $user->status) == 'pending' ? 'selected' : '' }}>{{ __('Menunggu ACC (Pending)') }}</option>
                            </select>
                        </div>

                        {{-- Password Baru --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">{{ __('Password Baru') }}</label>
                            <input type="password" name="password" class="form-control" placeholder="{{ __('Masukkan password baru...') }}">
                            <small class="text-muted mt-1 d-block">
                                <i class="bi bi-info-circle me-1"></i>{{ __('Kosongkan kolom ini jika tidak ingin mengubah password.') }}
                            </small>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.users') }}" class="btn btn-light px-4 rounded-3 fw-semibold">{{ __('Kembali') }}</a>
                            {{-- Tombol Simpan Warna Emas --}}
                            <button type="submit" class="btn px-4 rounded-3 fw-bold shadow-sm" 
                                    style="background-color: #FDB813; color: #000; border: none; transition: 0.3s;">
                                {{ __('Simpan Perubahan') }}
                            </button>
                        </div>
                    </form> {{-- Tag penutup form dipindahkan ke sini agar semua input terbawa --}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
<style>

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

            window.location.href =
                "{{ route('admin.users') }}";

        }, 300);

    }

}

/* AUTO CLOSE */
@if(session('success'))

setTimeout(() => {

    closeSuccessPopup();

}, 3500);

@endif

</script>
@endsection