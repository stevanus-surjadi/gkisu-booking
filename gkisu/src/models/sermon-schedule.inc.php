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
    //var_dump($_POST['pickupTime']);
    $phpSermonName = $dbcon->real_escape_string($_POST['scheduleName']);
    $phpSermonCapacity = $dbcon->real_escape_string($_POST['inputCapacity']);
    $phpStartDate = transformDateFormat($dbcon->real_escape_string($_POST['pickupStartDate']));
    $phpEndDate = transformDateFormat($dbcon->real_escape_string($_POST['pickupEndDate']));
    $phpTime = $dbcon->real_escape_string($_POST['pickupTime']);

    $tmpStartDateTime = date_create($phpStartDate . " " . $phpTime);
    $tmpEndDateTime = date_create($phpEndDate . " " . $phpTime);
    //echo $phpTime . "\n";

    $phpStartDateTime = $tmpStartDateTime;
    $phpEndDateTime = $tmpEndDateTime;

    $phpTmpDateTime = $phpStartDateTime;

    if($_POST['selectInterval'] == "weekly") $phpInterval = "7 Days";

    //date_add($phpTmpDate,date_interval_create_from_date_string("7 Days"));

    $sql="INSERT INTO ms_sermon (`sermonName`, `sermonDateTime`, `capacity`) VALUES (?,?,?)";

    try{
        $statement = $dbcon->prepare($sql);
        $mysqliAffectedRows = 0;    

        while($phpTmpDateTime <= $phpEndDateTime) {
            //var_dump(date_format($phpTmpDateTime,"Y-m-d H:i:s"));
            
            $phpSqlTmpDateTime = date_format($phpTmpDateTime,"Y-m-d H:i:s");
            $statement->bind_param('ssi',$phpSermonName, $phpSqlTmpDateTime, $phpSermonCapacity);
            $statement->execute();
            date_add($phpTmpDateTime,date_interval_create_from_date_string($phpInterval));
            $mysqliAffectedRows+=$statement->affected_rows;
        }
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $statement->free_result();
    $statement->close();
    return $mysqliAffectedRows;
}

function loadSermonSchedule($dbcon)
{
    $timeFormat = "%d-%m-%Y %H:%i:%s";
    $sql = "SELECT 
            `sermonID`, 
            `sermonName`, 
            DATE_FORMAT(`sermonDateTime`, \"${timeFormat}\") as sermonDateTime, 
            `capacity` 
            FROM ms_sermon WHERE 1 ORDER BY sermonDateTime ASC";
    
    try{
        $statement = $dbcon->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();
        $outparse=$result->fetch_all(MYSQLI_ASSOC);
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $statement->free_result();
    $statement->close();
    return json_encode($outparse);
}

function deleteSermonSchedule($dbcon)
{
    $sermonID = $dbcon->real_escape_string($_POST['sermonID']);
    $sql = "DELETE FROM ms_sermon WHERE sermonID = ?";

    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s', $sermonID);
        $statement->execute();
        $result = $statement->affected_rows;
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $outparse = array( "affectedRows"=> "{$result}" );
    $statement->free_result();
    $statement->close();
    return json_encode($outparse);
}

if(isset($_POST['action'])){

    switch($_POST['action']){
        case 'saveSchedule': 
            $dbcon = dbconnect();
            $HTMLresult = saveSchedule($dbcon);
            $dbcon->close();
            echo $HTMLresult;
        break;
        case 'loadSermonSchedule':
            $dbcon = dbconnect();
            $JSONresult = loadSermonSchedule($dbcon);
            $dbcon->close();
            echo $JSONresult;
        break;
        case 'deleteSermonSchedule':
            $dbcon = dbconnect();
            $JSONoutput = deleteSermonSchedule($dbcon);
            $dbcon->close();
            echo $JSONoutput;
        break;
        default:
            //var_dump($_POST['action']);
            http_response_code(404);
        break;
    }
}

?>