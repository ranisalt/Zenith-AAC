<?php namespace Zenith\Auth;

/**
 * Load aliased classes
 */
use Config, Hash;

/**
 * Load Laravel-related classes
 */
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\EloquentUserProvider;

/**
 * Load Zenith-related classes
 */

use Zenith\Hashing\MD5Hasher;
use Zenith\Hashing\SHA1Hasher;
use Zenith\Hashing\PlainHasher;

/**
 * Load module-related classes
 */
use App\Modules\Server\Models\Account;

class OpenTibiaAccountProvider extends EloquentUserProvider {
	public function __construct() {
		$hasher = null;
		switch (Config::get('zenith.encryption_type')) {
			case 'md5': $hasher = new MD5Hasher; break;
			case 'sha1': $hasher = new SHA1Hasher; break;
			default: $hasher = new PlainHasher; break;
		}
		parent::__construct($hasher, 'App\\Modules\\Server\\Models\\Account');
	}
}
