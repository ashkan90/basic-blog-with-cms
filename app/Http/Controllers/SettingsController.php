<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{

    public function index()
    {
    	return view('admin.settings.settings')->with('settings', Setting::first());
    }

    public function update()
    {
    	$this->validate(request(), [
    		'site_name' => 'required',
    		'address' => 'required',
            'footer_title' => 'required',
            'footer_description' => 'required'
    	]);

    	$settings = Setting::first();

    	$settings->site_name = request()->site_name;
    	$settings->address = request()->address;
    	$settings->contact_number = request()->contact_number;
    	$settings->contact_email = request()->contact_email;
        $settings->footer_title = request()->footer_title;
        $settings->footer_description = request()->footer_description;

    	$settings->save();

    	return redirect()->back();
    }
}
