<?php
	class Image{
		
		private $id = "";
		private $jeu = null;
		private $nom = "";
		
		public function __construct($i, $j, $n){
			$this->id = $i;
			$this->jeu = $j;
			$this->nom = $n;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getJeu(){
			return $this->jeu;
		}
		public function getNom(){
			return $this->nom;
		}
		
		public function toString(){
			return $this->id." : ".$this->jeu->getId()." : ".$this->nom."<br/>";
		}
		
	}
?>