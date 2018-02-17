<?php

	class Achat{
		
		private $id = "";
		private $utilisateur = null;
		private $jeu = null;
		private $datePayement = "";
		private $pu = -1;
		
		public function __construct($i, $u, $j, $d, $p){
			$this->id = $i;
			$this->utilisateur = $u;
			$this->jeu = $j;
			$this->datePayement= $d;
			$this->pu = $p;
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
		public function getDatePayement(){
			return $this->datePayement;
		}
		public function getPu(){
			return $this->pu;
		}
		
		public function toString(){
			return $this->id." : ".$this->utilisateur->getId()." : ".$this->jeu->getId()." : ".$this->datePayement." : ".$this->pu."<br/>";
		}
		
	}
?>