<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\House;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Session::get('user_id');
       
        return view('user.urser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
        $user = User::find($id);

        return view('user.edit', compact('user'));
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
        $request->validate([
            'name' => '',
            'email' => '',
            'password' => '',
            'address' => '',
            'phone' => '',
        ]);
    
        $user = User::find($id);
    
        if (!$user) {
            // Handle the case where the user is not found, e.g., show an error message or redirect.
        }
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('houseimage'), $imageName);
            $user->image = 'houseimage/' . $imageName;
        }
    
        $user->user_name = strip_tags($request->input('name'));
        $user->email = strip_tags($request->input('email'));
        $user->address = strip_tags($request->input('address'));
        $user->phone = strip_tags($request->input('phone'));
    
        $password = strip_tags($request->input('password'));
        if (!empty($password)) {
            $hashedPassword = Hash::make($password);
            $user->password = $hashedPassword;
        }
    
        $user->role_id = 3;
    
        $user->save();
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
