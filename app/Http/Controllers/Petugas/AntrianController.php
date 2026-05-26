<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = Antrian::whereDate('tanggal', date('Y-m-d'))
            ->with(['user', 'layanan'])
            ->orderBy('id', 'asc')
            ->paginate(15);
            
        return view('petugas.antrian.index', compact('antrians'));
    }

    public function update(Request $request, Antrian $antrian)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['menunggu', 'dipanggil', 'dilayani', 'selesai', 'dibatalkan'])],
        ]);

        $antrian->update($validated);

        if ($antrian->booking_id) {
            if ($validated['status'] == 'selesai') {
                Booking::where('id', $antrian->booking_id)->update(['status' => 'selesai']);
            } elseif ($validated['status'] == 'dibatalkan') {
                Booking::where('id', $antrian->booking_id)->update(['status' => 'dibatalkan']);
            }
        }

        return redirect()->back()->with('success', 'Status antrian berhasil diperbarui.');
    }
}
