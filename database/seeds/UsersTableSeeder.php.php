<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//create admin
		$admin = App\User::firstOrNew([
			'name' => 'Administrator',
			'email' => 'admin@example.com',
		]);
		$admin->password = bcrypt('123456');
		$admin->save();

		//create others
		$faker = Faker\Factory::create();
		for ($i = 0; $i < 20; $i++) {
			App\User::create([
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => $faker->password,
			]);
		}
	}
}
