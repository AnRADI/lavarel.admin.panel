<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategories extends Model
{
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable = [
    	'title',
		'slug',
		'parent_id',
		'description',
	];

    public function parentCategory()
	{
		return $this->belongsTo(BlogCategories::class, 'parent_id', 'id');
	}

	public function getParentTitleAttribute()
	{
		$title = $this->parentCategory->title
			?? ($this->isRoot()
			? 'Корень'
			: '???');

		return $title;
	}

	public function isRoot()
	{
		return $this->id === BlogCategories::ROOT;
	}


//	public function getTitleAttribute($valueTitle)
//	{
//		return mb_strtoupper($valueTitle);
//	}
//
//	public function setTitleAttribute($valueTitle)
//	{
//		$this->attributes['title'] = mb_strtolower($valueTitle);
//	}

}
