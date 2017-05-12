<meta charset="utf-8"/>
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
if (isset($_POST['btn-ajouterMatch'])) {
    //On recupere les champs du formulaire de post
    $Championnat = $_POST['Championnat'];
    $E1 = $_POST['Eq1'];
    $E2 = $_POST['Eq2'];
    $Cote1 = $_POST['Cote1'];
    $CoteN = $_POST['CoteN'];
    $Cote2 = $_POST['Cote2'];
    //On transforme la date en YYYY MM DD
    $Date = $_POST['Date'];
    $expl=explode('/',$Date);
    $rev=array_reverse($expl);
    $Date=implode('-',$rev);
    //Lheure du match
    $HeureDebut = $_POST['HeureDebut'];


    //SI Tout Est Bien Rempli
    if (VerifierRemplissage() && Verifier2Equipediff($E1,$E2)) {
        //inscription dans la base de données;
        global $connexion;
        $var = $connexion->prepare("INSERT INTO Matchs (Date,heureDebut,championnat,equipe1,equipe2,cote1,cote2,coteN) values ('$Date', '$HeureDebut', '$Championnat', '$E1', '$E2' , '$Cote1' 
            , '$Cote2' , '$CoteN')");
        $var->execute();
        Header('Location: ../../PanelAdmin.php');
    } else {
        echo "erreur de remplissage. ";
    }
}

function VerifierRemplissage(){
    //On met le res a faux
    $res = false;
    //Si Eq1 n'est pas vide ..
    if(isset($_POST['Eq1']) && !empty($_POST['Eq1'])){
        if (isset($_POST['Eq2']) && !empty($_POST['Eq2'])) {
            if (isset($_POST['Cote1']) && !empty($_POST['Cote1'])) {
                if (isset($_POST['Cote2']) && !empty($_POST['Cote2'])) {
                    if (isset($_POST['CoteN']) && !empty($_POST['CoteN'])) {
                        if (isset($_POST['Date']) && !empty($_POST['Date'])) {
                            if (isset($_POST['HeureDebut']) && !empty($_POST['HeureDebut'])) {
                                if (isset($_POST['Championnat']) && !empty($_POST['Championnat'])) {
                                    //Alors res est donc bon
                                    $res = true;
                                    debug_to_console("TOUT EST BIEN REMPLI");
                                }else{
                                    //Sinon erreur
                                    debug_to_console( "erreur championnat");
                                }
                            }else{
                                debug_to_console("erreur heure");
                            }
                        }else{
                            debug_to_console("erreur date");
                        }
                    }else{
                        debug_to_console("erreur coteN");
                    }
                }else{
                    debug_to_console("erreur cote2");
                }
            }else{
                debug_to_console("erreur cote1");
            }
        }else{
            debug_to_console("erreur eq2");
        }
    }else{
        debug_to_console("erreur eq1");
    }
    return $res;
}

function Verifier2Equipediff( $E1, $E2){
    $res = false;
    // si on a pas pris deux fois la meme equipe
    if( $E1 != $E2 ){
        $res= true;
    }
    return $res;
}
