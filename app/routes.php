<?php
Route::get('/', function() {
	return App::make('NewsController')->index();;
});

Route::get('account', function() {
	return App::make('AccountsController')->show();
});

Route::get('login', function() {
	return App::make('AccountsController')->index();
});

Route::post('account/auth', function() {
	if (Input::has('create'))
		return App::make('AccountsController')->create();
	return App::make('AccountsController')->login();
});
