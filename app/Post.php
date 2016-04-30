<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = ['title', 'content', 'excerpt', 'thumbnail_url', 'status'];
	//protected $guarded = ['id', 'user_id'];
	function user() {
		return $this->belongsTo('App\User');
	}
	function scopePublished() {
		return $this->where('status', 'publish');
	}
}
