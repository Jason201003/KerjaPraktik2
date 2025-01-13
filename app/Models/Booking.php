<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'kamar_id',
        'check_in',
        'check_out',
        'adults',
        'children',
        'first_name',
        'last_name',
        'phone',
        'email',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
