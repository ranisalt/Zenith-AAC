<?php

// root page
Route::get('/', array('as' => 'root', 'uses' => 'NewsController@index'));

// account page, user must be logged in to access
Route::get('account', array('as' => 'account', 'before' => 'auth', 'uses' => 'AccountsController@index'));

// logout page, user must be logged out to access
Route::get('login', array('as' => 'login', 'before' => 'guest', 'uses' => 'AccountsController@login'));

// logout page, user must be logged in to access
Route::get('logout', array('as' => 'logout', 'before' => 'auth', 'uses' => 'AccountsController@logout'));

Route::post('account/auth', array('before' => 'guest', function() {
	if (Input::has('create'))
		return App::make('AccountsController')->create();
	else if (Input::has('login'))
		return App::make('AccountsController')->authenticate();
	return Redirect::route('root');
}));

Route::post('account/{action}', array('before' => 'auth', function($action) {
	$action = explode('-', $action);
	$controller_action = array_shift($action);
	foreach($action as $word)
		$controller_action .= ucfirst($word);
	return App::make('AccountsController')->$controller_action();
}));

Route::get('account/change-email/{token}', function($token) {
	return App::make('AccountsController')->updateEmail($token);
});