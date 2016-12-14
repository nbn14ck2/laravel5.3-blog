<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/

Route::group([
        'prefix'        => '/',
        'namespace'     => 'Client'  
    ], function(){
        Route::get('/', [
            'as'        => 'home',
            'uses'      => 'PagesController@index'
        ]);
});

Route::group([
        'prefix'        => 'articles',
        'namespace'     => 'Client'    
        ], function(){
                Route::get('/', [
                    'as'    => 'articles',
                    'uses'  => 'ArticlesController@index'
                ]);

                Route::get('{id}', [
                    'as'    => 'articles.post',
                    'uses'  => 'ArticlesController@show'
                ]);

                Route::post('{id}/comment', [
                    'as'    => 'articles.comment',
                    'uses'  => 'ArticlesController@comment'
            ]);
});

Route::group([
    'prefix'    => 'categories',
    'namespace' => 'Client'
    ], function(){
        Route::get('{id}', [
            'as'    => 'category.show',
            'uses'  => 'CategoriesController@show'
        ]);

});

Route::group([
    'prefix'        => 'user',
    'namespace'     => 'Client',
    'middleware'    =>  'user'
    ], function(){
        Route::get('{id}', [
            'as'    => 'user.account',
            'uses'  => 'UsersController@index'
        ]);

        Route::post('{id}/avatar', [
            'as'    => 'user.account',
            'uses'  => 'UsersController@update_avatar'
        ]);

        Route::post('{id}/password', [
            'as'    => 'user.account',
            'uses'  => 'UsersController@change_password'
        ]);

        Route::get('{id}/edit', [
            'as'    => 'user.edit',
            'uses'  => 'UsersController@edit'
        ]);

        Route::post('{id}/edit', [
            'as'    => 'user.edit',
            'uses'  => 'UsersController@update'
        ]);
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::group([
    'prefix'        => 'admin',
    'namespace'     => 'Admin',
    'middleware'    => 'admin'
    ], function(){
        Route::get('dashboard', [
            'as'    => 'dashboard',
            'uses'  => 'PagesController@index'
        ]);

        Route::group(['prefix'  => 'articles'], function(){
            Route::get('add', [
                'as'    => 'articles.add',
                'uses'  => 'ArticlesController@create'
            ]);

            Route::post('add', [
                'as'    => 'articles.add',
                'uses'  => 'ArticlesController@store'
            ]);

            Route::get('list', [
                'as'    => 'articles.list',
                'uses'  => 'ArticlesController@index'
            ]);

            Route::get('{id}/edit', [
                'as'    => 'articles.edit',
                'uses'  => 'ArticlesController@edit'
            ]);

            Route::post('{id}/edit', [
                'as'    => 'articles.edit',
                'uses'  => 'ArticlesController@update'
            ]);

            Route::get('{id}/delete', [
                'as'    => 'articles.delete',
                'uses'  => 'ArticlesController@destroy'
            ]);
        });

        Route::group(['prefix'  => 'categories'], function(){
            Route::get('add', [
                'as'    => 'categories.create',
                'uses'  => 'CategoriesController@create'
            ]);

            Route::post('add', [
                'as'    => 'categories.create',
                'uses'  => 'CategoriesController@store'
            ]);

            Route::get('list', [
                'as'    => 'categories.list',
                'uses'  => 'CategoriesController@index'
            ]);

            Route::get('{id}/edit', [
                'as'    => 'categories.edit',
                'uses'  => 'CategoriesController@edit'
            ]);

            Route::post('{id}/edit', [
                'as'    => 'categories.edit',
                'uses'  => 'CategoriesController@update'
            ]);

            Route::get('{id}/delete', [
                'as'    => 'categories.delete',
                'uses'  => 'CategoriesController@destroy'
            ]);
        });

        Route::group(['prefix'  => 'tags'], function(){
            Route::get('list', [
                'as'    => 'tags.list',
                'uses'  => 'TagsController@index'
            ]);

            Route::get('add', [
                'as'    => 'tags.create',
                'uses'  => 'TagsController@create'
            ]);

            Route::post('add', [
                'as'    => 'tags.create',
                'uses'  => 'TagsController@store'
            ]);

            Route::get('{id}/edit', [
                'as'    => 'tags.edit',
                'uses'  => 'TagsController@edit'
            ]);

            Route::post('{id}/edit', [
                'as'    => 'tags.edit',
                'uses'  => 'TagsController@update'
            ]);

            Route::get('{id}/delete', [
                'as'    => 'tags.delete',
                'uses'  => 'TagsController@destroy'
            ]);
        });


        Route::group(['prefix'  => 'users'], function(){
            Route::get('list', [
                'as'    => 'users.list',
                'uses'  => 'UsersController@index'
            ]);

            Route::get('{id}/delete', [
                'as'    => 'users.delete',
                'uses'  => 'UsersController@destroy'
            ]);

            Route::get('{id}/grant', [
                'as'    => 'users.grant',
                'uses'  => 'UsersController@grant'
            ]);

            Route::get('{id}/edit', [
                'as'    => 'admin.edit.user',
                'uses'  => 'UsersController@edit'
            ]);

            Route::post('{id}/edit', [
                'as'    => 'admin.edit.user',
                'uses'  => 'UsersController@update'
            ]);
        });
});
