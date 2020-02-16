<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
    	$about = About::all()->first();
        $g_languages = Language::where('is_public', 1)->get();
        $default_lang = Language::where('is_default', 1)->first()->code;

    	if (!$about) {
    		return view('admin.about.index', compact(
    			'g_languages'
    		));
    	}

    	return view('admin.about.edit', compact(
    		'about',
    		'g_languages',
            'default_lang'
    	));
    }

    public function store(Request $request)
    {
        $about = About::add($request->all());

        $about->uploadImage($request->file('image'));
        $about->uploadOgImage($request->file('og_image'));
        $about->saveContent($request->get('locale'));

        return redirect()->route('about.index'); 
    }

    public function update(Request $request, $id)
    {
        $about = About::find($id);

        $about->edit($request->all());
        $about->localRemove($about->id);
        $about->saveContent($request->get('locale'));
        $about->uploadImage($request->file('image'));
        $about->uploadOgImage($request->file('og_image'));

        return $data = array('status' => 'Информация обновлена');
    }
}
