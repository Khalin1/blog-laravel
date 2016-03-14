<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('/like/{id}','PostController@like');
    Route::post('/dislike/{id}','PostController@dislike');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/article', 'PostController@index');
    Route::get('/article/{id}', 'PostController@showPost');
    Route::get('/home', 'HomeController@index');
    Route::post('/comment/add/{id}','PostController@add_comment');

});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin'], function () {
    Route::get('/','AdminController@index');
    Route::get('/article','ArticleAdminController@index');
    Route::get('/article/add','ArticleAdminController@addIndex');
    Route::post('/article/add','ArticleAdminController@add');

    Route::delete('/article/{id}','ArticleAdminController@delete');
    Route::get('/article/{id}/edit','ArticleAdminController@articleEdit');
    Route::put('/article/{id}/edit','ArticleAdminController@update');



    Route::get('/categories','CategoryAdminController@index');
    Route::put('/categories/{id}','CategoryAdminController@edit');
    Route::delete('/categories/{id}','CategoryAdminController@delete');
    Route::post('/categories','CategoryAdminController@add');



});
