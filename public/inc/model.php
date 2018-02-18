<?php

	function getConfig(){
	
		return array(
			'sgbd' => 'pgsql',
			'port' => 5432,
			'db' => 'gamebuy',
			'user' => 'postgres',
			'mdp' => 'itu'
		);
	
	}
	
	function getConnexion($sgbd, $port, $db, $user, $mdp){
			
		$config = getConfig();
		
		$sgbd = $config['sgbd'];
		$port = $config['port'];
		$db = $config['db'];
		$user = $config['user'];
		$mdp = $config['mdp'];
		
		static $bdd = null;
		if($port != 80){
			$url = $sgbd.":host=localhost;port=".$port.";dbname=".$db;
		} else{
			$url = $sgbd.":host=localhost;dbname=".$db;
		}
		
		try{
		
			$bdd = new PDO($url, $user, $mdp);
		
		} catch(Exception $e){
			
			die('Erreur : '.$e->getMessage());
			
		} return $bdd;
		
	}

?>
