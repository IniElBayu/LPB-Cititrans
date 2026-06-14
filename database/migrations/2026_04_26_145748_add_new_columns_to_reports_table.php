<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reports', function (Blueprint $column) {
            $column->text('deskripsi')->after('kategori');
            $column->string('nik_pelapor')->after('tanggal_laporan');
            $column->string('jabatan_pelapor')->after('nama_pelapor');
            $column->string('rute')->nullable()->after('lokasi_ditemukan');
            $column->date('tanggal_rute')->nullable()->after('rute');
        });
    }

    public function down(): void
    {
        Schema::table('reports', function (Blueprint $column) {
            $column->dropColumn(['deskripsi', 'nik_pelapor', 'jabatan_pelapor', 'rute', 'tanggal_rute']);
        });
    }
};