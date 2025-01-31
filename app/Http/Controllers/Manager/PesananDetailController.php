<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class PesananDetailController extends Controller
{
    public function index()
    {
        $pesananDetail = Pesanan::with('category')->get();
        return view('manager.pesanan.index', compact('pesananDetail'));
    }

    public function confirm($pesanan_id)
    {
        $pesanan = Pesanan::where('pesanan_id', $pesanan_id)->first();

        // Ensure the pesanan exists before updating its status
        if ($pesanan) {
            $pesanan->status = 'confirmed';
            $pesanan->save();
            return redirect()->route('manager.detail-pesanan.index')->with('success', 'Pesanan confirmed.');
        }

        return redirect()->route('manager.pesanan.index')->with('error', 'Pesanan not found.');
    }
}
