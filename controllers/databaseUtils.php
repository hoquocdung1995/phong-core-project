<?php
/**
 * Created by PhpStorm.
 * User: PHATNB
 * Date: 28/10/2018
 * Time: 01:11 AM
 */



function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "baophat";
    $port = '3306';

    try{
        $conn = mysqli_connect($servername, $username, $password, $dbname, $port);
        return $conn;
    }catch (mysqli_sql_exception $e){
        echo 'Connection have error' . $e->getMessage();
    }
}

?>