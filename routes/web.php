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

Route::resource('articles', 'Articles_controller');


/**
Routes for section Tasks
 */

Route::resource('tasks', 'Tasks_controller');

Auth::routes();

Route::get('/home', 'HomeController@index');

/**
 * Routes for section finance
 */

Route::get('finance', 'Finance_controller@index');

/**
 * Routes for transaction sections
 */

Route::resource('finance/transactions', 'Transactions_controller');

Route::get('finance/today', 'Transactions_controller@today_transactions');

Route::get('finance/yesterday', 'Transactions_controller@yesterday_transactions');

/**
 * Routes for user`s accounts
 */

Route::resource('finance/accounts', 'Account_controller');
/**
 * Routes for reports
 */

Route::get('finance/reports', 'Finance_controller@reports');

/**
 * Route for groups of transactions
 */

Route::resource('finance/groups', 'Finance_groups_controller');