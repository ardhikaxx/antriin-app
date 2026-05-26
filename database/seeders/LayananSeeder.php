<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $layanans = [
            [
                'nama' => 'Potong Rambut (Standard)',
                'deskripsi' => 'Layanan potong rambut standard oleh petugas berpengalaman.',
                'harga' => 50000,
                'durasi' => 30,
                'is_aktif' => true,
            ],
            [
                'nama' => 'Potong Rambut (Premium)',
                'deskripsi' => 'Layanan potong rambut premium termasuk cuci rambut dan pijat kepala.',
                'harga' => 100000,
                'durasi' => 50,
                'is_aktif' => true,
            ],
            [
                'nama' => 'Cukur Kumis & Jenggot',
                'deskripsi' => 'Perapihan kumis dan jenggot dengan handuk hangat.',
                'harga' => 30000,
                'durasi' => 20,
                'is_aktif' => true,
            ],
            [
                'nama' => 'Hair Spa & Vitamin',
                'deskripsi' => 'Perawatan rambut mendalam untuk kesehatan akar rambut.',
                'harga' => 150000,
                'durasi' => 60,
                'is_aktif' => true,
            ],
            [
                'nama' => 'Pewarnaan Rambut',
                'deskripsi' => 'Pewarnaan rambut profesional (pilihan warna tersedia di tempat).',
                'harga' => 250000,
                'durasi' => 120,
                'is_aktif' => true,
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}
