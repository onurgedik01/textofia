<?php


if($_POST){


include("config.php");



$email = mysql_real_escape_string($_POST["email"]);
$pass = mysql_real_escape_string($_POST["pass"]);
$username = mysql_real_escape_string($_POST["username"]);


	
			
if($email=="" or $pass=="" or $username=="")
{
		echo'<script>alert("Boş alan bırakmayınız"); location="javascript:history.go(-1)"; </script>';
		return;
}



$isim_kontrol = mysql_query("select * from users where username='".$username."'") or die (mysql_error());

$uye_varmi = mysql_num_rows($isim_kontrol);
if($uye_varmi > 0)
{
			echo'<script>alert("This username was taken before! We\'re sorry "); location="javascript:history.go(-1)"; </script>';
	return;		
}

$eposta_kontrol = mysql_query("select * from users where email='".$email."'") or die (mysql_error());

$eposta_varmi = mysql_num_rows($eposta_kontrol);
if($eposta_varmi > 0)
{
			echo'<script>alert("This email is already linked to an account."); location="javascript:history.go(-1)"; </script>';

	
	return;		
}


$yenikayit = "INSERT INTO users (email,username,pass) values('".$email."', '".$username."', '".$pass."')";

$sorgu = mysql_query($yenikayit);


// echo "<center>Register is done! Please wait. Now we're preparing your account...... </center>";

# Otomatik giriş 
$_SESSION["giris"] = "true";
$_SESSION["username"] = $user;
$_SESSION["pass"] = $pass;

setcookie("username",$user,time()+60*60*24);
setcookie("pass",$pass,time()+60*60*24);


echo '<script> location="main.php"; </script>';


}


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>TextOfia | Sign Up </title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://www.google.com/recaptcha/api.js?hl=tr"></script>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="" method="POST" class="form-signin">
<h1> TextOfia </h1>
<hr>


      <h1 class="h3 mb-3 font-weight-normal">Sign Up Form</h1>
      
      
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" class="form-control" name="email" placeholder="Email address" required="required">
      
          
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        
      
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
      <div class="checkbox mb-3">
      </div>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign Up">
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </body>
</html>
