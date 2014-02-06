<?php
return array(
	/* WARNING:
	 * TFS from 1.0 and up supports ~ONLY~ 'sha1'
	 * possible values are: 'plain', 'md5', 'sha1'
	 * wrong values will always fail to validate
	 */
	'encryption' => 'sha1',
	
	'admin_access' => 6,
	
	'server_name' => 'Zenith',
	'server_email' => 'lordfire@otserv.com.br',
	
	'vocations' => array(
		0 => 'No vocation',
		1 => 'Sorcerer',
		2 => 'Druid',
		3 => 'Paladin',
		4 => 'Knight',
		5 => 'Master Sorcerer',
		6 => 'Elder Druid',
		7 => 'Royal Paladin',
		8 => 'Elite Knight'
	),
	
	'cities' => array(
		0 => array(
			'name' => 'Thais',
			'x' => 2168,
			'y' => 1265,
			'z' => 7
		),
		1 => array(
			'name' => 'Carlin',
			'x' => 271,
			'y' => 985,
			'z' => 8
		),
		2 => array(
			'name' => 'Venore',
			'x' => 1897,
			'y' => 2654,
			'z' => 6
		),
	),
	
	'worlds' => array(
		0 => 'Thundera',
		1 => 'Jotunheimr'
	)
);
