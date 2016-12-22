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

/**
 Routes for section Articles
 */


//Route::get('articles', 'Articles_controller@index');

//Route::get('articles/create', 'Articles_controller@create');
//Route::get('articles/{id}', 'Articles_controller@show_article');
//Route::post('articles', 'Articles_controller@store');
//Route::get('articles/{id}/edit', 'Articles_controller@edit');


Route::resource('articles', 'Articles_controller');


/**
 *
Routes for section Tasks
 */


Route::resource('tasks', 'Tasks_controller');

Auth::routes();

Route::get('/home', 'HomeController@index');

/**
 * Routes for section finance
 */

Route::get('transactions', 'Finance_controller@index');

Route::get('transaction/create', 'Finance_controller@create_transaction');

Route::post('transactions', 'Finance_controller@store_transaction');

Route::get('transactions/today', 'Finance_controller@today_transactions');

Route::get('transactions/yesterday', 'Finance_controller@yesterday_transactions');

/**
 * Routes for user`s accounts
 */

Route::resource('finance/accounts', 'Account_controller');