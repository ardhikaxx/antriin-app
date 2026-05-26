<?php

namespace Database\Seeders;

use App\Models\Antrian;
use App\Models\Booking;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Database\Seeder;

class AntrianSeeder extends Seeder
{
    public function run(): void
    {
        // Queues from Confirmed Bookings today
        $bookingsToday = Booking::whereDate('tanggal', now()->format('Y-m-d'))
            ->where('status', 'dikonfirmasi')
            ->get();

        foreach ($bookingsToday as $index => $booking) {
            Antrian::create([
                'booking_id' => $booking->id,
                'user_id' => $booking->user_id,
                'layanan_id' => $booking->layanan_id,
                'nomor_antrian' => Antrian::generateNomor($booking->layanan_id, $booking->tanggal),
                'tanggal' => $booking->tanggal,
                'estimasi_waktu' => $booking->jam_booking,
                'status' => ($index == 0) ? 'dipanggil' : 'menunggu',
                'is_walkin' => false,
            ]);
        }

        // Add some Walk-in Queues for today
        $pelanggan = User::where('role', 'pelanggan')->get()->shuffle();
        $layanans = Layanan::all();

        for ($i = 0; $i < 2; $i++) {
            $l = $layanans->random();
            Antrian::create([
                'booking_id' => null,
                'user_id' => $pelanggan[$i]->id,
                'layanan_id' => $l->id,
                'nomor_antrian' => Antrian::generateNomor($l->id, now()->format('Y-m-d')),
                'tanggal' => now()->format('Y-m-d'),
                'estimasi_waktu' => now()->addMinutes(30 * ($i + 1))->format('H:i'),
                'status' => 'menunggu',
                'is_walkin' => true,
            ]);
        }
    }
}
