<?php
$serverName = 'localhost';
$userName = 'root';
$password = '123456';
$dbName = 'baophat';
$port = '3306';

try {
    $connection = mysqli_connect($serverName, $userName, $password, $dbName, $port);
} catch (mysqli_sql_exception $e){
    echo 'Connection Database is error' .$e->getMessage();
}
?>