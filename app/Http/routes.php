<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'isAdmin'], function() {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UsersController@index');
        Route::get('/create', 'UsersController@create');
        Route::post('/create', 'UsersController@store');
    });
});

Route::group(['middleware' => 'isStudent'], function() {

});

Route::group(['middleware' => 'isEnterprise'], function() {
    Route::group(['prefix' => 'job'], function () {
        Route::get('/create', 'JobsController@create');
        Route::post('/create', 'JobsController@store');
        Route::get('/{id}/edit', 'JobsController@edit');
        Route::post('/{id}/edit', 'JobsController@update');
        Route::delete('/{id}', 'JobsController@destroy');
    });
});

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', 'UsersController@setting');
        Route::post('/change_name', 'UsersController@change_name');
        Route::post('/change_password', 'UsersController@change_password');
        Route::post('/change_avatar', 'UsersController@change_avatar');
        Route::delete('/delete_avatar', 'UsersController@delete_avatar');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/edit', 'UsersController@edit');
        Route::post('/edit', 'UsersController@update');
        Route::get('/{id}', 'UsersController@show');
    });

    Route::group(['prefix' => 'job'], function () {
        Route::get('/{id}', 'JobsController@show');
    });

    Route::post('/join/group/{id}', 'UsersController@joinGroup');
    Route::delete('/left/group/{id}', 'UsersController@leftGroup');

    Route::group(['prefix' => 'group'], function () {
        Route::get('/', 'GroupsController@index');
        Route::get('/create', 'GroupsController@create');
        Route::post('/create', 'GroupsController@store');
        Route::get('/{id}/edit', 'GroupsController@edit');
        Route::post('/{id}/edit', 'GroupsController@update');
        Route::delete('/{id}', 'GroupsController@destroy');
        Route::get('/{id}', 'GroupsController@show');
    });

    Route::group(['prefix' => 'enterprise'], function () {
        Route::get('/', 'GroupsController@index');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::post('/create', 'PostsController@store');
        Route::get('/{id}/edit', 'PostsController@edit');
        Route::post('/{id}/edit', 'PostsController@update');
        Route::delete('/{id}', 'PostsController@destroy');
        Route::get('/{id}', 'PostsController@show');
    });

    Route::group(['prefix' => 'search'], function () {
        Route::get('/', 'SearchController@show');
    });
});

Route::group(['middleware' => 'web'], function() {
    Route::get('unauthorized',function(){
        return view('unauthorized');
    });
});

Route::get('/test/',function() {
   return view('test');
});