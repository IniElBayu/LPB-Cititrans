<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Internal LPB Sistem — Cititrans</title>

    {{-- FAVICON --}}
    <link rel="icon"
          type="image/png"
          href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">

    {{-- GOOGLE FONT --}}
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    {{-- ICON --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- CSS --}}
    <link href="{{ asset('assets/css/theme.css') }}"
          rel="stylesheet">

    <link href="{{ asset('assets/css/user.css') }}"
          rel="stylesheet">

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        *{
            font-family:'Plus Jakarta Sans',sans-serif;
        }

        body{
            background:#f5f6fa;
            overflow-x:hidden;
        }

        /* =====================================
           MAIN WRAPPER
        ===================================== */

        .main-wrapper{

            margin-left:260px;
            min-height:100vh;
            transition:.3s;

        }

        @media(max-width:991px){

            .main-wrapper{

                margin-left:0;

            }

        }

        /* =====================================
           DROPDOWN FIX
        ===================================== */

        .dropdown-menu{

            z-index:999999 !important;

        }

        .table-responsive{

            overflow-x:auto;
            overflow-y:visible !important;

        }

        /* =====================================
           FOOTER
        ===================================== */

        .footer-custom{

            background:#1a1a1a;
            border-top:4px solid #FDB813;
            margin-top:50px;

        }

    </style>

    @stack('styles')

</head>

<body>

    {{-- SIDEBAR / NAVBAR --}}
    @include('staff.navbar')




        {{-- FOOTER --}}
       <footer class="footer-custom py-4">

    <div class="container text-center">

        {{-- COPYRIGHT + RIGHTS --}}
        <p class="small mb-1 text-light">

            &copy; {{ date('Y') }}
            Internal LPB Sistem

            <span style="color:rgba(255,255,255,.45);">

                - All rights reserved.

            </span>

        </p>

        {{-- POWERED --}}
        <div style="
                color:#FDB813;
                font-size:.80rem;
                font-weight:600;
           ">

            Powered By IT Division

        </div>

    </div>

</footer>

    </div>

    {{-- BOOTSTRAP BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- THEME --}}
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    {{-- GLOBAL SCRIPT --}}
    <script>

        // =====================================
        // AUTO HIDE ALERT
        // =====================================

        document.addEventListener('DOMContentLoaded', function(){

            const alertEl =
                document.getElementById('successAlert');

            if(alertEl){

                setTimeout(function(){

                    alertEl.style.transition =
                        'all .3s ease';

                    alertEl.style.opacity = '0';

                    alertEl.style.transform =
                        'translateY(-10px)';

                    setTimeout(() => {

                        alertEl.remove();

                    },300);

                },3500);

            }

        });

    </script>

    @stack('scripts')

</body>
</html>