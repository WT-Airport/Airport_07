<?php 
function conn()
{
	$serverName="localhost";
    $userName="root";
    $pass="";
    $dbName="admin";
    $conn=new mysqli($serverName,$userName,$pass,$dbName);
    return $conn;
}
?>

