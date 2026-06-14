<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'Username',
        'nik',
        'password',
        'role',
        'status',
        'photo'

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke ActivityLog
     */
    public function activityLogs()
    {
        // Menghubungkan User ke banyak ActivityLog
        return $this->hasMany(ActivityLog::class, 'user_id');
    }
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
    public function getDevice()
{
    return \Illuminate\Support\Facades\Cache::get('user-device-' . $this->id, '-');
}
}