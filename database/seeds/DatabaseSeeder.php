<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Model::unguard();

		$this->call(LanguageTableSeeder::class);

		// Model::reguard();
    }
}
