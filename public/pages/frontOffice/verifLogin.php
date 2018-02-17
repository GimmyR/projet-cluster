<?php

	require '../../inc/model.php';
	require '../../inc/UtilisateurDAO.php';

	if(isset($_POST["username"]) && isset($_POST["password"])){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		
		$userdao = new UtilisateurDAO($bdd);
		
		$user = $userdao->loadData("WHERE util.username='" . $_POST["username"] . "'");
		
		if(count($user) == 1){
			
			if($user[0]->getPassword() == $_POST["password"]){
				
				session_start();
				
				$_SESSION["login"] = true;
				$_SESSION["user"] = $user[0];
				
				header("Location:accueil.php");
				
			} else{
				
				header("Location:accueil.php?error=2");
				
			}
			
		} else{
			
			header("Location:accueil.php?error=1");
			
		}
		
	}

?>