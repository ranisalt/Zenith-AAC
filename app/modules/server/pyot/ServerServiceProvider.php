<?php namespace App\Modules\Server;

class PyOTServiceProvider extends ServerServiceProvider {
	public function boot() {
		parent::boot('pyot');
	}

	public function register() {
		parent::register('server/pyot');
	}
}
