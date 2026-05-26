<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_booking',
        'user_id',
        'layanan_id',
        'petugas_id',
        'tanggal',
        'jam_booking',
        'catatan',
        'status',
    ];

    public static function generateKode()
    {
        return 'ANT-' . now()->format('ymd') . '-' . strtoupper(Str::random(5));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function antrian()
    {
        return $this->hasOne(Antrian::class);
    }
}
