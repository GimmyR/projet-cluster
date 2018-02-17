<?php
	class Constructeur{
		
		private $id = "";
		private $nom = "";
		
		public function __construct($i, $n){
			$this->id = $i;
			$this->nom = $n;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		
		public function toString(){
			return $this->id." : ".$this->nom."<br/>";
		}
	}
?>