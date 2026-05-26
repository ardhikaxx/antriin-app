<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use App\Models\Layanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $pelanggan = User::where('role', 'pelanggan')->get();
        $layanans = Layanan::all();
        $petugas = User::where('role', 'petugas')->first();

        // Past Bookings (Yesterday)
        foreach ($pelanggan->take(2) as $p) {
            Booking::create([
                'kode_booking' => Booking::generateKode(),
                'user_id' => $p->id,
                'layanan_id' => $layanans->random()->id,
                'petugas_id' => $petugas->id,
                'tanggal' => now()->subDay()->format('Y-m-d'),
                'jam_booking' => '10:00',
                'catatan' => 'Booking kemarin',
                'status' => 'selesai',
            ]);
        }

        // Today's Bookings
        foreach ($pelanggan as $index => $p) {
            $status = ($index % 2 == 0) ? 'dikonfirmasi' : 'menunggu';
            Booking::create([
                'kode_booking' => Booking::generateKode(),
                'user_id' => $p->id,
                'layanan_id' => $layanans->random()->id,
                'petugas_id' => ($status == 'dikonfirmasi') ? $petugas->id : null,
                'tanggal' => now()->format('Y-m-d'),
                'jam_booking' => '1' . $index . ':00',
                'catatan' => 'Booking hari ini',
                'status' => $status,
            ]);
        }

        // Future Bookings (Tomorrow)
        foreach ($pelanggan->take(3) as $p) {
            Booking::create([
                'kode_booking' => Booking::generateKode(),
                'user_id' => $p->id,
                'layanan_id' => $layanans->random()->id,
                'tanggal' => now()->addDay()->format('Y-m-d'),
                'jam_booking' => '14:00',
                'catatan' => 'Booking besok',
                'status' => 'menunggu',
            ]);
        }
    }
}
