<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardBookingController extends Controller
{
    public function index()
    {
        $booking = Booking::booking()->latest()->filtertanggal(request(['dari','sampai']))->tanggal(request('filter'))->cari(request('cari'))->paginate(10);

        return view('dashboard.booking.booking', [
            'bookings' => $booking
        ]);
    }


    public function update(Request $request, Booking $booking)
    {
        $validateData = $request->validate([
            'opsi' => 'required'
        ]);

        Booking::where('id', $booking->id)->update($validateData);

        return redirect()->back()->with('success', 'Berhasil Di Rubah');
    }
}
