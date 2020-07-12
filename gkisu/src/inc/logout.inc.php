<?php

session_start();
unset($_SESSION['name']);
unset($_SESSION['isLogin']);
unset($_SESSION['login']['email']);
unset($_SESSION['lastActivity']);
unset($_SESSION['timeout']);

header('Location: http://localhost:8080/')

?>