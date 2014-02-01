<?php
class AccountsController extends BaseController {
	protected $layout = 'layouts.master';

	public function login()	{ return View::make('accounts.login'); }
	public function logout() {
		Session::flush();
		return Redirect::route('root')->with('flash_notice', 'You are now logged out.');
	}

	public function create() {
		$validator = Validator::make(Input::all(), Account::$rules);
	
		if ($validator->passes()) {
			Account::create(array(
				'name' => Input::get('name'),
				'password' => Account::hashPassword(Input::get('password')),
				'creation' => date('U')
			));
			$this->authenticate();
			return Redirect::route('account')->with('flash_notice', 'You have successfully created your account.');
		} else {
			return Redirect::back()->withInput()->withErrors($validator);
		}
	}

	public function authenticate() {
		$account = Account::where('name', Input::get('name'))->first();
		if ($account && $account->comparePassword(Input::get('password'))) {
			Session::put('account_id', $account->id);
      Session::put('access', $account->type);
      Session::put('admin', $account->access >= Config::get('otserv.admin_access'));
      return Redirect::route('account')->with('flash_notice', 'You are now logged in.');
		}
		return Redirect::route('login')->with('flash_error', 'Wrong username or password.');
	}

	public function index()	{
		$account = Account::find(Session::get('account_id'));
		$account->characters;
		return View::make('accounts.index', $account);
	}
	
	public function changeEmail() {
		$new_email = Input::get('new_email');
		$validator = Validator::make(array('email' => $new_email), array('email' => 'required|unique:accounts|email'));
		if ($validator->passes()) {
			$account = Account::find(Session::get('account_id'));
			if ($account->comparePassword(Input::get('ce_password'))) {
				$account->email_new = $new_email;
				$account->email_token = Hash::make($new_email . date('U'));
				if ($account->save()) {
					Mail::send('emails.change_email', $account->toArray(), function($message) use ($account) {
						$message->from(Config::get('otserv.server_email'), Config::get('otserv.server_name'));
						$message->to($account->email_new, $account->name)->subject('Email change request');
					});
					return Redirect::route('account')->with('flash_notice', 'Your email was changed, please check your inbox to confirm.');
				}
			}
			return Redirect::route('account')->with('flash_error', 'Your email could not be changed because the password you entered did not match.');
		}
		return Redirect::route('account')->with('flash_error', 'Your email could not be changed.')->withErrors($validator);
	}
	
	public function updateEmail($token) {
		$account = Account::where('email_token', $token)->first();
		if ($account) {
			$account->email = $account->email_new;
			empty($account->email_new);
			empty($account->email_token);
			$account->save();
			return Redirect::route('root')->with('flash_notice', 'Your email was successfully changed.');
		}
		return Redirect::route('root')->with('flash_error', 'There was an error processing your request.');
	}
	
	public function changePassword() {
		$new_password = Input::get('new_password');
		$validator = Validator::make(array('password' => $new_password), array('password' => 'required|between:6,50'));
		if ($validator->passes()) {
			$account = Account::find(Session::get('account_id'));
			if ($account->comparePassword(Input::get('old_password'))) {
				$account->password = Account::hashPassword($new_password);
				if ($account->save())
					return Redirect::route('account')->with('flash_notice', 'Your password was changed.');
			}
			return Redirect::route('account')->with('flash_error', 'Your password could not be changed because the password you entered did not match.');
		}
		return Redirect::route('account')->with('flash_error', 'Your password could not be changed.')->withErrors($validator);
	}
	
	public function renameAccount() {
		$new_name = Input::get('new_name');
		$validator = Validator::make(array('name' => $new_name), array('name' => 'required|unique:accounts|alpha_dash|between:4,30'));
		if ($validator->passes()) {
			$account = Account::find(Session::get('account_id'));
			if ($account->comparePassword(Input::get('ra_password'))) {
				$account->name = $new_name;
				if ($account->save())
					return Redirect::route('account')->with('flash_notice', 'Your account name was changed.');
			}
			return Redirect::route('account')->with('flash_error', 'Your account name could not be changed because the password you entered did not match.');
		}
		return Redirect::route('account')->with('flash_error', 'Your account name could not be changed.')->withErrors($validator);
	}
	
	public function terminateAccount() {
		$account = Account::find(Session::get('account_id'));
		if ($account->comparePassword(Input::get('ta_password')) && $account->comparePassword(Input::get('ta_password_confirm'))) {
			if ($account->delete()) {
				$this->logout();
				return Redirect::route('root')->with('flash_notice', 'Your account was successfully terminated.');
			}
		}
		return Redirect::route('account')->with('flash_error', 'Your account could not be terminated because the password you entered did not match.');
	}
}
