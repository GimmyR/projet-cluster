<?php
	class Commentaire{
		
		private $id = "";
		private $utilisateur = null;
		private $jeu = null;
		private $dateCom = "";
		private $commentaire = "";
		
		public function __construct($i, $u, $j, $d, $c){
			$this->id = $i;
			$this->utilisateur = $u;
			$this->jeu = $j;
			$this->dateCom = $d;
			$this->commentaire = $c;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getUtilisateur(){
			return $this->utilisateur;
		}
		public function getJeu(){
			return $this->jeu;
		}
		public function getDateCom(){
			return $this->dateCom;
		}
		public function getCommentaire(){
			return $this->commentaire;
		}
		
		public function toString(){
			return $this->id." : ".$this->utilisateur->getId()." : ".$this->jeu->getId()." : ".$this->dateCom." : ".$this->commentaire."<br/>";
		}
		
	}
?>