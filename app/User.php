<?php

namespace App;

use Auth;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name', 'image', 'email', 'admin'
	];

	public static function add($fields)
	{
		$user = new static;
		$user->fill($fields);
		$user->save();

		return $user;
	}

	public function edit($fields)
	{
		$this->fill($fields); //name,email
		
		$this->save();
	}

	public function generatePassword($password)
	{
		if($password != null)
		{
			$this->password = bcrypt($password);
			$this->save();
		}
	}

	public function remove()
	{
		$this->removeImage();
		$this->delete();
	}

	public function uploadImage($image)
	{
		if($image == null) { return; }

		$this->removeImage();

		$filename = Str::random(12) . '.' . $image->extension();
		$image->storeAs('public/uploads/users', $filename);
		$this->image = $filename;
		$this->save();
	}

	public function removeImage()
	{
		if(Auth::user()->image != null)
		{
			Storage::disk('public')->delete('uploads/users/' . Auth::user()->image);
		}
	}

	public function getImage()
	{
		if($this->image == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/users/' . $this->image;
	}

	
}
