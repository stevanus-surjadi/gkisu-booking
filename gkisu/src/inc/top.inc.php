<?php
session_start();

if(!isset($_SESSION['isLogin'])) header("Location: http://localhost:8080/gkisu/");
if(time() - $_SESSION['lastActivity'] > 1*60*60) header("Location: http://localhost:8080/gkisu/");
$_SESSION['lastActivity'] = time();

?>