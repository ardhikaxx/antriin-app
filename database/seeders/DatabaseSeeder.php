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
        // Essential Accounts
        User::create([
            'nama_lengkap' => 'Administrator Antriin',
            'username' => 'admin',
            'email' => 'admin@antriin.com',
            'no_telepon' => '081234567890',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'is_aktif' => true,
        ]);

        User::create([
            'nama_lengkap' => 'Budi Owner',
            'username' => 'owner',
            'email' => 'owner@antriin.com',
            'no_telepon' => '081234567891',
            'role' => 'owner',
            'password' => Hash::make('owner123'),
            'is_aktif' => true,
        ]);

        User::create([
            'nama_lengkap' => 'Siti Petugas',
            'username' => 'petugas',
            'email' => 'petugas@antriin.com',
            'no_telepon' => '081234567892',
            'role' => 'petugas',
            'password' => Hash::make('petugas123'),
            'is_aktif' => true,
        ]);

        // More Customers
        $customers = [
            ['nama' => 'Andi Pratama', 'user' => 'andi', 'email' => 'andi@gmail.com'],
            ['nama' => 'Budi Santoso', 'user' => 'budi', 'email' => 'budi@gmail.com'],
            ['nama' => 'Citra Lestari', 'user' => 'citra', 'email' => 'citra@gmail.com'],
            ['nama' => 'Dewi Saputri', 'user' => 'dewi', 'email' => 'dewi@gmail.com'],
            ['nama' => 'Eko Wijaya', 'user' => 'eko', 'email' => 'eko@gmail.com'],
        ];

        foreach ($customers as $c) {
            User::create([
                'nama_lengkap' => $c['nama'],
                'username' => $c['user'],
                'email' => $c['email'],
                'no_telepon' => '0857' . rand(1000000, 9999999),
                'role' => 'pelanggan',
                'password' => Hash::make('password123'),
                'is_aktif' => true,
            ]);
        }

        // Call specialized seeders
        $this->call([
            LayananSeeder::class,
            JadwalOperasionalSeeder::class,
            BookingSeeder::class,
            AntrianSeeder::class,
        ]);
    }
}
