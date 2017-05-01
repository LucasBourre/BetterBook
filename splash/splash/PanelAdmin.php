<!DOCTYPE HTML>
<html>
<head>
    <!-- fonctions php -->
    <?php
    include ('fonctions/connectBD.php');
        session_start();

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
							
                        <li onclick="dropdown('AddUser');">Ajouter un Utilisateur</li>
							<div id="AddUser"> Ici on ajoute un utilisateur</div>
							
                        <li onclick="dropdown('ModUser');">Modifier informations d'un Utilisateur</li>
							<div id="ModUser"> Ici , on modifie un utilisateur</div>
							
                        <li onclick="dropdown('DelUser');">Supprimer un Utilisateur</li>
							<div id="DelUser"> Ici , on supprime un utilisateur</div>
							
                        <li onclick="dropdown('AddAdmin');">  Ajouter un Administrateur</li>
							<div id="AddAdmin"> Ici , on ajoute un admin</div>
							
                        <li onclick="dropdown('DelAdmin');">  Supprimer un Administrateur</li>
							<div id="DelAdmin"> Ici , on supprime un admin</div>
							
                        </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 text-left gtco-heading">
                        <p> Gestion des Matchs : </p> <br>
                         <ul>
							 
                         <li onclick="dropdown('AddMatch');">Ajouter un Match</li>
							<div id="AddMatch">
                                <form action="fonctions/AddMatch.php" method="post">
                                    <p> Championnat (1 : Ligue 1 / 2 : PL / 3 : Bundes / 4 : Liga / 5 : Serie A ) : <input type="text" name="Championnat" /></p>
                                    <p>Equipe Domicile : <input type="text" name="Eq1" /></p>
                                    <p>Equipe Exterieur : <input type="text" name="Eq2" /></p>
                                    <p>Cote Domicile : <input type="text" name="Cote1" /></p>
                                    <p>Cote Nul : <input type="text" name="CoteN" /></p>
                                    <p>Cote Exterieur : <input type="text" name="Cote2" /></p>
                                    <p>Date Match ( de type YEAR-MO-JR ): <input type="text" name="Date" /></p>
                                    <p>Heure Debut ( de type hh:mm:ss) : <input type="text" name="HeureDebut" /></p>
                                    <p><input type="submit" name="btn-ajouterMatch" value="Ajouter"></p>
                                </form>
                            </div>
							
                         <li onclick="dropdown('ModMatch');">Mettre le score d'un match</li>
							<div id="ModMatch"> Ici on met a jour un match </div>
							
                         <li onclick="dropdown('DelMatch');">Supprimer un match ( match annulé ? )</li>
							<div id="DelMatch"> Ici on supprime un match</div>
							
							
                         </ul>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 text-left gtco-heading">
                        <p> Gestion des Paris : </p> <br>
                         <ul>
							 
                        <li onclick="dropdown('ShowParis');">Voir les paris de ... : </li>
                        <div id="ShowParis"> Ici on montre les paris de machin</div>
                        
                        <li onclick="dropdown('AddParis');">Ajouter un pari pour l'utilisateur ... : </li>
                        <div id="AddParis"> Ici ajoute un paris pour le compte de machin</div>
                        
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
                            <p>BetterBook est un site proposant aux utilisateurs d'inscrire leurs paris. Un classement des meilleurs parieurs est réalisé afin que les nouveaux utilisateurs puissent suivrent les pronostiques proposés par les plus connaisseurs.</p>
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

