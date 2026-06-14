<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LogUserActivity
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $expiresAt = now()->addMinutes(5);
            $userAgent = $request->header('User-Agent');

            // 1. Logika Deteksi Device Sederhana
            $device = 'Web Browser'; // Default
            if (preg_match('/android/i', $userAgent)) {
                $device = 'Android';
            } elseif (preg_match('/iphone|ipad|ipod/i', $userAgent)) {
                $device = 'iOS';
            } elseif (preg_match('/windows/i', $userAgent)) {
                $device = 'Windows';
            } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
                $device = 'MacOS';
            } elseif (preg_match('/linux/i', $userAgent)) {
                $device = 'Linux';
            }

            // 2. Simpan Status Online (True)
            Cache::put('user-is-online-' . $user->id, true, $expiresAt);
            
            // 3. Simpan Nama Device
            Cache::put('user-device-' . $user->id, $device, $expiresAt);
        }

        return $next($request);
    }
}