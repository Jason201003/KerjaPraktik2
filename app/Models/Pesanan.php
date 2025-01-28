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
        'nama_depan',
        'nama_belakang',
        'nomor_handphone',
        'email',
        'check_in',
        'check_out',
        'adults',
        'children',
        'total_harga',
    ];
    
}
