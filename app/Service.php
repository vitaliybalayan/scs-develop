<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $fillable = [
		'user_id', 'preview', 'position', 'preview'
	];

	public function localization()
	{
		return $this->morphOne(Localization::class, 'lozalizable');
	}

	public function scopeGetLocalize($language, $field){
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

	public function remove()
	{
		// $this->removeImage();
		$this->delete();
	}
}
