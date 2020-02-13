<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$menus = Menu::all();
		$default_lang = Language::where('is_default', 1)->first()->code;

		return view('admin.menu.index', compact(
			'menus',
			'default_lang'
		));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$menus = Menu::all();
		$g_languages = Language::where('is_public', 1)->get();
		$default_lang = Language::where('is_default', 1)->first()->code;

		return view('admin.menu.create', compact(
			'menus',
			'g_languages',
			'default_lang'
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
		$menu = Menu::add($request->all());
		$menu->is_public($request->get('is_public'));

		$menu->saveContent($request->get('locale'));

		return redirect()->route('menu.index');
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
		$menus = Menu::all();
		$menu = Menu::find($id);
		$g_languages = Language::where('is_public', 1)->get();
		$default_lang = Language::where('is_default', 1)->first()->code;

		return view('admin.menu.edit', compact(
			'menus',
			'menu',
			'g_languages',
			'default_lang'
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
		$menu = Menu::find($id);

		$menu->edit($request->all());
		$menu->is_public($request->get('is_public'));

		$menu->localRemove($menu->id);
		$menu->saveContent($request->get('locale'));


		return redirect()->route('menu.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$menu = Menu::find($id);

		$menu->remove($menu->id);
		return redirect()->route('menu.index');
	}
}
