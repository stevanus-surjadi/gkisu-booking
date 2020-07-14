<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/gkisu/src/config/config.php');

session_start();
unset($_SESSION['name']);
unset($_SESSION['isLogin']);
unset($_SESSION['login']['email']);
unset($_SESSION['lastActivity']);
unset($_SESSION['timeout']);
session_destroy();
header('Location: http://localhost:8080'. ALIAS)

?>