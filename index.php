<?php

$request = $_SERVER['REQUEST_URI'];

//echo $request;

switch ($request) {

    case '/':
        //echo $request;
        require __DIR__ . '/gkisu/src/views/login.php';
    break;
    case '/main':
        require __DIR__ . '/gkisu/src/views/main.php';
    break;
    case '/usrRegister':
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


    case '/assets':
        require __DIR__ . '/views/reg_assets.php';
    break;
    case '/entities':
        require __DIR__ . '/views/reg_entitiesdivision.php';
    break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404';
    break;
}

?>