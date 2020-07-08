<?php
ini_set('display_errors', '1');

include_once("../config/config.php");

function dbconnect()
{
    $connect = new mysqli(dbhost,dbuser,dbpass,dbname,dbport);
    if($connect->connect_error) die("MySQLi connection failed: ". $connect->connect_error);
    return $connect;
}


?>