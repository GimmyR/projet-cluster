<?php

	$tof = false;
	
	session_start();
	
	if(isset($_SESSION["loginBO"]) && isset($_SESSION["userBO"])){
		
		header("Location:accueil.php");
		
	} else{
		
		session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Page</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="../../assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../assets/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/lib/font-awesome/css/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="../../assets/css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="../../assets/lib/metismenu/metisMenu.css">
    
    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="../../assets/lib/onoffcanvas/onoffcanvas.css">
    
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="../../assets/lib/animate.css/animate.css">

</head>

<body class="login">

      <div class="form-signin">
    <div class="text-center">
        <img src="../../assets/img/Logo/logo2-dark.png" width=200>
    </div>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="verifLogin.php" method="post">
                <p class="text-muted text-center">
                    Login Back-Office
                </p>
                <input type="text" name="username" placeholder="Nom d'utilisateur" class="form-control top">
                <input type="password" name="password" placeholder="Mots de passe" class="form-control bottom">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html">
                <p class="text-muted text-center">Enter your valid e-mail</p>
                <input type="email" placeholder="mail@domain.com" class="form-control">
                <br>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html">
                <input type="text" placeholder="username" class="form-control top">
                <input type="email" placeholder="mail@domain.com" class="form-control middle">
                <input type="password" placeholder="password" class="form-control middle">
                <input type="password" placeholder="re-password" class="form-control bottom">
                <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
            </form>
        </div>
    </div>
    <hr>
  </div>
  
</body>

</html>

<?php 

	}

?>
