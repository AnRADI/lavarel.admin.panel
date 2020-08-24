<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\BlogPosts;
use App\Models\BlogCategories;

use App\Observers\BlogPostObserver;
use App\Observers\BlogCategoryObserver;


class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		BlogPosts::observe(BlogPostObserver::class);
		BlogCategories::observe(BlogCategoryObserver::class);
    }
}
