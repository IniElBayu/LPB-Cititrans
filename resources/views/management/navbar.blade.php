
    <style>
        /* ===== ROOT ===== */
        :root {
            --gold:          #FDB813;
            --gold-dark:     #e0a800;
            --gold-soft:     rgba(253,184,19,.10);
            --gold-glow:     0 4px 16px rgba(253,184,19,.30);
            --sidebar-w:     260px;
            --sidebar-bg:    #ffffff;
            --dark:          #111318;
            --text-muted:    #6b7280;
            --border:        #e9ecef;
            --radius:        12px;
            --radius-lg:     18px;
            --shadow:        0 2px 12px rgba(0,0,0,.07);
            --shadow-md:     0 4px 24px rgba(0,0,0,.10);
        }

        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

        body {
            background: #f4f5f9;
            margin: 0;
            overflow-x: hidden;
        }

        /* ===========================
           SIDEBAR
        =========================== */
        .sidebar {
            width: var(--sidebar-w);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--sidebar-bg);
            z-index: 1050;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s cubic-bezier(.4,0,.2,1);
            overflow-y: auto;
            overflow-x: hidden;
            border-right: 1px solid var(--border);
            box-shadow: 2px 0 20px rgba(0,0,0,.05);
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .sidebar::-webkit-scrollbar { display: none; }

        /* ===== SIDEBAR LOGO ===== */
        .sidebar-logo {
            padding: 22px 20px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
        }
        .sidebar-logo img { height: 32px; }
        .btn-sidebar-close {
            width: 30px; height: 30px;
            border: none; background: #f1f3f5;
            border-radius: 8px; cursor: pointer;
            display: none; align-items: center; justify-content: center;
            color: #555; font-size: 0.85rem;
            transition: background .2s;
        }
        .btn-sidebar-close:hover { background: #e5e7ea; }

        /* ===== SIDEBAR USER CARD ===== */
        .sidebar-user {
            margin: 16px 12px 8px;
            border-radius: var(--radius);
            background: #fafafa;
            border: 1px solid var(--border);
            overflow: visible;
            position: relative;
        }
        .user-trigger {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border-radius: var(--radius);
            cursor: pointer;
            transition: background .2s;
            user-select: none;
        }
        .user-trigger:hover { background: var(--gold-soft); }

        .user-avatar {
            width: 42px; height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2.5px solid var(--gold);
            flex-shrink: 0;
        }
        .user-avatar-placeholder {
            width: 42px; height: 42px;
            border-radius: 50%;
            background: var(--gold);
            border: 2.5px solid #333;
            flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1rem; color: #000;
        }

        .user-info { flex: 1; min-width: 0; overflow: hidden; }
        .user-welcome {
            font-size: 0.62rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: var(--text-muted);
            display: block;
        }
        .user-name {
            font-weight: 700;
            font-size: 0.83rem;
            color: var(--dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .user-role {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 0.62rem;
            font-weight: 600;
            color: var(--text-muted);
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 50px;
            padding: 2px 8px;
            margin-top: 3px;
        }
        .user-chevron {
            font-size: 0.62rem;
            color: var(--text-muted);
            transition: transform .25s;
            flex-shrink: 0;
        }
        .user-chevron.open { transform: rotate(180deg); }

        /* ===== PROFILE DROPDOWN ===== */
        .profile-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 6px);
            left: 0; right: 0;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-md);
            z-index: 9999;
            overflow: hidden;
        }
        .profile-dropdown.open { display: block; }

        .pd-header {
            padding: 14px 16px;
            background: #fffbea;
            border-bottom: 1px solid #f0e8c0;
            display: flex; align-items: center; gap: 10px;
        }
        .pd-header-avatar {
            width: 40px; height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--gold);
            flex-shrink: 0;
        }
        .pd-header-avatar-ph {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: var(--gold);
            border: 2px solid #333;
            flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1rem; color: #000;
        }
        .pd-header-name {
            font-weight: 700; font-size: 0.83rem;
            color: var(--dark);
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .pd-header-email {
            font-size: 0.7rem; color: var(--text-muted);
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }

        .pd-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 14px;
            text-decoration: none;
            transition: background .15s;
            color: #333;
        }
        .pd-item:hover { background: #fffbea; color: #333; }
        .pd-item-icon {
            width: 28px; height: 28px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.75rem; flex-shrink: 0;
        }
        .pd-item-icon.profile { background: #fff3cd; color: #856404; }
        .pd-item-icon.logout  { background: #fce8e6; color: #c0392b; }
        .pd-item span { flex: 1; font-weight: 500; font-size: 0.82rem; }

        .pd-item.logout-btn {
            width: 100%; border: none; cursor: pointer;
            background: transparent; text-align: left;
            font-family: inherit; color: #c0392b;
        }
        .pd-item.logout-btn:hover { background: #fce8e6; }

        .pd-footer {
            padding: 8px 14px;
            background: #fafafa;
            border-top: 1px solid var(--border);
            font-size: 0.62rem;
            color: #bbb;
        }
        .pd-divider { height: 1px; background: var(--border); margin: 0 12px; }

        /* ===== SIDEBAR NAV ===== */
        .sidebar-section-label {
            font-size: 0.62rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            padding: 16px 20px 6px;
        }

        .sidebar-nav { padding: 0 12px; list-style: none; margin: 0; }
        .sidebar-nav li { margin-bottom: 2px; }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: var(--radius);
            color: #555;
            font-weight: 500;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all .2s ease;
        }
        .sidebar-nav .nav-link .nav-icon {
            width: 34px; height: 34px;
            border-radius: 10px;
            background: #f1f3f5;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem;
            color: #555;
            flex-shrink: 0;
            transition: all .2s;
        }
        .sidebar-nav .nav-link:hover {
            background: var(--gold-soft);
            color: #000;
            transform: translateX(4px);
        }
        .sidebar-nav .nav-link:hover .nav-icon {
            background: var(--gold);
            color: #000;
        }
        .sidebar-nav .nav-link.active {
            background: var(--gold);
            color: #000;
            font-weight: 700;
            box-shadow: var(--gold-glow);
        }
        .sidebar-nav .nav-link.active .nav-icon {
            background: rgba(0,0,0,.08);
            color: #000;
        }

        /* ===== SIDEBAR FOOTER ===== */
        .sidebar-footer {
            margin-top: auto;
            padding: 16px 20px;
            border-top: 1px solid var(--border);
            font-size: 0.7rem;
            color: var(--text-muted);
            text-align: center;
        }

        /* ===========================
           MAIN WRAPPER
        =========================== */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            transition: margin-left .3s cubic-bezier(.4,0,.2,1);
            display: flex;
            flex-direction: column;
        }

        /* ===========================
           MOBILE TOPBAR
        =========================== */
        .mobile-topbar {
            display: none;
            position: sticky;
            top: 0;
            z-index: 1040;
            background: #fff;
            border-bottom: 1px solid var(--border);
            padding: 12px 16px;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow);
        }
        .mobile-topbar img { height: 26px; }
        .btn-burger {
            width: 38px; height: 38px;
            border: 1px solid var(--border);
            background: #fff;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 1rem; color: var(--dark);
            transition: all .2s;
        }
        .btn-burger:hover { background: var(--gold-soft); border-color: var(--gold); }

        /* ===== SIDEBAR OVERLAY (mobile) ===== */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.35);
            z-index: 1040;
            backdrop-filter: blur(2px);
        }
        .sidebar-overlay.active { display: block; }

        /* ===========================
           CONTENT AREA
        =========================== */
        .content-area {
            flex: 1;
            padding: 0;
        }

        /* ===========================
           PAGINATION (global)
        =========================== */
        .page-item .page-link {
            color: #555;
            border: 1px solid var(--border);
            border-radius: 8px !important;
            margin: 0 2px;
            font-size: 0.82rem;
            transition: all .2s;
        }
        .page-item.active .page-link {
            background: var(--gold) !important;
            border-color: var(--gold) !important;
            color: #000 !important;
            font-weight: 700;
            box-shadow: var(--gold-glow);
        }
        .page-item.disabled .page-link { color: #ccc; background: #f9fafb; }
        .page-item .page-link:hover:not(.disabled) {
            background: var(--gold-soft);
            border-color: var(--gold);
            color: var(--dark);
        }

        /* ===========================
           MODAL (global)
        =========================== */
        .modal-content { border-radius: var(--radius-lg); }

        /* ===========================
           RESPONSIVE
        =========================== */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(calc(-1 * var(--sidebar-w)));
            }
            .sidebar.open {
                transform: translateX(0);
                box-shadow: var(--shadow-md);
            }
            .btn-sidebar-close { display: flex; }
            .main-wrapper { margin-left: 0; }
            .mobile-topbar { display: flex; }
        }
    </style>
