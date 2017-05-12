<?php

	session_start();
	require ('connectBD.php');
	
	$nom = $_POST['lastname'];
	$prenom = $_POST['firstname'];
	$pseudo = $_POST['username'];
	$mdp = $POST['password'];
	
	$pseudoActuel = $_SESSION['pseudo'];
	
	if (testToutRempli()) {
		if (testPseudoCorrect($pseudo)){
			
			global $connexion;
			$var = $connexion->prepare('UPDATE UserProfil SET nom = "'.$nom.'", prenom = "'.$prenom.'", pseudo = "'.$pseudo.'", mdp = "'.$mdp.'" WHERE pseudo = "'.$pseudoActuel.'"');
			$var->execute();
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['erreur_co'] = false;
			Header('Location: ../Profil.php');
		} else {
				echo "pseudo deja utilisé <br>";
				$_SESSION['erreur_co'] = true;
				$_SESSION['msg_erreur'] = "pseudo déjà utilisé!";
				Header('Location: ../Profil.php');
		}
	} else {
			echo "tous les champs n'ont pas été remplis";
			$_SESSION['erreur_co'] = true;
			$_SESSION['msg_erreur'] = "veuillez remplir tous les champs!";
			Header('Location: ../Profil.php');
	 }
	
	
	function testPseudoCorrect($ps){
		$res = true;
		
		global $connexion;
		$var = $connexion->prepare("SELECT pseudo FROM UserProfil");
		$var->execute();
		
		while ($ligne = $var->fetch()){
			$data = strtolower($ligne['pseudo']);
			$pslow = strtolower($ps);
			if ($data == $pslow) {
				$res = false;
			}
		}
		
		return $res;
	}
	
	function testToutRempli(){
		$res = false;
		if(isset($_POST['lastname']) && !empty($_POST['lastname'])){
			if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
				if (isset($_POST['username']) && !empty($_POST['username'])) {
					if (isset($_POST['password']) && !empty($_POST['password'])) {
						if (isset($_POST['password2']) && !empty($_POST['password2'])) {
							$res = true;
						}
					}
				}
			}
		}
		return $res;
				 
	}

?>
