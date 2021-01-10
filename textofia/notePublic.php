<?php

require_once("config.php");


$noteid = $_GET["noteid"];


if(!is_numeric($noteid)){
echo "Lütfen siteyi hacklemeyin :)";
exit;
}


$update = mysql_query("UPDATE notes SET private='1' WHERE noteid='$noteid'");

if($update){
header("Location: myNotes.sen2001");
}

?>