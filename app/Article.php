<?php

namespace App;

use Image;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = [
		'user_id'
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
		$path = '/public/uploads/articles/' . $filename;
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

		return '/storage/uploads/articles/' . $this->preview;
	}

	public function removeImage()
	{
		if($this->preview != null)
		{
			Storage::disk('public')->delete('uploads/articles/' . $this->preview);
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

	public function hasNext()
	{
		$next = self::where('id', '>', $this->id)->min('id'); 

		return $next;
	}

	public function hasPrew()
	{
		$prew = self::where('id', '<', $this->id)->min('id'); 
		
		return $prew;
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
