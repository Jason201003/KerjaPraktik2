<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        return view('guest.tracking');
    }

    public function check(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:pesanan,pesanan_id'
        ]);

        $order = Pesanan::where('pesanan_id', $request->order_id)->first();

        return view('guest.tracking', compact('order'));
    }
}
