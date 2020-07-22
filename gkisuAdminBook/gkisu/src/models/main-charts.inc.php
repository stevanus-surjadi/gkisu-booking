<?php
ini_set('display_errors','1');
//require_once($_SERVER['DOCUMENT_ROOT'] . "/gkisu/src/config/config.php");
//require_once(ABS_PATH . "/gkisu/src/models/db.inc.php");
require_once("../config/config.php");
require_once("./db.inc.php");


function getNearestSermonDate($dbcon)
{
    $phpTodayDate = $_POST['todayDate'];

    $sql = "SELECT * FROM `ms_sermon` WHERE DATE(`sermonDateTime`) = 
            (SELECT DATE(`sermonDateTime`) AS sermonDate FROM ms_sermon WHERE DATE(`sermonDateTime`) >= ? ORDER BY `sermonDateTime` ASC limit 1)
            ORDER BY `sermonDateTime` ASC";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s',$phpTodayDate);
        $statement->execute();
        $result = $statement->get_result();
    }
    catch(Exception $e){
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $outparse = $result->fetch_all(MYSQLI_ASSOC);
    $statement->free_result();
    $statement->close();
    return json_encode($outparse);
}

function getSermonDataForPrevMonth($dbcon)
{
    $phpTodayDate = $_POST['todayDate'];

    $sql = "SELECT * FROM `ms_sermon` WHERE MONTH(`sermonDateTime`) == MONTH(?) ORDER BY `sermonDateTime` ASC";

    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s',$phpTodayDate);
        $statement->execute();
        $result = $statement->get_result();
        $affectedRows = $statement->affected_rows;
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    if($affectedRows == 0) $outparse = null;
    else $outparse = $result->fetch_all(MYSQLI_ASSOC);
    $statement->free_result();
    $statement->close();
    return json_encode($outparse);
}

function getSermonDataForPrevWeeks($dbcon)
{
    $phpTodayDate = $_POST['todayDate'];

    $sql = "SELECT 
                `sermonID`, sermonName, 
                DATE_FORMAT(DATE(`sermonDateTime`),'%d-%b-%Y') AS sermonDate, 
                TIME(`sermonDateTime`) AS sermonTime 
            FROM `ms_sermon` 
            WHERE DATE(`sermonDateTIme`) BETWEEN DATE_SUB(DATE(?), INTERVAL 30 DAY) AND DATE(?)  
            ORDER BY STR_TO_DATE(`sermonDate`,'%d-%b-%Y'), STR_TO_DATE(`sermonTime`,'%H:%m:%s') ASC
            ";

    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('ss', $phpTodayDate, $phpTodayDate);
        $statement->execute();
        $result = $statement->get_result();
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $outparse = $result->fetch_all(MYSQLI_ASSOC);
    $statement->free_result();
    $statement->close();
    return json_encode($outparse);
}

function getTotalAttendeesRegistered($dbcon)
{
    $sermonID = $_POST['sermonID'];
    $in = str_repeat('?,',count($sermonID)-1) . '?';
    $types = str_repeat('s',count($sermonID));
    $sermonIDsql = [];


    for($i=0;$i<count($sermonID);$i++){
        array_push($sermonIDsql,$sermonID[$i]['sermonID']);
    };
    
    $sql = "SELECT `sermonID`, sum(`pax`) as totalAttendees FROM dt_informationBooking WHERE `sermonID` IN ($in) GROUP BY `sermonID`";
    
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param($types, implode(',',$sermonIDsql));
        $statement->execute();
        $result = $statement->get_result();
        $affectedRows = $statement->affected_rows;
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }

    if($statement->affected_rows > 0) 
    {
        $outparse = $result->fetch_all(MYSQLI_ASSOC);
        for($i=0;$i<count($sermonID);$i++){
            for($j=0;$j<count($outparse);$j++){
                if($sermonID[$i]['sermonID'] === $outparse[$j]['sermonID'])
                {
                    $sermonID[$i]['totalAttendees'] = $outparse[$j]['totalAttendees'];
                    break;
                }
            }
        }
    }
    else if($statement->affected_rows <= 0) {
        for($i=0;$i<count($sermonID);$i++)
        {
            $sermonID[$i]["totalAttendees"] = 0;
        }
    }
    $statement->free_result();
    $statement->close();
    return json_encode($sermonID);
}

if(isset($_POST['action'])){

    switch($_POST['action']){
        case 'getNearestSermonDate':
            $dbcon = dbconnect();
            $JSONoutput = getNearestSermonDate($dbcon);
            $dbcon->close();
            echo $JSONoutput;
        break;
        case 'getTotalAttendeesRegistered':
            $dbcon = dbconnect();
            $JSONoutput = getTotalAttendeesRegistered($dbcon);
            $dbcon->close();
            echo $JSONoutput;
        break;
        case 'getSermonDataForPrevMonth':
            $dbcon = dbconnect();
            $JSONoutput = getSermonDataForPrevMonth($dbcon);
            $dbcon->close();
            echo $JSONoutput;
        break;
        case 'getSermonDataForPrevWeeks':
            $dbcon = dbconnect();
            $JSONoutput = getSermonDataForPrevWeeks($dbcon);
            $dbcon->close();
            echo $JSONoutput;
        break;
    };
}

?>