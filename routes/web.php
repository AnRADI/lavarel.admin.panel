<?php

// ====== AUTH =======

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ====== BLOG =======

$blogRoutes = [
    'namespace' => 'Blog',
    'prefix' => 'blog',
];

// posts
Route::group($blogRoutes, function()
{
    Route::resource('posts', 'PostsController')
		->names('blog.posts');
});


// ====== BLOG ADMIN ======

$routes = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'blog/admin',
];


Route::group($routes, function()
{

	// CATEGORIES
    $methods = ['index', 'edit', 'update', 'create', 'store',];

    Route::resource('categories', 'CategoriesController')
		->only($methods)
        ->names('blog.admin.categories');


    // POSTS
	$methods = ['index', 'edit', 'update', 'create', 'store', 'destroy',];

	Route::resource('posts', 'PostController')
		->only($methods)
		->names('blog.admin.posts');


	Route::patch('posts/restore/{post}', 'PostController@restore')
		->name('blog.admin.posts.restore');
});


// ====== DIGGING DEEPER ======

$paths = [
	'prefix' => 'digging_deeper'
];

Route::group($paths, function ()
{

	// COLLECTIONS
	Route::get('collections', 'DiggingDeeperController@collections')
		->name('digging_deeper.collections');
});
