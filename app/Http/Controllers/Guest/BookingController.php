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
        ]);

        // Get input dates
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');

        // Find available rooms based on status and booking overlap
        $availableRooms = Kamar::where('status', 'unoccupied')
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

    public function processBooking(Request $request, $roomId)
    {   
        $room = Kamar::findOrFail($roomId);

        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        // Simpan booking ke database
        $booking = $room->bookings()->create([
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adults' => $request->adults ?? 1,
            'children' => $request->children ?? 0,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        // Redirect ke halaman pembayaran atau konfirmasi
        return redirect()->route('guest.payment.page', $booking->id)->with('success', 'Booking berhasil!');
    }
}
