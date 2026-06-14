<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Internal LPB Sistem</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500;600;700&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet" />

    <style>
        /* ===================== BASE ===================== */
body {
    background-color: #f8f9fa;
    overflow-x: hidden;
}

        /* ===================== SMART HEADER ===================== */
     .top-header {
        transition: transform 0.3s ease-in-out;
        will-change: transform;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1050;
        background: white;
    }
        .header-hidden { transform: translateY(-100%); }
        .content-wrapper { padding-top: 70px; }

        /* ===================== SIDEBAR ===================== */
        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #fff;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch;
        }
        .sidebar-header {
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* ===================== SIDEBAR NAV ===================== */
        .sidebar-nav .nav-link {
            padding: 12px 15px;
            border-radius: 10px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            color: #555;
            font-weight: 500;
        }
        .sidebar-nav .nav-link i {
            width: 20px;
            text-align: center;
        }
        .sidebar-nav .nav-link:hover {
            background-color: rgba(253, 184, 19, 0.1);
            color: #FDB813;
            transform: translateX(5px);
        }
        .sidebar-nav .nav-link.active {
            background-color: #FDB813;
            color: #000 !important;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(253, 184, 19, 0.2);
        }
        .sidebar-nav .nav-link.active i { color: #000; }

        /* ===================== AVATAR ===================== */
        .sidebar-avatar {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 3px solid #FDB813;
        }
        .avatar-placeholder {
            background: #FDB813;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* ===================== LANGUAGE BTN ===================== */
        .btn-lang-gold {
            background-color: #FDB813;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            padding: 10px;
        }
        .btn-lang-gold:hover { background-color: #e5a700; }

        /* ===================== MISC ===================== */
        #videoPreview {
            background-color: #000;
            object-fit: cover;
            will-change: transform;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .bg-cititrans {
            background-color: #FDB813;
            background: linear-gradient(135deg, #FDB813 0%, #FFA500 100%);
        }
        .profile-frame:hover {
            transform: scale(1.05);
            transition: 0.2s;
        }
        .navbar-brand img { height: 35px; }
        #alertBox {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
        }
       
    .pagination-yellow .page-link {
        color: #555;
        border: 1px solid #dee2e6;
        margin: 0 2px;
        padding: 6px 12px;
        border-radius: 8px !important; /* Membuat kotak agak bulat */
        font-size: 0.85rem;
    }

    .pagination-yellow .page-item.active .page-link {
        background-color: #FDB813 !important;
        border-color: #FDB813 !important;
        color: #000 !important;
        font-weight: bold;
        box-shadow: 0 2px 5px rgba(253, 184, 19, 0.3);
    }

    .pagination-yellow .page-item.disabled .page-link {
        color: #ccc;
        background-color: #f9f9f9;
    }
    
    .pagination-yellow .page-link:hover:not(.disabled) {
        background-color: rgba(253, 184, 19, 0.1);
        color: #FDB813;
    }

        .modal-content { border-radius: 15px; }
        .modal-body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .text-danger {
            color: #ff4d4d !important;
            margin-left: 2px;
            font-weight: bold;
        }
        .btn-warning {
            background-color: #e9b526 !important;
            border-color: #f3db00 !important;
            color: #000 !important;
        }
        .btn-warning:hover {
            background-color: #e0c800 !important;
            border-color: #e0c800 !important;
        }
        input:invalid:focus {
            border-color: #ff4d4d;
            box-shadow: 0 0 0 0.25rem rgba(255, 77, 77, 0.25);
        }
        .dropdown-item:hover { background-color: #fdb81333; }

        /* ===================== MAIN WRAPPER ===================== */
        .main-wrapper {
            margin-left: 280px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        /* ===================== RESPONSIVE ===================== */
        @media (max-width: 991.98px) {
            .sidebar { left: -280px; }
            .sidebar.active { left: 0; }
            .main-wrapper { margin-left: 0; }
        }
        

/* =========================================
   LOGOUT SPINNER
========================================= */

.logout-spinner{

    width:70px;

    height:70px;

    margin:auto;

    border-radius:50%;

    border:6px solid #f3f3f3;

    border-top:6px solid #FDB813;

    animation:spinLogout 1s linear infinite;

}

@keyframes spinLogout{

    100%{

        transform:rotate(360deg);

    }

}

    </style>
</head>

<body>

    {{-- ==================== SIDEBAR ==================== --}}
    <nav class="sidebar shadow-lg" id="sidebar">

        {{-- Header --}}
        <div class="sidebar-header">
            <a href="{{ route('admin.home') }}">
                <img src="{{ asset('assets/img/icons/logo-black.svg') }}" height="35" alt="logo" />
            </a>
            <button class="btn d-lg-none" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- ===== USER SECTION + DROPDOWN ===== --}}
        <div class="sidebar-user px-3 py-3 mb-2 border-bottom-soft" style="position: relative;">

            {{-- Trigger --}}
            <div id="sidebarUserTrigger"
                 style="cursor: pointer; border-radius: 12px; padding: 8px; transition: background 0.2s;
                        display: flex; align-items: center; gap: 12px;"
                 onmouseenter="this.style.background='rgba(253,184,19,0.08)'"
                 onmouseleave="this.style.background='transparent'">

                {{-- Avatar --}}
                <div class="profile-frame" style="flex-shrink: 0;">
                    @if(auth()->user()->photo && file_exists(public_path('storage/photos/' . auth()->user()->photo)))
                        <img src="{{ asset('storage/photos/' . auth()->user()->photo) }}"
                             class="rounded-circle sidebar-avatar shadow-sm"
                             style="width: 48px; height: 48px; object-fit: cover; border: 2px solid #FDB813;">
                    @else
                        <div class="avatar-placeholder rounded-circle shadow-sm fw-bold text-dark"
                             style="width: 48px; height: 48px; background: #FDB813;
                                    border: 2px solid #333; font-size: 1.2rem;
                                    display: flex; align-items: center; justify-content: center;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                {{-- Info --}}
                <div style="flex: 1; min-width: 0; overflow: hidden;">
                    <small class="text-muted d-block text-uppercase"
                           style="font-size: 0.65rem; font-weight: 700; letter-spacing: 0.8px;">
                        {{ __('Selamat Datang') }}
                    </small>
                    <div style="font-weight: 700; font-size: 0.85rem; color: #111;
                                white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ auth()->user()->name }}
                    </div>
                    <span class="badge bg-light text-muted border mt-1"
                          style="font-size: 0.65rem; font-weight: 600;">
                        <i class="fas fa-user-tag me-1 text-warning"></i>
                        {{ ucfirst(auth()->user()->role) }}
                    </span>
                </div>

                {{-- Chevron --}}
                <i class="fas fa-chevron-down text-muted" id="profileChevron"
                   style="font-size: 0.65rem; transition: transform 0.25s; flex-shrink: 0;"></i>
            </div>

            {{-- ===== DROPDOWN PANEL ===== --}}
            <div id="sidebarProfileDropdown"
                 style="display: none; position: absolute; top: calc(100% - 4px);
                        left: 12px; right: 12px; background: #fff;
                        border: 0.5px solid #e5e5e5; border-radius: 14px;
                        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
                        z-index: 9999; overflow: hidden;">

                {{-- Dropdown Header --}}
                <div style="padding: 14px; background: #fffbea;
                            border-bottom: 1px solid #f0e8c0;
                            display: flex; gap: 10px; align-items: center;">
                    @if(auth()->user()->photo && file_exists(public_path('storage/photos/' . auth()->user()->photo)))
                        <img src="{{ asset('storage/photos/' . auth()->user()->photo) }}"
                             style="width: 44px; height: 44px; border-radius: 50%;
                                    object-fit: cover; border: 2px solid #FDB813; flex-shrink: 0;">
                    @else
                        <div style="width: 44px; height: 44px; border-radius: 50%;
                                    background: #FDB813; border: 2px solid #333; flex-shrink: 0;
                                    display: flex; align-items: center; justify-content: center;
                                    font-weight: 700; font-size: 1.1rem; color: #000;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <div style="min-width: 0;">
                        <div style="font-weight: 700; font-size: 0.85rem; color: #111;
                                    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ auth()->user()->name }}
                        </div>
                        <div style="font-size: 0.72rem; color: #888;
                                    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                </div>

                {{-- Menu: Profile --}}
                <a href="{{ route('profile.indexA') }}"
                   style="display: flex; align-items: center; gap: 10px;
                          padding: 11px 14px; font-size: 0.82rem;
                          color: #333; text-decoration: none; transition: background 0.15s;"
                   onmouseenter="this.style.background='#fffbea'"
                   onmouseleave="this.style.background='transparent'">
                    <div style="width: 30px; height: 30px; border-radius: 8px;
                                background: #fff3cd; color: #856404; flex-shrink: 0;
                                display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user-cog" style="font-size: 0.78rem;"></i>
                    </div>
                    <span style="flex: 1; font-weight: 500;">{{ __('Profile') }}</span>
                    <i class="fas fa-chevron-right" style="font-size: 0.6rem; color: #ccc;"></i>
                </a>

                <div style="height: 0.5px; background: #f0f0f0; margin: 0 12px;"></div>

                {{-- =========================================
     MENU LOGOUT
========================================= --}}

