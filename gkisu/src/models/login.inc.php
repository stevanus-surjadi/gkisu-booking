<?php
ini_set('display_errors', '1');
include_once("db.inc.php");

function getPasswd($email)
{
    $dbcon = dbconnect();
    $sql = "SELECT passwd FROM ms_admin WHERE email = ?";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s',$email);
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
    $dbcon->close();
    return $outparse;
}

function getSalt($email)
{
    $dbcon = dbconnect();
    $sql = "SELECT shash FROM ms_admin WHERE email = ?";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s',$email);
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
    $dbcon->close();
    return $outparse;
}


?>