<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\BookingData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingTimeController extends Controller
{
    public function index()
    {
        // Mengambil hanya nomor kamar
        $kamars = Kamar::with('category')->get(); 
        
        // Mendapatkan waktu sekarang
        $currentTime = Carbon::now()->format('Y-m-d H:i:s');
        
        return view('manager.Booking_Time.index', compact('kamars', 'currentTime'));        
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'array',
            'end_time' => 'array',
            'quantity' => 'array',
        ]);

        DB::beginTransaction();

        try {
            foreach ($request->quantity as $kamar_id => $quantity) {
                // Lewati tipe kamar yang tidak diisi jumlahnya
                if ($quantity <= 0) {
                    continue;
                }

                $kamar = Kamar::find($kamar_id);

                if (!$kamar) {
                    return redirect()->back()->with('error', "Kamar dengan ID {$kamar_id} tidak ditemukan.");
                }

                // Validasi jika jumlah yang diinput melebihi stok yang tersedia
                if ($quantity > $kamar->stock) {
                    return redirect()->back()->with('error', "Jumlah kamar untuk {$kamar->category->name} melebihi stok yang tersedia.");
                }

                // Kurangi stok kamar di database
                $kamar->stock -= $quantity;
                $kamar->save();

                // Simpan data booking
                DB::table('booking_data')->insert([
                    'kamar_id' => $kamar_id,
                    'start_time' => $request->start_time[$kamar_id],
                    'end_time' => $request->end_time[$kamar_id],
                    'quantity' => $quantity,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Booking berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan booking: ' . $e->getMessage());
        }
    }

    public function availableRooms()
    {
        // Get the current time
        $currentTime = Carbon::now();

        // Get rooms that are currently open
        $openRooms = BookingData::where('start_time', '<=', $currentTime)
            ->where('end_time', '>=', $currentTime)
            ->with('kamar.category') // Assuming `BookingData` has a relation with the `Kamar` model
            ->get();

        return view('manager.Booking_Time.available', compact('openRooms', 'currentTime'));
    }
}
