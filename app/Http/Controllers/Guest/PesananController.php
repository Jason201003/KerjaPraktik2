<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        // Validasi inputan dari user
        $validated = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'nomor_handphone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'total_harga' => 'required|numeric',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $pesanan = Pesanan::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nomor_handphone' => $request->nomor_handphone,
            'email' => $request->email,
            'total_harga' => $request->total_harga,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]); 

        // Jika berhasil, arahkan ke langkah selanjutnya
        return response()->json([
             'message' => 'Pesanan berhasil disimpan!',
            'id_pesanan' => $pesanan->formatted_id,  // Gunakan accessor untuk menampilkan format AH-001
            'payment_url' => route('payment.create', ['id' => $pesanan->formatted_id]), // Sesuaikan dengan route
        ]);
    }
}
