<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.index')->with('settings', Setting::all()->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.create');
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
        return view('admin.settings.edit')->with('settings', Setting::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $request = request();
        $this->validate($request, [
            'url' => 'required',
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'copyright' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'name' => 'required',
        ]);

        $settings = Setting::first();

        $settings->url = $request->url;
        $settings->title = $request->title;
        $settings->description = $request->description;
        $settings->keywords = $request->keywords;
        $settings->copyright = $request->copyright;
        $settings->email = $request->email;
        //$settings->logo = $request->logo;
        $settings->phone = $request->phone;
        $settings->country = $request->country;
        $settings->city = $request->city;
        $settings->address = $request->address;
        $settings->name = $request->name;


        $settings->save();
        return redirect()->route('settings');
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