<form action="{{ route('logout') }}"
      method="POST"
      id="logoutForm"
      style="margin:0;">

    @csrf

    <button type="button"
            onclick="showLogoutLoading()"
            style="
                width:100%;
                display:flex;
                align-items:center;
                gap:10px;
                padding:11px 14px;
                font-size:0.82rem;
                color:#c0392b;
                background:transparent;
                border:none;
                cursor:pointer;
                transition:background .15s;
                font-family:inherit;
            "
            onmouseenter="this.style.background='#fce8e6'"
            onmouseleave="this.style.background='transparent'">

        <div style="
            width:30px;
            height:30px;
            border-radius:8px;
            background:#fce8e6;
            color:#c0392b;
            flex-shrink:0;
            display:flex;
            align-items:center;
            justify-content:center;
        ">

            <i class="fas fa-sign-out-alt"
               style="font-size:.78rem;"></i>

        </div>

        <span style="
            flex:1;
            font-weight:500;
            text-align:left;
        ">

            {{ __('Keluar') }}

        </span>

    </button>

</form>

{{-- =========================================
     LOGOUT LOADING
========================================= --}}

<div id="logoutLoading"
     style="
        position:fixed;
        inset:0;
        background:rgba(0,0,0,.45);
        backdrop-filter:blur(6px);
        z-index:999999;
        display:none;
        align-items:center;
        justify-content:center;
        padding:20px;
     ">

    <div style="
        width:100%;
        max-width:340px;
        background:#fff;
        border-radius:28px;
        padding:35px 25px;
        text-align:center;
        box-shadow:0 20px 60px rgba(0,0,0,.18);
    ">

        {{-- SPINNER --}}
        <div class="logout-spinner"></div>

        {{-- TITLE --}}
        <h5 style="
            margin-top:24px;
            margin-bottom:10px;
            font-weight:700;
            color:#111;
        ">

            {{ __('Sedang Keluar...') }}

        </h5>

        {{-- DESC --}}
        <p style="
            color:#8c8c8c;
            font-size:.92rem;
            margin:0;
        ">

            {{ __('Mohon tunggu sebentar') }}

        </p>

    </div>

