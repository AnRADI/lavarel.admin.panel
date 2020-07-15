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


// ====== blog admin ======

$blogAdminRoutes = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'blog/admin',
];


// categories

Route::group($blogAdminRoutes, function(){

    $methods = ['index', 'edit', 'update', 'create', 'store',];

    Route::resource('categories', 'CategoriesController')->only($methods)
        ->names('blog.admin.categories');
});
