<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin'],
            [
                'name' => 'Admin Cititrans',
                'password' => Hash::make('backadmin234'),
                'role' => 'admin'
            ]
        );

        User::updateOrCreate(
            ['email' => 'petugas'],
            [
                'name' => 'Petugas Cititrans',
                'password' => Hash::make('petugas123'),
                'role' => 'petugas'
            ]
        );

        User::updateOrCreate(
            ['email' => 'management'],
            [
                'name' => 'Management Cititrans',
                'password' => Hash::make('management123'),
                'role' => 'management'
            ]
        );
    }
}