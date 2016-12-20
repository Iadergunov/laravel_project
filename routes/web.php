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

Route::get('/', function () {
    return view('welcome');
});

/** Routes for testing */
Route::get('/contact', 'Pages_controller@contact');

Route::get('/about', 'Pages_controller@about');

Route::get('/finance', 'Finance_controller@index');

/**
 Routes for section Articles
 */

/** Route for page aboout */

Route::get('articles', 'Articles_controller@index');

/** Create new articles */
Route::get('articles/create', 'Articles_controller@create');

/** Route for single article */

Route::get('articles/{id}', 'Articles_controller@show_article');

Route::post('articles', 'Articles_controller@store');

Route::get('articles/{id}/edit', 'Articles_controller@edit');

Route::post('articles/{id}/', 'Articles_controller@update');

Route::post('articles/delete/{id}', 'Articles_controller@delete');




/**
 *
Routes for section Tasks
 */


/** Display all tasks */
Route::get('/tasks', 'Tasks_controller@index');

/** Create new task */
Route::get('/create', 'Tasks_controller@create');

Auth::routes();

Route::get('/home', 'HomeController@index');
