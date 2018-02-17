<?php
	
	include('Image.php');
	/*include('Utilisateur.php');
	include('UtilisateurDAO.php');
	include('Jeu.php');
	include('JeuDAO.php');*/
	
	class ImageDAO{
		
		private $img;
		private $result;
		private $bdd = null;
		
		public function __construct($connexion){
			$this->bdd = $connexion;
		}	
		
		public function loadData($condition){
			
			$request = "SELECT Image.* from Image image";
			if($condition != null){
				$request = $request." ".$condition;
			}
			
			$this->result = $this->bdd->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			
			$jeudao = new JeuDAO($this->bdd);
			$jeu =null;
			$_image = null;
			
			while($_image = $this->result->fetch()){
				$jeu = $jeudao->loadData("Where id = '" . $_image->jeu."'");
				$img[] = new Image($_image->id, $jeu[0], $_image->nom);
			} return $img;
		}
		
		public function insertData($_image){
			
			if($_image instanceof Image){
				
					$req = "INSERT INTO image VALUES('".$_image->getId()."', '".$_image->getJeu()->getId()."', '".$_image->getNom()."')";
					echo $req."<br/>";
					$n = $this->bdd->exec($req);
					return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type image ...'; }
			
		}
		
		public function deleteData($_image){
			
			if($_image instanceof Image){
				
				$n = $this->bdd->exec("DELETE FROM Image WHERE id='".$_image->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type image ...'; }
			
		}
		
		public function updateData($_image){
			
			if($_image instanceof Image){
				
				$settings = "SET id='".$_image->getId()."', jeu='".$_image->getJeu()->getId()."', nom='".$_image->getNom()."'";
				
				$n = $this->bdd->exec("UPDATE image ".$settings." WHERE id='".$_image->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$images = $this->loadData(null);
			$i = 0;
			while($i < count($images)){
					echo $images[$i]->toString();
					$i++;
			}
		}
		
		public function nextId(){
		
			$id = "IM";
			
			$odao = new OtherDAO($this->bdd);
			
			$rs = $odao->loadData("SELECT nextval('seqImage')");
			$nx = ""+$rs[0]->nextval;
			
			while(strlen($nx) < 3){
				$nx = "0".$nx;
			} $id = $id . $nx;
			
			return $id;
		
		}
		
	}
?>