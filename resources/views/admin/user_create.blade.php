@extends('layouts.app') 

@section('content')

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

    max-width:430px;

    border-radius:32px;

    padding:42px 30px;

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

    box-shadow:
        0 15px 35px rgba(253,184,19,.35);

    animation:checkPop .5s ease;

}

.popup-timer{

    font-size:.78rem;

    color:#888;

}

/* =========================================
ANIMATION
========================================= */

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

@keyframes checkPop{

    0%{

        transform:scale(.3) rotate(-20deg);

        opacity:0;

    }

    70%{

        transform:scale(1.1);

    }

    100%{

        transform:scale(1);

        opacity:1;

    }

}



    .success-check{

        width:82px;

        height:82px;

        font-size:2.2rem;

    }

}

</style>
<div class="container py-4 mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card border-0 shadow rounded-4 mt-4">
                
                <div class="card-header bg-white py-3 border-bottom-0 pt-4 px-3 px-md-4">
                    <h4 class="mb-1 fw-bold fs-5 fs-md-4">{{ __('Tambah User') }}</h4>
                    <p class="text-muted mb-0">{{ __('Isi formulir di bawah untuk mendaftarkan akun pengguna baru oleh Management.') }}</p>
                </div>
                
                <div class="card-body px-3 px-md-4 pb-4">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Nama Lengkap') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Masukkan nama lengkap') }}" value="{{ old('name') }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Username (Sudah disesuaikan ke kolom 'Username' di database) --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Username Account') }}</label>
                            <input type="text" 
                                name="Username" 
                                class="form-control @error('Username') is-invalid @enderror" 
                                placeholder="{{ __('Masukkan username unik') }}" 
                                value="{{ old('Username') }}" 
                                required
                                oninput="this.value = this.value.toLowerCase().replace(/\s+/g, '')">
                            
                            @error('Username') 
                                <small class="text-danger d-block mt-1">{{ $message }}</small> 
                            @enderror
                            <small class="text-muted" style="font-size: 0.7rem;">{{ __('Gunakan huruf kecil tanpa spasi.') }}</small>
                        </div>
                        
                        {{-- NIK --}}
<div class="mb-3">

    <label class="form-label fw-semibold">

        {{ __('NIK Staff') }}

    </label>

    <div class="input-group">

        <span class="input-group-text">

            <i class="bi bi-person-vcard-fill text-muted"></i>

        </span>

        <input type="text"
               name="nik"
               class="form-control @error('nik') is-invalid @enderror"
               placeholder="{{ __('Masukkan NIK staff') }}"
               value="{{ old('nik') }}">

    </div>

    @error('nik')

        <small class="text-danger d-block mt-1">

            {{ $message }}

        </small>

    @enderror

    <small class="text-muted"
           style="font-size:.72rem;">

        {{ __('Kosongkan jika bukan akun staff.') }}

    </small>

</div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Password') }}</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Minimal 8 karakter') }}" required>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="row mb-4">
                            {{-- Role Akses --}}
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <label class="form-label fw-semibold">{{ __('Role Akses') }}</label>
                                <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="" disabled selected>{{ __('-- Pilih Role --') }}</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="management" {{ old('role') == 'management' ? 'selected' : '' }}>Management</option>
                                    <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                                    <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>Guest</option>
                                </select>
                                @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Status Akun --}}
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold">{{ __('Status Akun') }}</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('Aktif (Bisa digunakan)') }}</option>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>{{ __('Pending (Menunggu ACC)') }}</option>
                                </select>
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-between mt-4 border-top pt-4">
                            <a href="{{ route('admin.users') }}" class="btn btn-light px-4 order-2 order-sm-1 fw-semibold">{{ __('Batal') }}</a>
                            
                            {{-- Tombol Simpan Warna Emas Cititrans --}}
                            <button type="submit" class="btn fw-bold px-4 order-1 order-sm-2 shadow-sm" style="background-color: #FDB813; color: #000; border: none;">
                                <i class="bi bi-person-plus-fill me-2"></i>{{ __('Simpan User Baru') }}
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- =========================================
     SUCCESS POPUP
========================================= --}}

@if(session('success'))

<div class="success-popup-overlay"
     id="successPopup">

    <div class="success-popup-card">

        {{-- CHECK ICON --}}
        <div class="success-check">

            <i class="bi bi-check-lg"></i>

        </div>

        {{-- TITLE --}}
       <h4 class="fw-bold mt-4 mb-2"
    style="
        font-size:2rem;
        color:#111;
    ">

            {{ __('Berhasil!') }}

        </h4>

        {{-- MESSAGE --}}
      <p class="mb-4"
   style="
        color:#9b9b9b;
        font-size:1.05rem;
        line-height:1.7;
   ">

            {{ session('success') }}

        </p>

        {{-- BUTTON --}}
<button class="btn fw-bold rounded-pill px-5 py-2 border-0 shadow-sm"
        style="
            background:#FDB813;
            color:#000;
            font-size:1rem;
        ">

    OK

</button>

        {{-- TIMER --}}
        <div class="popup-timer mt-3">

            {{ __('Halaman akan dialihkan otomatis') }}

        </div>

    </div>

</div>

@endif
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

            window.location.href =
                "{{ route('admin.users') }}";

        }, 300);

    }

}

/* AUTO REDIRECT */
@if(session('success'))

setTimeout(() => {

    closeSuccessPopup();

}, 3500);

@endif

</script>
@endsection