<?php

date_default_timezone_set('Europe/Kiev');

require_once __DIR__ . '/../vendor/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => __DIR__ . '/../app/templates',
));

// Setup Rest API app

require_once __DIR__ . '/../app/lib/RestAPI.php';

// Run app
$app->run();

?>