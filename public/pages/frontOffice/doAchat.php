<?php

	require '../../inc/model.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/JeuDAO.php';
	require '../../inc/Utilisateur.php';
	require '../../inc/OtherDAO.php';
	require '../../inc/AchatDAO.php';
	
	$user = null;
	
	session_start();
	
	$tof = false;
	
	if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
		
		if(isset($_SESSION["user"])){
			
			$user = $_SESSION["user"];
			$tof = true;
			
		} else{
			
			session_destroy();
			
		}
		
	} else{
		
		session_destroy();
		
	}
	
	$id = null;
	
	if(isset($_GET["id"]) && ($id = $_GET["id"]) != null){
	
		if($tof){
			
			date_default_timezone_set("UTC");
			$date = date("d-m-Y");
			
			$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
			
			$jeudao = new JeuDAO($bdd);
			$jeu = $jeudao->loadData("WHERE id='" . $id . "'");
			
			$adao = new AchatDAO($bdd);
			
			$idA = $adao->nextId();
			
			$achat = new Achat($idA, $user, $jeu[0], $date, $jeu[0]->getPrix());
			$adao->insertData($achat);
			header("Location:fiche.php?id=" . $id);
			
		} else{
			
			header("Location:fiche.php?id=" . $id . "&error=4");
			
		}
	
	} else{
		
		header("Location:accueil.php?error=3");
		
	}

?>