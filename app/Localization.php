<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
	use Sluggable;

    protected $table = 'localization';

	public function lozalizable()
	{
		return $this->morphTo();
	}

	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'title'
		];
	}
}
