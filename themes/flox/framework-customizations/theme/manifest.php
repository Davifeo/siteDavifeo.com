<?php if (!defined('FW')) {
	die('Forbidden');
}

$manifest = array();

$manifest['id'] = 'flox';

$manifest['server_requirements'] = array(
	'server' => array(
		'wp_memory_limit'          => '256M', // use M for MB, G for GB
		'php_version'              => '5.2.4',
		'post_max_size'            => '8M',
		'php_time_limit'           => '1500',
		'php_max_input_vars'       => '4000',
		'suhosin_post_max_vars'    => '3000',
		'suhosin_request_max_vars' => '3000',
		'mysql_version'            => '5.0',
		'max_upload_size'          => '8M',
	),
);

$manifest['supported_extensions'] = array(
	'backups'	=> array(),
	'analytics'	=> array(),
);
