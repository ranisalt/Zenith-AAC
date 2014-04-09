<?php namespace OpenTibia\Auth;

use Illuminate\Auth\UserProviderInterface;
use Illuminate\Auth\GenericUser;
use Config;
use Session;

class OpenTibiaAccountProvider implements UserProviderInterface {
	private $hasher;

	/**
         * Retrieve a user by their unique identifier.
         *
         * @param  mixed  $identifier
         * @return \Illuminate\Auth\UserInterface|null
         */
        public function retrieveById($identifier) {
		return new OpenTibiaAccount
	}

        /**
         * Retrieve a user by the given credentials.
         *
         * @param  array  $credentials
         * @return \Illuminate\Auth\UserInterface|null
         */
        public function retrieveByCredentials(array $credentials) {
	}

        /**
         * Validate a user against the given credentials.
         *
         * @param  \Illuminate\Auth\UserInterface  $user
         * @param  array  $credentials
         * @return bool
         */
        public function validateCredentials(UserInterface $user, array $credentials) {
	}
}
