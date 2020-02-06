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
		$path = '/public/uploads/languages/' . $filename;
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

		return '/storage/uploads/languages/' . $this->icon;
	}

	public function removeImage()
	{
		if($this->icon != null)
		{
			Storage::disk('public')->delete('uploads/languages/' . $this->icon);
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

	public function is_default($value)
	{
		// Если язык сделали основным
		if ($value != null) {

			// Ищем основной язык в базе данных
			$old_default = Language::where('is_default', 1)->first();

			// Если основной язык был найден, то делаем его обычным
			if ($old_default) {
				$old_default->setNoDefault();
			}

			// И делаем основным редактируемый язык
			$this->setDefault();

		} else {

			// Получаем все варианты языка
			$languages = Language::all();
			
			// Если язык единсвенный, возвращаем сообщение
			if ($languages->count() == 1) {
				return redirect()->route('languages.index')->with('status', 'Вы не можете сделать единственный язык, обычным');
			} else {

				// Если язык БЫЛ основным, то делаем основым рядомстоящий язык
				if ($this->is_default == 1) {
					$language = Language::where('id', '<>', $this->id)->first();			
					$language->setDefault();
				}

				// Делаем редактируемый язык обычным
				$this->setNoDefault();

			}

		}
	}

	public function setNoDefault()
	{
		$this->is_default = 0;
		$this->save();
	}

	public function setDefault()
	{
		$this->is_default = 1;
		$this->save();
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

	public function hasNext()
	{
		return self::where('id', '>', $this->id)->min('id');
	}

	public function remove()
	{
		$this->removeImage();

		if ($this->is_default == 1) {
			$language = Language::where('id', '<>', $this->id)->first();			
			$language->setDefault();
		}

		$this->delete();
	}
}
