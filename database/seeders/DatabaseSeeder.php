<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Account
        User::create([
            'nama_lengkap' => 'Administrator Antriin',
            'username' => 'admin',
            'email' => 'admin@antriin.com',
            'no_telepon' => '081234567890',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'is_aktif' => true,
        ]);

        // Owner Account
        User::create([
            'nama_lengkap' => 'Owner Antriin',
            'username' => 'owner',
            'email' => 'owner@antriin.com',
            'no_telepon' => '081234567891',
            'role' => 'owner',
            'password' => Hash::make('owner123'),
            'is_aktif' => true,
        ]);

        // Petugas Account
        User::create([
            'nama_lengkap' => 'Petugas Antriin',
            'username' => 'petugas',
            'email' => 'petugas@antriin.com',
            'no_telepon' => '081234567892',
            'role' => 'petugas',
            'password' => Hash::make('petugas123'),
            'is_aktif' => true,
        ]);

        // Pelanggan Account
        User::create([
            'nama_lengkap' => 'Pelanggan Antriin',
            'username' => 'pelanggan',
            'email' => 'pelanggan@antriin.com',
            'no_telepon' => '081234567893',
            'role' => 'pelanggan',
            'password' => Hash::make('pelanggan123'),
            'is_aktif' => true,
        ]);
    }
}
