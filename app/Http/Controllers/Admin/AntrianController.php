<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = Antrian::with(['user', 'layanan', 'booking'])->latest('tanggal')->latest('id')->paginate(10);
        return view('admin.antrian.index', compact('antrians'));
    }

    public function show(Antrian $antrian)
    {
        return view('admin.antrian.show', compact('antrian'));
    }

    public function update(Request $request, Antrian $antrian)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['menunggu', 'dipanggil', 'dilayani', 'selesai', 'dibatalkan'])],
        ]);

        $antrian->update($validated);

        return redirect()->back()->with('success', 'Status antrian berhasil diperbarui.');
    }

    public function destroy(Antrian $antrian)
    {
        $antrian->delete();
        return redirect()->route('admin.antrian.index')->with('success', 'Antrian berhasil dihapus.');
    }
}
