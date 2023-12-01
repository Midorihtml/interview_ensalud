<?php
error_reporting(E_ALL);

ini_set('ignore_repeaated_errors', TRUE);

ini_set('display_errors', TRUE);

ini_set('log_errors', TRUE);

ini_set('error_log', 'php-error.log');
error_log('Start');

$GLOBALS['src'] = __DIR__ . '/src/';
$GLOBALS['appRoot'] = __DIR__;


require 'vendor/autoload.php';
require 'src/router/index.php';
