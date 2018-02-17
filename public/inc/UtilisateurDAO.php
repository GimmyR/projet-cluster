<?php
	
	include('Utilisateur.php');
	
	class UtilisateurDao{
		
		private $user;
		private $result;
		private $bdd = null;
		
		public function __construct($connexion){
			$this->bdd = $connexion;
		}		
		
		public function loadData($condition){
			$request = "SELECT util.* from Utilisateur util";
			if($condition != null){
				$request = $request." ".$condition;
			}
			$this->result = $this->bdd->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_utilisateur = null;
			while($_utilisateur = $this->result->fetch()){
				$user[] = new Utilisateur($_utilisateur->id, $_utilisateur->username, $_utilisateur->email, $_utilisateur->password, $_utilisateur->admini, $_utilisateur->banni);
			} return $user;
		}
		
		public function insertData($_utilisateur){
			
			if($_utilisateur instanceof Utilisateur){
			
					if($_utilisateur->getAdmini()){
						$adm = "true";
					} else{
						$adm = "false";
					}
					
					if($_utilisateur->getBanni()){
						$ban = "true";
					} else{
						$ban = "false";
					}
				
					$req = "INSERT INTO Utilisateur VALUES('".$_utilisateur->getId()."', '".$_utilisateur->getUsername()."', '".$_utilisateur->getEmail()."', '".$_utilisateur->getPassword()."', '".$adm."', '".$ban."')";
					echo $req;
					$n = $this->bdd->exec($req);
					return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function deleteData($_utilisateur){
			
			if($_utilisateur instanceof Utilisateur){
				
				$n = $this->bdd->exec("DELETE FROM Utilisateur WHERE id='".$_utilisateur->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function updateData($_utilisateur){
			
			if($_utilisateur instanceof Utilisateur){
			
				if($_utilisateur->getAdmini()){
					$adm = "true";
				} else{
					$adm = "false";
				}
				
				if($_utilisateur->getBanni()){
					$ban = "true";
				} else{
					$ban = "false";
				}
				
				$settings = "SET id='".$_utilisateur->getId()."', username='".$_utilisateur->getUsername()."', email='".$_utilisateur->getEmail()."', password= '".$_utilisateur->getPassword()."', admini=".$adm.", banni=".$ban;
				
				$n = $this->bdd->exec("UPDATE Utilisateur ".$settings." WHERE id='".$_utilisateur->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$users = $this->loadData(null);
			$i = 0;
			while($i < count($users)){
					echo $users[$i]->toString();
					$i++;
			}
		}
		
		public function nextId(){
		
			$id = "U";
			
			$odao = new OtherDAO($this->bdd);
			
			$rs = $odao->loadData("SELECT nextval('seqUtilisateur')");
			$nx = ""+$rs[0]->nextval;
			
			while(strlen($nx) < 4){
				$nx = "0".$nx;
			} $id = $id . $nx;
			
			return $id;
		
		}
		
	}
?>