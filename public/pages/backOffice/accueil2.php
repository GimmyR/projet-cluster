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

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="utf-8"/>
		<link rel="stylesheet" href=""/>
		<title>GameBuy - Back Office</title>
	
	</head>
	
	<body>
	
		<div>
		
			<header>
			
				<div>
				
					<!-- LOGO -->
				
				</div>
				
				<div>
				
					<!-- DECONNEXION -->
					
					<a href="#" onclick="if(confirm('Voulez-vous vraiment vous deconnecter ?')){ window.location.href = 'loggout.php';  }">Deconnecter</a>
				
				</div>
			
			</header><hr/>
			
			<div>
			
				<nav>
				
					<!-- MENU -->
					
					<ul>
					
						<a href="accueil.php?page=dashboard"><li>Tableau de bord</li></a>
						<a href="accueil.php?page=members"><li>Membres</li></a>
						<a href="accueil.php?page=games"><li>Jeux</li></a>
						<a href="accueil.php?page=achats"><li>Achats</li></a>
					
					</ul>
				
				</nav><hr/>
				
				<section>
				
					<!-- CONTENU -->
					
					<?php include($page . ".php"); ?>
				
				</section><hr/>
			
			</div>
			
			<footer>
			
				
			
			</footer>
		
		</div>
	
	</body>

</html>

<?php 

	} else{
		
		header("Location:index.php");
		
	}

?>