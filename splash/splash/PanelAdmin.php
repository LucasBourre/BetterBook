<!DOCTYPE HTML>
<html>
<head>
    <!-- fonctions php -->
    <?php
    include ('fonctions/connectBD.php');
    require('fonctions/userGet.php');
    session_start();

    //on initialise isAdmin a 0
    $isAdmin = 0;
    //On recupere l'id de l'utilisateur connecte
    $ps = $_SESSION['pseudo'];
    $id = getID($ps);
    //On recupere les User Administrateurs
    $req = "Select idUser from UserisAdmin";
    $reponse= $connexion->prepare($req);
    $reponse->execute();
    //On parcours tous les administrateurs
    while ($donnees = $reponse->fetch()) {
        //SI l'id du connecte == un des admins
        if ($donnees['idUser'] == $id){
            //alors isAdmin = 1
            $isAdmin =1;
        }
    }
    //Si a la fin isAdmin = 0 :
    if($isAdmin == 0) {
        echo"Vous n'etes pas Administrateur ! ";
        Header('Location: Accueil.php');
    }

    global $connexion;
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BetterBook &mdash; Just Bet It</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projet PAI pour parier en ligne" />
    <meta name="keywords" content="paris en ligne, classement paris,statistiques,pronostiques" />
    <meta name="author" content="BetterBook Corp" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /><![endif]-->

    <!-- font Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">


    <!-- STYLE CSS ADMIN PANEL -->
    <link rel="stylesheet" href="css/AdminPanel.css">

</head>
<body>

<div class="gtco-loader"></div>

