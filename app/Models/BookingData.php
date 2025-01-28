<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingData extends Model
{
    // Define the fillable attributes
    protected $fillable = [
        'kamar_id',        // Add kamar_id here
        'start_time',
        'end_time',
        'quantity',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
