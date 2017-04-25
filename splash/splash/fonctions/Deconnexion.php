<?php

session_start();

$_SESSION['connexion'] = 0;
$_SESSION['pseudo'] = "déco";

Header('Location: ../Accueil.php');


?>
