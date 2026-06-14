<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($locale)
    {
        // Validasi agar hanya ID atau EN yang bisa masuk
        if (!in_array($locale, ['id', 'en'])) {
            abort(400);
        }

        // Simpan bahasa yang dipilih ke dalam Session
        Session::put('locale', $locale);
        
        // Kembali ke halaman sebelumnya
        return redirect()->back();
    }
}