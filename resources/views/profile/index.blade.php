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

            {{ __('Profil Berhasil Diperbarui') }}

        </h4>

        {{-- MESSAGE --}}
        <p class="mb-4"
           style="
                color:#9b9b9b;
                font-size:1.05rem;
                line-height:1.7;
           ">

            {{ __('Perubahan profil berhasil disimpan.') }}

        </p>

        {{-- BUTTON --}}
        <button class="btn fw-bold rounded-pill px-5 py-2 border-0 shadow-sm success-ok-btn"
                onclick="closeSuccessPopup()">

            OK

        </button>

    </div>

</div>

@endif
<style>
    /* Mengatur tombol ikon mata agar seragam */
    .input-group .btn-outline-secondary {
        border-color: #FDB813; /* Warna border default */
        background-color: #717880;
        color: #ffffff; /* Warna ikon default */
        transition: all 0.3s ease; /* Transisi halus saat di-hover */
    }

    /* Efek saat tombol di-hover */
    .input-group .btn-outline-secondary:hover {
        background-color: #6c757d; /* Warna background abu-abu saat hover */
        border-color: #6c757d;    /* Border ikut abu-abu */
        color: #FDB813;          /* Warna ikon mata jadi emas (#FDB813) */
    }

    /* Opsional: Efek saat tombol diklik atau fokus */
    .input-group .btn-outline-secondary:focus {
        box-shadow: 0 0 0 0.25rem rgba(253, 184, 19, 0.25); /* Glow emas tipis */
        border-color: #FDB813;
    }
</style>
<head>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 
</head>
<style>
    .full-height-container { min-height: 85vh; display: flex; align-items: center; justify-content: center; }
    .bg-cititrans { background: linear-gradient(135deg, #FDB813 0%, #FFA500 100%); border-bottom: 2px solid #333; }
</style>

<div class="container full-height-container">
    <div class="row justify-content-center w-100">
        <div class="col-11 col-sm-8 col-md-6 col-lg-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-cititrans text-dark fw-bold text-center">{{ __('Pengaturan Profil') }}</div>
                <div class="card-body p-4">
                    
                    {{-- Foto Profil --}}
                    <div class="text-center mb-4">
                        <img src="{{ auth()->user()->photo && file_exists(public_path('storage/photos/' . auth()->user()->photo)) 
                                   ? asset('storage/photos/' . auth()->user()->photo) 
                                   : asset('assets/img/icons/15.png') }}" 
                             class="rounded-circle img-thumbnail shadow-sm" 
                             style="width: 120px; height: 120px; object-fit: cover;">
                    </div>

                   <form action="{{ route('profile.update') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PATCH')
                        @csrf
                        @method('PATCH')

                        {{-- Update Foto --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('Foto Profil Baru') }}</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        {{-- Update Username --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ __('Username') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                        </div>

                        {{-- Password Lama dengan Toggle --}}
                     <div class="mb-3">
                    <label class="form-label fw-bold">{{ __('Password Lama') }}</label>
                    <div class="input-group">
                        <input type="password" name="current_password" id="current_password" 
                            class="form-control @error('current_password') is-invalid @enderror" 
                            placeholder="{{ __('Masukkan password lama') }}">
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('current_password')">
                            <i class="bi bi-eye"></i>
                        </button>
                        {{-- Menampilkan pesan error jika password salah --}}
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                        {{-- Password Baru dengan Toggle --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">{{ __('Password Baru') }}</label>
                            <div class="input-group">
                                <input type="password" name="password" id="new_password" class="form-control" placeholder="********">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('new_password')">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Tombol Simpan --}}
                        <button type="submit" class="btn w-100 fw-bold shadow-sm" 
                                style="background-color: #FDB813; color: #000; border: none; padding: 10px;">
                            {{ __('Simpan Semua Perubahan') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.nextElementSibling.querySelector('i');
    
    if (input.type === "password") {
        input.type = "text";
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        input.type = "password";
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}
</script>
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

}

.success-ok-btn{

    background:#FDB813;

    color:#000;

    font-size:1rem;

}

.success-ok-btn:hover{

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

</script>
@endsection