<?php

require ('connectBD.php');

// on teste si le visiteur a soumis le formulaire de connexion
/*if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	$base = mysql_connect ('serveur', 'login', 'password');
	mysql_select_db ('nom_base', $base);

	// on teste si une entrée de la base contient ce couple login / pass
	$sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_escape_string($_POST['login']).'" AND pass_md5="'.mysql_escape_string(md5($_POST['pass'])).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);

	mysql_free_result($req);
	mysql_close();

	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: membre.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($data[0] == 0) {
		$erreur = 'Compte non reconnu.';
	}
	// sinon, alors la, il y a un gros problème :)
	else {
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
}else*//*if (isset($_POST['BT-inscription']) && $_POST['BT-inscription'] == 'Inscription') {
	header('Location: ../Inscription.php');
	echo ("Boojur");
}
	else {
	//$erreur = 'Au moins un des champs est vide.';
	echo ('ksdc');
	}*/

session_start();
/*if (isset($_POST['BT-connexion']) && ($_POST['BT-connexion'] == 'Connexion')) {*/	

	if((isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))) {
		
		echo $_POST['pseudo'];
		echo $_POST['mdp'];
		if (entreesValides($_POST['pseudo'], $_POST['mdp'])){
			$_SESSION['connexion'] = 1;
			$_SESSION['pseudo'] = $_POST['pseudo'];
			
			echo ('connecté');
			Header('Location: ../Profil.php');
		} else {
			echo "entrées non valides";
		}
		
	} else { echo "entrées non completes";}
/*} else {
	echo ('pas bon');
}*/

function entreesValides($ps, $mot){
	
	$res = false;
	
	global $connexion;
	$requete = $connexion->prepare("SELECT pseudo, mdp FROM UserProfil");
				$requete->execute();
	
	while($ligne = $requete->fetch()){
		if (($ligne['pseudo'] == $ps) && ($ligne['mdp'] == $mot)) {
			
			$res = true;
		}
	}
	return $res;

}

?>
