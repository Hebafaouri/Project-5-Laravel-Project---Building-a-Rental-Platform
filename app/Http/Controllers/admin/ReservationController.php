<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class ReservationController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user', 'house')->get();
        return view('admin.reservations', compact('bookings'));
    }

    // public function create()
    // {
    //     return view('admin.rentors.create');
    // }

    // public function store(Request $request)
    // {
    //     $rentor = new User($request->all());
    //     $rentor->save();
    //     return redirect()->route('rentors');
    // }

    // public function edit(User $rentor)
    // {
    //     return view('admin.rentors.edit', compact('rentor'));
    // }

    // public function update(Request $request,User $rentor)
    // {
    //     $rentor->update($request->all());
    //     return redirect()->route('rentors');
    // }

    // public function destroy(Booking $booking)
    // {
    //     $booking->delete();

    //     return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    // }
    public function destroy($id)
    {
        $booking = booking::find($id);

        if (!$booking) {
            return redirect()->route('reservations.index')->with('error', 'Reservation deleted successfully');
        }
        $booking->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully');
    }

}