</div>

                <div style="padding: 8px 14px; background: #fafafa; border-top: 0.5px solid #f0f0f0;">
                    <span style="font-size: 0.65rem; color: #bbb;">Internal LPB Sistem &mdash; Cititrans</span>
                </div>
            </div>
        </div>

        {{-- ===== NAV LINKS ===== --}}
        <ul class="nav flex-column sidebar-nav px-2">

            <li class="nav-header small text-muted text-uppercase px-3 mt-3 mb-2"
                style="font-size: 0.65rem; font-weight: 700; letter-spacing: 1px;">
                {{ __('Halaman Utama') }}
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}"
                   href="{{ route('admin.home') }}">
                    <i class="fas fa-home me-3"></i> Home
                </a>
            </li>

            <li class="nav-header small text-muted text-uppercase px-3 mt-3 mb-2"
                style="font-size: 0.65rem; font-weight: 700; letter-spacing: 1px;">
                {{ __('Item Input') }}
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.input') ? 'active' : '' }}"
                   href="{{ route('admin.input') }}">
                    <i class="fas fa-plus-circle me-3"></i>{{ __('Input Barang') }}
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('report.*') ? 'active' : '' }}"
                   href="{{ route('report.list') }}">
                    <i class="fas fa-list me-3"></i>{{ __('List Barang') }}
                </a>
            </li>

            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'management')
            <li class="nav-header small text-muted text-uppercase px-3 mt-3 mb-2"
                style="font-size: 0.65rem; font-weight: 700; letter-spacing: 1px;">
                {{ __('Users') }}
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}"
                   href="{{ route('admin.users') }}">
                    <i class="fas fa-users-cog me-3"></i>{{ __('User Management') }}
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('admin.last_online') ? 'active' : '' }}"
                   href="{{ route('admin.last_online') }}">
                    <i class="fas fa-clock me-3"></i>{{ __('Last Online User') }}
                </a>
            </li>
            @endif

        </ul>

       

    </nav>
    {{-- ==================== END SIDEBAR ==================== --}}


    {{-- ==================== MAIN WRAPPER ==================== --}}
    <div class="main-wrapper" id="mainWrapper">

        {{-- Mobile Header --}}
        <header class="top-header d-lg-none p-3 bg-white shadow-sm mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <img src="{{ asset('assets/img/icons/logo-black.svg') }}" height="25">
                {{-- Tombol toggle: klik 1x buka, klik lagi tutup --}}
                <button class="btn btn-dark" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </header>

        <div class="content-wrapper pt-8">
            @yield('content')
        </div>

    </main>
    {{-- ==================== END MAIN WRAPPER ==================== --}}


    {{-- ==================== VENDOR SCRIPTS ==================== --}}
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('vendors/gsap/customEase.js') }}"></script>
    <script src="{{ asset('vendors/gsap/scrollToPlugin.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>


    {{-- ==================== MAIN APP SCRIPT ==================== --}}
