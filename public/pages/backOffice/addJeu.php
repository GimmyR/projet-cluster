<?php

	require '../../inc/model.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/OtherDAO.php';
	require '../../inc/JeuDAO.php';
	require '../../inc/ImageDAO.php';
	
	$tof = false;
	
	session_start();
	
	if(isset($_SESSION["loginBO"]) && isset($_SESSION["userBO"])){
		
		if(isset($_POST["nom"]) && isset($_POST["categorie"]) && isset($_POST["constructeur"]) && isset($_POST["description"]) &&
				isset($_POST["note"]) && isset($_POST["dateSortie"]) && isset($_POST["prix"]) && isset($_POST["lien"]) &&
				isset($_FILES["coverImage"]) && isset($_FILES["capture1"]) && isset($_FILES["capture2"]) &&
				isset($_FILES["capture3"]) && isset($_FILES["capture4"]) && isset($_FILES["capture5"])){
			
			$nom = $_POST["nom"];
			$categ = $_POST["categorie"];
			$const = $_POST["constructeur"];
			$description = $_POST["description"];
			$note = $_POST["note"];
			$dateSortie = $_POST["dateSortie"];
			$prix = $_POST["prix"];
			$lien = $_POST["lien"];
			$cover = $_FILES["coverImage"];
			
			$amj = explode("-", $dateSortie);
			//var_dump($amj);
			$dateSortie = $amj[2]."-".$amj[1]."-".$amj[0];
			
			$capt1 = $_FILES["capture1"];
			$capt2 = $_FILES["capture2"];
			$capt3 = $_FILES["capture3"];
			$capt4 = $_FILES["capture4"];
			$capt5 = $_FILES["capture5"];
			
			$dir = "../../assets/img/" . $nom . "/";
			
			mkdir($dir);
			
			$fileCov = $dir . basename($cover["name"]);
			$fileCap1 = $dir . basename($capt1["name"]);
			$fileCap2 = $dir . basename($capt2["name"]);
			$fileCap3 = $dir . basename($capt3["name"]);
			$fileCap4 = $dir . basename($capt4["name"]);
			$fileCap5 = $dir . basename($capt5["name"]);
			
			/*$fileCov = str_replace(".png", ".jpg", $fileCov);
			$fileCov = str_replace(".png", ".jpg", $fileCap1);
			$fileCov = str_replace(".png", ".jpg", $fileCap2);
			$fileCov = str_replace(".png", ".jpg", $fileCap3);
			$fileCov = str_replace(".png", ".jpg", $fileCap4);
			$fileCov = str_replace(".png", ".jpg", $fileCap5);*/
				
			move_uploaded_file($cover["tmp_name"], $fileCov);
			move_uploaded_file($capt1["tmp_name"], $fileCap1);
			move_uploaded_file($capt2["tmp_name"], $fileCap2);
			move_uploaded_file($capt3["tmp_name"], $fileCap3);
			move_uploaded_file($capt4["tmp_name"], $fileCap4);
			move_uploaded_file($capt5["tmp_name"], $fileCap5);
			
			$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
			
			$cgdao = new CategorieDAO($bdd);
			$ctdao = new ConstructeurDAO($bdd);
			$jdao = new JeuDAO($bdd);
			$idao = new ImageDAO($bdd);
			
			$id = $jdao->nextId();
			$categorie = $cgdao->loadData("WHERE categ.id='" . $categ . "'");
			$constructeur = $ctdao->loadData("WHERE cons.id='" . $const . "'");
			
			$jeu = new Jeu($id, $nom, $description, $categorie[0], $constructeur[0], $dateSortie, $cover["name"], $lien, $note, $prix);
			//echo $jeu->toString();
			$jdao->insertData($jeu);
			
			$sc1 = new Image($idao->nextId(), $jeu, $capt1["name"]);
			$sc2 = new Image($idao->nextId(), $jeu, $capt2["name"]);
			$sc3 = new Image($idao->nextId(), $jeu, $capt3["name"]);
			$sc4 = new Image($idao->nextId(), $jeu, $capt4["name"]);
			$sc5 = new Image($idao->nextId(), $jeu, $capt5["name"]);
			
			$idao->insertData($sc1);
			$idao->insertData($sc2);
			$idao->insertData($sc3);
			$idao->insertData($sc4);
			$idao->insertData($sc5);
			
			header("Location:accueil.php?page=games");
					
		} else{
			
			header("Location:accueil.php?page=games&error=1");
			
		}
		
	} else{
		
		header("Location:index.php");
		
	}

?>