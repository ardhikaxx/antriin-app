<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrains';

    protected $fillable = [
        'booking_id',
        'user_id',
        'layanan_id',
        'nomor_antrian',
        'tanggal',
        'estimasi_waktu',
        'status',
        'is_walkin',
    ];

    protected $casts = [
        'is_walkin' => 'boolean',
    ];

    public static function generateNomor($layanan_id, $tanggal)
    {
        $layanan = Layanan::find($layanan_id);
        $prefix  = strtoupper(substr($layanan->nama, 0, 1));
        $count   = self::where('layanan_id', $layanan_id)
                          ->whereDate('tanggal', $tanggal)
                          ->count() + 1;
        return $prefix . str_pad($count, 3, '0', STR_PAD_LEFT);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
