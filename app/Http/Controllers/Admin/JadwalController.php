<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalOperasional;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = JadwalOperasional::orderBy('id')->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hari' => ['required', Rule::in(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'])],
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i|after:jam_buka',
            'maks_pelanggan' => 'required|integer|min:1',
            'is_libur' => 'boolean',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $validated['is_libur'] = $request->has('is_libur');

        // Check if day already exists
        if (JadwalOperasional::where('hari', $validated['hari'])->exists()) {
            return back()->with('error', 'Jadwal untuk hari ' . $validated['hari'] . ' sudah ada. Silakan edit jadwal yang ada.')->withInput();
        }

        JadwalOperasional::create($validated);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(JadwalOperasional $jadwal)
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, JadwalOperasional $jadwal)
    {
        $validated = $request->validate([
            'hari' => ['required', Rule::in(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'])],
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i|after:jam_buka',
            'maks_pelanggan' => 'required|integer|min:1',
            'is_libur' => 'boolean',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $validated['is_libur'] = $request->has('is_libur');

        // Check if day already exists for other records
        if (JadwalOperasional::where('hari', $validated['hari'])->where('id', '!=', $jadwal->id)->exists()) {
            return back()->with('error', 'Jadwal untuk hari ' . $validated['hari'] . ' sudah ada.')->withInput();
        }

        $jadwal->update($validated);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(JadwalOperasional $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
