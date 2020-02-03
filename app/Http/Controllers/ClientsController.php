<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index($lang)
    {
    	$clients = Client::where('is_public', 1)->get();

    	return view('clients.index', compact(
    		'lang',
    		'clients'
    	));
    }

    public function show($lang, $slug)
    {
    	$client = Client::where('slug', $slug)->firstOrFail();

    	return view('clients.show', compact(
    		'lang',
    		'client'
    	));
    }
}
