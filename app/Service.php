<?php

namespace App;

use Auth;
use Image;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $fillable = [
		'user_id', 'preview', 'position'
	];

	public function creator()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function localization()
	{
		return $this->morphOne(Localization::class, 'lozalizable');
	}

	public function getLocalize($language, $field){
		return $this->localization()
					->where(['language' => $language, 'field' => $field])
					->firstOrFail()->value;
	}

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

	public function uploadOgImage($image)
	{
		if($image == null) { return; }

		$this->removeOgImage();

		$filename = Str::random(12) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/og_images/' . $filename;
		$img = Image::make($image);

		Storage::put($path, (string) $img->encode());

		$this->og_image = $filename;
		$this->save();
	}

	public function getOgImage()
	{
		if($this->og_image == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/og_images/' . $this->og_image;
	}

	public function removeOgImage()
	{
		if($this->og_image != null)
		{
			Storage::disk('public')->delete('uploads/og_images/' . $this->og_image);
		}
	}

	public function uploadImage($image)
	{
		if($image == null) { return; }

		$this->removeImage();

		$filename = Str::random(12) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/previews/' . $filename;
		$img = Image::make($image);

		Storage::put($path, (string) $img->encode());

		$this->preview = $filename;
		$this->save();
	}

	public function getImage()
	{
		if($this->preview == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/previews/' . $this->preview;
	}

	public function removeImage()
	{
		if($this->preview != null)
		{
			Storage::disk('public')->delete('uploads/previews/' . $this->preview);
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
		$this->removeOgImage();
		$this->removeImage();

		$this->delete();
	}

	public function localRemove($id)
	{
		$locals = Localization::where('lozalizable_id', $id)->where('lozalizable_type', Service::class)->get();
		// dd($locals);
		foreach ($locals as $local) {
			$local->delete();
		}
		// $locals->delete();
	}
}
