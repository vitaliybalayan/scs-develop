<?php

namespace App;

use Auth;
use Image;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Client extends Model
{
	use Sluggable;

	protected $fillable = [
		'user_id', 'name', 'slug', 'position', 'service_id'
	];

	public function creator()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function service()
	{
		return $this->belongsTo(Service::class, 'service_id');
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

	public function saveContent($value)
	{
		foreach ($value as $key => $value) {
			foreach($value as $l_field => $l_value) {

				$localization = new Localization;
				$localization->language = $key;

				$localization->field = $l_field;
				$localization->value = $l_value;

				$this->localization()->save($localization);
			}
		}
	}

	public function localRemove($id)
	{
		$locals = Localization::where('lozalizable_id', $id)->where('lozalizable_type', Client::class)->get();
		
		foreach ($locals as $local) {
			$local->delete();
		}
	}

	public function uploadImage($image)
	{
		if($image == null) { return; }

		$this->removeImage();

		$filename = Str::random(12) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/clients/' . $filename;
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

		return '/storage/uploads/clients/' . $this->preview;
	}

	public function removeImage()
	{
		if($this->preview != null)
		{
			Storage::disk('public')->delete('uploads/clients/' . $this->preview);
		}
	}

	public function uploadLogo($image)
	{
		if($image == null) { return; }

		$this->removeLogo();

		$filename = Str::random(12) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/clients/logos/' . $filename;
		$img = Image::make($image)->heighten(50);

		Storage::put($path, (string) $img->encode());

		$this->logotype = $filename;
		$this->save();
	}

	public function getLogo()
	{
		if($this->logotype == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/clients/logos/' . $this->logotype;
	}


	public function removeLogo()
	{
		if($this->logotype != null)
		{
			Storage::disk('public')->delete('uploads/clients/logos/' . $this->logotype);
		}
	}

	public function uploadOgImage($image)
	{
		if($image == null) { return; }

		$this->removeOgImage();

		$filename = Str::random(12) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/clients/og/' . $filename;
		$img = Image::make($image)->heighten(50);

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

		return '/storage/uploads/clients/og/' . $this->og_image;
	}


	public function removeOgImage()
	{
		if($this->og_image != null)
		{
			Storage::disk('public')->delete('uploads/clients/og/' . $this->og_image);
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

	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'name'
			],
		];
	}
}