</head>

<body>

{{-- ===========================
     MOBILE SIDEBAR OVERLAY
=========================== --}}
<div class="sidebar-overlay" id="sidebarOverlay"></div>

{{-- ===========================
     SIDEBAR
=========================== --}}
<nav class="sidebar" id="sidebar">

    {{-- Logo --}}
    <div class="sidebar-logo">
        <a href="{{ route('management.list') }}">
            <img src="{{ asset('assets/img/icons/logo-black.svg') }}" alt="Cititrans Logo">
        </a>
        <button class="btn-sidebar-close" id="sidebarClose" aria-label="Tutup sidebar">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    {{-- User Card --}}
    <div class="sidebar-user" id="sidebarUser">

        {{-- Trigger --}}
        <div class="user-trigger" id="userTrigger">
            {{-- Avatar --}}
            @if(auth()->user()->photo && file_exists(public_path('storage/photos/' . auth()->user()->photo)))
                <img src="{{ asset('storage/photos/' . auth()->user()->photo) }}"
                     class="user-avatar" alt="avatar">
            @else
                <div class="user-avatar-placeholder">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            @endif

            {{-- Info --}}
            <div class="user-info">
                <span class="user-welcome">{{ __('Selamat Datang') }}</span>
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-role">
                    <i class="fas fa-user-tag" style="color: var(--gold); font-size:.6rem;"></i>
                    {{ ucfirst(auth()->user()->role) }}
                </div>
            </div>

            <i class="bi bi-chevron-down user-chevron" id="userChevron"></i>
        </div>

        {{-- Dropdown --}}
        <div class="profile-dropdown" id="profileDropdown">

            {{-- Header --}}
            <div class="pd-header">
                @if(auth()->user()->photo && file_exists(public_path('storage/photos/' . auth()->user()->photo)))
                    <img src="{{ asset('storage/photos/' . auth()->user()->photo) }}"
                         class="pd-header-avatar" alt="avatar">
                @else
                    <div class="pd-header-avatar-ph">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
                <div style="min-width:0;">
                    <div class="pd-header-name">{{ auth()->user()->name }}</div>
                    <div class="pd-header-email">{{ auth()->user()->email }}</div>
                </div>
            </div>

            {{-- Profile Link --}}
            <a href="{{ route('profile.indexU') }}" class="pd-item">
                <div class="pd-item-icon profile"><i class="fas fa-user-cog"></i></div>
                <span>{{ __('Edit Profile') }}</span>
                <i class="bi bi-chevron-right" style="font-size:.65rem; color:#ccc;"></i>
            </a>

            <div class="pd-divider"></div>

            {{-- Logout --}}
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="pd-item logout-btn">
                    <div class="pd-item-icon logout"><i class="fas fa-sign-out-alt"></i></div>
                    <span>{{ __('Keluar') }}</span>
                </button>
            </form>

            <div class="pd-footer">Internal LPB Sistem &mdash; Cititrans</div>
        </div>
    </div>

    {{-- Nav Section --}}
    {{-- ===========================
     MENU UTAMA
=========================== --}}
<p class="sidebar-section-label">

    {{ __('Management Menu') }}