<div id="page">
    <div class="page-inner">
        <nav class="gtco-nav" role="navigation">
            <div class="gtco-container">

                <div class="row">
                    <div class="col-sm-2 col-xs-12">
                        <div id="gtco-logo"><a href="Accueil.php">BetterBook <em>.</em></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <?php
                            if ($_SESSION['connexion'] == 1)
                            { ?>
                                <li class="btn-cta"> <a href="Profil.php"><span><img id="Utilisateur" src="images/utilisateur.jpg"  width=50px /><?php echo  " ".$_SESSION['pseudo']; ?></span></a></li>
                            <?php } ?>
                            <li><a href="Pronostiques.php">Pronostiques</a></li>
                            <li><a href="Classement.php">Classement</a></li>
                            <li><a href="Informations.php">Comment Ca Marche ?</a></li>
                            <li><a href="Contact.php">Contact</a></li>
                            <li class="btn-cta"><a href="fonctions/Deconnexion.php"><span>
                                <?php
                                if ($_SESSION['connexion'] == 1){
                                    echo "Déconnexion";
                                } else {
                                    echo "Connexion";
                                }
                                ?>
                                </span></a></li>
                        </ul>

                    </div>
                </div>

            </div>
        </nav>

        <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/goal.jpg)">
            <div class="overlay"></div>
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-left">


                        <div class="row row-mt-15em">

                            <div class="animate-box" data-animate-effect="fadeInUp">
                                <span class="intro-text-small"> Panel Administrateur </span>
                                <h1> Gestion de la base de données... </h1>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </header>



        <div class="gtco-section border-bottom">
            <div class="gtco-container">

                <div class="row">
                    <div class="col-md-12 text-left gtco-heading">
                        <p> Gestion des Utilisateurs : </p> <br>
                        <div id="dropdown">
                            <ul>
                                <!-- AJOUTER UN UTILISATEUR A LA BDD : OK -->
                                <li onclick="dropdown('AddUser');">Ajouter un Utilisateur</li>
                                <div id="AddUser" class="text-center">
                                    <form action="fonctions/PanelAdmin/AddUser.php" method="post">
                                        <BR> <row> Nom : <input type="text" name="Nom" /> </row>
                                        <BR> <row> Prenom : <input type="text" name="Prenom" /> </row>
                                        <BR> <row> Pseudo : <input type="text" name="Pseudo" /> </row>
                                        <BR> <row> Mot de passe : <input type="password" name="MotDePasse" /> </row>
                                        <BR> <row> Date Naissance : <input type="date" name="DateNais" /> </row>
                                        <BR> <row> Mail : <input type="email" name="Mail" /> </row>
                                        <BR> <row><input type="submit" name="btn-ajouterUser" value="Ajouter"></row>
                                    </form>

                                </div>

                                <!-- Supprimer un utilisateur : OK -->
                                <li onclick="dropdown('DelUser');">Supprimer un Utilisateur</li>
                                <div id="DelUser">
                                    <form method="post" action="fonctions/PanelAdmin/DelUser.php">
                                        <row>Utilisateur (Pseudo) :
                                            <SELECT name="UserId" size="1">
                                                <?php
                                                $reponse = $connexion->prepare("select id,pseudo from UserProfil");
                                                $reponse->execute();
                                                //on affiche chaque personne une a une
                                                while ($donnees = $reponse->fetch()){
                                                    echo "<OPTION value =";
                                                    echo $donnees['id'];
                                                    echo ">";
                                                    echo $donnees['pseudo'];
                                                    echo "</OPTION>";
                                                }
                                                $reponse->closeCursor();
                                                ?>
                                            </SELECT>
                                        </row>
                                        <BR> <row> <input type="submit" name="delUser" value="Supprimer / ! \"> </row>
                                    </form>
                                </div>

                                <!-- Ajouter un admin : OK -->
                                <li onclick="dropdown('AddAdmin');">  Ajouter un Administrateur</li>
                                <div id="AddAdmin" class="text-center">
                                    <form method="post" action="fonctions/PanelAdmin/AddAdmin.php">
                                        <row>Utilisateur (Pseudo) :
                                            <SELECT name="User" size="1">
                                                <?php
                                                $reponse = $connexion->prepare("select id,pseudo from UserProfil where id not in (Select iduser from UserisAdmin )");
                                                $reponse->execute();
                                                //on affiche chaque personne une a une
                                                while ($donnees = $reponse->fetch()){
                                                    echo "<OPTION value =";
                                                    echo $donnees['id'];
                                                    echo ">";
                                                    echo $donnees['pseudo'];
                                                    echo "</OPTION>";
                                                }
                                                $reponse->closeCursor();
                                                ?>
                                            </SELECT>
                                        </row>
                                        <BR> <row> <input type="submit" name="addAdmin" value="Ajouter"> </row>
                                    </form>
                                </div>

                                <!-- Delete un admin  : OK -->
                                <li onclick="dropdown('DelAdmin');">  Supprimer un Administrateur</li>
                                <div id="DelAdmin" class="text-center">
                                    <form method="post" action="fonctions/PanelAdmin/DelAdmin.php">
                                        <row> Administrateur a enlever :
                                            <SELECT Name="idAdmin" size="1">
                                                <?php
                                                $reponse = $connexion->prepare("select id,pseudo from UserProfil where id  in (Select iduser from UserisAdmin )");
                                                $reponse->execute();
                                                //on affiche 1 a 1 les personnes
                                                while ($donnees = $reponse->fetch()){
                                                    echo "<OPTION value =";
                                                    echo $donnees['id'];
                                                    echo ">";
                                                    echo $donnees['pseudo'];
                                                    echo "</OPTION>";
                                                }
                                                $reponse->closeCursor();
                                                ?>
                                            </SELECT>
                                        </row>
                                        <BR> <row> <input type="submit" name="DelAdmin" value="Supprimer"> </row>
                                    </form>
                                </div>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-left gtco-heading">
                        <p> Gestion des Matchs : </p> <br>
                        <ul>
                            <!-- AJOUTER UN MATCH A LA BDD : OK-->
                            <li onclick="dropdown('AddMatch');">Ajouter un Match</li>
                            <div id="AddMatch" class="text-center">
                                <form action="fonctions/PanelAdmin/AddMatch.php" method="post">
                                    <row> Championnat
                                        <SELECT name="Championnat" size="1">
                                            <OPTION value="1" selected="selected"> Ligue 1 </OPTION>
                                            <OPTION value="2"> Premier League </OPTION>
                                            <OPTION value="3"> Bundesliga </OPTION>
                                            <OPTION value="4"> Liga bbva </OPTION>
                                            <OPTION value="5"> Serie A </OPTION>
                                        </SELECT> </row>


                                    <BR><row> Equipe Domicile :
                                        <SELECT name="Eq1">
                                            <?php
                                            $reponse = $connexion->prepare("select id,nom from Equipes");
                                            $reponse->execute();
                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch()){
                                                echo "<OPTION value =";
                                                echo $donnees['id'];
                                                echo ">";
                                                echo $donnees['nom'];
                                                echo "</OPTION>";
                                            }
                                            $reponse->closeCursor();
                                            ?>
                                        </SELECT>
                                    </row>

                                    <BR><row>Equipe Exterieur :
                                        <SELECT name="Eq2">
                                            <?php
                                            $reponse = $connexion->prepare("select id,nom from Equipes");
                                            $reponse->execute();
                                            // On affiche chaque entrée une à une
                                            while ($donnees = $reponse->fetch()){
                                                echo "<OPTION value =";
                                                echo $donnees['id'];
                                                echo ">";
                                                echo $donnees['nom'];
                                                echo "</OPTION>";
                                            }
                                            $reponse->closeCursor();
                                            ?>
                                        </SELECT>
                                    </row>

                                    <BR><row>Cote Domicile : <input type="text" name="Cote1" /></row>

                                    <BR><row>Cote Nul : <input type="text" name="CoteN" /></row>

                                    <BR><row>Cote Exterieur : <input type="text" name="Cote2" /></row>

                                    <BR><row>Date Match : <input type="date" name="Date" /></row>

                                    <BR><row>Heure : <input type="time" name="HeureDebut" /></row>

                                    <BR><row><input type="submit" name="btn-ajouterMatch" value="Ajouter"></row>
                                </form>
                            </div>

                            <li onclick="dropdown('ModMatch');">Mettre le score d'un match</li>
                            <div id="ModMatch" class="text-center">
                                <form method="post" action="fonctions/PanelAdmin/ModMatch.php">
                                    <row>Match :
                                        <SELECT name="MatchID" size="1">
                                            <?php
                                            $sql= "SELECT m.ID as id, E1.nom as Eq1, E2.nom as Eq2 FROM Matchs m JOIN Equipes E1 ON m.equipe1 = E1.id
                                            JOIN Equipes E2 ON m.equipe2 = E2.id
                                            Where m.resultat IS NULL";
                                            $reponse = $connexion->prepare($sql);
                                            $reponse->execute();
                                            //on affiche chaque personne une a une
                                            while ($donnees = $reponse->fetch()){
                                                echo "<OPTION value =";
                                                echo $donnees['id'];
                                                echo ">";
                                                echo $donnees['Eq1'];
                                                echo " - ";
                                                echo $donnees['Eq2'];
                                                echo "</OPTION>";
                                            }
                                            $reponse->closeCursor();
                                            ?>
                                        </SELECT>
                                    </row>
                                  <row> Résultat ? (1 , N , 2) : <input type="text" name="resultat" /> </row>
                                    <BR> <row> <input type="submit" name="btn-modMatch" value="Modifier"> </row>
                                </form>
                            </div>

                            <li onclick="dropdown('DelMatch');">Supprimer un match ( match annulé ? )</li>
                            <div id="DelMatch"> Ici on supprime un match</div>


                        </ul>
                    </div>
                </div>


            </div>
        </div>



        <footer id="gtco-footer" role="contentinfo">
            <div class="gtco-container">
                <div class="row row-p	b-md">

                    <div class="col-md-4">
                        <div class="gtco-widget">
                            <h3>A propos de  <span class="footer-logo">BetterBook<span>.<span></span></h3>
                            <p>BetterBook est un site proposant aux utilisateurs d'inscrire leurs paris. Un classement des meilleurs parieurs est réalisé afin que les nouveaux utilisateurs puissent suivre les pronostiques proposés par les plus connaisseurs.</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-md-push-1">
                        <div class="gtco-widget">
                            <h3>Liens</h3>
                            <ul class="gtco-footer-links">
                                <li><a href="Informations.php">Comment ça marche ?</a></li>
                                <li><a href="Contact.php">Contactez nous.</a></li>
                                <li><a href="#">Plan du site</a></li>
                                <li><a href="#">Informations légales </a></li>
                                <li><a href="#">C.G.U</a></li>
                                <li><a href="PanelAdmin.php"> Panel Administrateur </a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="gtco-widget">
                            <h3>Contact</h3>
                            <ul class="gtco-quick-contact">
                                <li><a href="tel://0612345678"><i class="icon-phone"></i> 06 12 34 56 78</a></li>
                                <li><a href="mailto:BetterBookContact@gmail.com"><i class="icon-mail2"></i> BetterBookContact@gmail.com</a></li>
                                <li><a href="https://www.facebook.com/BetterBook-911540932320733/"><i class="icon-facebook-with-circle"></i> Facebook </a></li>
                                <li><a href="https://twitter.com/BetterBookFR"><i class="icon-twitter-with-circle"></i> Twitter </a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="row copyright">
                    <div class="col-md-12">
                        <p class="pull-left">
                            <small class="block">&copy; 2017 BetterBook company. All Rights Reserved.</small>
                        </p>
                    </div>
                </div>

            </div>
        </footer>
    </div>

</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
<!-- Modernizr JS -->
<script src="js/modernizr-2.6.2.min.js"></script>
<!-- Script JS adminPanel-->
<script src="js/AdminPanel.js"></script>
</body>
</html>

