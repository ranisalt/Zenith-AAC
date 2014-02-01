<?php

return array(
	'fetch' => PDO::FETCH_CLASS,
	'default' => 'mysql',
	'connections' => array(
		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => __DIR__.'/../database/production.sqlite',
			'prefix'   => '',
		),
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'otserv',
			'username'  => 'root',
			'password'  => 'v1t2n3c4',
			'charset'   => 'utf8',
			'collation' => 'utf8_general_ci',
			'prefix'    => '',
		),
		'pgsql' => array(
			'driver'   => 'pgsql',
			'host'     => 'localhost',
			'database' => 'database',
			'username' => 'root',
			'password' => '',
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		),
	),
	'migrations' => 'migrations',
);
