<meta charset="UTF8">

<?php
session_start();
error_reporting(0);
ob_start();

include_once("config.php");


$onur = mysql_query("SELECT * FROM users WHERE username='".$_COOKIE["username"]."' and pass='".$_COOKIE["pass"]."'") or die (mysql_error());

$users = mysql_fetch_array($onur);
?>

<?php


if($_POST){


include("config.php");
mysql_query("SET NAMES UTF8");


$notexx = $_POST["notexx"];


	
			
if($notexx=="")
{
		header("Location='javascript:history.go(-1)'");
		return;
}


$noteidGenerator = rand(999999,999999999999) * rand(9999,999999);
$users = $users["id"]; // get() -> user id;


$addData = "INSERT INTO notes (note,noteid,userid) values('".$notexx."', '".$noteidGenerator."', '".$users."')";

print("$notexx - $noteidGenerator - $users");
$request = mysql_query($addData);



if($request){
header("Location: success.sen2001"); } else {
header("Location: error.sen2001?_sorry:(");
}



}


?>


