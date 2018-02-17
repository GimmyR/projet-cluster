<?php

	require '../../inc/model.php';
	require '../../inc/UtilisateurDAO.php';
	
	session_start();
	
	if(isset($_POST["username"]) && isset($_POST["password"])){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		$udao = new UtilisateurDAO($bdd);
		
		$user = $udao->loadData("WHERE util.username='" . $_POST["username"] . "'");
		
		if(count($user) == 1){
			
			if($user[0]->getPassword() == $_POST["password"] && $user[0]->getAdmini()){
			
				$_SESSION["loginBO"] = true;
				$_SESSION["userBO"] = $user[0];
				header("Location:accueil.php");
			
			}
			
		} else{
			
			session_destroy();
			header("Location:index.php");
			
		}
		
	} else{
		
		session_destroy();
		header("Location:index.php");
		
	}

?>