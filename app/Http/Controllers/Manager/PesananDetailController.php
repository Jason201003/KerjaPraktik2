<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Request;

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

    public function destroy($pesanan_id)
    {
        $pesanan = Pesanan::where('pesanan_id', $pesanan_id)->first();

        if ($pesanan) {
            $pesanan->delete();
            return redirect()->route('manager.detail-pesanan.index')->with('success', 'Pesanan deleted successfully.');
        }

        return redirect()->route('manager.detail-pesanan.index')->with('error', 'Pesanan not found.');
    }
}
        