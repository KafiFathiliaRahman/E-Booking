<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Studio;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function dashboard()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'Pending')->count();
        $confirmedBookings = Booking::where('status', 'Confirmed')->count();
        $cancelledBookings = Booking::where('status', 'Cancelled')->count();
        
        $bookings = Booking::with('studio')->latest()->paginate(7);

        return view('dashboard', compact('totalBookings', 'pendingBookings', 'confirmedBookings', 'cancelledBookings', 'bookings'));
    }

    public function index()
    {
        $bookings = Booking::with('studio')->paginate(10);
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $studios = Studio::all();
        return view('bookings.create', compact('studios'));
    }

    public function store(Request $request)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'studio_id' => 'required|exists:studios,id',
        'booking_date' => 'required|date',
        'time_slot' => 'required|string',
    ]);

 
    $booking = Booking::create([
        'customer_name' => $request->customer_name,
        'studio_id' => $request->studio_id,
        'booking_date' => $request->booking_date,
        'time_slot' => $request->time_slot,
        'status' => 'Pending',
    ]);

  
    return redirect()->route('bookings.payment', $booking->id);
}

// Method untuk meload view payment
public function payment($id)
{
    $booking = Booking::with('studio')->findOrFail($id);
    return view('bookings.payment', compact('booking'));
}

    public function processPayment($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'Confirmed', 'payment_proof' => 'Paid via QRIS']);

        return redirect()->route('dashboard')->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect()->back()->with('success', 'Booking berhasil dihapus.');
    }
}