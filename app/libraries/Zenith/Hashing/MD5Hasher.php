<?php namespace Zenith\Hashing;
use Illuminate\Hashing\HasherInterface;

class MD5Hasher implements HasherInterface {

	/**
         * Hash the given value.
	 * Options are just dummy since md5 takes no arguments.
         *
         * @param  string  $value
         * @param  array   $options
         * @return string
         */
	public function make($value, array $options = array()) {
		$hash = hash('md5', $value);
		return $hash;
	}

	/**
         * Check the given plain value against a hash.
	 * Options are just dummy since md5 takes no arguments.
	 *         
         * @param  string  $value
         * @param  string  $hashedValue
         * @param  array   $options
         * @return bool
         */
	public function check($value, $hashedValue, array $options = array()) {
		return $hashedVvalue === $this->make($value);
	}

	/**
         * Check if the given hash has been hashed using the given options.
	 * Options are just dummy since md5 takes no arguments.
         *
         * @param  string  $hashedValue
         * @param  array   $options
         * @return bool
         */
	public function needsRehash($hashedValue, array $options = array()) {
		return strlen($hashedValue) !== 32;
	}
}
