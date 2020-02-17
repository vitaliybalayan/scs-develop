<?php

namespace App;

use Image;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
	protected $fillable = [
		'user_id', 'position',
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
		$about = new static;
		$about->fill($fields);
		$about->save();

		return $about;
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
		$locals = Localization::where('lozalizable_id', $id)->where('lozalizable_type', Advantage::class)->get();
		
		foreach ($locals as $local) {
			$local->delete();
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

	public function uploadImage($image)
	{
		if($image == null) { return; }

		$this->removeImage();

		$filename = Str::random(12) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/other/' . $filename;
		$img = Image::make($image);

		Storage::put($path, (string) $img->encode());

		$this->image = $filename;
		$this->save();
	}

	public function getImage()
	{
		if($this->image == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/other/' . $this->image;
	}

	public function removeImage()
	{
		if($this->image != null)
		{
			Storage::disk('public')->delete('uploads/other/' . $this->image);
		}
	}
}
