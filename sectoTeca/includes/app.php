<?php
require __DIR__.'/../vendor/autoload.php';

use \App\Utils\View;
use \App\Utils\Database;

$dbHost = 'localhost';
$dbName = 'secto';
$dbUser = 'root';
$dbPass = '';
$dbPort = 3306;

Database::config($dbHost,$dbName,$dbUser,$dbPass,$dbPort);

$obDatabase = new Database('playlist');

$results = $obDatabase->select();


define('URL', 'http://localhost/sectoTeca');

View::init([
    'URL' => URL
]);
