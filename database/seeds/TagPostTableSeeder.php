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
		$tag = App\Tag::orderByRaw('RAND()')->first();
		foreach ($posts as $post) {
			$post->tags()->attach($tag->id);
		}
	}
}
