<?php
	
	include('Achat.php');
	/*include('Utilisateur.php');
	include('UtilisateurDAO.php');
	include('Jeu.php');
	include('JeuDAO.php');*/
	
	class AchatDAO{
		
		private $purchase;
		private $result;
		private $bdd = null;
		
		public function __construct($connexion){
			$this->bdd = $connexion;
		}	
		
		public function loadData($condition){
			
			$request = "SELECT achat.* from Achat achat";
			if($condition != null){
				$request = $request." ".$condition;
			}
			
			$this->result = $this->bdd->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			
			$utilisateurdao = new UtilisateurDAO($this->bdd);
			$jeudao = new JeuDAO($this->bdd);
			$utilisateur = null;
			$jeu =null;
			$_achat = null;
			
			while($_achat = $this->result->fetch()){
				$utilisateur = $utilisateurdao->loadData("Where id = '" . $_achat->utilisateur."'");
				$jeu = $jeudao->loadData("Where id = '" . $_achat->jeu."'");
				$purchase[] = new Achat($_achat->id, $utilisateur[0], $jeu[0], $_achat->datepayement, $_achat->pu);
			} return $purchase;
		}
		
		public function insertData($_achat){
			
			if($_achat instanceof Achat){
				
				$req = "INSERT INTO Achat VALUES('".$_achat->getId()."', '".$_achat->getUtilisateur()->getId()."', '".$_achat->getJeu()->getId()."', '".$_achat->getDatePayement()."', ".$_achat->getPu().")";
				echo $req;
				$n = $this->bdd->exec($req);
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type achat ...'; }
			
		}
		
		public function deleteData($_achat){
			
			if($_achat instanceof Achat){
				
				$n = $this->bdd->exec("DELETE FROM Achat WHERE id='".$_achat->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type achat ...'; }
			
		}
		
		public function updateData($_achat){
			
			if($_achat instanceof Achat){
				
				$settings = "SET id='".$_achat->getId()."', utilisateur='".$_achat->getUtilisateur()->getId()."', jeu='".$_achat->getJeu()->getId()."', datePayement='".$_achat->getDatePayement()."', pu=".$_achat->getPu()."";
				
				$n = $this->bdd->exec("UPDATE Achat ".$settings." WHERE id='".$_achat->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$achats = $this->loadData(null);
			$i = 0;
			while($i < count($achats)){
					echo $achats[$i]->toString();
					$i++;
			}
		}
		
		public function nextId(){
		
			$id = "A";
			
			$odao = new OtherDAO($this->bdd);
			
			$rs = $odao->loadData("SELECT nextval('seqAchat')");
			$nx = ""+$rs[0]->nextval;
			
			while(strlen($nx) < 4){
				$nx = "0".$nx;
			} $id = $id . $nx;
			
			return $id;
		
		}
		
	}
?>