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

	public function creating(BlogPosts $blogPosts)
	{
		$this->setUser($blogPosts);
		$this->setHtml($blogPosts);
		$this->setPublishedAt($blogPosts);
		$this->setSlug($blogPosts);
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

	protected function setUser(BlogPosts $blogPosts)
	{
		$blogPosts->user_id = auth()->id() ?? BlogPosts::UNKNOWN_USER;
	}

	protected function setHtml(BlogPosts $blogPosts)
	{
		if($blogPosts->isDirty('article')) {
			$blogPosts->content_html = $blogPosts->article;
		}
	}

    protected function setPublishedAt(BlogPosts $blogPosts)
	{
    	if(empty($blogPosts->published_at) && $blogPosts->is_published) {

    		$blogPosts->published_at = Carbon::now();
    		dd($blogPosts->published_at);
		}
	}

	protected function setSlug(BlogPosts $blogPosts)
	{
		if(empty($blogPosts->slug)) {
			$blogPosts->slug = Str::slug($blogPosts->title);
		}
	}


	public function deleting(BlogPosts $blogPosts)
	{
		
	}
    /**
     * Handle the blog posts "deleted" event.
     *
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return void
     */
    public function deleted(BlogPosts $blogPosts)
    {

    }


	public function restoring(BlogPosts $blogPosts)
	{
		//dd(__METHOD__, request()->all(), $blogPosts->id);
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


	public function forceDeleting(BlogPosts $blogPosts)
	{

	}


    public function forceDeleted(BlogPosts $blogPosts)
    {

    }
}
