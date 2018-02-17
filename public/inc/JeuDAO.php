<?php
	
	include('Jeu.php');
	/*include('Categorie.php');
	include('CategorieDAO.php');
	include('Constructeur.php');
	include('ConstructeurDAO.php');*/
	
	class JeuDao{
		
		private $game;
		private $result;
		private $bdd = null;
		
		public function __construct($connexion){
			$this->bdd = $connexion;
		}		
		
		public function loadData($condition){
			
			$request = "SELECT jeu.* from Jeu jeu";
			if($condition != null){
				$request = $request." ".$condition;
			} $game = null;
			
			$this->result = $this->bdd->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			
			$categoriedao = new CategorieDAO($this->bdd);
			$constructeurdao = new ConstructeurDAO($this->bdd);
			$constructeur = null;
			$categorie =null;
			$_jeu = null;
			
			while($_jeu = $this->result->fetch()){
				$categorie = $categoriedao->loadData("Where id = '" . $_jeu->categorie."'");
				$constructeur = $constructeurdao->loadData("Where id = '" . $_jeu->constructeur."'");
				$game[] = new Jeu($_jeu->id, $_jeu->nom, $_jeu->description, $categorie[0], $constructeur[0], $_jeu->datesortie, $_jeu->image, $_jeu->lien, $_jeu->note, $_jeu->prix);
			} return $game;
		}
		
		public function insertData($_jeu){
			
			if($_jeu instanceof Jeu){
				
					$req = "INSERT INTO Jeu VALUES('".$_jeu->getId()."', '".$_jeu->getNom()."', '".str_replace("'", "''", $_jeu->getDescription())."', '".$_jeu->getCategorie()->getId()."', '".$_jeu->getConstructeur()->getId()."', '".$_jeu->getDateSortie()."', '".$_jeu->getImage()."', '".$_jeu->getLien()."', ".$_jeu->getNote().", ".$_jeu->getPrix().")";
					echo $req."<br/>";
					$n = $this->bdd->exec($req);
					return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type jeu ...'; }
			
		}
		
		public function deleteData($_jeu){
			
			if($_jeu instanceof Jeu){
				
				$n = $this->bdd->exec("DELETE FROM Jeu WHERE id='".$_jeu->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type jeu ...'; }
			
		}
		
		public function updateData($_jeu){
			
			if($_jeu instanceof Jeu){
				
				$settings = "SET id='".$_jeu->getId()."', nom='".$_jeu->getNom()."', description='".$_jeu->getDescription()."', categorie='".$_jeu->getCategorie()->getId()."', constructeur='".$_jeu->getConstructeur()->getId()."', dateSortie='".$_jeu->getDateSortie()."', image='".$_jeu->getImage()."', lien='".$_jeu->getLien()."', note=".$_jeu->getNote().", prix=".$_jeu->getPrix()."";
				
				$n = $this->bdd->exec("UPDATE Jeu ".$settings." WHERE id='".$_jeu->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$jeux = $this->loadData(null);
			$i = 0;
			while($i < count($jeux)){
					echo $jeux[$i]->toString();
					$i++;
			}
		}
		
		public function nextId(){
		
			$id = "J";
			
			$odao = new OtherDAO($this->bdd);
			
			$rs = $odao->loadData("SELECT nextval('seqJeu')");
			$nx = ""+$rs[0]->nextval;
			
			while(strlen($nx) < 4){
				$nx = "0".$nx;
			} $id = $id . $nx;
			
			return $id;
		
		}
		
	}
?>