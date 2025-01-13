<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'kapasitas',
        'tipe_bed',
        'harga',
        'category_id',
        'status'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
