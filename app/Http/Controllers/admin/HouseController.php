<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\House;
class HouseController extends Controller
{
    public function index()
    {
        $housesadmin = House::all();

       return view('admin.housesadmin', compact('housesadmin'));
    }

    public function create()
    {
        return view('admin.house.create');
    }

    public function store(Request $request)
    {
        $housesadmin = new House($request->all());
        $housesadmin->save();
        return redirect()->route('admin.index');
    }

    public function edit(House $housesadmin)
    {
        return view('admin.house.edit', compact('housesadmin'));
    }

    public function update(Request $request, House $housesadmin)
    {
        $housesadmin->update($request->all());
        return redirect()->route('admin.housesadmin');
    }

    // public function destroy(House $housesadmin)
    // {
    //     $housesadmin->delete();
    //     return redirect()->route('admin.index');
    // }
    public function destroy($id)
    {
        $housesadmin = House::find($id);

        if (!$housesadmin) {
            return redirect()->route('admin.index')->with('error', 'houses deleted successfully');
        }
        $housesadmin->delete();

        return redirect()->route('admin.index')->with('success', 'houses deleted successfully');
    }

}
