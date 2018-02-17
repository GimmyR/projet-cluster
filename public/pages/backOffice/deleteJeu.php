<?php

	require '../../inc/model.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/OtherDAO.php';
	require '../../inc/JeuDAO.php';
	
	$tof = false;
	
	session_start();
	
	if(isset($_SESSION["loginBO"]) && isset($_SESSION["userBO"])){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		$jdao = new JeuDAO($bdd);
		
		if(isset($_GET["id"])){
			
			//$jeu = $jdao->loadData("WHERE id='" . $_GET["id"] . "'");
			//$jdao->deleteData($jeu[0]);
			
			header("Location:accueil.php?page=games");
			
		} else{
			
			header("Location:accueil.php?page=games&error=1");
			
		}
		
	} else{
		
		header("Location:index.php");
		
	}

?>