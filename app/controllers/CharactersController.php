<?php
class CharactersController extends BaseController {
	protected $layout = 'layouts.master';

	public function login()	{ return View::make('accounts.login'); }
	public function logout() {
		Session::flush();
		return Redirect::route('root')->with('flash_notice', 'You are now logged out.');
	}

	/*public function create() {
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
	}*/

	public function edit($name)	{
		$character = Character::where('account_id', Session::get('account_id'))->where('name', $name)->first();
		$data = array();
		$data['title'] = 'Character management';
		$data['character'] = $character;
		return View::make('characters.edit', $data);
	}
	
	public function update($name)	{
		$character = Character::where('account_id', Session::get('account_id'))->where('name', $name)->first();
		$character->is_hidden = null !== Input::get('is_hidden');
		$character->comment = Input::get('comment');
		$character->save();
		return Redirect::route('account')->with('flash_notice', 'Your character was updated successfully.');
	}
	
	public function delete($name) {
		$character = Character::where('account_id', Session::get('account_id'))->where('name', $name)->delete();
		return Redirect::route('account')->with('flash_notice', 'Your character ' . $name . ' was scheduled for deletion on ' . date('M d Y, H:i:s e', strtotime('+2 months')) . '.');
	}
	
	public function undelete($name) {
		$character = Character::onlyTrashed()->where('account_id', Session::get('account_id'))->where('name', $name)->restore();
		return Redirect::route('account')->with('flash_notice', 'Your character ' . $name . '\'s deletion was unscheduled.');
	}
}
