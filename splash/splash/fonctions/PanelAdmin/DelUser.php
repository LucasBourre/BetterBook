<meta charset="utf-8"/>

<?php
require('../connectBD.php');


//Si on appuie sur le bouton
if (isset($_POST['delUser'])) {
    //On recupere les champs du formulaire de post
    $iduser = $_POST['UserId'];

    //SI Tout Est Bien Rempli
    if ( VerifierRemplissage() ) {
        //dlelete dans la base de données;
        global $connexion;
        //On supprime le profil User
        $var = $connexion->prepare("DELETE FROM UserProfil WHERE id = '$iduser' ");
        $var->execute();
        //On supprime s'il est admin
        $var = $connexion->prepare("DELETE FROM UserisAdmin WHERE idUser = '$iduser'");
        $var->execute();
        //On supprime ses abonnements
        $var = $connexion->prepare("DELETE FROM Abonnement WHERE ID_Follower = '$iduser'");
        $var->execute();
        $var = $connexion->prepare("DELETE FROM Abonnement WHERE ID_Pronostiqueur = '$iduser'");
        $var->execute();
        //on sauvegarde les id des combine ou il y a l'user
        $lescombines = $connexion->prepare("SELECT ID from Combine WHERE idProfile = '$iduser'");
        $lescombines->execute();
        //On delete les pronoUser qui sont dans ces combines
        while ($idcombine = $lescombines->fetch()){
            $var = $connexion->prepare("DELETE FROM PronoUser WHERE IDCombine = '$idcombine' ");
            $var->execute();
        }
        //On delete proprement les combines
        $var = $connexion->prepare("DELETE FROM Combine WHERE idProfile = '$iduser'");
        $var->execute();
        Header('Location: ../../PanelAdmin.php');
    } else {
        echo "erreur de remplissage . ";
    }
}else{
    echo "errer bouton";
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
    if (isset($_POST['UserId']) && !empty($_POST['UserId'])) {
        //Alors res est donc bon
        $res = true;
    }else {
        echo "erreur remplissage.";
    }

    return $res;
}

?>