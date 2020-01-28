<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::all();

		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.users.create');
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
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed|min:6',
			'first_name' => 'required',
			'last_name' => 'required',
			'image' => 'nullable|image'
		]);

		$user = User::add($request->all());
		$user->generatePassword($request->get('password'));
		$user->uploadImage($request->file('image'));

		return redirect()->route('users.index');
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
		$user = User::find($id);

		return view('admin.users.edit', compact('user'));
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
		// dd($request->all());

		$user = User::find($id);

		$this->validate($request, [
			'first_name'  =>  'required',
			'last_name'  =>  'required',
			'email' =>  [
				'required',
				'email',
				Rule::unique('users')->ignore($user->id),
			],
			'image'    =>  'nullable|image'
		]);

		$user->edit($request->all()); //name,email
		$user->generatePassword($request->get('password'));
		$user->uploadImage($request->file('image'));

        return redirect()->route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		if ($user->admin == 1) {
			return redirect()->back()->with('status', 'Удаление суперпользователя невозможно.');
		}

		$user->remove();
		return redirect()->route('users.index');
	}
}
