<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    // Hapus id_pesanan dari $fillable karena tidak perlu disertakan
    protected $fillable = [
        'kamar_id',
        'nama_depan',
        'nama_belakang',
        'nomor_handphone',
        'email',
        'check_in',
        'check_out',
        'adults',
        'children',
        'quantity',
        'total_harga',
        
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}
