<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Admin Utama
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin',
            'password' => Hash::make('backadmin234'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        // 2. Buat User Petugas
        User::create([
            'name' => 'Petugas Cititrans',
            'email' => 'petugasm',
            'password' => Hash::make('petugas123'),
            'role' => 'petugas',
            'status' => 'active',
        ]);

        // 3. Buat User Management
        User::create([
            'name' => 'Manager Cititrans',
            'email' => 'manager',
            'password' => Hash::make('manager123'),
            'role' => 'management',
            'status' => 'active',
        ]);

        // 4. (Opsional) Buat user testing tambahan via factory
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}