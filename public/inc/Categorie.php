<?php
	class Categorie{
		
		private $id = "";
		private $categorie = "";
		
		public function __construct($i, $c){
			$this->id = $i;
			$this->categorie = $c;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getCategorie(){
			return $this->categorie;
		}
		
		public function toString(){
			return $this->id." : ".$this->categorie."<br/>";
		}
	}
?>