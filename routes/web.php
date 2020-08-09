<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ====== blog =======

$blogRoutes = [
    'namespace' => 'Blog',
    'prefix' => 'blog',
];


// posts

Route::group($blogRoutes, function(){
    Route::resource('posts', 'PostsController')->names('blog.posts');
});


// ====== BLOG ADMIN ======

$routes = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'blog/admin',
];

Route::group($routes, function()
{
	// categories
    $methods = ['index', 'edit', 'update', 'create', 'store',];

    Route::resource('categories', 'CategoriesController')
		->only($methods)
        ->names('blog.admin.categories');

    // posts
	$methods = ['index', 'edit', 'update', 'create', 'store', 'destroy',];

	Route::resource('posts', 'PostController')
		->only($methods)
		->names('blog.admin.posts');
});
