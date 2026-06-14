@extends('layouts.app') 

@section('content')
<style>
    /* Styling tambahan untuk avatar agar konsisten */
    .avatar-circle {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #555;
        background-color: #f0f0f0;
        border: 1px solid #eee;
        border-radius: 50%;
        font-size: 0.9rem;
    }
    .table-avatar {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border: 1px solid #eee;
    }@media(max-width:768px){

    .session-wrapper{

        flex-direction:column;

        min-width:100% !important;

    }

    .session-card{

        width:100% !important;

    }

}
</style>

{{-- Di dalam body app.blade.php --}}
    <div class="container-fluid px-lg-4 mt-3">
    {{-- Header Global --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 border-bottom pb-3">
        <div>
            {{-- Judul Dinamis --}}
            <h1 class="fw-bold mb-0" style="letter-spacing: -1px;">
            {{ __('Last Online Users') }}
            </h1>
            <p class="text-muted small mb-0">{{ __('Daftar pengguna yang baru saja beraktivitas di dalam sistem.') }}</p>
        </div>

        <div class="d-flex align-items-center gap-2 mt-2 mt-md-0">
            {{-- Dropdown Bahasa --}}
            <div class="dropdown">
                <button class="btn btn-light btn-sm border shadow-sm px-3 d-flex align-items-center dropdown-toggle" 
                        type="button" data-bs-toggle="dropdown" style="border-radius: 8px; height: 38px;">
                    <img src="https://flagcdn.com/w20/{{ app()->getLocale() == 'id' ? 'id' : 'gb' }}.png" width="20" class="me-2 rounded-1">
                    <span class="fw-bold">{{ strtoupper(app()->getLocale()) }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch', 'id') }}">
                        <img src="https://flagcdn.com/w20/id.png" width="20" class="me-2"> Indonesia</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch', 'en') }}">
                        <img src="https://flagcdn.com/w20/gb.png" width="20" class="me-2"> English</a></li>
                </ul>
            </div>

            {{-- Jam Live --}}
            <div class="d-flex align-items-center shadow-sm px-3" 
                 style="background-color: #FDB813; color: #000; border-radius: 8px; height: 38px;">
                <span id="live-clock" class="fw-bold small">
                     {{ date('d M Y | H:i:s') }}
                </span>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm card-main overflow-hidden">
    <div class="table-responsive">
        <table class="table align-middle mb-0 table-hover">
            <thead class="bg-dark">
                <tr>
                    <th class="ps-4 py-3 text-muted fw-semibold text-white" style="font-size: 0.85rem; border-top: none;">{{ __('User') }}</th>
                    <th class="py-3 text-muted fw-semibold text-white" style="font-size: 0.85rem; border-top: none;">{{ __('Username') }}</th>
                   <th class="py-3 text-center text-muted fw-semibold text-white"
    style="
        font-size:0.85rem;
        border-top:none;
    ">

    {{ __('Riwayat Sesi') }}

</th>
                    <th class="pe-4 py-3 text-muted fw-semibold text-white" style="font-size: 0.85rem; border-top: none;">{{ __('Terakhir Aktif') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                   <td class="ps-4 py-3">

    <div class="d-flex align-items-center">

        {{-- AVATAR --}}
        <div class="position-relative me-3">

            @if($user->photo && file_exists(public_path('storage/photos/' . $user->photo)))

                <img src="{{ asset('storage/photos/' . $user->photo) }}"
                     class="rounded-circle table-avatar shadow-sm"
                     style="
                        width:40px;
                        height:40px;
                        object-fit:cover;
                     ">

            @else

                <div class="avatar-circle shadow-sm
                            d-flex align-items-center
                            justify-content-center
                            text-white
                            rounded-circle"
                     style="
                        background-color:#FDB813;
                        width:40px;
                        height:40px;
                     ">

                    {{ strtoupper(substr($user->name, 0, 1)) }}

                </div>

            @endif

            {{-- STATUS ONLINE --}}
            <span class="position-absolute
                         bottom-0
                         end-0
                         border
                         border-white
                         border-2
                         rounded-circle"
                  style="
                        width:12px;
                        height:12px;
                        background-color:
                        {{ $user->isOnline()
                            ? '#28a745'
                            : '#6c757d' }};
                  "
                  title="{{ $user->isOnline()
                            ? 'Online'
                            : 'Offline' }}">
            </span>

        </div>

        {{-- USER INFO --}}
        <div class="d-flex flex-column">

            <span class="fw-semibold text-dark">

                {{ $user->name }}

            </span>

            @if($user->isOnline())

                @php

                    $device =
                        strtolower($user->getDevice());

                    $isMobile =
                        str_contains($device, 'android') ||
                        str_contains($device, 'iphone') ||
                        str_contains($device, 'mobile') ||
                        str_contains($device, 'ios');

                @endphp

                <small class="text-muted"
                       style="font-size:0.7rem;">

                    @if($isMobile)

                        <i class="bi bi-phone me-1"></i>

                    @else

                        <i class="bi bi-display me-1"></i>

                    @endif

                    {{ $user->getDevice() }}

                </small>

            @endif

        </div>

    </div>

</td>
                    
                    <td class="py-3">
                        <span class="badge border fw-normal px-2 py-1" style="background-color: #FDB813; color: #000; border-color: #e5a700 !important;">
                            {{ $user->Username }}
                        </span>
                    </td>

                    {{-- KOLOM BARU: Kapan Login & Logout --}}
                    {{-- KOLOM RIWAYAT LOGIN LOGOUT --}}
<td class="py-3">

    @php

        $lastLogin = $user->activityLogs
            ->where('activity', 'login')
            ->sortByDesc('created_at')
            ->first();

        $lastLogout = $user->activityLogs
            ->where('activity', 'logout')
            ->sortByDesc('created_at')
            ->first();

    @endphp

  <div class="d-flex align-items-center gap-2 flex-wrap session-wrapper"
     style="min-width:520px;">

        {{-- ================= LOGIN ================= --}}
<div class="shadow-sm rounded-4 px-3 py-2 bg-white border-0 session-card"
     style="
            width:250px;
            transition:.3s ease;
     ">

            {{-- HEADER --}}
           <div class="d-flex align-items-center justify-content-between">

    {{-- LEFT --}}
    <div class="d-flex align-items-center">

        {{-- ICON --}}
        <div class="d-flex align-items-center
                    justify-content-center
                    rounded-circle me-2"
             style="
                    width:30px;
                    height:30px;
                    background:
                    linear-gradient(
                        135deg,
                        #FDB813,
                        #ffcc33
                    );
             ">

            <i class="bi bi-door-open-fill"
               style="
                    color:#000;
                    font-size:.78rem;
               "></i>

        </div>

        {{-- INFO --}}
        <div>

            <div class="fw-bold"
                 style="
                        font-size:.70rem;
                        line-height:1.1;
                 ">

                {{ __('SESI LOGIN') }}

            </div>

            <div class="text-muted"
                 style="
                        font-size:.63rem;
                        line-height:1.1;
                 ">

                {{ $lastLogin?->created_at?->format('H:i:s') ?? '--:--' }} WIB

            </div>

        </div>

    </div>

    {{-- DEVICE --}}
    <div class="text-end">

        <div class="text-dark fw-semibold"
             style="font-size:.65rem;">
        </div>

        <div class="text-muted"
             style="font-size:.60rem;">

            {{ $lastLogin?->created_at?->translatedFormat('d M Y') }}

        </div>

    </div>

</div>

            @if($lastLogin)

                {{-- DATE --}}
                <div class="fw-semibold text-dark"
                     style="font-size:.82rem;">

                    {{ $lastLogin->created_at->translatedFormat('d M Y') }}

                </div>

                {{-- TIME --}}
                <div class="text-muted"
                     style="font-size:.72rem;">

                    <i class="bi bi-clock-history me-1"></i>

                    {{ $lastLogin->created_at->format('H:i:s') }} WIB

                </div>

            @else

                <div class="text-muted"
                     style="font-size:.72rem;">

                    {{ __('Belum ada data login') }}

                </div>

            @endif

        </div>

        {{-- ================= LOGOUT ================= --}}
       <div class="shadow-sm rounded-4 px-3 py-2 bg-white border-0"
     style="
            width:250px;
            transition:.3s ease;
     ">

            {{-- HEADER --}}
           <div class="d-flex align-items-center justify-content-between">

    {{-- LEFT --}}
    <div class="d-flex align-items-center">

        {{-- ICON --}}
        <div class="d-flex align-items-center
                    justify-content-center
                    rounded-circle me-2"
             style="
                    width:30px;
                    height:30px;
                    background:
                    linear-gradient(
                        135deg,
                        #2d2d2d,
                        #4a4a4a
                    );
             ">

            <i class="bi bi-box-arrow-right"
               style="
                    color:#FDB813;
                    font-size:.78rem;
               "></i>

        </div>

        {{-- INFO --}}
        <div>

            <div class="fw-bold"
                 style="
                        font-size:.70rem;
                        line-height:1.1;
                 ">

                {{ __('SESI LOGOUT') }}

            </div>

            <div class="text-muted"
                 style="
                        font-size:.63rem;
                        line-height:1.1;
                 ">

                {{ $lastLogout?->created_at?->format('H:i:s') ?? '--:--' }} WIB

            </div>

        </div>

    </div>

    {{-- DEVICE --}}
    <div class="text-end">

        <div class="text-dark fw-semibold"
             style="font-size:.65rem;">

            @php

                $logoutDevice =
                    $lastLogout->device ??
                    $user->getDevice();

                $deviceLogoutName =
                    strtolower($logoutDevice);

                $isLogoutMobile =
                    str_contains($deviceLogoutName,'android') ||
                    str_contains($deviceLogoutName,'iphone') ||
                    str_contains($deviceLogoutName,'ios') ||
                    str_contains($deviceLogoutName,'mobile');

            @endphp

            @if($isLogoutMobile)

                <i class="bi bi-phone-fill me-1"></i>

            @else

                <i class="bi bi-display-fill me-1"></i>

            @endif

            {{ Str::limit($logoutDevice, 12) }}

        </div>

        <div class="text-muted"
             style="font-size:.60rem;">

            {{ $lastLogout?->created_at?->translatedFormat('d M Y') }}

        </div>

    </div>

</div>

            @if($lastLogout)

                {{-- DATE --}}
                <div class="fw-semibold text-dark"
                     style="font-size:.82rem;">

                    {{ $lastLogout->created_at->translatedFormat('d M Y') }}

                </div>

                {{-- TIME --}}
                <div class="text-muted"
                     style="font-size:.72rem;">

                    <i class="bi bi-clock-history me-1"></i>

                    {{ $lastLogout->created_at->format('H:i:s') }} WIB

                </div>

            @else

                <div class="text-muted"
                     style="font-size:.72rem;">

                    {{ __('Belum ada data logout') }}

                </div>

            @endif

        </div>

    </div>

</td>

                    <td class="pe-4 py-3">
                        @if($user->isOnline())
                            <div class="d-flex align-items-center text-success">
                                <span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true" style="width: 10px; height: 10px;"></span>
                                <span class="fw-semibold" style="font-size: 0.85rem;">{{ __('Online') }}</span>
                            </div>
                        @elseif($user->activityLogs->isNotEmpty())
                            <div class="d-flex flex-column">
                                <span class="text-dark fw-medium" style="font-size: 0.85rem;">
                                    {{ $user->activityLogs->first()->created_at->diffForHumans() }}
                                </span>
                                <small class="text-muted" style="font-size: 0.7rem;">
                                    {{ __('Aksi:') }} <span class="text-capitalize">{{ $user->activityLogs->first()->activity }}</span>
                                </small>
                            </div>
                        @else
                            <span class="text-muted small italic">{{ __('Belum pernah aktif') }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><br><br><br><br></div>
<script>
    function updateClock() {
        const now = new Date();
        const options = { 
            day: '2-digit', 
            month: 'short', 
            year: 'numeric' 
        };
        
        // Format tanggal sesuai dengan gaya d M Y
        const datePart = now.toLocaleDateString('en-GB', options).replace(',', '');
        
        // Format waktu H:i:s
        const timePart = now.toTimeString().split(' ')[0];
        
        // Update teks di dalam elemen
        document.getElementById('live-clock').innerText = datePart + ' | ' + timePart;
    }

    // Jalankan fungsi setiap 1000 milidetik (1 detik)
    setInterval(updateClock, 1000);
</script>

@endsection