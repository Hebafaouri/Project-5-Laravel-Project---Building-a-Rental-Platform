<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Booking;

use Illuminate\Support\Facades\Session;
use App\Models\House;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)    {
        // Validate the form data
        $validatedData = $request->validate([
            'check-in-date' => 'required|date',
            'check-out-date' => 'required|date|after:check-in-date',
        ]);
        $userId = session('user_id');;
        $id = $request->input('id');
        // Create a new booking instance
        $booking = new Booking();
        $house = House::find($id);
        $lessonIds = $house->lessons()->pluck('id');
        $booking->start_date = $validatedData['check-in-date'];
        $booking->end_date = $validatedData['check-out-date'];
        $booking->house_id = $id;
        $booking->user_id = $userId ;
        $booking->lesson_id = $lessonIds;
        $house->user_id = $userId;
        $booking->update();
        $booking->save();

        // Optionally, you can redirect the user to a success page or perform other actions
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
