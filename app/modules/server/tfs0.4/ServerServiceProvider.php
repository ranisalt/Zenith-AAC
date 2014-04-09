<?php namespace App\Modules\Server;

class TFS04ServiceProvider extends ServerServiceProvider {
	public function boot() {
		parent::boot('tfs0.4');
	}

	public function register() {
		parent::register('server/tfs0.4');
	}
}
