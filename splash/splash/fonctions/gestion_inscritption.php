<?php
	require ('connectBD.php');

	//gestion de l'inscription
	if (isset($_POST['BT-inscription']) && $_POST['BT-inscription'] == 'Inscription') {
		
		$nom = $_POST['lastname'];
		$prenom = $_POST['firstname'];
		$pseudo = $_POST['username'];
		$mdp = $POST['password'];
		$mdp2 = $POST['password2'];
		$dateNaiss = $POST['birthdate'];
		$email = $POST['email'];
		
		echo $_POST['lastname'];
		echo $_POST['firstname'];
		echo $_POST['username'];
		echo $_POST['password'];
		echo $_POST['passxord2'];
		echo $_POST['birthdate'];
		echo $_POST['email'];
		
		//TO DO tests si données valides et cohérentes
		
		//inscription dans la base de données
		global $connexion;
		$var = $connexion->prepare("INSERT INTO UserProfil (nom, prenom, pseudo, mdp, dateNaiss, email) values ('$nom', '$prenom', '$pseudo', '$mdp', '$dateNaiss', '$email')");
		$var->execute();
		
	}
?>
