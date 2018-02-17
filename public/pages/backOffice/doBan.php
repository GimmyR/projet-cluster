<?php

	require '../../inc/model.php';
	require '../../inc/UtilisateurDAO.php';

	$tof = false;
	
	session_start();
	
	if(isset($_SESSION["loginBO"]) && isset($_SESSION["userBO"])){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		$udao = new UtilisateurDAO($bdd);
		
		if(isset($_GET["ban"])){
			
			$user = $udao->loadData("WHERE util.id='" . $_GET["ban"] . "'");
			$user[0] = new Utilisateur(
					$user[0]->getId(),
					$user[0]->getUsername(),
					$user[0]->getEmail(),
					$user[0]->getPassword(),
					$user[0]->getAdmini(),
					true
			); $udao->updateData($user[0]);
			
			header("Location:accueil.php?page=members");
			
			//echo 'BAN';
			
		} else if(isset($_GET["deban"])){
			
			$user = $udao->loadData("WHERE util.id='" . $_GET["deban"] . "'");
			$user[0] = new Utilisateur(
					$user[0]->getId(),
					$user[0]->getUsername(),
					$user[0]->getEmail(),
					$user[0]->getPassword(),
					$user[0]->getAdmini(),
					false
			); $udao->updateData($user[0]);
			
			header("Location:accueil.php?page=members");
			
			//echo var_dump($user[0]);
			//echo 'DEBAN';
			
		} else{
			
			header("Location:accueil.php?page=members&error=1");
			
		}
		
	} else{
		
		header("Location:index.php");
		
	}

?>