<?php
require_once 'C:\xampp\htdocs\sectoTeca\app\Utils\Database.php';

use \App\Utils\Database;

$parametro = $_POST['parametro'];

$dbHost = 'localhost';
$dbName = 'secto';
$dbUser = 'root';
$dbPass = '';
$dbPort = 3306;

Database::config($dbHost,$dbName,$dbUser,$dbPass,$dbPort);

$obDatabase = new Database('playlist');

$obDatabase->delete("id ='$parametro'");


echo "Dados excluídos com sucesso!";
?>