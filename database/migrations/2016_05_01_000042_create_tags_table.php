<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration {
	protected $posts_relationships_table = 'post_tag';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tags', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
		});
		Schema::create($this->posts_relationships_table, function (Blueprint $table) {
			$table->integer('tag_id');
			$table->integer('post_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('tags');
		Schema::drop($this->posts_relationships_table);
	}
}
