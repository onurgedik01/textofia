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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
        <a class="py-2 d-none d-md-inline-block" onclick="alert('You already sign in!');" href="#req_failed">Sign In</a>
        <a class="py-2 d-none d-md-inline-block" onclick="alert('You can\'t open more than 1 account');" href="#req_failed">Sign Up</a>
        
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
      <h1 class="mt-5">Textofia - Easy Note App!</h1>

<div class="alert alert-success">Welcome to Textofia <?php echo $users["email"]; ?>! </div>
<center>
<br /><br />
<a class="btn btn-lg btn-success" href="newNote.sen2001"> + New Note </a> &nbsp;&nbsp;&nbsp;
<a class="btn btn-lg btn-warning" href="myNotes.sen2001"> My Notes </a> &nbsp;&nbsp;&nbsp;
<a class="btn btn-lg btn-info" href="publicNotes.sen2001"> Public Notes </a>  &nbsp;&nbsp;&nbsp;
<a class="btn btn-lg btn-danger" href="logout_request.sen2001?k=<?=$r;?>" onclick="return confirm('Do you wanna log out ?')"> Logout </a> 
</center>

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
