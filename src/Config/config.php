<?php
return [
	'connection' => [
		'url' => env('INTERNETNL_BATCH_URL', 'https://batch.internet.nl'),
		'username' => env('INTERNETNL_BATCH_USERNAME', ''),
		'password' => env('INTERNETNL_BATCH_PASSWORD', ''),
	],
];
