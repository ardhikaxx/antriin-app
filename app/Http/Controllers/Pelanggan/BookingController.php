<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Layanan;
use App\Models\JadwalOperasional;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->with(['layanan', 'antrian'])
            ->latest('tanggal')
            ->latest('jam_booking')
            ->paginate(10);
            
        return view('pelanggan.booking.index', compact('bookings'));
    }

    public function create()
    {
        $layanans = Layanan::where('is_aktif', true)->get();
        return view('pelanggan.booking.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_booking' => 'required|date_format:H:i',
            'catatan' => 'nullable|string'
        ], [
            'layanan_id.required' => 'Pilih layanan terlebih dahulu.',
            'tanggal.after_or_equal' => 'Tanggal booking tidak boleh di masa lalu.',
        ]);

        $hari = Carbon::parse($validated['tanggal'])->locale('id')->isoFormat('dddd');
        
        $jadwal = JadwalOperasional::where('hari', $hari)->first();

        if (!$jadwal) {
            return back()->with('error', 'Jadwal operasional untuk hari ' . $hari . ' belum diatur.');
        }

        if ($jadwal->is_libur) {
            return back()->with('error', 'Maaf, kami tutup pada hari ' . $hari . '.');
        }

        $jam_booking = Carbon::parse($validated['jam_booking']);
        $jam_buka = Carbon::parse($jadwal->jam_buka);
        $jam_tutup = Carbon::parse($jadwal->jam_tutup);

        if ($jam_booking->lt($jam_buka) || $jam_booking->gt($jam_tutup)) {
            return back()->with('error', 'Jam booking harus di antara jam operasional (' . $jadwal->jam_buka . ' - ' . $jadwal->jam_tutup . ').');
        }

        $count = Booking::whereDate('tanggal', $validated['tanggal'])->count();
        if ($count >= $jadwal->maks_pelanggan) {
            return back()->with('error', 'Kuota booking untuk tanggal tersebut sudah penuh.');
        }

        $validated['kode_booking'] = Booking::generateKode();
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'menunggu';

        Booking::create($validated);

        return redirect()->route('pelanggan.booking.index')->with('success', 'Booking berhasil dibuat. Menunggu konfirmasi.');
    }

    public function show(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }
        return view('pelanggan.booking.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        if ($booking->status == 'selesai' || $booking->status == 'dibatalkan') {
            return back()->with('error', 'Booking tidak dapat dibatalkan.');
        }

        $booking->update(['status' => 'dibatalkan']);

        return redirect()->route('pelanggan.booking.index')->with('success', 'Booking berhasil dibatalkan.');
    }
}
