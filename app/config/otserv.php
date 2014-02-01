<?php
return array(
	/* WARNING:
	 * TFS from 1.0 and up supports ~ONLY~ 'sha1'
	 * possible values are: 'plain', 'md5', 'sha1'
	 * wrong values will always fail to validate
	 */
	'encryption' => 'sha1',
	
	'admin_access' => 6,
	
	'server_name' => 'Zenith Server',
	'server_email' => 'your email',
	
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
	)
);
