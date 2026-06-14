<!DOCTYPE html>
<html>
<head>
     <title>CS Portal Sistem</title>
     <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/android-chrome-256x256.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

     <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
     <meta name="theme-color" content="#ffffff">
     <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

    
    {{-- navbar --}}
    @include('admin.navbar')

    
    {{-- content --}}
   
   <section class="py-0 bg-1100">

<footer class="py-4"
        style="
            background-color:#1a1a1a;
            border-top:4px solid #FDB813;
        ">

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
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>