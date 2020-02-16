<?php

namespace App;

use Image;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
	protected $fillable = [
		'user_id', 'title'
	];

	public function creator()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public static function add($fields)
	{
		$articles = new static;
		$articles->fill($fields);
		$articles->save();

		return $articles;
	}

	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}

	// Icon
	public function uploadIcon($image)
	{
		if($image == null) { return; }

		$this->removeIcon();

		$filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/certificates/' . $filename;
		$img = Image::make($image);

		Storage::put($path, (string) $img->encode());

		$this->icon = $filename;
		$this->save();
	}

	public function removeIcon()
	{
		if($this->icon != null)
		{
			Storage::disk('public')->delete('uploads/certificates/' . $this->icon);
		}
	}

	public function remove()
	{
		$this->removeImage();
		$this->removeIcon();
		$this->delete();
	}

	public function getIcon()
	{
		if($this->icon == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/certificates/' . $this->icon;
	}
	// End::Icon

	// Icon
	public function uploadImage($image)
	{
		if($image == null) { return; }

		$this->removeImage();

		$filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/certificates/' . $filename;
		$img = Image::make($image);

		Storage::put($path, (string) $img->encode());

		$this->image = $filename;
		$this->save();
	}

	public function removeImage()
	{
		if($this->image != null)
		{
			Storage::disk('public')->delete('uploads/certificates/' . $this->image);
		}
	}

	public function getImage()
	{
		if($this->image == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/certificates/' . $this->image;
	}
	// End::Icon
}
