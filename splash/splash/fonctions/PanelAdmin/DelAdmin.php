<meta charset="utf-8"/>

<?php
require('../connectBD.php');


//Si on appuie sur le bouton
if (isset($_POST['DelAdmin'])) {
    //On recupere les champs du formulaire de post
    $iduser = $_POST['idAdmin'];

    //SI Tout Est Bien Rempli
    if ( VerifierRemplissage() ) {
        //inscription dans la base de données;
        global $connexion;
        $var = $connexion->prepare("DELETE FROM UserisAdmin WHERE idUser = '$iduser' ");
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
    if (isset($_POST['idAdmin']) && !empty($_POST['idAdmin'])) {
        //Alors res est donc bon
        $res = true;
    }
    return $res;
}

?>