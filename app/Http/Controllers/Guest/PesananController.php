<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\BookingData;
use App\Models\Kamar;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\SmsService;


class PesananController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'kamar_id' => 'required|exists:booking_data,kamar_id',
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'nomor_handphone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'total_harga' => 'required|numeric',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            // Find the booking data record
            $bookingData = BookingData::where('kamar_id', $validated['kamar_id'])
                ->where(function ($query) use ($validated) {
                    $query->whereBetween('start_time', [$validated['check_in'], $validated['check_out']])
                        ->orWhereBetween('end_time', [$validated['check_in'], $validated['check_out']])
                        ->orWhere(function ($query) use ($validated) {
                            $query->where('start_time', '<=', $validated['check_in'])
                                    ->where('end_time', '>=', $validated['check_out']);
                        });
                })
                ->lockForUpdate()
                ->first();

            // Check if the booking data exists
            if (!$bookingData) {
                Log::info('No BookingData found with the given conditions.', [
                    'kamar_id' => $validated['kamar_id'],
                    'check_in' => $validated['check_in'],
                    'check_out' => $validated['check_out'],
                ]);
                return response()->json(['message' => 'Booking data not found.'], 404);
            }

            // Check if the requested quantity exceeds the available quantity
            if ($validated['quantity'] > $bookingData->quantity) {
                return response()->json(['message' => 'Requested quantity exceeds available stock.'], 400);
            }
                
            $bookingData->save();            

            $pesananId = 'AH-' . rand(1000, 9999); 

            // Store the order in the pesanan table
            $pesanan = Pesanan::create([
                'pesanan_id' => $pesananId,
                'kamar_id' => $validated['kamar_id'],
                'nama_depan' => $validated['nama_depan'],
                'nama_belakang' => $validated['nama_belakang'],
                'nomor_handphone' => $validated['nomor_handphone'],
                'email' => $validated['email'],
                'total_harga' => $validated['total_harga'],
                'check_in' => $validated['check_in'],
                'check_out' => $validated['check_out'],
                'adults' => $validated['adults'],
                'children' => $validated['children'],
                'quantity' => $validated['quantity'],
                'status' => 'pending'
            ]);
            
            if ($bookingData && $bookingData->quantity >= $validated['quantity']) {
                $bookingData->quantity -= $validated['quantity'];
                $bookingData->save();
            } else {
                Log::error('Quantity not sufficient or bookingData is null', ['quantity' => $validated['quantity']]);
                return response()->json(['message' => 'Not enough rooms available.'], 400);
            }
    
            if (!$bookingData) {
                Log::error('Booking data not found for kamar_id', ['kamar_id' => $validated['kamar_id']]);
                return response()->json(['message' => 'Booking data not found'], 404);
            }

            DB::commit();

            return response()->json(['message' => 'Pesanan successfully created.', 'id_pesanan' => $pesanan->pesanan_id]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
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
