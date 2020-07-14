<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/gkisu/src/config/config.php");

if(!isset($_GET['arg'])) {
    $request = $_SERVER['REQUEST_URI'];
}
else $request = "/" . base64_decode($_GET['arg']);

//$request = $_SERVER['REQUEST_URI'];
//echo $request;

switch ($request) {

    case ALIAS .'/' :
        require __DIR__ . "/gkisu/src/views/login.php";
    break;
    case '/main':
        require __DIR__ . '/gkisu/src/views/main.php';
    break;
    case '/usrRegister':
        //print_r($request);
        require __DIR__ . '/gkisu/src/views/user-register.php';
    break;
    case '/usrRegisterLogin':
        require __DIR__ . '/gkisu/src/views/user-register-aside.php';
    break;
    case '/sermonSchedule':
        require __DIR__ . '/gkisu/src/views/sermon-schedule.php';
    break;
    case '/bookValidation':
        require __DIR__ . '/gkisu/src/views/booking-validation.php';
    break;
    case '/logout':
        require __DIR__ . '/gkisu/src/inc/logout.inc.php';
    break;
    default:
        //echo $request;
        http_response_code(404);
        //require __DIR__ . '/views/404';
    break;
}

?>