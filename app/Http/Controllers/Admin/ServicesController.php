<?php

namespace App\Http\Controllers\Admin;

use Str;
use Image;
use App\Service;
use App\Localization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$services = Service::all();

		return view('admin.services.index', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.services.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$service = Service::add($request->all());

		$service->uploadImage($request->file('preview'));
		$service->uploadOgImage($request->file('og_image'));
		$service->is_public($request->get('is_public'));
		
		foreach ($request->get('locale') as $key => $value) {
		    
		    foreach($value as $l_field => $l_value) {
		        
		        $localization = new Localization;
		        $localization->language = $key;
		        
		        $localization->field = $l_field;
		        $localization->value = $l_value;
		        
		        $service->localization()->save($localization);
		        
		    }
		    
		}

		return redirect()->route('services.index');

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
		$service = Service::find($id);

		return view('admin.services.edit', compact(
			'service'
		));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$service = Service::find($id);

		$service->edit($request->all());

		$service->uploadImage($request->file('preview'));
		$service->uploadOgImage($request->file('og_image'));
		$service->is_public($request->get('is_public'));

		$service->localRemove($service->id);

		foreach ($request->get('locale') as $key => $value) {
			foreach($value as $l_field => $l_value) {

				$localization = new Localization;
				$localization->language = $key;

				$localization->field = $l_field;
				$localization->value = $l_value;

				$service->localization()->save($localization);

			}
		}

		return redirect()->route('services.index');
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
