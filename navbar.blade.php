<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
     <title>Internal LPB Sistem</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/logo-black.svg') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
<link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
<meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
<meta name="theme-color" content="#ffffff">


<!-- ===============================================-->
<!--    Stylesheets-->
<!-- ===============================================-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&amp;display=swap" rel="stylesheet">
<link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/user.css') }}" rel="stylesheet" />
  </head>

<style>
    /* Mengganti warna saat kursor menempel (hover) */
.dropdown-item:hover {
    background-color: #f3db00 !important; /* Warna kuning tema Anda */
    color: #000 !important;               /* Warna teks hitam */
}

/* Mengganti warna saat item diklik/aktif (focus) */
.dropdown-item:active, .dropdown-item:focus {
    background-color: #e0c800 !important; /* Kuning yang lebih gelap sedikit */
    color: #000 !important;
}
</style>

<main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3" data-navbar-on-scroll="light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('petugas.index') }}">
                <img src="{{ asset('assets/img/icons/logo-black.svg') }}" height="35" alt="logo" />
            </a>

            <div class="d-none d-lg-block ms-3">
                @auth
                    <span class="fw-semibold text-dark">
                        Selamat Datang, <strong>{{ auth()->user()->name }}</strong> 
                    </span>
                @endauth
            </div>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link px-3 text-dark" href="{{ route('petugas.index') }}">Input Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-dark" href="{{ route('petugas.list') }}">List Barang</a>
                    </li>
                    
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ auth()->user()->photo && file_exists(public_path('storage/photos/' . auth()->user()->photo)) 
                                ? asset('storage/photos/' . auth()->user()->photo) 
                                : asset('assets/img/icons/15.png') }}" 
                                width="35" height="35" class="rounded-circle border" style="object-fit: cover;">
                        </a>
                      <ul class="dropdown-menu dropdown-menu-end shadow border-0">
    <li class="px-3 py-2 border-bottom mb-2 bg-light">
        <div class="fw-bold text-dark" style="font-size: 0.9rem;">
            {{ auth()->user()->name }}
        </div>
        <small class="text-muted" style="font-size: 0.75rem;">
            {{ ucfirst(auth()->user()->role) }}
        </small>
    </li>

    <li>
        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.index') }}">
            <i class="fas fa-user-cog me-2"></i> Pengaturan Profil
        </a>
    </li>
    
    <li><hr class="dropdown-divider"></li>
    
    <li>
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="dropdown-item text-danger d-flex align-items-center">
                <i class="fas fa-sign-out-alt me-2"></i> Log Out
            </button>
        </form>
    </li>
</ul>
            </div>
        </div>
    </nav>

  
  @yield('content')
        <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('vendors/gsap/customEase.js') }}"></script>
    <script src="{{ asset('vendors/gsap/scrollToPlugin.js') }}"></script>
    <!--script(src=`${CWD}vendors/gsap/drawSVGPlugin.js`)-->
    <script src="{{ asset('assets/js/theme.js') }}"></script>