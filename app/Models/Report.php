<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan input data secara massal
    protected $fillable = [
        'nama_barang',
        'kategori',
        'deskripsi',
        'tanggal_laporan',
        'lokasi_ditemukan',
        'cs_name',
        'nomor_kendaraan',
        'nama_pelapor',
        'nik_pelapor',
        'jabatan_pelapor',
        'rute',
        'tanggal_rute',
        'foto_barang',
        'status'
    ];
}