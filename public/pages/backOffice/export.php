<?php

	require '../../inc/pdfcrowd.php';

	$tof = false;
	
	session_start();
	
	if(isset($_SESSION["loginBO"]) && isset($_SESSION["userBO"])){
		
		if(isset($_POST["code"])){
			
			$code = $_POST["code"];
			
			$client = new Pdfcrowd("gptitu", "a814c381812a2841b38ece174b7d8170");
			
			$file = fopen("statBO.pdf", "wb");
			
			$pdf = $client->convertHtml($code, $file);
			
			/*header("Content-Type: application/pdf");
			header("Cache-Control: max-age=0");
			header("Accept-Ranges: none");
			header("Content-Disposition: attachment; filename=\"statBO.pdf\"");*/
			
		} else{
			
			header("Location:accueil.php");
			
		}
		
	} else{
		
		header("Location:index.php");
		
	}

?>