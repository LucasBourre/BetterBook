<?php
	try{
		$connexion = new PDO("mysql:host=localhost;dbname=lalande","lalande","cocotioten");
	}
	catch(PDOException $e){
		echo("Erreur connexion : ".$e->getMessage());
		exit();
	}
?>
