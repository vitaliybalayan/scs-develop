<?php

namespace App;

use Auth;
use Image;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	protected $fillable = [
		'user_id', 'name', 'code'
	];

	public static function add($fields)
	{
		$service = new static;
		$service->fill($fields);
		$service->save();

		return $service;
	}

	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}

	public function uploadImage($image)
	{
		if($image == null) { return; }

		$this->removeImage();

		$filename = Str::random(12) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/languges/' . $filename;
		$img = Image::make($image)->heighten(50);

		Storage::put($path, (string) $img->encode());

		$this->icon = $filename;
		$this->save();
	}

	public function getImage()
	{
		if($this->icon == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/languges/' . $this->icon;
	}

	public function removeImage()
	{
		if($this->icon != null)
		{
			Storage::disk('public')->delete('uploads/languges/' . $this->icon);
		}
	}

	public function is_public($value)
	{
		if ($value != null) {
			$this->setPublic();
		} else {
			$this->setDraft();
		}
	}

	public function setPublic()
	{
		$this->is_public = 1;
		$this->save();
	}

	public function setDraft()
	{
		$this->is_public = 0;
		$this->save();
	}

	public function remove()
	{
		$this->removeImage();
		$this->delete();
	}
}
