<meta charset="UTF8"><?php

// delete.note.sen2001?noteid=166005709807406020


$noteid = $_GET["noteid"];

if(!is_numeric($noteid)){
echo "Lütfen siteyi hacklemeyin :)";
exit;
}

require_once("config.php");

$sil = mysql_query("DELETE FROM notes WHERE noteid='$noteid' ");

if($sil){
header("Location: myNotes.sen2001");
} else { echo "Hata oluştu"; }



?>


 