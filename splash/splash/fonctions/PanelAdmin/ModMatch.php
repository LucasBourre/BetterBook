<meta charset="utf-8"/>

<?php
require('../connectBD.php');


//Si on appuie sur le bouton
if (isset($_POST['btn-modMatch'])) {
    //On recupere les champs du formulaire de post
    $idMatch = $_POST['MatchID'];
    $resultat = $_POST['resultat'];

    //SI Tout Est Bien Rempli
    if ( VerifierRemplissage() ) {
        //inscription dans la base de données;
        global $connexion;
        //Requete 1 : on met a jour le resultat dans Match : OK
        $sql = "UPDATE Matchs SET resultat = '$resultat' WHERE ID = '$idMatch' ";
        $var = $connexion->prepare($sql);
        $var->execute();

        //requete 2 : On met a jour le resultat dans PronoUser : Si prono = Rsultat : 1
        $sql = "update PronoUser P1 set P1.resultatprono = 1 where P1.prono = (Select m.resultat from  Matchs m where m.id = P1.IDMatch)";
        $var = $connexion->prepare($sql);
        $var ->execute();

        //requete 2.5 : On met a jour Resultat dans PronoUser : Si resultat != Prono :  0
        $sql = "update PronoUser P1 set P1.resultatprono =0 where P1.prono != (Select m.resultat from  Matchs m where m.id = P1.IDMatch)";
        $var = $connexion->prepare($sql);
        $var ->execute();

        //Selection des combinés en cours
		$requete = $connexion->prepare(
		'SELECT *
		FROM Combine
		WHERE resFinal IS NULL');
		$requete->execute();
			while($ligne = $requete->fetch()){
				$idcombine = $ligne['ID'];
				$mise = $ligne['mise'];
				$cote = $ligne['coteTotale'];
				
				$res = 1;
				
				//Selection des résultats des matchs du combiné
				$requete2 = $connexion->prepare(
				'SELECT resultatProno 
				FROM PronoUser
				WHERE IDCombine = "'.$idcombine.'"');
				$requete2->execute();
				while($ligne = $requete2->fetch()){
					if ($ligne['resultatProno'] == 0){
						$res = 0;//Le combiné a échoué
					} else if ($ligne['resultatProno'] == null){
						$res = null;//Le combiné est encore en cours
					}
				}
				//NOTE: si $res est resté à 1 -> combiné réussi
				
				//Mise à jour du RésultatProno
				$requeteUpdate = $connexion->prepare(
				'UPDATE Combine SET resFinal = "'.$res.'" WHERE IDCombine = "'.$idcombine.'"');
				$requeteUpdate->execute();
				
				//Mise à jour du bénéfice
				if ($res == 1){
					$benef = $mise * $cote;
					$requeteBenef = $connexion->prepare(
					'UPDATE Combine SET benefices = "'.$benef.'" WHERE IDCombine = "'.$idcombine.'"');
					$requeteBenef->execute();
				} else if ($res == 0){
					$benef = $mise * (-1);
					$requeteBenef = $connexion->prepare(
					'UPDATE Combine SET benefices = "'.$benef.'" WHERE IDCombine = "'.$idcombine.'"');
					$requeteBenef->execute();
			}
			
		}

        //Requete 4 : on met a jour les donnees de l'utilisateur :
        // le beneficeGlobal

        $sql="Update UserProfil U1 Set BeneficesG = (Select SUM(Benefices) from Combine C
        Where U1.ID = C.IdProfile)";
        $var = $connexion->prepare($sql);
        $var ->execute();

        // le tauxsuccesG
        $sql="Update UserProfil U1 Set tauxSuccesG = (Select count(C.resFinal) from Combine C Where U1.ID = C.IdProfile and C.resFinal=1)
        / (Select count(C.resFinal) from Combine C Where U1.ID=C.IdProfile) *100";
        $var = $connexion->prepare($sql);
        $var->execute();

        //la coteMoy
        $sql="Update UserProfil U1 Set coteMoy = (Select Sum(C.CoteTotale) from Combine C Where U1.ID = C.IdProfile )
        / (Select count(C.CoteTotale) from Combine C Where U1.ID=C.IdProfile)";
        $var = $connexion->prepare($sql);
        $var->execute();

        //la miseMoy
        $sql="Update UserProfil U1 Set miseMoy = (Select Sum(C.mise) from Combine C Where U1.ID = C.IdProfile )
        / (Select count(C.mise) from Combine C Where U1.ID=C.IdProfile))";
        $var = $connexion->prepare($sql);
        $var->execute();


        Header('Location: ../../PanelAdmin.php');
    } else {
        echo "erreur de remplissage . ";
    }
}

//Fonction qui affiche en console la $data
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);
    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

function VerifierRemplissage(){
    //On met le res a faux
    $res = false;
    //Si Nom  n'est pas vide ..
    if (isset($_POST['MatchID']) && !empty($_POST['MatchID'])) {
        if(isset($_POST['resultat']) && !empty($_POST['resultat'])){
                if($_POST['resultat'] == "1" || $_POST['resultat'] == "N" || $_POST['resultat'] == "2") {
                    $res = true;
                }
        }
    }
    return $res;
}

?>
