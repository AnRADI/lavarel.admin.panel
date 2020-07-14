<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Blog

$blogRoutes = [
    'namespace' => 'Blog',
    'prefix' => 'blog',
];

Route::group($blogRoutes, function(){
    Route::resource('posts', 'PostsController')->names('blog.posts');
});


// Blog Admin

$blogAdminRoutes = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'blog/admin',
];

Route::group($blogAdminRoutes, function(){

    $methods = ['index', 'edit', 'update', 'create', 'store',];

    Route::resource('categories', 'CategoriesController')->only($methods)
        ->names('blog.admin.categories');
});
