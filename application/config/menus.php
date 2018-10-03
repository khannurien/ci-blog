<?php
/* Header menu */
$config['header_public_items'] = array(
	'posts' => 'posts',
	'drawers' => 'drawers',
);

$config['header_loggedOut_items'] = array(
	'login' => 'login',
	'register' => 'register'
);

$config['header_loggedIn_items'] = array(
	'logout' => 'logout'
);

$config['header_private_items'] = array(
	'new post' => 'posts/create',
	'new drawer' => 'drawers/create'
);
?>
