<?php

namespace App\Observers;

use App\Models\BlogPosts;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Handle the blog posts "created" event.
     *
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return void
     */
    public function created(BlogPosts $blogPosts)
    {
        //
    }

    /**
     * Handle the blog posts "updated" event.
     *
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return void
     */
    public function updating(BlogPosts $blogPosts)
    {
		$this->setPublishedAt($blogPosts);

		$this->setSlug($blogPosts);
    }

    protected function setPublishedAt(BlogPosts $blogPosts)
	{
    	if(empty($blogPosts->published_at) && $blogPosts->is_published) {
    		$blogPosts->published_at = Carbon::now();
		}
	}

	protected function setSlug(BlogPosts $blogPosts)
	{
		if(empty($blogPosts->slug)) {
			$blogPosts->slug = Str::slug($blogPosts->title);
		}
	}

    /**
     * Handle the blog posts "deleted" event.
     *
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return void
     */
    public function deleted(BlogPosts $blogPosts)
    {
        //
    }

    /**
     * Handle the blog posts "restored" event.
     *
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return void
     */
    public function restored(BlogPosts $blogPosts)
    {
        //
    }

    /**
     * Handle the blog posts "force deleted" event.
     *
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return void
     */
    public function forceDeleted(BlogPosts $blogPosts)
    {
        //
    }
}
