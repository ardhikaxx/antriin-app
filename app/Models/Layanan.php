<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'durasi',
        'is_aktif',
    ];

    protected $casts = [
        'is_aktif' => 'boolean',
        'harga' => 'decimal:2',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }
}
