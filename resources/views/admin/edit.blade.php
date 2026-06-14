@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')
{{-- =========================================
     SUCCESS POPUP
========================================= --}}

@if(session('success'))

<div class="success-popup-overlay"
     id="successPopup">

    <div class="success-popup-card">

        {{-- ICON --}}
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
        <button class="btn fw-bold rounded-pill px-5 py-2 border-0 shadow-sm success-ok-btn"
                onclick="closeSuccessPopup()">

            OK

        </button>

        {{-- TIMER --}}
        <div class="popup-timer mt-3">

            {{ __('Popup akan tertutup otomatis') }}

        </div>

    </div>

</div>

@endif
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

}

.success-ok-btn{

    background:#FDB813;

    color:#000;

    font-size:1rem;

    transition:.25s ease;

}

.success-ok-btn:hover{

    transform:translateY(-2px);

    background:#ffcc33;

}

.popup-timer{

    font-size:.78rem;

    color:#888;

}

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
    .btn-gold {
        background-color: #FDB813 !important;
        color: #000 !important;
        transition: background-color 0.3s ease;
    }

    .btn-gold:hover {
        background-color: #e0a20b !important; /* Warna emas sedikit lebih gelap */
    }
</style>
<div class="container my-1 my-md-1 py-1">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card border-0 shadow rounded-4 mb-5">
                
                <div class="card-header bg-white py-3 border-bottom-0 pt-4 px-3 px-md-4">
                    <h4 class="mb-1 fw-bold fs-5 fs-md-4">{{ __('Edit Laporan Barang') }}</h4>
                    <p class="text-muted small mb-0">{{ __('Perbarui informasi detail barang yang ditemukan.') }}</p>
                </div>
                
                <div class="card-body px-3 px-md-4 pb-4">
                    <form action="{{ route('reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Nama Barang') }}</label>
                            <input type="text" name="nama_barang" class="form-control" value="{{ $report->nama_barang }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Kategori') }}</label>
                            <select name="kategori" class="form-select" required>
                                <option value="Elektronik" {{ $report->kategori == 'Elektronik' ? 'selected' : '' }}>{{ __('Elektronik') }}</option>
                                <option value="Dokumen" {{ $report->kategori == 'Dokumen' ? 'selected' : '' }}>{{ __('Dokumen') }}</option>
                                <option value="Pakaian" {{ $report->kategori == 'Pakaian' ? 'selected' : '' }}>{{ __('Pakaian') }}</option>
                                <option value="Lainnya" {{ $report->kategori == 'Lainnya' ? 'selected' : '' }}>{{ __('Lainnya') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Lokasi Ditemukan') }}</label>
                            <input type="text" name="lokasi_ditemukan" class="form-control" value="{{ $report->lokasi_ditemukan }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">{{ __('Foto Saat Ini') }}</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $report->foto_barang) }}" class="rounded shadow-sm" style="width: 150px; max-width: 100%; height: auto;">
                            </div>
                            <label class="form-label text-muted small mt-2"><i class="bi bi-info-circle me-1"></i>{{ __('Ganti Foto (Kosongkan jika tidak ingin mengubah)') }}</label>
                            <input type="file" name="foto_barang" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-between mt-4 border-top pt-4">
                            <a href="{{ route('report.list') }}" class="btn btn-light px-4 order-2 order-sm-1">{{ __('Kembali') }}</a>
                            <button type="submit" class="btn btn-gold fw-semibold px-4 order-1 order-sm-2">
                        {{ __('Simpan Perubahan') }} 
                    </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

            window.location.href =
                "{{ route('report.list') }}";

        }, 300);

    }

}

/* AUTO CLOSE */
@if(session('success'))

setTimeout(() => {

    closeSuccessPopup();

}, 3500);

@endif

</script>
@endsection