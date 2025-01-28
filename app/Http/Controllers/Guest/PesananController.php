<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari user
        $validated = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'nomor_handphone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'total_harga' => 'required|numeric',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
        ]);
    
        // Simpan data ke dalam tabel `pesanan`
        $pesanan = Pesanan::create([
            'nama_depan' => $validated['nama_depan'],
            'nama_belakang' => $validated['nama_belakang'],
            'nomor_handphone' => $validated['nomor_handphone'],
            'email' => $validated['email'],
            'total_harga' => $validated['total_harga'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'adults' => $validated['adults'],
            'children' => $validated['children'],
        ]);
    
        return response()->json(['message' => 'Pesanan berhasil dibuat', 'id_pesanan' => $pesanan->id]);
    }
    

public function paymentCallback(Request $request)
{
    $serverKey = config('midtrans.server_key');
    $hashedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    if ($hashedKey === $request->signature_key) {
        $pesanan = Pesanan::find($request->order_id);

        if ($pesanan) {
            // Perbarui status pembayaran berdasarkan status dari Midtrans
            $pesanan->update(['status' => $request->transaction_status]);

            return response()->json(['message' => 'Status pembayaran diperbarui']);
        }
    }

    return response()->json(['message' => 'Invalid signature'], 400);
}


}
