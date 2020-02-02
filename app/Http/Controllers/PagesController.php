<?php

namespace App\Http\Controllers;

use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    	$service = Service::find(58);

    	return view('welcome', compact('service'));
    }
}
