<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
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

		return view('admin.menu.index', compact('menus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$menus = Menu::all();

		return view('admin.menu.create', compact('menus'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title_ru' => 'required',
			'title_en' => 'required',
			'title_kz' => 'required',
		]);

		$menu = Menu::add($request->all());
		$menu->is_public($request->get('is_public'));

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

		return view('admin.menu.edit', compact('menus', 'menu'));
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

		$this->validate($request, [
			'title_ru' => 'required',
			'title_en' => 'required',
			'title_kz' => 'required',
		]);

		$menu->edit($request->all());
		$menu->is_public($request->get('is_public'));

		$slugs = [
			'link_ru' => $menu->link_ru
		];

		return $data = array('status' => 'Сохранение успешно!', 'slugs' => $slugs);
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
