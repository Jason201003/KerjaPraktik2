<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function search(Request $request)
    {
        // Validate input
        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
        ]);

        // Get input dates
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');
        $adults = $request->input('adults');

        if ($adults <= 2) {
            $capacity = 2;
        } elseif ($adults <= 4) {
            $capacity = 4;
        } else {
            $capacity = null; // Tidak ada kamar untuk lebih dari 4 orang
        }

        // Find available rooms based on status and booking overlap
        $availableRooms = Kamar::where('status', 'unoccupied')
            ->when($capacity, function ($query, $capacity) {
                return $query->where('kapasitas', '>=', $capacity);
            })
            ->whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
                $query->where(function ($q) use ($checkIn, $checkOut) {
                    $q->whereBetween('check_in', [$checkIn, $checkOut])
                        ->orWhereBetween('check_out', [$checkIn, $checkOut])
                        ->orWhereRaw('? BETWEEN check_in AND check_out', [$checkIn])
                        ->orWhereRaw('? BETWEEN check_in AND check_out', [$checkOut]);
                });
            })
            ->get();

        // Return the view with the search results
        return view('partials.room_list', compact('availableRooms', 'checkIn', 'checkOut'));
    }

    public function showBookingForm($roomId, Request $request)
    {
        $room = Kamar::findOrFail($roomId);
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');

        return view('guest.booking.booking_form', compact('room', 'checkIn', 'checkOut'));
    }
}
