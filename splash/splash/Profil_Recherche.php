<!DOCTYPE HTML>
<?php
/**
 * Created by PhpStorm.
 * User: clemi
 * Date: 27/03/2017
 * Time: 15:13
 */
include ('fonctions/connectBD.php');
    session_start();

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BetterBook &mdash; Just Bet It</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projet PAI pour parier en ligne"/>
    <meta name="keywords" content="paris en ligne, classement paris,statistiques,pronostiques"/>
    <meta name="author" content="BetterBook Corp"/>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>
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
    <!-- Theme icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
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

        <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner"
                style="background-image: url(images/img_4.jpg)">
            <div class="overlay"></div>
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-left">
                        <div class="row row-mt-15em">

                            <div class="col-md-10 mt-text animate-box" data-animate-effect="fadeInUp">
                                <span class="intro-text-small"> </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </header>


        <div class="gtco-section border-bottom">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gtco-container">

                            <form action="#">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <h1>
                                     <?php
                                        require ('fonctions/connectBD.php');
                                        // session_start();
                                        global $connexion;
                                        
                                        $ps=$_GET['pseudo'];

                                        // On récupère tout le contenu de la table matchs
                                        $reponse = $connexion->prepare('select nom, prenom from UserProfil where pseudo="' . $ps.'"' );
                                        $reponse->execute();
                                            // On affiche chaque entrée une à une
                                        $donnees = $reponse->fetch();
                                        if (is_null($donnees['nom']) && is_null($donnees['prenom']) ){
                                             ?>  <STRONG style="margin-left: 211px;">  <?php echo "L'utilisateur demandé n'existe pas ";?> </STRONG> <?php
                                          }
                                        else {
                                        


                                            ?>  <STRONG>  <?php echo $donnees['nom'] .' '. $donnees['prenom'] ;?> </STRONG> <?php

                                        }
                                      
                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>  
                                        </h1>
                                    </div>
                                </div>

                            </form>


                         <div id="gtco-counter" class="gtco-section">
                                <div class="gtco-section animated">

                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                                            <h2>Quelques statistiques</h2>
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php
                                        require ('fonctions/connectBD.php');
                                        require ('fonctions/userGet.php');
                                        // session_start();
                                        global $connexion;
                                        
                                        $ps=$_GET['pseudo'];
                                        // On récupère tout le contenu de la table matchs
                                        $reponse = $connexion->prepare('select tauxSuccesG, BeneficesG, coteMoy, miseMoy, nbCombine  from UserProfil where pseudo="' . $ps.'"' );
                                        $reponse->execute();
                                        $reponse2 = $connexion->prepare('select tauxSuccesG, BeneficesG, coteMoy, miseMoy, nbCombine  from UserProfil where pseudo="' . $ps.'"' );
                                        $reponse2->execute();
                                            // On affiche chaque entrée une à une
                                     

                                        while ($donnees = $reponse->fetch())
                                        {
                                            if ($donnees['nbCombine'] == 0)
                                                {
                                                    echo "Cet utilisateur n'a pas encore réalisé des pronostiques";

                                                } else{?>

                                                    <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                                                        <div class="feature-center">
                                                            <span class="icon">
                                                                <i class="fa fa-futbol-o"></i>
                                                            </span>
                                                            <span class="counter js-counter" data-from="0" data-to=<?php echo $donnees['nbCombine']?> data-speed="5000" data-refresh-interval="5">1</span>
                                                            <span class="counter-label">Paris enregistrés</span>

                                                        </div>
                                                    </div>
                                                     <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                                                        <div class="feature-center">
                                                            <span class="icon">
                                                                <i class="fa fa-money"></i>
                                                            </span>
                                                            <span class="counter js-counter" data-from="0" data-to=<?php echo $donnees['miseMoy']?> data-speed="100" data-refresh-interval="50">1</span>
                                                            <span class="counter-label">Moyenne des mises</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                                                        <div class="feature-center">
                                                            <span class="icon">
                                                                <i class="fa fa-line-chart"></i>
                                                            </span>
                                                            <span class="counter js-counter" data-from="0" data-to=<?php echo $donnees['coteMoy']?> data-speed="100" data-refresh-interval="500">1</span>
                                                            <span class="counter-label">Côte moyenne</span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                                                        <div class="feature-center">
                                                            <span class="icon">
                                                                <i class="fa fa-percent"></i>
                                                            </span>
                                                            <span class="counter js-counter" data-from="0" data-to=<?php echo $donnees['tauxSuccesG']?> data-speed="5000" data-refresh-interval="50">1</span>
                                                            <span class="counter-label">Taux de réussite</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                                                        <div class="feature-center">
                                                            <span class="icon">
                                                                <i class="fa fa-trophy"></i>
                                                            </span>
                                                            <span class="counter js-counter" data-from="0" data-to=<?php echo getClassementTaux($ps);?> data-speed="100" data-refresh-interval="50">1</span>
                                                            <span class="counter-label">Classement BetterBook (% réussite)</span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                                                        <div class="feature-center">
                                                            <span class="icon">
                                                                <i class="fa fa-euro"></i>
                                                            </span>
                                                            <span class="counter js-counter" data-from="0" data-to=<?php echo $donnees['BeneficesG']?> data-speed="5000" data-refresh-interval="50">1</span>
                                                            <span class="counter-label">Montant des gains</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                                                        <div class="feature-center">
                                                            <span class="icon">
                                                                <i class="fa fa-trophy"></i>
                                                            </span>
                                                            <span class="counter js-counter" data-from="0" data-to=<?php echo getClassementBenefice($ps);?> data-speed="100" data-refresh-interval="50">1</span>
                                                            <span class="counter-label">Classement BetterBook (bénéfices)</span>

                                                        </div>
                                                    </div>
                                                    
                                                   
                                                    <?php
                                                }
                                        }   
                                      
                                        $reponse->closeCursor(); // Termine le traitement de la requête

                                        ?>  
                                    </div>
                                </div>
                            </div>

                        </div>
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

</body>
</html>
