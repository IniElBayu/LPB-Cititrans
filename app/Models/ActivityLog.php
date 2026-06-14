<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    // Kamu wajib mendaftarkan 'activity' di sini agar Laravel mau mengirimnya ke database
    protected $fillable = ['user_id', 'activity', 'description', 'ip_address', 'role'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getBadgeClassAttribute()
{
    $mapping = [
        'create' => 'badge-create',
        'update' => 'badge-update',
        'delete' => 'badge-delete',
        'login'  => 'badge-login',
        'logout' => 'badge-logout',
    ];

    return $mapping[$this->activity] ?? 'badge-default';
}

}