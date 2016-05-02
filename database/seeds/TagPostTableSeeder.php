<?php

use Illuminate\Database\Seeder;

class TagPostTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$posts = App\Post::withoutGlobalScopes()->get();
		foreach ($posts as $post) {
			$tag = App\Tag::orderByRaw('RAND()')->first();
			$post->tags()->attach($tag->id);
		}
	}
}
