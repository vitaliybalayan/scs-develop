<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Service;
use App\Language;
use App\Localization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$clients = Client::all();

		return view('admin.clients.index', compact(
			'clients'
		));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$g_languages = Language::where('is_public', 1)->get();
		$services = Service::all();

		return view('admin.clients.create', compact(
			'g_languages',
			'services'
		));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$client = Client::add($request->all());

		$client->uploadImage($request->file('preview'));
		$client->uploadLogo($request->file('logotype'));
		$client->uploadOgImage($request->file('og_image'));
		$client->is_public($request->get('is_public'));

		foreach ($request->get('locale') as $key => $value) {
			foreach($value as $l_field => $l_value) {
				$localization = new Localization;
				$localization->language = $key;

				$localization->field = $l_field;
				$localization->value = $l_value;

				$client->localization()->save($localization);
			}
		}

		return redirect()->route('clients.index');
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
		$client = Client::find($id);

		return view('admin.clients.edit', compact(
			'client'
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
		//
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
