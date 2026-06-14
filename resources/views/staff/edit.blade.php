@extends('layouts.app3')

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

            {{ __('Berhasil Diperbarui') }}

        </h4>

        {{-- MESSAGE --}}
        <p class="mb-4"
           style="
                color:#9b9b9b;
                font-size:1.05rem;
                line-height:1.7;
           ">

            {{ __('Data laporan barang berhasil diperbarui.') }}

        </p>

        {{-- BUTTON --}}
        <button class="btn fw-bold rounded-pill px-5 py-2 border-0 shadow-sm success-ok-btn"
                onclick="closeSuccessPopup()">

            OK

        </button>

    </div>

</div>
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

    max-width:520px;

    border-radius:36px;

    padding:48px 34px;

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

</style>
@endif

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-4">

            {{-- TITLE --}}
            <div class="mb-4">

                <h3 class="fw-bold mb-1">

                    {{ __('Edit Laporan') }}

                </h3>

                <p class="text-muted mb-0">

                    {{ __('Perbarui data laporan barang.') }}

                </p>

            </div>

            {{-- FORM --}}
            <form action="{{ route('staff.update', $report->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- NAMA BARANG --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        {{ __('Nama Barang') }}

                    </label>

                    <input type="text"
                           name="nama_barang"
                           class="form-control rounded-3"
                           value="{{ old('nama_barang', $report->nama_barang) }}"
                           required>

                </div>

                {{-- KATEGORI --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        {{ __('Kategori') }}

                    </label>

                    <select name="kategori"
                            class="form-select rounded-3"
                            required>

                        <option value="Elektronik"
                            {{ $report->kategori == 'Elektronik' ? 'selected' : '' }}>

                            Elektronik

                        </option>

                        <option value="Dokumen"
                            {{ $report->kategori == 'Dokumen' ? 'selected' : '' }}>

                            Dokumen

                        </option>

                        <option value="Pakaian"
                            {{ $report->kategori == 'Pakaian' ? 'selected' : '' }}>

                            Pakaian

                        </option>

                        <option value="Lainnya"
                            {{ $report->kategori == 'Lainnya' ? 'selected' : '' }}>

                            Lainnya

                        </option>

                    </select>

                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        {{ __('Deskripsi') }}

                    </label>

                    <textarea name="deskripsi"
                              rows="4"
                              class="form-control rounded-3"
                              required>{{ old('deskripsi', $report->deskripsi) }}</textarea>

                </div>

                {{-- FOTO --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        {{ __('Foto Barang') }}

                    </label>

                    <input type="file"
                           name="foto_barang"
                           class="form-control rounded-3">

                    @if($report->foto_barang)

                        <div class="mt-3">

                            <img src="{{ asset('storage/'.$report->foto_barang) }}"
                                 class="rounded shadow-sm"
                                 style="width:120px;height:120px;object-fit:cover;">

                        </div>

                    @endif

                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <button type="submit"
                            class="btn btn-warning fw-bold px-4 rounded-pill">

                        <i class="bi bi-save me-1"></i>

                        {{ __('Update') }}

                    </button>

                    <a href="{{ route('staff.list') }}"
                       class="btn btn-dark rounded-pill px-4">

                        {{ __('Kembali') }}

                    </a>

                </div>

            </form>

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
                "{{ route('staff.list') }}";

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