<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('account', function() {
	if (Session::has('account_id')) {
		dd(Config::get('otserv.encryption'));
		return App::make('AccountsController')->show();
	}
	else
		return App::make('AccountsController')->index();
});
Route::post('account', function() {
	if (Input::has('create')) {
		return App::make('AccountsController')->create();
	} else if (Input::has('login'))
		return App::make('AccountsController')->login();
});