<script>
(function () {

    'use strict';

    // =====================================================
    // ELEMENT
    // =====================================================

    const sidebar           = document.getElementById('sidebar');
    const sidebarToggle     = document.getElementById('sidebarToggle');
    const sidebarClose      = document.getElementById('sidebarClose');

    const topHeader         = document.querySelector('.top-header');

    const userTrigger       = document.getElementById('sidebarUserTrigger');
    const profileDropdown   = document.getElementById('sidebarProfileDropdown');
    const profileChevron    = document.getElementById('profileChevron');

    let lastScroll = 0;
    let currentStream = null;

    // =====================================================
    // SIDEBAR MOBILE
    // =====================================================

    function openSidebar() {
        if (sidebar) {
            sidebar.classList.add('active');
        }
    }

    function closeSidebar() {
        if (sidebar) {
            sidebar.classList.remove('active');
        }
    }

    function isSidebarOpen() {
        return sidebar && sidebar.classList.contains('active');
    }

    if (sidebarToggle) {

        sidebarToggle.addEventListener('click', function (e) {

            e.stopPropagation();

            if (isSidebarOpen()) {
                closeSidebar();
            } else {
                openSidebar();
            }

        });
    }

    if (sidebarClose) {

        sidebarClose.addEventListener('click', function () {
            closeSidebar();
        });

    }

    // klik luar sidebar
    document.addEventListener('click', function (e) {

        if (!isSidebarOpen()) return;

        const insideSidebar = sidebar.contains(e.target);
        const clickToggle = sidebarToggle && sidebarToggle.contains(e.target);

        if (!insideSidebar && !clickToggle) {
            closeSidebar();
        }

    });

    // =====================================================
    // PROFILE DROPDOWN
    // =====================================================

    function openDropdown() {

        if (!profileDropdown) return;

        profileDropdown.style.display = 'block';

        if (profileChevron) {
            profileChevron.style.transform = 'rotate(180deg)';
        }
    }

    function closeDropdown() {

        if (!profileDropdown) return;

        profileDropdown.style.display = 'none';

        if (profileChevron) {
            profileChevron.style.transform = 'rotate(0deg)';
        }
    }

    function isDropdownOpen() {

        return profileDropdown &&
               profileDropdown.style.display === 'block';

    }

    if (userTrigger && profileDropdown) {

        userTrigger.addEventListener('click', function (e) {

            e.stopPropagation();

            if (isDropdownOpen()) {
                closeDropdown();
            } else {
                openDropdown();
            }

        });

        document.addEventListener('click', function (e) {

            if (
                isDropdownOpen() &&
                !userTrigger.contains(e.target) &&
                !profileDropdown.contains(e.target)
            ) {
                closeDropdown();
            }

        });

    }

    // =====================================================
    // DROPDOWN FIX
    // =====================================================

    document.querySelectorAll('.dropdown-toggle').forEach(function(toggle){

        toggle.addEventListener('click', function(e){

            e.stopPropagation();

            const menu = this.nextElementSibling;

            document.querySelectorAll('.dropdown-menu.show').forEach(function(el){

                if(el !== menu){
                    el.classList.remove('show');
                }

            });

            menu.classList.toggle('show');

        });

    });

    document.addEventListener('click', function(){

        document.querySelectorAll('.dropdown-menu.show').forEach(function(el){
            el.classList.remove('show');
        });

    });

    // =====================================================
    // SMART NAVBAR MOBILE
    // =====================================================

    window.addEventListener('scroll', function () {

        const currentScroll = window.pageYOffset;

        if (!topHeader) return;

        if (currentScroll <= 0) {

            topHeader.classList.remove('header-hidden');
            return;
        }

        if (currentScroll > lastScroll && currentScroll > 80) {

            // scroll bawah
            topHeader.classList.add('header-hidden');

        } else {

            // scroll atas
            topHeader.classList.remove('header-hidden');

        }

        lastScroll = currentScroll;

    });

    // =====================================================
    // TOGGLE LOKASI
    // =====================================================

    window.toggleLokasiInput = function () {

        const tipe        = document.getElementById('tipe_lokasi');
        const wrapperUnit = document.getElementById('wrapper_unit');
        const wrapperPool = document.getElementById('wrapper_pool');

        if (!tipe || !wrapperUnit || !wrapperPool) return;

        const selectUnit = wrapperUnit.querySelector('select');
        const selectPool = wrapperPool.querySelector('select');

        const isUnit = tipe.value === 'unit';

        wrapperUnit.style.display = isUnit ? 'block' : 'none';
        wrapperPool.style.display = isUnit ? 'none' : 'block';

        if (selectUnit) {
            selectUnit.disabled = !isUnit;
        }

        if (selectPool) {
            selectPool.disabled = isUnit;
        }

    };

    // =====================================================
    // START CAMERA
    // =====================================================

    window.startCamera = async function () {

        const video = document.getElementById('videoPreview');

        if (!video) return;

        try {

            stopCamera();

            currentStream = await navigator.mediaDevices.getUserMedia({

                video: {
                    facingMode: 'environment',
                    width: { ideal: 1280 },
                    height: { ideal: 720 }
                },

                audio: false

            });

            video.srcObject = currentStream;

            video.onloadedmetadata = function () {
                video.play();
            };

        } catch (err) {

            console.error('Camera Error:', err);

            alert('Izin kamera ditolak atau perangkat tidak mendukung.');

        }

    };

    // =====================================================
    // STOP CAMERA
    // =====================================================

    window.stopCamera = function () {

        if (currentStream) {

            currentStream.getTracks().forEach(function(track){
                track.stop();
            });

            currentStream = null;
        }

    };

    // =====================================================
    // TAKE SNAPSHOT + AUTO COMPRESS
    // =====================================================

    window.takeSnapshot = function () {

        const video     = document.getElementById('videoPreview');
        const canvas    = document.getElementById('canvasCapture');
        const fileInput = document.getElementById('aksesFile');

        if (!video || !canvas || !fileInput) return;

        if (video.readyState !== video.HAVE_ENOUGH_DATA) return;

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        const ctx = canvas.getContext('2d');

        ctx.drawImage(video, 0, 0);

        compressCanvas(canvas, 0.8);

    };

    // =====================================================
    // COMPRESS CANVAS
    // =====================================================

    function compressCanvas(canvas, quality) {

        canvas.toBlob(function(blob){

            if (!blob) {
                alert('Gagal compress gambar');
                return;
            }

            // jika masih > 2MB
            if (blob.size > 2 * 1024 * 1024) {

                quality -= 0.1;

                if (quality < 0.2) {

                    alert('Ukuran gambar terlalu besar');
                    return;
                }

                compressCanvas(canvas, quality);
                return;
            }

            const file = new File(
                [blob],
                'LPB_' + Date.now() + '.jpg',
                {
                    type: 'image/jpeg',
                    lastModified: Date.now()
                }
            );

            const dataTransfer = new DataTransfer();

            dataTransfer.items.add(file);

            document.getElementById('aksesFile').files =
                dataTransfer.files;

            showPhotoPreview(URL.createObjectURL(blob));

            const sizeKB = (blob.size / 1024).toFixed(0);

            const info = document.getElementById('photoSizeInfo');

            if (info) {
                info.textContent =
                    'Ukuran setelah kompres: ' + sizeKB + ' KB';
            }

            const modalEl = document.getElementById('cameraModal');

            if (modalEl && window.bootstrap) {

                const modal = bootstrap.Modal.getInstance(modalEl);

                if (modal) {
                    modal.hide();
                }

            }

            stopCamera();

        }, 'image/jpeg', quality);

    }

    // =====================================================
    // PREVIEW FOTO
    // =====================================================

    window.showPhotoPreview = function(url){

        const preview = document.getElementById('photoPreview');
        const container = document.getElementById('photoPreviewContainer');

        if(preview){
            preview.src = url;
        }

        if(container){
            container.classList.remove('d-none');
        }

    };

    // =====================================================
    // FILE GALLERY AUTO COMPRESS
    // =====================================================

    window.handleFileSelect = function(event){

        const file = event.target.files[0];

        if (!file) return;

        const img = new Image();

        const reader = new FileReader();

        reader.onload = function(e){

            img.onload = function(){

                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                let width = img.width;
                let height = img.height;

                const MAX_WIDTH = 1280;

                if(width > MAX_WIDTH){

                    height *= MAX_WIDTH / width;
                    width = MAX_WIDTH;
                }

                canvas.width = width;
                canvas.height = height;

                ctx.drawImage(img, 0, 0, width, height);

                compressCanvas(canvas, 0.8);

            };

            img.src = e.target.result;

        };

        reader.readAsDataURL(file);

    };

})();



/* =========================================
   LOGOUT LOADING
========================================= */

function showLogoutLoading(){

    const loading =
        document.getElementById(
            'logoutLoading'
        );

    if(loading){

        loading.style.display = 'flex';

    }

    setTimeout(() => {

        document.getElementById(
            'logoutForm'
        ).submit();

    }, 700);

}


</script>

</body>
</html>