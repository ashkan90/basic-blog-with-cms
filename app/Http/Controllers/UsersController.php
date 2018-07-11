<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Profile;

class UsersController extends Controller
{

    public function __constructor()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create')->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads\avatars\default.jpg'
        ]);

        $notification = [
            'message' => 'User created successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('users')->with($notification);
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
        $user = User::find($id);
        $profile = Profile::all()->where('user_id', $id)->first();
        $profile->delete();
        $user->delete();

        $notification = [
            'message' => 'The user has been removed successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('users')->with($notification);
    }

    /**
     * Make any user to admin
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;

        $user->save();

        $notification = [
            'message' => 'The user has become admin',
            'alert-type' => 'success'
        ];

        return redirect()->route('users')->with($notification);
    }

    public function not_admin($id)
    {
        $user = User::find($id);
        $user->admin = 0;

        $user->save();

        $notification = [
            'message' => 'The user has become normal user',
            'alert-type' => 'success'
        ];

        return redirect()->route('users')->with($notification);
    }
}
