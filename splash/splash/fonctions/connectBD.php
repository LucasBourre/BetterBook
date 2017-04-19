<?php
	try{
		$connexion = new PDO("mysql:host=mysql.hostinger.fr;dbname=u748541759_lala","u748541759_lala","cocotioten");
	}
	catch(PDOException $e){
		echo("Erreur connexion : ".$e->getMessage());
		exit();
	}
?>
