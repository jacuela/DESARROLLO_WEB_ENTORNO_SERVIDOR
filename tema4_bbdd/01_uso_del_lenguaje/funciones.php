<?php








//------------------------
$dsn_conbbdd = "mysql:host=$cfg[mysqlHost];dbname=$cfg[mysqlDatabase];charset=utf8mb4";
$dsn_sinbbdd = "mysql:host=$cfg[mysqlHost];charset=utf8mb4";
$usuario = $cfg["mysqlUser"];
$contraseña = $cfg["mysqlPassword"];

    


$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
$user = 'dbuser';
$password = 'dbpass';

$dbh = new PDO($dsn, $user, $password);

