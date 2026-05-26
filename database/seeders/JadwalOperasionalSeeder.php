<?php

namespace Database\Seeders;

use App\Models\JadwalOperasional;
use Illuminate\Database\Seeder;

class JadwalOperasionalSeeder extends Seeder
{
    public function run(): void
    {
        $hariArr = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        foreach ($hariArr as $hari) {
            $isWeekend = ($hari == 'Sabtu' || $hari == 'Minggu');
            
            JadwalOperasional::create([
                'hari' => $hari,
                'jam_buka' => $isWeekend ? '10:00' : '09:00',
                'jam_tutup' => $isWeekend ? '22:00' : '21:00',
                'maks_pelanggan' => $isWeekend ? 50 : 30,
                'is_libur' => false,
                'keterangan' => $isWeekend ? 'Ramai' : 'Normal',
            ]);
        }
    }
}
