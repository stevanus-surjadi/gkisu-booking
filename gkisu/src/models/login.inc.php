<?php
ini_set('display_errors', '0');
include_once($_SERVER['DOCUMENT_ROOT']. "/gkisu/src/models/db.inc.php");


function isUserExist($email){
    $dbcon = dbconnect();
    $sql = "SELECT count(email) AS ctr FROM ms_admin WHERE email = ?";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s',$dbcon->real_escape_string($email));
        $statement->execute();
        $result = $statement->get_result();
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $outparse = $result->fetch_assoc();
    $statement->free_result();
    $statement->close();
    $dbcon->close();
    return $outparse['ctr'];
}

function getPasswd($email)
{
    $dbcon = dbconnect();
    $sql = "SELECT passwd FROM ms_admin WHERE email = ?";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s',$dbcon->real_escape_string($email));
        $statement->execute();
        $result = $statement->get_result();
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $outparse = $result->fetch_assoc();
    $statement->free_result();
    $statement->close();
    $dbcon->close();
    return $outparse['passwd'];
}

function getSalt($email)
{
    $dbcon = dbconnect();
    $sql = "SELECT shash FROM ms_admin WHERE email = ?";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s',$dbcon->real_escape_string($email));
        $statement->execute();
        $result = $statement->get_result();
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $outparse = $result->fetch_assoc();
    $statement->free_result();
    $statement->close();
    $dbcon->close();
    return $outparse['shash'];
}

function getName($email)
{
    $dbcon = dbconnect();
    $sql = "SELECT loginID FROM ms_admin WHERE email = ?";
    try{
        $statement = $dbcon->prepare($sql);
        $statement->bind_param('s', $dbcon->real_escape_string($email));
        $statement->execute();
        $result = $statement->get_result();
    }
    catch(Exception $e)
    {
        $errMsg = array( "Errno"=> "{$dbcon->errno}", "Error"=>"{$dbcon->error}" );
        echo $errMsg;
    }
    $outparse = $result->fetch_assoc();
    $statement->free_result();
    $statement->close();
    $dbcon->close();
    return $outparse['loginID'];
}

?>