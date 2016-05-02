<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$faker = Faker\Factory::create();
		for ($i = 0; $i < 10; $i++) {
			App\Tag::insert([
				'name' => implode(' ', $faker->words(3)),
			]);
		}
	}
}
