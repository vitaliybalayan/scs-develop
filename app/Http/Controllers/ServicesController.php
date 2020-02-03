<?php

namespace App\Http\Controllers;

use App\Service;
use App\Localization;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function show($lang, $slug)
    {
    	$service_id = Localization::where('language', $lang)
    								->where('field', 'slug')
    								->where('value', $slug)
    								->first()->lozalizable_id;

    	$service = Service::find($service_id);

    	return view('services.show', compact(
    		'lang',
    		'service'
    	));
    }
}
