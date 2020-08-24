<?php

namespace App\Observers;

use App\Models\BlogCategories;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    /**
     * Handle the blog categories "created" event.
     *
     * @param  \App\Models\BlogCategories  $blogCategories
     * @return void
     */
    public function created(BlogCategories $blogCategories)
    {
        //
    }

	public function creating(BlogCategories $blogCategories)
	{
		$this->setSlug($blogCategories);
	}

	protected function setSlug(blogCategories $blogCategories)
	{
		if(empty($blogCategories->slug)) {
			$blogCategories->slug = Str::slug($blogCategories->title);
		}
	}

    /**
     * Handle the blog categories "updated" event.
     *
     * @param  \App\Models\BlogCategories  $blogCategories
     * @return void
     */
    public function updated(BlogCategories $blogCategories)
    {
        //
    }

    /**
     * Handle the blog categories "deleted" event.
     *
     * @param  \App\Models\BlogCategories  $blogCategories
     * @return void
     */
    public function deleted(BlogCategories $blogCategories)
    {
        //
    }

    /**
     * Handle the blog categories "restored" event.
     *
     * @param  \App\Models\BlogCategories  $blogCategories
     * @return void
     */
    public function restored(BlogCategories $blogCategories)
    {
        //
    }

    /**
     * Handle the blog categories "force deleted" event.
     *
     * @param  \App\Models\BlogCategories  $blogCategories
     * @return void
     */
    public function forceDeleted(BlogCategories $blogCategories)
    {
        //
    }
}
