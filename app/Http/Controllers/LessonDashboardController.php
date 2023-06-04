<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House; // Add this line

class LessonDashboardController extends Controller
{
    public function index(Type $var = null)
    {
        $houses = House::with('user')->get(); // Fetch houses with their related users

        return view('lesson.dashboard', compact('houses'));
    }

    public function destroy($id)
    {
        $house = House::find($id);
    
        if (!$house) {
            return redirect()->route('profile.index')->with('error', 'House not found');
        }
    
        $house->delete();
    
        return redirect()->route('profile.index')->with('success', 'House deleted successfully');
    }
    public function view($id)
{
    $house = House::find($id);

    return view('lesson.view', compact('house'));
}

}