</p>

<ul class="sidebar-nav">

    {{-- LIST BARANG --}}
    <li>

        <a class="nav-link
                  {{ request()->routeIs('management.list*')
                        ? 'active'
                        : '' }}"
           href="{{ route('management.list') }}">

            <span class="nav-icon">

                <i class="bi bi-box-seam"></i>

            </span>

            {{ __('List Barang') }}

        </a>
<br>
    </li>

    {{-- USER MANAGEMENT --}}
    <li>

        <a class="nav-link
                  {{ request()->routeIs('management.users*')
                        ? 'active'
                        : '' }}"
           href="{{ route('management.users') }}">

            <span class="nav-icon">

                <i class="bi bi-people"></i>

            </span>

            {{ __('User Management') }}

        </a>

    </li>

    {{-- PROFILE --}}
   

</ul>
    </ul>


</div>
    {{-- Sidebar Footer --}}
    <div class="sidebar-footer">
        &copy; {{ date('Y') }} Cititrans &mdash; Internal System
    </div>
</nav>

{{-- ===========================
     MOBILE TOPBAR
=========================== --}}
<header class="mobile-topbar">
        <img src="{{ asset('assets/img/icons/logo-black.svg') }}" alt="logo">
        <button class="btn-burger" id="sidebarToggle" aria-label="Buka sidebar">
            <i class="bi bi-list"></i>
        </button>
    </header>

   

