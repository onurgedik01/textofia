<?php
error_reporting(0);
ob_start();

include_once("config.php");
?>
<?php
session_start();
ob_start();

$onur = mysql_query("SELECT * FROM users WHERE username='".$_COOKIE["username"]."' and pass='".$_COOKIE["pass"]."'") or die (mysql_error());

$users = mysql_fetch_array($onur);
?>

<?php
if(!isset($users["email"])){
header("Location: logout_request.sen2001");
exit;
}
?>

<!DOCTYPE HTML>
<html lang="en">
  <head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

		<title> Textofia | Easy Note App! </title>
		
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
 	 <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="main.sen2001">Main Page</a>
        
                <a class="py-2 d-none d-md-inline-block" href="myNotes.php">My Notes</a>
                <a class="py-2 d-none d-md-inline-block" href="newNote.php">Write a New Note</a>


        <?php $r=rand(999999,9999999999); ?>
        
        
        <a class="py-2 d-none d-md-inline-block" href="mailto:onur.gedik@bahcesehir.edu.tr?subject=TextOfia Help&body=Enter your message..">Contact Us</a>
      </div>
    </nav>
    </header>

    <!-- Begin page content -->
    <center>
    <main role="main" class="container">
    <br /><br />
      <h1 class="mt-5">Textofia - My Notes</h1>



<center>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Note</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   
<?php

require_once("config.php");


$useridnumber = $users["id"];

$verileriAl = mysql_query("SELECT * FROM notes WHERE userid='$useridnumber'");

while($onur = mysql_fetch_array($verileriAl)){


$privateValue = $onur["private"];

echo '<tr>';



$noteid = $onur["noteid"];

echo '<td>';
echo $onur["note"];
echo '</td>';


echo '<td>';
echo '<a href="delete.note.sen2001?noteid='.$noteid.'" onclick="return confirm(\'Are you sure about to delete this? \')"><font color="#e8d800"><b><i class="fa fa-trash-o"></i></b></font></a>&nbsp;&nbsp; ';
echo '<a href="edit.note.sen2001?noteid='.$noteid.'"><font color="blue"><b><i class="fa fa-pencil"></i></b></font></a>&nbsp;&nbsp;';


if($privateValue == "0"){
echo '&nbsp;<a href="make.public.sen2001?noteid='.$noteid.'" onclick="return confirm(\'Do you want to share your note? Current status : private. If you press OK, your note will be public \')"><font color="green"><b><i class="fa fa-lock"></i></b></font></a>';
} else {
echo '&nbsp;<a href="make.private.sen2001?noteid='.$noteid.'" onclick="return confirm(\'Do you want to hide your note? Current status : public. If you press OK, your note will be private \')"><font color="red"><b><i class="fa fa-unlock"></i></b></font></a>';
}

echo '</td>';




echo '</tr>';



}

?>

    </tbody>
    </table>
    

</center>

    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">Textofia - <?php echo date('Y'); ?></span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
