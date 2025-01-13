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
        'total_harga',
    ];

    // Method untuk menghasilkan id_pesanan dengan format AH-001, AH-002, dst.
    public function getFormattedIdAttribute()
    {
        return 'AH-' . str_pad($this->id, 3, '0', STR_PAD_LEFT); // Format berdasarkan 'id' auto increment
    }

    // Jika Anda ingin melakukan manipulasi id_pesanan saat insert/update, Anda bisa menambahkan method seperti generateIdPesanan, namun tidak lagi perlu
    // public static function generateIdPesanan()
    // {
    //     $latestPesanan = self::orderBy('created_at', 'desc')->first();
    //     $number = $latestPesanan ? intval(substr($latestPesanan->id_pesanan, 3)) + 1 : 1;
    //     return 'AH-' . str_pad($number, 3, '0', STR_PAD_LEFT);
    // }
}
