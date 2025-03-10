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

    public function reset()
    {
        DB::beginTransaction();

        try {
            // Restore the stock for all rooms by summing up booked quantities
            $bookedRooms = BookingData::select('kamar_id', DB::raw('SUM(quantity) as total_booked'))
                ->groupBy('kamar_id')
                ->get();

            foreach ($bookedRooms as $booking) {
                $kamar = Kamar::find($booking->kamar_id);

                if ($kamar) {
                    // Restore stock by adding back the booked quantity
                    $kamar->stock += $booking->total_booked;
                    $kamar->save();
                }
            }

            // Clear all booking data
            BookingData::truncate();

            DB::commit();

            return redirect()->back()->with('success', 'Semua data booking berhasil di-reset dan stok kamar telah dipulihkan.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('success', 'Semua data booking berhasil di-reset dan stok kamar telah dipulihkan.');
        }
    }

    public function availableRooms()
    {
        // Waktu saat ini
        $currentTime = Carbon::now();

        // Ambil kamar yang tersedia dengan kondisi start_time <= current_time atau start_time >= current_time
        $openRooms = BookingData::where(function($query) use ($currentTime) {
                $query->where('start_time', '<=', $currentTime)
                    ->orWhere('start_time', '>=', $currentTime);
            })
            ->where('end_time', '>=', $currentTime) // Pastikan end_time lebih besar atau sama dengan current_time
            ->with('kamar.category') // Pastikan relasi sudah benar
            ->get();

        return view('manager.Booking_Time.available', compact('openRooms', 'currentTime'));
    }
}
