<?php
ini_set('display_errors','1');
//require_once($_SERVER['DOCUMENT_ROOT'] . '/gkisu/src/config/config.php');
//require_once(ABS_PATH . "/gkisu/src/models/db.inc.php");
require_once("../config/config.php");
require_once("./db.inc.php");

function isUserExist($dbcon,$email)
{
    $sql = "SELECT count(email) as ctr FROM ms_admin WHERE email = ?";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s',$email);
        $statement->execute();
        $result = $statement->get_result();
    }
    catch(Exception $e){
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    
    $statement->free_result();
    $statement->close();
    $outparse =  $result->fetch_assoc();

    if($outparse['ctr']!=0) return true;
    else return false;
}

function registerUser($dbcon)
{   
    $varEmail = $_POST['email'];
    
    if(!isUserExist($dbcon,$varEmail)){
 
        $varFullname = $_POST['fullname'];
        $varPasswd = $_POST['passwd'];
        $varSalt = hash('sha256',base64_encode($varEmail));
        $varHashedPasswd = hash('sha256',$varPasswd . $varSalt);

        $sql = "INSERT INTO ms_admin (`loginID`, `email`, `shash`, `passwd`) VALUES (?,?,?,?)";

        try{
            $statement = $dbcon->prepare($sql);
            $statement->bind_param('ssss', $varFullname, $varEmail, $varSalt, $varHashedPasswd);
            $statement->execute();
            $result = $statement->affected_rows;
        }
        catch(Exception $e){
            $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
            echo $errMsg;
        }
        $statement->free_result();
        $statement->close();
    }else{
        $result=0;
    }
    return $result;
}



if(isset($_POST['action'])){
    
    switch($_POST['action']) {

        case 'registerUser': 
            $dbcon=dbconnect();
            $HTMLresult = registerUser($dbcon);
            $dbcon->close();
            echo $HTMLresult;
        break;
        default:
            //var_dump($_POST['action']);
            http_response_code(404);
        break;
    }
}

?>