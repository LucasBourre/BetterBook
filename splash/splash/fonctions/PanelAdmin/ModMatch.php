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

        //requete 3 : table combine : si tous resprono = 1 ( PAS BON )
        $sql="Update Combine C Set C.resFinal =1, C.benefices=C.coteTotale*C.mise
Where C.ID = ( 
		Select DISTINCT (P1.idCombine) From PronoUser P1
		Where P1.idCombine = C.ID
                AND P1.IdCombine NOT IN (
                        	Select P1.IdCombine where P1.resultatProno is
                		null
                                )
                AND P1.IdCombine NOT IN (
			                Select P1.IDCombine where P1.resultatProno =0
                                        )
             	)";
        $var = $connexion->prepare($sql);
        $var ->execute();

        //update table combine : Si resProno = 0  (PAS BON )
        $sql="Update Combine C Set C.resFinal =0, C.benefices=-C.mise
Where C.ID = ( 
		Select DISTINCT (P1.idCombine) From PronoUser P1
		Where P1.idCombine = C.ID
                AND P1.IdCombine NOT IN (
                        	Select P1.IdCombine where P1.resultatProno is
                		null
                                )
                AND P1.IdCombine  IN (
			                Select P1.IDCombine where P1.resultatProno =0
                                        )
             	)";
        $var = $connexion->prepare($sql);
        $var ->execute();

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