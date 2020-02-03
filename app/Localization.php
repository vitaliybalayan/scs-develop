<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    protected $table = 'localization';

	public function lozalizable()
	{
		return $this->morphTo();
	}
}
