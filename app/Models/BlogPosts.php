<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPosts extends Model
{
    use SoftDeletes;

	protected $guarded = [
		'_method',
		'_token'
	];

	public function blog_category() {
		return $this->belongsTo(BlogCategories::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
