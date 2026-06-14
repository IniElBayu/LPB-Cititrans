<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Daftar Akun') }} | CS Portal</title>
    
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #FDB813; /* Kuning Cititrans */
            --dark: #1a1d24;
            --dark-light: #2c313c;
        }

        body {
            background: linear-gradient(135deg, #f9f9f9, #ffffff);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            margin: 0;
        }

        .login-container {
            max-width: 1000px;
            width: 100%;
            margin: auto;
            padding: 20px;
        }

        .login-card {
            border-radius: 25px;
            overflow: hidden;
            border: none;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        }

        /* LEFT SIDE (Sama dengan Login) */
        .login-left {
            background: linear-gradient(135deg, var(--dark), var(--dark-light));
            color: white;
            padding: 50px;
            position: relative;
        }

        .login-left h2 {
            font-weight: 700;
        }

        /* RIGHT SIDE */
        .login-right {
            padding: 50px;
            background: white;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            background: #f8f9fa;
            border: 1px solid #eee;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(243,219,0,0.2);
            background: #fff;
        }

        .input-group-text {
            border-radius: 12px 0 0 12px;
            background: #f8f9fa;
            border: 1px solid #eee;
        }

        .btn-register {
            background: var(--primary);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
            color: #000;
        }
        /* Style Dropdown Pill Emas Cititrans */
        .btn-lang-gold {
            background-color: #FDB813;
            border: none;
            border-radius: 50px; /* Bentuk Pill */
            padding: 6px 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .btn-lang-gold:hover, .btn-lang-gold:focus {
            background-color: #e5a700;
            transform: scale(1.05);
        }

        /* Customize Panah Dropdown (Warna Hitam) */
        .btn-lang-gold::after {
            border-top: 0.35em solid #000;
            margin-left: 0.5em;
            vertical-align: middle;
        }

        /* Styling Box Menu Dropdown */
        .custom-lang-menu {
            border-radius: 15px;
            margin-top: 10px !important;
            min-width: 180px;
            overflow: hidden;
            padding: 0;
        }

        .custom-lang-menu .dropdown-item {
            padding: 12px 20px;
            color: #000;
        }

        .custom-lang-menu .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .custom-lang-menu .dropdown-item.active {
            background-color: #fff6e0;
            color: #000;
        }

        /* Ukuran Bendera Bulat */
        .fi.fis {
            width: 22px !important;
            height: 22px !important;
            object-fit: cover;
        }
        .btn-register:hover {
            background: #e0c800;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(243,219,0,0.4);
        }

        /* ANIMATION */
        .login-card {
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* MOBILE OPTIMIZATION */
        @media(max-width: 991px){
            .login-left {
                display: none !important;
            }
            .login-right {
                padding: 40px 30px;
            }
        }
    </style>
</head>

<body>

<div class="container login-container">
    <div class="card login-card">

    <div class="position-absolute top-0 end-0 p-3" style="z-index: 10;">
    <div class="dropdown">
        <button class="btn btn-lang-gold dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if(app()->getLocale() == 'id')
                <span class="fi fi-id fis rounded-circle me-2"></span>
            @else
                <span class="fi fi-gb fis rounded-circle me-2"></span>
            @endif
        </button>
        <ul class="dropdown-menu dropdown-menu-end custom-lang-menu shadow border-0">
            <li>
                <a class="dropdown-item d-flex align-items-center py-2 {{ app()->getLocale() == 'id' ? 'active' : '' }}" href="{{ route('lang.switch', 'id') }}">
                    <span class="fi fi-id fis rounded-circle me-3"></span>
                    <span class="fw-bold">Indonesia</span>
                </a>
            </li>
            <div class="dropdown-divider m-0 opacity-50"></div>
            <li>
                <a class="dropdown-item d-flex align-items-center py-2 {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ route('lang.switch', 'en') }}">
                    <span class="fi fi-gb fis rounded-circle me-3"></span>
                    <span class="fw-bold">English</span>
                </a>
            </li>
        </ul>
    </div>
</div>


        <div class="row g-0">

            <div class="col-lg-6 login-left d-none d-lg-flex flex-column justify-content-center align-items-center text-center">
                <img src="{{ asset('assets/img/icons/logo copy.webp') }}" width="150" class="mb-4">
                <h2>{{ __('Bergabunglah') }}</h2>
                <p class="mt-3 opacity-75 px-4">
                    {{ __('Daftarkan akun petugas Anda untuk mulai mengelola laporan barang hilang dan temuan dengan sistem yang lebih terintegrasi.') }}
                </p>
                <div class="mt-4 p-3 border border-warning border-opacity-25 rounded-3">
                    <small class="text-warning"><i class="bi bi-info-circle me-1"></i> {{ __('Akun baru memerlukan persetujuan dari Management.') }}</small>
                </div>
            </div>

            <div class="col-lg-6 login-right">
<br>
                <h3 class="fw-bold mb-3">{{ __('Daftar Akun Petugas') }}</h3>
                <p class="text-muted small mb-4">{{ __('Silakan lengkapi data untuk pengajuan akun') }}</p>

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small">{{ __('Nama Lengkap') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill text-muted"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Masukkan nama sesuai ID') }}" required autofocus>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">{{ __('Username') }}</label>
                        <div class="input-group">
                            {{-- Ikon diganti menjadi Person (User) --}}
                            <span class="input-group-text border-end-0 bg-white">
                                <i class="bi bi-person-fill text-muted"></i>
                            </span>
                            {{-- Type diubah menjadi text, name menjadi username --}}
                            <input type="text" 
                                name="Username" 
                                class="form-control" 
                                placeholder="{{ __('Masukkan Username') }}" 
                                required 
                                oninput="this.value = 
                                this.value.toLowerCase().replace(/\s+/g, '')">
                        </div>
                        <div class="form-text mt-1" style="font-size: 0.7rem;">
                         
                        </div>
                    </div>

                {{-- =========================
    NIK
========================= --}}
<div class="mb-4">

    <label class="form-label small fw-bold">

        {{ __('NIK') }}

    </label>

    <div class="input-group">

        {{-- ICON --}}
        <span class="input-group-text border-end-0 bg-white">

            <i class="bi bi-person-vcard text-muted"></i>

        </span>

        {{-- INPUT --}}
        <input type="password"
               name="nik"
               id="nikInput"
               class="form-control border-start-0 border-end-0 ps-0"
               placeholder="{{ __('Masukan NIK') }}"
               required>

        {{-- TOGGLE --}}
        <span class="input-group-text bg-white border-start-0 toggle-password"
              data-target="nikInput"
              data-icon="nikIcon"
              style="
                    cursor:pointer;
                    transition:.3s ease;
              ">

            <i class="bi bi-eye text-muted"
               id="nikIcon"></i>

        </span>

    </div>

    <div class="form-text mt-1"
         style="font-size:0.72rem;">

        {{ __('Digunakan untuk login staff.') }}

    </div>

</div>
@error('nik')

    <small class="text-danger d-block mt-1">

        <i class="bi bi-exclamation-circle me-1"></i>

        {{ $message }}

    </small>

@enderror
                {{-- =========================
                    PASSWORD
                ========================= --}}
                <div class="mb-4">

                    <label class="form-label small fw-bold">

                        {{ __('Password') }}

                    </label>

                    <div class="input-group">

                        {{-- ICON --}}
                        <span class="input-group-text border-end-0 bg-white">

                            <i class="bi bi-lock text-muted"></i>

                        </span>

                        {{-- INPUT --}}
                        <input type="password"
                            name="password"
                            id="passwordInput"
                            class="form-control border-start-0 border-end-0 ps-0"
                            placeholder="{{ __('Min. 8 karakter') }}"
                            required>

                        {{-- TOGGLE --}}
                        <span class="input-group-text bg-white border-start-0 toggle-password"
                            data-target="passwordInput"
                            data-icon="passwordIcon"
                            style="
                                    cursor:pointer;
                                    transition:.3s ease;
                            ">

                            <i class="bi bi-eye text-muted"
                            id="passwordIcon"></i>

                        </span>

                    </div>

                </div>

{{-- =========================
     TOGGLE SCRIPT
========================= --}}
<script>

document.addEventListener('DOMContentLoaded', function(){

    const toggles =
        document.querySelectorAll('.toggle-password');

    toggles.forEach(toggle => {

        toggle.addEventListener('click', function(){

            const targetId =
                this.dataset.target;

            const iconId =
                this.dataset.icon;

            const input =
                document.getElementById(targetId);

            const icon =
                document.getElementById(iconId);

            // animation
            icon.style.transform =
                'scale(0.7) rotate(90deg)';

            icon.style.opacity = '0.5';

            setTimeout(() => {

                const isPassword =
                    input.type === 'password';

                // toggle type
                input.type =
                    isPassword
                        ? 'text'
                        : 'password';

                // toggle icon
                icon.classList.toggle('bi-eye');

                icon.classList.toggle('bi-eye-slash');

                // reset animation
                icon.style.transform =
                    'scale(1) rotate(0deg)';

                icon.style.opacity = '1';

            },120);

        });

    });

});
</script>

                    <button type="submit" class="btn btn-register w-100">
                        <i class="bi bi-person-plus-fill me-2"></i>{{ __('Daftar Akun') }}
                    </button>

                    <p class="text-center mt-4 small">
                        {{ __('Sudah memiliki akun?') }} 
                        <a href="{{ route('login') }}" class="fw-bold text-warning text-decoration-none">
                            {{ __('Masuk di sini') }}
                        </a>
                    </p>
                </form>

                <p class="text-center mt-5 text-muted small" style="font-size: 0.75rem;">
                    &copy; 2026 <strong>Internal LPB Sistem</strong><br>
                    Cititrans IT Division
                </p>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>