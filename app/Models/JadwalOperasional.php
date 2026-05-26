<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalOperasional extends Model
{
    use HasFactory;

    protected $table = 'jadwal_operasionals';

    protected $fillable = [
        'hari',
        'jam_buka',
        'jam_tutup',
        'maks_pelanggan',
        'is_libur',
        'keterangan',
    ];

    protected $casts = [
        'is_libur' => 'boolean',
    ];
}