</div>

{{-- ===========================
     VENDOR SCRIPTS
     PENTING: Gunakan bootstrap.bundle.min.js (sudah include Popper).
     JANGAN muat popper.min.js + bootstrap.min.js terpisah — akan konflik.
=========================== --}}
<script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('vendors/is/is.min.js') }}"></script>
<script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>
<script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
<script src="{{ asset('vendors/gsap/customEase.js') }}"></script>
<script src="{{ asset('vendors/gsap/scrollToPlugin.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>

<script>

document.addEventListener('DOMContentLoaded', function(){

    // =====================================
    // SIDEBAR
    // =====================================

    const sidebar =
        document.getElementById('sidebar');

    const overlay =
        document.getElementById('sidebarOverlay');

    const sidebarToggle =
        document.getElementById('sidebarToggle');

    const sidebarClose =
        document.getElementById('sidebarClose');

    // =====================================
    // PROFILE DROPDOWN
    // =====================================

    const userTrigger =
        document.getElementById('userTrigger');

    const profileDropdown =
        document.getElementById('profileDropdown');

    const userChevron =
        document.getElementById('userChevron');

    // =====================================
    // OPEN SIDEBAR
    // =====================================

    function openSidebar(){

        sidebar.classList.add('open');

        overlay.classList.add('active');

        document.body.style.overflow = 'hidden';

    }

    // =====================================
    // CLOSE SIDEBAR
    // =====================================

    function closeSidebar(){

        sidebar.classList.remove('open');

        overlay.classList.remove('active');

        document.body.style.overflow = '';

    }

    // =====================================
    // TOGGLE SIDEBAR
    // =====================================

    if(sidebarToggle){

        sidebarToggle.addEventListener(
            'click',
            function(){

                if(
                    sidebar.classList.contains('open')
                ){

                    closeSidebar();

                } else {

                    openSidebar();

                }

            }
        );

    }

    // =====================================
    // CLOSE BUTTON
    // =====================================

    if(sidebarClose){

        sidebarClose.addEventListener(
            'click',
            closeSidebar
        );

    }

    // =====================================
    // OVERLAY CLICK
    // =====================================

    if(overlay){

        overlay.addEventListener(
            'click',
            closeSidebar
        );

    }

    // =====================================
    // PROFILE DROPDOWN
    // =====================================

    function openProfileDropdown(){

        profileDropdown.classList.add('open');

        userChevron.classList.add('open');

    }

    function closeProfileDropdown(){

        profileDropdown.classList.remove('open');

        userChevron.classList.remove('open');

    }

    // TOGGLE PROFILE
    if(userTrigger){

        userTrigger.addEventListener(
            'click',
            function(e){

                e.stopPropagation();

                if(
                    profileDropdown.classList.contains('open')
                ){

                    closeProfileDropdown();

                } else {

                    openProfileDropdown();

                }

            }
        );

    }

    // CLICK OUTSIDE PROFILE
    document.addEventListener(
        'click',
        function(e){

            if(
                profileDropdown &&
                !profileDropdown.contains(e.target) &&
                !userTrigger.contains(e.target)
            ){

                closeProfileDropdown();

            }

        }
    );

});
</script>
</body>
</html>