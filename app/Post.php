<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = ['title', 'content', 'excerpt', 'thumbnail_url', 'status'];
	//protected $guarded = ['id', 'user_id'];
	protected static function boot() {
		parent::boot();
		static::addGlobalScope('VisibleScope', function (Builder $builder) {
			$builder->where(function ($query) {
				$query->where('status', 'publish');
				if (Auth::check()) {
					$query->orWhere('user_id', Auth::user()->id);
				}
			});
			return $builder;
		});
	}
	function user() {
		return $this->belongsTo('App\User');
	}
	function tags() {
		return $this->belongsToMany('App\Tag');
	}
	function scopePublished() {
		return $this->where('status', 'publish');
	}
}
