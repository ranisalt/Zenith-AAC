<?php
class AccountsController extends BaseController {
	protected $layout = 'layouts.master';
	public function index()	{
        return View::make('accounts.index');
	}

	public function create()
	{
		$account = new Account();
		$account->name = Input::get('name');
		$account->password = Input::get('password');
		$account->creation = time();
		if ($account->save()) {
/*			$account = Account::find($account->id);
			Session::put('account_id', $account->id);
			Session::put('access', $account->type);
			Session::put('admin', $account->access >= Config::get('otserv.admin_access'));
			return Redirect::to('account');*/
			return $this->login();
		}
		dd($account->errors()->all());
		return Redirect::back()->withInput()->withErrors($validation);
	}

	public function login()
	{
		$account = Account::where('name', Input::get('name'))->first();
		if ($account->comparePassword(Input::get('password'))) {
			Session::put('account_id', $account->id);
      Session::put('access', $account->type);
      Session::put('admin', $account->access >= Config::get('otserv.admin_access'));
      return Redirect::to('account');
		}
		return Redirect::to('login')->with('flash_error', 'Wrong username or password.');
	}

	public function show()
	{
		$account = Account::find(Session::get('account_id'));
		return View::make('accounts.show', $account);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('accounts.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
