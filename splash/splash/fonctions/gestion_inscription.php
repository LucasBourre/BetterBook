<meta charset="utf-8"/>
<?php

	session_start();
	require ('connectBD.php');

	//gestion de l'inscription
	if (isset($_POST['BT-inscription']) && $_POST['BT-inscription'] == 'Inscription') {
		
		$nom = $_POST['lastname'];
		$prenom = $_POST['firstname'];
		$pseudo = $_POST['username'];
		$mdp = $POST['password'];
		$mdp2 = $POST['password2'];
		//$dateNaiss = $POST['birthdate'];
		//$email = $POST['email'];
		
		echo $_POST['lastname'];
		echo $_POST['firstname'];
		echo $_POST['username'];
		echo $_POST['password'];
		echo $_POST['password2'];
		//echo $_POST['birthdate'];
		//echo $_POST['email'];
		echo "<br>";
		//echo (testPseudoCorrect($pseudo));
		
		if (testToutRempli()) {
			/*if (testPseudoCorrect($pseudo)){
				if ($_POST['password'] <> $_POST['password2']) {
					echo 'mots de passe ne correspondent pas';
				} else {
					//inscription dans la base de données
					$motDePasse = $_POST['password'];
					global $connexion;
					$var = $connexion->prepare("INSERT INTO UserProfil (nom, prenom, pseudo, mdp) values ('$nom', '$prenom', '$pseudo', '$motDePasse')");
					$var->execute();
					
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['connexion'] = 1;
				}
			} else {
				echo "pseudo deja utilisé <br>";
			}*/ echo "ouais";
		} else {
			echo "tous les champs n'ont pas été remplis";
		}
		
		
		
		
	} else {
		Header('Location: ../Accueil.php');
	}
	
	function testPseudoCorrect($ps){
		$res = true;
		
		global $connexion;
		$var = $connexion->prepare("SELECT pseudo FROM UserProfil");
		$var->execute();
		
		while ($ligne = $var->fetch()){
			if ($ligne['pseudo'] == $ps) {
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
