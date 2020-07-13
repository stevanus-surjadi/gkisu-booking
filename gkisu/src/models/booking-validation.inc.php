<?php
ini_set('display_errors','1');
require_once($_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/gkisu/src/config/config.php");
require_once(ABS_PATH . "/gkisu/src/models/db.inc.php");

function transformDateFormat($srcDate)
{
    $tmpDate[] = array_reverse(explode("-",$srcDate));
    return(implode("-",$tmpDate[0]));
}

function loadSermonSelect2bs4($dbcon)
{
    $searchStr = "";
    $phpSermonDate = transformDateFormat($dbcon->real_escape_string($_POST['sermonDate']));
    
    $sql =  "SELECT sermonID, sermonDateTime FROM ms_sermon WHERE DATE(sermonDateTime) = ?";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s', $phpSermonDate);
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


function loadBookingConfirmation($dbcon)
{
    //print_r('load data');
    $phpSermonID = $_POST['sermonID'];
    $phpSermonDateTime = $_POST['sermonDateTime'];

    $sql = "SELECT 
                a.`fullname`, a.`email`, a.`mobile`, a.`bookingID`, a.`pax`, a.`reservDate`,
                b.`sermonName`,b.`sermonDateTime` 
            FROM dt_informationBooking a
            LEFT JOIN ms_sermon b ON
            a.sermonID = b.sermonID
            WHERE a.sermonID = ?";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('i', $phpSermonID);
        $statement->execute();
        $result = $statement->get_result();
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $outparse = $result->fetch_all(MYSQLI_ASSOC);
    //var_dump($outparse);
    $statement->free_result();
    $statement->close();
    //var_dump($outparse);
    return json_encode($outparse);
}


//=MAIN=//

if(isset($_POST['action'])){
    
    switch($_POST['action']){
        case 'loadSermonSelect2bs4':
            $dbcon = dbconnect();
            $JSONparse = loadSermonSelect2bs4($dbcon);
            $dbcon->close();
            echo $JSONparse;
        break;
        case 'loadBookingConfirmation':
            //var_dump($_POST['action']);
            //echo('loadbookingconfirmation');
            $dbcon = dbconnect();
            $JSONparse = loadBookingConfirmation($dbcon);
            $dbcon->close();
            echo $JSONparse;
        break;
        default:
            var_dump($_POST['action']);
            http_response_code(404);
        break;
        
    }
}

?>