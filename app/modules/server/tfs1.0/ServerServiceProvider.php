<?php namespace App\Modules\Server;

class TFS10ServiceProvider extends ServerServiceProvider {
	public function register() {
		parent::register('server');
		dd('teste');
		$this->app->bindShared('account', function() {
			return new App\Modules\Server\Models\Account;
		});
		dd(\Illuminate\Foundation\AliasLoader::getInstance());
	}
}
