<meta charset="utf-8"/>
<?php
require ('connectBD.php');


//gestion de l'Ajout
if (isset($_POST['btn-ajouterMatch'])) {
    $Championnat = $_POST['Championnat'];
    $E1 = $_POST['Eq1'];
    $E2 = $_POST['Eq2'];
    $Cote1 = $_POST['Cote1'];
    $CoteN = $_POST['CoteN'];
    $Cote2 = $_POST['Cote2'];
    $Date = $_POST['Date'];
    $HeureDebut = $_POST['HeureDebut'];

    if (VerifierRemplissage()) {
        //inscription dans la base de données;
        global $connexion;
        $var = $connexion->prepare("INSERT INTO Matchs (Date,heureDebut,championnat,equipe1,equipe2,cote1,cote2,coteN) values ('$Date', '$HeureDebut', '$Championnat', '$E1', '$E2' , '$Cote1' 
            , '$Cote2' , '$CoteN')");
        $var->execute();
    } else {
        echo "tous les champs n'ont pas été remplis";
        Header('Location: ../Accueil.php');
    }
}

function VerifierRemplissage(){
    $res = false;
    if(isset($_POST['Eq1']) && !empty($_POST['Eq1'])){
        if (isset($_POST['Eq2']) && !empty($_POST['Eq2'])) {
            if (isset($_POST['Cote1']) && !empty($_POST['Cote1'])) {
                if (isset($_POST['Cote2']) && !empty($_POST['Cote2'])) {
                    if (isset($_POST['CoteN']) && !empty($_POST['CoteN'])) {
                        if (isset($_POST['Date']) && !empty($_POST['Date'])) {
                            if (isset($_POST['HeureDebut']) && !empty($_POST['HeureDebut'])) {
                                if (isset($_POST['Championnat']) && !empty($_POST['Championnat'])) {
                                    $res = true;
                                    echo "TOUT EST BIEN REMPLI";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $res;
}
?>
