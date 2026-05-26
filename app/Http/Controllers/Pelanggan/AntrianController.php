<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = Antrian::where('user_id', auth()->id())
            ->with(['layanan', 'booking'])
            ->latest('tanggal')
            ->latest('id')
            ->paginate(10);
            
        return view('pelanggan.antrian.index', compact('antrians'));
    }
}
