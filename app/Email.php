<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $fillable = [
		'ip'
	];

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

	public function saveValue($value)
	{
		$this->value = $value;
		$this->save();
	}
}
