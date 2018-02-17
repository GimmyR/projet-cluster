<?php
	
	class OtherDao{
		
		private $result;
		private $tab;
		private $bdd = null;
		
		public function __construct($connexion){
			$this->bdd = $connexion;
		}		
		
		public function loadData($request){
			
			$this->result = $this->bdd->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);

			$tab = array ();
			
			while($res = $this->result->fetch()){
				$tab[] = $res;
			} return $tab;
			
		}
		
	}
	
?>