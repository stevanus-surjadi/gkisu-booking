<?php
ini_set('display_errors', '1');
//include_once($_SERVER['DOCUMENT_ROOT'] . "/gkisu/src/config/config.php");
//require_once("gkisu/src/config/config.php");
//require_once("../config/config.php");

function dbconnect()
{
    $connect = new mysqli(dbhost,dbuser,dbpass,schema,dbport);
    if($connect->connect_error) die("MySQLi connection failed: ". $connect->connect_error);
    return $connect;
}


?>