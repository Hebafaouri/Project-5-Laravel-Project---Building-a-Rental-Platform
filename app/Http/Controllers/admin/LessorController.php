<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;

class LessorController extends Controller
{
    public function index()
    {
        $lessors = Lesson::all();
        return view('admin.lessorsadmin', compact('lessors'));
    }

    //    public function index()
    // {
    //     $bookings = Booking::with('user', 'house')->get();
    //     return view('admin.reservations', compact('bookings'));
    // }


    public function create()
    {
        return view('admin.lessors.create');
    }

    public function store(Request $request)
    {
        $lessors = new Lesson($request->all());
        $lessors->save();
        return redirect()->route('lessorsadmin.index');
    }

    // public function edit(Lesson $lessor)
    // {
    //     return view('admin.lessors.edit', compact('lessor'));
    // }

    // public function update(Request $request, Lesson $lessors)
    // {
    //     $lessors->update($request->all());
    //     return redirect()->route('admin.lessors.index');
    // }

    // public function destroy(Lesson $lessors)
    // {
    //     $lessors->delete();
    //     return redirect()->route('admin.lessors.index');
    // }
    public function destroy($id)
    {
        $lessors = Lesson::find($id);

        if (!$lessors) {
            return redirect()->route('lessorsadmin.index')->with('error', 'lessors deleted successfully');
        }
        $lessors->delete();

        return redirect()->route('lessorsadmin.index')->with('success', 'lessors deleted successfully');
    }

}
