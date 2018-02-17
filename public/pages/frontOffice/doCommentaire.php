<?php

	require '../../inc/model.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/JeuDAO.php';
	require '../../inc/UtilisateurDAO.php';
	require '../../inc/CommentaireDAO.php';
	require '../../inc/OtherDAO.php';
	
	$user = null;
	$id = null;
	$s_com = null;
	$error = false;
	
	session_start();
	
	$tof = false;
	
	if(isset($_GET["id"])){
		
		$id = $_GET["id"];
		
	} else{
		
		$error = true;
		
	} 
	
	if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
		
		if(isset($_SESSION["user"])){
			
			if(isset($_POST["commentaire"])){
			
				$user = $_SESSION["user"];
				$s_com = $_POST["commentaire"];
				$tof = true;
			
			}
			
		} else{
			
			session_destroy();
			
		}
		
	} else{
		
		session_destroy();
		
	}
	
	if($tof && !$error){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		
		date_default_timezone_set("UTC");
		$date = date("d-m-Y");
		$jeudao = new JeuDAO($bdd);
		$comdao = new CommentaireDAO($bdd);
		
		$jeu = $jeudao->loadData("WHERE jeu.id='" . $id . "'");
		$s_com = str_replace("'", "''", $s_com);
		$com = new Commentaire($comdao->nextId(), $user, $jeu[0], $date, $s_com);
		$comdao->insertData($com);
		
		header("Location:fiche.php?id=" . $id);
		
	} else{
		
		if(!$tof && !$error){
			
			header("Location:fiche.php?id=" . $id . "&error=2");
			
		} else{
		
			header("Location:accueil.php?error=5");
			
		}
		
	}

?>