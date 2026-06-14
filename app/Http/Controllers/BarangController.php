<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Pastikan baris ini ada (sesuai versi Intervention Image Anda)
use Intervention\Image\Facades\Image; 
use App\Models\ActivityLog; // Contoh model untuk simpan ke DB
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto_barang' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            
            // Buat nama file unik
            $filename = time() . '_' . Auth::id() . '.jpg';
            
            // Tentukan folder simpan
            $directory = public_path('storage/photos');
            
            // Buat folder jika belum ada
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            $path = $directory . '/' . $filename;

            // Proses Kompresi dengan Intervention Image
            Image::make($file)
                ->orientate() // Memperbaiki posisi foto dari HP agar tidak miring
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio(); // Resize ke 1080px tapi tetap proporsional
                    $constraint->upsize();
                })
                ->save($path, 60); // Simpan dengan kualitas 60%

            // SIMPAN KE DATABASE
  

            return back()->with('success', 'Foto berhasil dikompres dan disimpan!');
        }

        return back()->with('error', 'Gagal mengunggah foto.');
    }
}