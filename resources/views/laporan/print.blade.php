<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
      <title>Print Laporan Penemuan Barang - {{ $report->nama_barang }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
        @page {
            size: A4;
            margin: 10mm 15mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            color: #000;
            background: #fff;
            margin: 0;
            padding: 0;
        }
        /* Sembunyikan tombol — DomPDF tidak pakai @media print */
.no-print {
    display: none !important;
}

        /* Tombol print disembunyikan saat dicetak */
        @media print {
            .no-print { display: none !important; }
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            height: 50px;
            width: auto;
        }

        .title-bar {
            background-color: #000 !important;
            color: #fff !important;
            text-align: center;
            font-weight: bold;
            padding: 5px 0;
            font-size: 14pt;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .section-box {
            border: 1px solid #000;
            margin-bottom: 10px;
        }

        .section-title {
            font-weight: bold;
            padding: 5px;
            border-bottom: 1px solid #000;
            font-size: 11pt;
        }

        .row-ab {
            display: table;
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .col-half {
            display: table-cell;
            width: 50%;
            padding: 5px;
            box-sizing: border-box;
            vertical-align: top;
        }

        .col-half:first-child {
            border-right: 1px solid #000;
        }

        table { width: 100%; border-collapse: collapse; }
        td { padding: 4px; vertical-align: top; font-size: 10pt; }
        .label-cell { width: 100px; }
        .colon-cell { width: 10px; text-align: center; }

        .box-deskripsi {
            height: 150px;
            padding: 10px;
            font-size: 11pt;
        }

        /* =========================================
           GRID SERAH TERIMA
        ========================================= */
        .grid-3 {
            display: table;
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .col-3 {
            display: table-cell;
            width: 33.33%;
            vertical-align: top;
            border-right: 1px solid #000;
            box-sizing: border-box;
        }

        .col-3:last-child {
            border-right: none;
        }

        .ttd-header {
            background-color: #000 !important;
            color: #fff !important;
            text-align: center;
            font-weight: bold;
            padding: 5px;
            font-size: 10pt;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .ttd-space {
            height: 85px;
            display: table;
            width: 100%;
            text-align: center;
            font-size: 9pt;
            color: #555;
        }

        .ttd-space span {
            display: table-cell;
            vertical-align: bottom;
            padding-bottom: 8px;
        }

        .ttd-footer {
            border-top: 1px solid #000;
            padding: 5px;
            min-height: 60px;
        }

        .checkbox-box {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            margin-right: 3px;
            vertical-align: middle;
            text-align: center;
            line-height: 12px;
            font-size: 10px;
        }
    </style>
</head>
<body>

<div class="container">

    {{-- Tombol Bantu (Tidak ikut tercetak) --}}
    <div class="no-print" style="margin: 15px 0; display: flex; justify-content: flex-end; gap: 10px;">
        <button onclick="window.close()"
                style="padding: 10px 20px; cursor: pointer; background: #e0e0e0; border: none; font-weight: bold; border-radius: 5px; color: #333; transition: 0.3s;">
            <i class="bi bi-arrow-left"></i> {{ __('Kembali') }}
        </button>
{{-- Tombol Cetak sebagai PDF --}}
<a href="{{ route('laporan.pdf', $report->id) }}" target="_blank"
   style="padding: 10px 20px; cursor: pointer; background: #FDB813; border: none; font-weight: bold; border-radius: 5px; color: #000; text-decoration: none;">
    <i class="bi bi-printer-fill"></i> Cetak Dokumen
</a>
    </div>
{{-- Logo --}}
<div class="header">
    <img src="{{ public_path('assets/img/favicons/logo2.png') }}" 
         alt="" 
         style="height: 50px; width: auto;">
</div>

    <div class="title-bar">{{ __('LAPORAN PENEMUAN BARANG') }}</div>

    {{-- Bagian A & B --}}
    <div class="section-box">
        <div class="row-ab">
            {{-- Bagian A --}}
            <div class="col-half">
                <div class="section-title" style="border-bottom: none;">{{ __('A. DATA PENEMUAN') }}</div>
                <table>
                    <tr>
                        <td class="label-cell">{{ __('Tanggal') }}</td>
                        <td class="colon-cell">:</td>
                        <td>{{ \Carbon\Carbon::parse($report->tanggal_laporan)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">{{ __('Jam') }}</td>
                        <td class="colon-cell">:</td>
                        <td>{{ \Carbon\Carbon::parse($report->created_at)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">{{ __('Nama Penemu') }}</td>
                        <td class="colon-cell">:</td>
                        <td>{{ $report->nama_pelapor }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">{{ __('NIK') }}</td>
                        <td class="colon-cell">:</td>
                        <td>{{ $report->nik_pelapor ?? '............................' }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">{{ __('Jabatan') }}</td>
                        <td class="colon-cell">:</td>
                        <td>{{ $report->jabatan_pelapor ?? '............................' }}</td>
                    </tr>
                </table>
            </div>

            {{-- Bagian B --}}
            <div class="col-half">
                <div class="section-title" style="border-bottom: none;">{{ __('B. DETAIL LOKASI PENEMUAN') }}</div>
                <table>
                    <tr>
                        <td class="label-cell">{{ __('Lokasi') }}</td>
                        <td class="colon-cell">:</td>
                        <td>
                            <span class="checkbox-box">{{ $report->nomor_kendaraan != null && str_contains($report->nomor_kendaraan, 'CT') ? '✓' : '' }}</span> Unit
                            &nbsp;&nbsp;
                            <span class="checkbox-box">{{ $report->nomor_kendaraan != null && !str_contains($report->nomor_kendaraan, 'CT') ? '✓' : '' }}</span> Pool
                        </td>
                    </tr>
                    <tr>
                        <td class="label-cell">{{ __('Unit/Pool') }}</td>
                        <td class="colon-cell">:</td>
                        <td>{{ $report->nomor_kendaraan ?? '............................' }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">{{ __('Rute') }}</td>
                        <td class="colon-cell">:</td>
                        <td>{{ $report->rute ?? '............................' }}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">{{ __('Tanggal Trip') }}</td>
                        <td class="colon-cell">:</td>
                        <td>{{ $report->tanggal_rute ? \Carbon\Carbon::parse($report->tanggal_rute)->format('d/m/Y') : '............................' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    {{-- Bagian C --}}
    <div class="section-box">
        <div class="section-title">{{ __('C. DESKRIPSI LENGKAP BARANG') }}</div>
        <div class="box-deskripsi">
            <strong>{{ $report->nama_barang }} ({{ $report->kategori }})</strong><br>
            {{ $report->deskripsi }}
            <br><br>
            <i>{{ __('Lokasi spesifik ditemukan:') }} {{ $report->lokasi_ditemukan }}</i>
        </div>
    </div>

    {{-- Bagian D --}}
    <div class="section-box" style="padding: 0;">
        <div class="section-title">{{ __('D. SERAH TERIMA BARANG') }}</div>

        <div class="grid-3">

            <div class="col-3">
                <div class="ttd-header">{{ __('Yang Menerima') }}</div>
                <div class="ttd-space"><span>{{ __('(Td. Tangan)') }}</span></div>
                <div class="ttd-footer">
                    <table>
                        <tr>
                            <td style="width:55px;">{{ __('Nama') }}</td>
                            <td>: {{ $report->cs_name }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jabatan') }}</td>
                            <td>: {{ __('CS / Staff') }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tanggal') }}</td>
                            <td>: ........................</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-3">
                <div class="ttd-header">{{ __('Yang Menyerahkan') }}</div>
                <div class="ttd-space"><span>{{ __('(Td. Tangan)') }}</span></div>
                <div class="ttd-footer">
                    <table>
                        <tr>
                            <td style="width:55px;">{{ __('Nama') }}</td>
                            <td>: {{ $report->nama_pelapor }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jabatan') }}</td>
                            <td>: {{ $report->jabatan_pelapor }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tanggal') }}</td>
                            <td>: ........................</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-3">
                <div class="ttd-header">{{ __('Diserahkan Kepada') }}</div>
                <div class="ttd-space"><span>{{ __('(Td. Tangan)') }}</span></div>
                <div class="ttd-footer">
                    <table>
                        <tr>
                            <td style="width:55px;">{{ __('Nama') }}</td>
                            <td>: ........................</td>
                        </tr>
                        <tr>
                            <td>{{ __('No HP') }}</td>
                            <td>: ........................</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tanggal') }}</td>
                            <td>: ........................</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <br>
    {{-- Footer --}}
    <div style="background-color: #000; height: 50px; width: 100%; margin-top: 10px; -webkit-print-color-adjust: exact; print-color-adjust: exact;"></div>

</div>

<script>
    /**
     * Menghilangkan header/footer bawaan browser (judul, URL, nomor halaman)
     * dengan cara mengosongkan document.title sesaat sebelum print dipanggil.
     * Ini bekerja di Chrome, Edge, dan Firefox.
     */
    function triggerPrint() {
        const originalTitle = document.title;
        document.title = '';
        window.print();
        // Kembalikan title setelah dialog print ditutup
        window.addEventListener('afterprint', function () {
            document.title = originalTitle;
        }, { once: true });
    }

    // Auto print saat halaman pertama kali dibuka
    window.addEventListener('load', function () {
        triggerPrint();
    });
</script>

</body>
</html>