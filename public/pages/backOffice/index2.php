<?php

	$tof = false;
	
	session_start();
	
	if(isset($_SESSION["loginBO"]) && isset($_SESSION["userBO"])){
		
		header("Location:accueil.php");
		
	} else{
		
		session_destroy();

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="utf-8"/>
		<link rel="stylesheet" href=""/>
		<title>GameBuy - Back Office login</title>
	
	</head>
	
	<body>
	
		<div>
		
			<header>
			
				
			
			</header>
			
			<div>
			
				<section>
				
					<div>
					
						<div>
					
							<h3>Login Back-Office</h3>
						
						</div>
						
						<div>
						
							<form action="verifLogin.php" method="post">
							
								<div>
								
									<input type="text" name="username" placeholder="Nom d'utilisateur"/>
								
								</div>
								
								<div>
								
									<input type="password" name="password" placeholder="Mots de passe"/>
								
								</div>
								
								<div>
								
									<button>Se connecter</button>
								
								</div>
							
							</form>
						
						</div>
					
					</div>
				
				</section>
			
			</div>
			
			<footer>
			
				
			
			</footer>
		
		</div>
	
	</body>

</html>

<?php 

	}

?>