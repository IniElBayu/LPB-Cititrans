<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internal LPB Sistem</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet">

    {{-- Bootstrap dari vendor lokal agar konsisten dengan navbar --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }

        body {
            background: #f4f5f9;
            margin: 0;
            overflow-x: hidden;
        }

        /* ===== MAIN WRAPPER — mengikuti sidebar width navbar ===== */
        .main-wrapper {
            margin-left: 260px; /* sama persis dengan --sidebar-w di navbar */
            min-height: 100vh;
            transition: margin-left .3s cubic-bezier(.4,0,.2,1);
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
            padding: 32px 32px 0 32px;
        }

        /* ===== MODERN CARD ===== */
        .modern-card {
            border: none;
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 4px 24px rgba(0,0,0,.06);
        }

        /* ===== TABLE ===== */
        .table-modern thead {
            background: #111827;
            color: #fff;
        }
        .table-modern th {
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .5px;
            border: none;
            padding: 14px 16px;
        }
        .table-modern td {
            vertical-align: middle;
            border-color: #f1f1f1;
            padding: 12px 16px;
        }

        /* ===== BADGE ===== */
        .badge-gold {
            background: #fff8e5;
            color: #d89b00;
            border: 1px solid #f3d37c;
            font-weight: 600;
        }

        /* ===== BUTTON ===== */
        .btn-gold {
            background: #FDB813;
            border: none;
            color: #000;
            font-weight: 700;
            transition: background .2s;
        }
        .btn-gold:hover { background: #e5a700; color: #000; }

        /* ===== PAGINATION ===== */
        .page-item .page-link {
            color: #555;
            border: 1px solid #e9ecef;
            border-radius: 8px !important;
            margin: 0 2px;
            font-size: .82rem;
            transition: all .2s;
        }
        .page-item.active .page-link {
            background: #FDB813 !important;
            border-color: #FDB813 !important;
            color: #000 !important;
            font-weight: 700;
            box-shadow: 0 4px 16px rgba(253,184,19,.30);
        }
        .page-item.disabled .page-link { color: #ccc; background: #f9fafb; }
        .page-item .page-link:hover:not(.disabled) {
            background: rgba(253,184,19,.10);
            border-color: #FDB813;
            color: #111;
        }

        /* ===== FOOTER ===== */
        .site-footer {
            background-color: #1a1a1a;
            border-top: 4px solid #FDB813;
            padding: 24px 32px;
            margin-top: 48px;
        }
        .site-footer .footer-logo { height: 28px; }
        .site-footer .footer-copy { color: #e5e5e5; font-size: .82rem; }
        .site-footer .footer-powered { color: #FDB813; font-size: .78rem; }
        .site-footer .footer-rights { color: #666; font-size: .75rem; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991.98px) {
            .main-wrapper { margin-left: 0; }
            .content-wrapper { padding: 20px 16px 0 16px; }
            .site-footer { padding: 20px 16px; }
            .site-footer .row { text-align: center !important; }
            .site-footer .footer-rights { margin-top: 6px; }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- SIDEBAR --}}
    @include('management.navbar')

    {{-- CONTENT --}}
    <div class="main-wrapper">

        <div class="content-wrapper">
            @yield('content')
        </div>

        {{-- FOOTER — sama desain dengan app.blade.php --}}
        <footer class="site-footer">
            <div class="row align-items-center">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <img src="{{ asset('assets/img/icons/logo-black.svg') }}"
                         class="footer-logo" alt="Cititrans Logo">
                </div>

                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <p class="footer-copy mb-0 fw-medium">
                        &copy; {{ date('Y') }} Internal LPB Sistem
                    </p>
                    <p class="footer-powered mb-0">Powered By IT Division</p>
                </div>

                <div class="col-md-4 text-center text-md-end">
                    <span class="footer-rights">All rights reserved.</span>
                </div>
            </div>
        </footer>

    </div>

    {{-- Bootstrap bundle (include Popper) — SATU sumber, tidak dobel --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>