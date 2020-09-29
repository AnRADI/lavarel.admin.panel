<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class BlogPosts extends Model
{
    use SoftDeletes;


    const UNKNOWN_USER = 1;


	protected $guarded = [
		'_method',
		'_token'
	];


	// ------- RELATIONS -------

	public function blogCategory() {

		return $this->belongsTo(BlogCategories::class);
	}


	public function user() {

		return $this->belongsTo(User::class);
	}


	// ------- ACCESSORS -------

	public function getIsPublishedAtAttribute()
	{
		$published_at = $this->published_at;


		if(!empty($published_at)) {

			$result = Carbon::parse($published_at)->format('d.M H:i');
		}
		else $result = '';


		return $result;
	}


}
