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

    	if (!$about) {
    		return view('admin.about.index', compact(
    			'g_languages'
    		));
    	}

    	return view('admin.about.edit', compact(
    		'about',
    		'g_languages',
    	));
    }
}
