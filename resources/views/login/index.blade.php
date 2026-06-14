<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Login Sistem') }} | CS Portal</title>
    
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #FDB813;
            --dark: #1a1d24;
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
            margin: auto;
            padding: 20px;
        }

        .login-card {
            border-radius: 25px;
            overflow: hidden;
            border: none;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            background: white;
        }

        /* LEFT SIDE */
        .login-left {
            background: linear-gradient(135deg, #1a1d24, #2c313c);
            color: white;
            padding: 50px;
            position: relative;
        }

        .login-left h2 {
            font-weight: 700;
            z-index: 2;
        }

        /* RIGHT SIDE */
        .login-right {
            padding: 50px;
            background: white;
            position: relative;
        }

        .back-link {
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .back-link:hover {
            color: var(--primary) !important;
            transform: translateX(-5px);
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
            box-shadow: 0 0 0 0.2rem rgba(253, 184, 19, 0.2);
            background: #fff;
        }

        .input-group-text {
            border-radius: 12px 0 0 12px;
            background: #f8f9fa;
            border: 1px solid #eee;
        }

        .btn-login {
            background: var(--primary);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: bold;
            color: #000;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #FDB813;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(253, 184, 19, 0.3);
        }

        /* FLAG DROPDOWN STYLING */
        .lang-dropdown {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }
        /* Styling Dropdown Bahasa ala Cititrans */
        .btn-lang-gold {
            background-color: #FDB813;
            border: none;
            border-radius: 50px; /* Membuat bentuk Pill */
            padding: 6px 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .btn-lang-gold:hover, .btn-lang-gold:focus {
            background-color: #e5a700;
            transform: scale(1.05);
        }

        /* Menghilangkan panah bawaan bootstrap jika ingin lebih mirip gambar */
        .btn-lang-gold::after {
            border-top: 0.35em solid #000; /* Warna panah hitam */
            margin-left: 0.5em;
        }

        /* Styling Menu Dropdown */
        .custom-lang-menu {
            border-radius: 15px;
            border: none;
            margin-top: 10px !important;
            min-width: 160px;
            overflow: hidden;
        }

        .custom-lang-menu .dropdown-item {
            padding: 12px 20px;
            color: #000;
            transition: background 0.2s;
        }

        .custom-lang-menu .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .custom-lang-menu .dropdown-item.active {
            background-color: #fff6e0;
            color: #000;
        }

        /* Ukuran Bendera agar Bulat Sempurna */
        .fi.fis {
            width: 24px !important;
            height: 24px !important;
            object-fit: cover;
        }
        /* ANIMATION */
        .login-card {
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media(max-width: 768px){
            .login-left { display: none; }
            .login-right { padding: 30px; }
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="login-card">
        <div class="row g-0">
            
            <div class="col-lg-6 login-left d-none d-lg-flex flex-column justify-content-center align-items-center text-center">
                <img src="{{ asset('assets/img/icons/logo copy.webp') }}" width="150" class="mb-4 shadow-sm" alt="Cititrans Logo">
                <h2>{{ __('Selamat Datang') }}</h2>
                <p class="mt-3 opacity-75">
                    {{ __('Sistem Lost & Found Cititrans membantu pengelolaan barang hilang secara cepat, aman, dan terstruktur.') }}
                </p>
            </div>

            <div class="col-lg-6 login-right">
                
            <div class="lang-dropdown">
            <div class="dropdown">
                <button class="btn btn-lang-gold dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(app()->getLocale() == 'id')
                        <span class="fi fi-id fis rounded-circle me-2"></span>
                    @else
                        <span class="fi fi-gb fis rounded-circle me-2"></span>
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end custom-lang-menu shadow">
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

                <a href="{{ route('home') }}" class="fw-bold text-secondary text-decoration-none back-link small">
                    <i class="bi bi-arrow-left me-1"></i> {{ __('Kembali Ke Halaman Utama') }}
                </a>

                <div class="mt-5">
                    <h3 class="fw-bold mb-1">{{ __('Login Sistem') }}</h3>
                    <p class="text-muted small mb-4">{{ __('Silakan masuk untuk melanjutkan') }}</p>

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        @if($errors->has('loginError'))
                            <div class="alert alert-danger border-0 small py-2">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first('loginError') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label small fw-bold">{{ __('Username') }}</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-white">
                                    <i class="bi bi-person text-muted"></i>
                                </span>
                                <input type="text" name="login" class="form-control border-start-0 ps-0" placeholder="{{ __('Masukkan Username') }}" required>
                            </div>
                        </div>

                        <div class="mb-4">

    <label class="form-label small fw-bold">

        {{ __('Password') }}

    </label>

    <div class="input-group password-group">

        {{-- LOCK ICON --}}
        <span class="input-group-text border-end-0 bg-white">

            <i class="bi bi-lock text-muted"></i>

        </span>

        {{-- PASSWORD INPUT --}}
        <input type="password"
               name="password"
               id="passwordInput"
               class="form-control border-start-0 border-end-0 ps-0"
               placeholder="••••••••"
               required>

        {{-- TOGGLE --}}
        <span class="input-group-text bg-white border-start-0 password-toggle"
              id="togglePassword"
              style="
                    cursor:pointer;
                    transition:.3s ease;
              ">

            <i class="bi bi-eye text-muted"
               id="toggleIcon"></i>

        </span>

    </div>

</div>

{{-- PASSWORD TOGGLE SCRIPT --}}
<script>

document.addEventListener('DOMContentLoaded', function(){

    const passwordInput =
        document.getElementById('passwordInput');

    const togglePassword =
        document.getElementById('togglePassword');

    const toggleIcon =
        document.getElementById('toggleIcon');

    togglePassword.addEventListener('click', function(){

        // smooth icon animation
        toggleIcon.style.transform =
            'scale(0.7) rotate(90deg)';

        toggleIcon.style.opacity = '0.5';

        setTimeout(() => {

            const isPassword =
                passwordInput.type === 'password';

            // toggle input
            passwordInput.type =
                isPassword
                    ? 'text'
                    : 'password';

            // toggle icon
            toggleIcon.classList.toggle(
                'bi-eye'
            );

            toggleIcon.classList.toggle(
                'bi-eye-slash'
            );

            // reset animation
            toggleIcon.style.transform =
                'scale(1) rotate(0deg)';

            toggleIcon.style.opacity = '1';

        },120);

    });

});
</script>

                        <button type="submit" class="btn btn-login w-100 mb-3">
                            <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('MASUK') }} 
                        </button>

                        <p class="text-center small">
                            {{ __('Belum punya akun?') }}  
                            <a href="{{ route('register') }}" class="fw-bold text-dark text-decoration-underline">
                                {{ __('Daftar di sini') }}
                            </a>
                        </p>
                    </form>
                </div>

                <div class="text-center mt-5 text-muted small">
                    <p class="mb-0">&copy; 2026 <strong>Internal LPB Sistem</strong></p>
                    <span>Powered By IT Division</span>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>