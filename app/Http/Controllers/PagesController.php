<?php

namespace App\Http\Controllers;

use App\Client;
use App\Service;
use App\Article;
use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index($lang)
    {	
    	$services = Service::where('is_public', 1)->get();
    	$clients = Client::where('is_public', 1)->get();
    	$articles = Article::where('is_public', 1)->get();

    	return view('home.index', compact(
    		'services',
    		'clients',
    		'articles'
    	));
    }

    public function contacts($lang)
    {
        $locations = Location::where('is_public', 1)->get();

        return view('home.contacts', compact(
            'locations',
        ));
    }
}
