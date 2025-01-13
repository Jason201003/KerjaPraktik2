<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function createTransaction(Request $request)
    {
        // Data transaksi dari frontend
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . uniqid(),
                'gross_amount' => $request->input('totalHarga'),
            ],
            'customer_details' => [
                'first_name' => $request->input('firstName'),
                'last_name' => $request->input('lastName'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ],
        ];

        // Buat Snap Token
        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

