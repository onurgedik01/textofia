<?php
session_start();
ob_start();


session_destroy();

setcookie ("email", "", time() - 3600);
setcookie ("pass", "", time() - 3600);


header("Refresh: 0; url=index.php");
ob_end_flush();
?>