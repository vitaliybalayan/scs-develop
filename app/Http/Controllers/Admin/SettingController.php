<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
    	$setting = Setting::all()->first();

    	if (!$setting) {
    		return view('admin.settings.index');
    	}

    	return view('admin.settings.edit', compact('setting'));
    }

    public function store(Request $request)
    {
    	$setting = Setting::add($request->all());

        $setting->uploadLogotype($request->file('logotype'));
        $setting->uploadFooterLogotype($request->file('footer_logotype'));
        $setting->uploadFavicon($request->file('favicon'));
        $setting->uploadFaviconRetina($request->file('favicon_retina'));
        $setting->uploadOgImage($request->file('og_image'));

        return $data = array('status' => 'Настройки успешно сохранены.', 'type' => 'create');
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);

        $setting->edit($request->all());
        $setting->uploadLogotype($request->file('logotype'));
        $setting->uploadFooterLogotype($request->file('footer_logotype'));
        $setting->uploadFavicon($request->file('favicon'));
        $setting->uploadFaviconRetina($request->file('favicon_retina'));
        $setting->uploadOgImage($request->file('og_image'));

        return $data = array('status' => 'Настройки успешно сохранены.', );
    }
}
