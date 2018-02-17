<?php

	require '../../inc/model.php';
	require '../../inc/OtherDAO.php';
	require '../../inc/UtilisateurDAO.php';
	
	$tof = false;
	
	session_start();
	
	if(!isset($_SESSION["login"]) && !isset($_SESSION["user"])){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		$udao = new UtilisateurDAO($bdd);
		
		if(isset($_POST["usernname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])){
			
			$pswd = $_POST["password"];
			$pswd2 = $_POST["password2"];
			
			if($pswd == $pswd2){
				
				$id = $udao->nextId();
				$username = $_POST["usernname"];
				$email = $_POST["email"];
				
				$user = new Utilisateur($id, $username, $email, $pswd, false, false);
				$udao->insertData($user);
				
				header("Location:accueil.php");
				
			} else{
				
				header("Location:accueil.php?error=2");
				
			}
			
		} else{
			
			header("Location:accueil.php?error=1");
			
		}
		
	} else{
		
		header("Location:../../../index.php");
		
	}

?>