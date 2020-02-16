<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
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
		$locals = Localization::where('lozalizable_id', $id)->where('lozalizable_type', Fact::class)->get();
		
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
		$this->delete();
	}
}
