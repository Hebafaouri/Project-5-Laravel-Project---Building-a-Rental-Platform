<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class ResController extends Controller
{

    public function index()
    {
        $lessonId = session('lesson_id');
    $bookings = Booking::where('lesson_id', $lessonId )->get();

    $userIds = DB::table('bookings')
    ->where('lesson_id', $lessonId)
    ->select('user_id')
    ->distinct()
    ->pluck('user_id');
    $users = DB::table('users')
    ->whereIn('id', $userIds)
    ->get();
    $houseDatas = DB::table('houses')
    ->join('bookings', 'houses.id', '=', 'bookings.house_id')
    ->select('houses.*')
    ->get();

    return view('lesson.reservation', compact('bookings','users','houseDatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
