<?php

	$tof = false;

	session_start();
	
	if(isset($_SESSION["loginBO"]) && isset($_SESSION["userBO"])){
		
		if(!isset($_GET["page"])){
			
			$page = "dashboard";
			
		} else{
			
			$page = $_GET["page"];
			
		}

?>

<!doctype html>

<html>

	<head>
	
	    <meta charset="UTF-8">
	    <!--IE Compatibility modes-->
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <!--Mobile first-->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>GameBuy - Back Office</title>
	    
	    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
	    <meta name="author" content="">
	    
	    <meta name="msapplication-TileColor" content="#5bc0de" />
	    <meta name="msapplication-TileImage" content="../../assets/img/metis-tile.png" />
	    
	    <!-- Bootstrap -->
	    <link rel="stylesheet" href="../../assets/lib/bootstrap/css/bootstrap.css">
	    
	    <!-- Font Awesome
	    <link rel="stylesheet" href="../../assets/lib/font-awesome/css/font-awesome.css"> -->
	    
	    <!-- Metis core stylesheet -->
	    <link rel="stylesheet" href="../../assets/css/main.css">
	    
	    <!-- metisMenu stylesheet
	    <link rel="stylesheet" href="../../assets/lib/metismenu/metisMenu.css"> -->
	    
	    <!-- onoffcanvas stylesheet
	    <link rel="stylesheet" href="../../assets/lib/onoffcanvas/onoffcanvas.css"> -->
	    
	    <!-- animate.css stylesheet
	    <link rel="stylesheet" href="../../assets/lib/animate.css/animate.css"> -->
	
	    <link rel="stylesheet" href="../../assets/css/style-switcher.css">
	    <link rel="stylesheet/less" type="text/css" href="../../assets/less/theme.less">
	
	</head>

		<body class="  ">
		
            <div class="bg-dark dk" id="wrap">
            
                <div id="top">
                    <!-- .navbar -->
                    <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container-fluid">
                    
                    
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <header class="navbar-header">
                            
                                <a href="index.php" class="navbar-brand"><img width=200 src="../../assets/img/Logo/logo2-dark.png" alt=""></a>
                    
                            </header>
                            <header style="margin-left: 1360px; margin-top:15px;">
                            
                            	<a href="loggout.php" class="" style="border-radius:5px; background-color:#a35e38; color:black; padding:10px 20px;">Deconnexion</a>
                            
                            </header>
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div>
                <!-- /#top -->
                
        		<div id="left">
					<!-- #menu -->
                    <ul id="menu" class="bg-red dker" style="height: 700px;">
                       	<li class="nav-header">Menu</li>
						<li class="nav-divider"></li>
						<li class="">
							<a href="accueil.php?page=dashboard">
								<i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Tableau de bord</span>
							</a>
						</li>
						<li class="">
							<a href="accueil.php?page=members">
								<i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Membres</span>
							</a>
						</li>
						<li class="">
							<a href="accueil.php?page=games">
								<i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Jeux</span>
							</a>
						</li>
						<li class="">
							<a href="accueil.php?page=achats">
								<i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Achats</span>
							</a>
						</li>
					</ul>
                    <!-- /#menu -->
                </div>
                <!-- /#left -->
                
                <div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                            &nbsp;
                            <?php include($page . ".php"); ?>
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                
                <!-- /#content -->
            </div>
            <!-- /#wrap -->
            
            <footer class="Footer bg-dark dker">
                <p>2017 &copy; Metis Bootstrap Admin Template v2.4.2</p>
            </footer>
            <!-- /#footer -->
            
	</body>

</html>

<?php 

	} else{
		
		header("Location:index.php");
		
	}

?>