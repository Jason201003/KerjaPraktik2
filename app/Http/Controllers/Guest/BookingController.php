<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function search(Request $request)
    {
        // Validasi input
        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children_ages' => 'nullable|array',
            'children_ages.*' => 'integer|min:1|max:11',
        ]);

        // Ambil data input
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');
        $adults = $request->input('adults');
        $children = $request->input('children', 0);
        $childrenAges = $request->input('children_ages', []);

        // Hitung total kapasitas
        $totalGuests = $adults + $children;

        $checkInDate = new \DateTime($checkIn);
        $checkOutDate = new \DateTime($checkOut);
        $nights = $checkInDate->diff($checkOutDate)->days;

        // Query kamar yang tersedia
        $availableRooms = Kamar::where('status', 'unoccupied')
            ->where('kapasitas', '>=', $totalGuests) // Kapasitas minimal sesuai tamu
            ->whereHas('bookingData', function ($query) use ($checkIn, $checkOut) {
                // Filter kamar yang tidak overlaping dengan tanggal booking
                $query->where(function ($query) use ($checkIn, $checkOut) {
                    $query->whereBetween('start_time', [$checkIn, $checkOut])
                        ->orWhereBetween('end_time', [$checkIn, $checkOut])
                        ->orWhere(function ($query) use ($checkIn, $checkOut) {
                            $query->where('start_time', '<=', $checkIn)
                                ->where('end_time', '>=', $checkOut);
                        });
                });
            })
            ->with('category')
            ->get();

        $availableRooms->each(function ($room) use ($nights) {
            $room->total_price = $room->harga_per_malam * $nights;
        });

        // Tampilkan hasil ke view
        return view('partials.room_list', compact('availableRooms', 'adults', 'children', 'childrenAges', 'checkIn', 'checkOut', 'nights', 'totalGuests'));
    }

    public function showBookingForm($roomId, Request $request)
    {
        $room = Kamar::findOrFail($roomId);
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');
        $adults = $request->input('adults');
        $children = $request->input('children', 0);
        $childrenAges = $request->input('children_ages', []);
        $totalGuests = $adults + $children;

        $checkInDate = new \DateTime($checkIn);
        $checkOutDate = new \DateTime($checkOut);
        $nights = $checkInDate->diff($checkOutDate)->days;
        $totalPrice = $room->harga * $nights;

        // dd($request->all());

        return view('guest.booking.booking_form', compact('room', 'checkIn','adults', 'children', 'childrenAges', 'totalGuests', 'checkOut', 'nights', 'totalPrice'));
    }
}
