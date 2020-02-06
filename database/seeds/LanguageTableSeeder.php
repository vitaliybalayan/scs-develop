<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('languages')->insert([
			'name' => 'Русский',
			'code' => 'ru',
			'is_default' => '1',
			'is_public' => '1',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')
		]);
	}
}
