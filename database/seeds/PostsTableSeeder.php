<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$admin = App\User::where('email', 'admin@example.com')->select('id')->first();
		//
		$faker = Faker\Factory::create();
		for ($i = 0; $i < 20; $i++) {
			App\Post::create([
				'user_id' => $admin->id,
				'title' => $faker->sentence,
				'content' => implode('', $faker->sentences(5)),
				'thumbnail_url' => 'http://www.telegraph.co.uk/content/dam/Travel/leadAssets/25/75/sydney_2575346a-large.jpg',
				'status' => rand(1, 2),
			]);
		}
	}
}
