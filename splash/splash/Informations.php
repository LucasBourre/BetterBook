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
                            <li class="btn-cta"> <a href="Profil.php"><span><img id="Utilisateur" src="images/utilisateur.jpg"  width=50px/><?php echo  " ".$_SESSION['pseudo']; ?></span></a></li>
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
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_6.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Comment ça marche ?</span>
							<h1>Des questions ? N'hésitez pas à nous contacter</h1>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	

	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Questions fréquentes</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<ul class="fh5co-faq-list">
						<li class="animate-box">
							<h2>Qu'est ce que BetterBook ?</h2>
							<p>BetterBook est un site de classement de parieurs, permettant aux utilisateurs d'avoir des statistiques
							à propos de leurs paris. Un classement est également établi afin que les membres puissent s'entraider à gagner de l'argent.</p>
						</li>
						<li class="animate-box">
							<h2>D'où provient l'idée d'un tel site ?</h2>
							<p> Au vu du grand nombre de pages facebook proposant des paris et des côtes alléchantes, nous nous sommes
							dit qu'organiser un classement avec les meilleurs parieurs pourrait inciter les gens à s'orienter vers de nouvelles
							personnes à suivre. Ainsi , les personnes ayant une petite communauté peuvent se faire connaître d'avantages en apparaissant
							en haut du classement.</p>
						</li>
						<li class="animate-box">
							<h2>Comment puis-je voir le profil d'un Utilisateur ?</h2>
							<p>Vous pouvez utiliser la fonction " Rechercher " dans le menu du site pour trouver le profil d'un utilisateur.
                                Vous pouvez également cliquer sur l'un des pseudonymes des utilisateurs dans le classement, afin d'accéder directement à son profil.</p>
						</li>
						<li class="animate-box">
							<h2>Comment voir les paris d'un utilisateur?</h2>
							<p>Afin de voir le pari d'un utilisateur, vous devez vous abonner à celui-ci sur sa page profil.
                            Les utilisateurs auquels vous vous êtes abonnés apparaîtront dans votre profil.</p>
						</li>
                        <li class="animate-box">
                            <h2>Comment réaliser un pari?</h2>
                            <p>Pour parier, il suffit de vous connecter sur la page d'Accueil.
                            Rendez vous ensuite sur l'onglet <a href="Pronostiques.php"> Pronostique </a> . Vous pourrez alors choisir le ou les championnats dans
                            lesquels vous souhaitez faire vos paris.
                            Indiquez ensuite la mise que vous souhaitez mettre en fin de page.</p>
                        </li>
                        <li class="animate-box">
                            <h2>J'ai trouvé un bug ! Ou puis-je vous en faire part ?</h2>
                            <p>Vous pouvez nous en faire part sur la page Contactez-Nous, ou encore sur notre page
                                <a href="https://www.facebook.com/BetterBook-911540932320733/"><i class="icon-facebook-with-circle"></i> Facebook </a>  ou
                                ou <a href="https://twitter.com/BetterBookFR"><i class="icon-twitter-with-circle"></i> Twitter </a>  :)</p>
                        </li>
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

	</body>
</html>
