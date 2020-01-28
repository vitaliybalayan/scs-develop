<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	public function index()
	{
		return view('admin.auth.login');
	}

	public function login(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
		]);

		if (Auth::attempt([
			'email'	=>	$request->get('email'),
			'password'	=>	$request->get('password')
		])) {
			return redirect()->route('users.index');
		}

		return redirect()->back()->with('status', 'Неправильный логин или пароль');
	}

	public function register(Request $request)
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

	public function logout()
	{
		Auth::logout();
		return redirect('/');
	}
}
