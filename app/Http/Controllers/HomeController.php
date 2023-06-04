<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Booking;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        // $houses = House::all();

        // return view('home.index', compact('houses'));

        $type_id = $request->input('icon_search');

    $houses= House::when($type_id, function ($query) use ($type_id) {
        $query->where(function ($query) use ($type_id) {
            $query->where('price', 'like', '%' . $type_id . '%')
                ->orWhere('house_name', 'like', '%' . $type_id . '%')
                ->orWhere('service', 'like', '%' . $type_id . '%');
        });
    })->get();



    $type_id = $houses; // Assign the filtered farms to $Farm variable

    return view('home.index', compact('houses'));

    }

    public function create()
    {

    }
    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $bookedDates = Booking::pluck('start_date', 'end_date')->toArray();
        $house = House::find($id);
        $comments = Comment::where('house_id', $id)->get();
        $houseId = 1;

        $lessonData = DB::table('houses')
        ->join('lessons', 'houses.lesson_id', '=', 'lessons.id')
        ->select('lessons.*')
        ->where('houses.id', $id)
        ->first();
        return view('home.single', compact('house', 'bookedDates', 'lessonData','comments'));

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
