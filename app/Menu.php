<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $table = 'menu';

	protected $fillable = [
		'parent_id', 'user_id', 'position'
	];

	public function localization()
	{
		return $this->morphOne(Localization::class, 'lozalizable');
	}

	public function getLocalize($language, $field){
		return $this->localization()
					->where(['language' => $language, 'field' => $field])
					->firstOrFail()->value;
	}

	public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function parentTitle($lang)
    {
        if ($this->parent_id == 0) {
            return '-';
        }

        return $this->parent->getLocalize($lang, 'title');
    }

	public function creator()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function sub_menu(){
		return $this->hasMany(Menu::class, 'parent_id');
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
		$locals = Localization::where('lozalizable_id', $id)->where('lozalizable_type', Menu::class)->get();
		
		foreach ($locals as $local) {
			$local->delete();
		}
	}

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

	public function shelter()
	{
		$this->parent_id = 0;
		$this->save();
	}

	public function remove($id)
	{
		$links = Menu::where('parent_id', $id)->get();

		foreach ($links as $link) {
			$item = Menu::find($link->id);
			$item->shelter();
			$item->setDraft();
		}

		$this->delete();
	}
}
