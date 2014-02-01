<?php
App::before(function($request) {
	//
});

App::after(function($request, $response) {
	//
});

Route::filter('auth', function() {
	if (!Session::has('account_id'))
		return Redirect::route('login')->with('flash_notice', 'You must be logged in to access this page.');
});

Route::filter('guest', function() {
	if (Session::has('account_id'))
		return Redirect::route('root')->with('flash_notice', 'You are already logged in.');
});

Route::filter('csrf', function() {
	if (Session::token() != Input::get('_token'))
		throw new Illuminate\Session\TokenMismatchException;
});