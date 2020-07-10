<?php
ini_set('display_errors','1');
require_once($_SERVER['DOCUMENT_ROOT'] . "/gkisu/src/config/config.php");
require_once(ABS_PATH . "/gkisu/src/models/db.inc.php");

function transformDateFormat($srcDate)
{
    $tmpDate[] = array_reverse(explode("-",$srcDate));
    return(implode("-",$tmpDate[0]));
}

function saveSchedule($dbcon)
{
    $phpStartDate = transformDateFormat($dbcon->real_escape_string($_POST['pickupStartDate']));
    $phpEndDate = transformDateFormat($dbcon->real_escape_string($_POST['pickupEndDate']));
    $phpTime = $dbcon->real_escape_string($_POST['pickupTime']);

    $sql="INSERT INTO ms_sermon (`sermonName`, `sermonDateTime`) VALUES (?,?)";

    try{

    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
}


if(isset($_POST['action'])){

    switch($_POST['action']){
        case 'saveSchedule': 
            $dbcon = dbconnect();
            $JSONresult = saveSchedule($dbcon);
            $dbcon->close();
            echo $JSONresult;
    }
}

?>