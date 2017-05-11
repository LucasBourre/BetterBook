<?php
require('../connectBD.php');

//Fonction qui affiche en console la $data
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}


//Si on appuie sur le bouton
if (isset($_POST['btn-ajouterUser'])) {
    //On recupere les champs du formulaire de post
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Pseudo = $_POST['Pseudo'];
    $Password = $_POST['MotDePasse'];
    $DateNais = $_POST['DateNais'];
    list($jour, $mois, $annee) = explode('/', $DateNais);
    $DateNais=date("Y-m-d", mktime(0, 0, 0, $mois, $jour, $annee));
    $Mail = $_POST['Mail'];

    //SI Tout Est Bien Rempli
    if ( VerifierRemplissage() ) {
        //inscription dans la base de données;
        global $connexion;
        $var = $connexion->prepare("INSERT INTO UserProfil (nom,prenom,pseudo,mdp,dateNaiss,email) values ('$Nom', '$Prenom', '$Pseudo', '$Password', '$DateNais' , '$Mail')");
        $var->execute();
        Header('Location: ../../PanelAdmin.php');
    } else {
        echo "erreur de remplissage . ";
    }

}


function VerifierRemplissage(){
    //On met le res a faux
    $res = false;
    //Si Nom  n'est pas vide ..
    if(isset($_POST['Nom']) && !empty($_POST['Nom'])){
        if (isset($_POST['Prenom']) && !empty($_POST['Prenom'])) {
            if (isset($_POST['Pseudo']) && !empty($_POST['Pseudo'])) {
                if (isset($_POST['MotDePasse']) && !empty($_POST['MotDePasse'])) {
                    if (isset($_POST['DateNais']) && !empty($_POST['DateNais'])) {
                        if (isset($_POST['Mail']) && !empty($_POST['Mail'])) {
                                    //Alors res est donc bon
                                    $res = true;
                        }
                    }
                }
            }
        }
    }
    return $res;
}

?>