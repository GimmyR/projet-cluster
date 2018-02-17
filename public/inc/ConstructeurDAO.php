<?php
	
	include('Constructeur.php');
	
	class ConstructeurDAO{
		
		private $constructeur;
		private $result;
		private $bdd = null;
		
		public function __construct($connexion){
			$this->bdd = $connexion;
		}			
		
		public function loadData($condition){
			
			$request = "SELECT cons.* from Constructeur cons";
			if($condition != null){
				$request = $request." ".$condition;
			}
			
			$this->result = $this->bdd->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			
			$_constructeur = null;
			
			while($_constructeur = $this->result->fetch()){
				$constructeur[] = new Constructeur($_constructeur->id, $_constructeur->nom);
			} return $constructeur;
		}
		
		public function insertData($_constructeur){
			
			if($_constructeur instanceof Constructeur){
				
					$req = "INSERT INTO Constructeur VALUES('".$_constructeur->getId()."', '".$_constructeur->getNom()."')";
					echo $req;
					$n = $this->bdd->exec($req);
					return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function deleteData($_constructeur){
			
			if($_constructeur instanceof Constructeur){
				
				$n = $this->bdd->exec("DELETE FROM Constructeur WHERE id='".$_constructeur->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function updateData($_constructeur){
			
			if($_constructeur instanceof Constructeur){
				
				$settings = "SET id='".$_constructeur->getId()."', nom='".$_constructeur->getNom()."'";
				
				$n = $this->bdd->exec("UPDATE Constructeur ".$settings." WHERE id='".$_constructeur->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$constructeurs = $this->loadData(null);
			$i = 0;
			while($i < count($constructeurs)){
					echo $constructeurs[$i]->toString();
					$i++;
			}
		}
		
		public function nextId(){
		
			$id = "CO";
			
			$odao = new OtherDAO($this->bdd);
			
			$rs = $odao->loadData("SELECT nextval('seqConstructeur')");
			$nx = ""+$rs[0]->nextval;
			
			while(strlen($nx) < 3){
				$nx = "0".$nx;
			} $id = $id . $nx;
			
			return $id;
		
		}
		
	}
?>