<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
    	$setting = Setting::where('id', 1)->first();

    	if (!$setting) {
    		return view('admin.settings.index');
    	}

    	return view('admin.settings.edit', compact('setting'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
    	]);
    }
}
