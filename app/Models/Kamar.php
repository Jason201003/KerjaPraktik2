<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kapasitas',
        'tipe_bed',
        'harga',
        'category_id',
        'stock',
        'status'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function bookingData()
    {
        return $this->hasMany(BookingData::class);
    }

    public function bookings()
    {
        return $this->hasMany(Pesanan::class, 'kamar_id');
    }
}
