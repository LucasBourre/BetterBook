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
                            <li class="btn-cta"> <a href="Profil.php"><span><img id="Utilisateur" src="images/utilisateur.jpg" /><?php echo  " ".$_SESSION['pseudo']; ?></span></a></li>
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
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/Ronaldo.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Bienvenue sur BetterBook</span>
							<h1>Le classement N°1 des parieurs en France</h1>
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<ul class="tab-menu">
									<?php 
									session_start();
									if ($_SESSION['connexion'] == 1){
										echo '<li class="active gto-first"><a href="#">'.$_SESSION['pseudo'].'</a></li>';
									} else {
										echo '<li class="active gtco-first"><a href="#" data-tab="login">Connexion</a></li>
											<li class="gtco-second"><a href="#" data-tab="signup">Inscription</a></li>';
									}
									?>
									</ul>
									<div class="tab-content">
										<?php
												
												if ($_SESSION['erreur_co'])
													echo "<font color='red'>".$_SESSION['msg_erreur']."</font>";
											?>
										<?php
											require ('fonctions/userGet.php');
											if ($_SESSION['connexion'] == 1){
												$gains = getBenefices($_SESSION['pseudo']);
												echo 'Vos gains actuels: '.$gains.'€';
												echo '<br>A REMPLIR !';
											} else {
												echo '
										<div class="tab-content-inner" data-content="signup">
											<form method="post" action="fonctions/gestion_inscription.php">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">Pseudo</label>
														<input type="text" class="form-control" name="username">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">Mot de Passe</label>
														<input type="password" class="form-control" name="password">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password2">Confirmez Mot de Passe</label>
														<input type="password" class="form-control" name="password2">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="lastname">Nom</label>
														<input type="text" class="form-control" name="lastname">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="firstname">Prénom</label>
														<input type="text" class="form-control" name="firstname">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" name="BT-inscription" value="Inscription">
													</div>
												</div>
											</form>		
										</div>
											
										<div class="tab-content-inner active" data-content="login">
											<form method="post" action="fonctions/Connexion.php">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="usernamelogin">Pseudo</label>
														<input type="text" class="form-control" name="pseudo" id="usernamelogin">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="passwordlogin">Mot de Passe</label>
														<input type="password" class="form-control" name="mdp" id="passwordlogin">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" name ="BT-connexion" value="Connexion">
														<!--<input type="submit" class="btn btn-secondary" name="BT-inscription" value="Inscription" >-->	
														<!--<a href="#"><span>Connexion</span></a>-->	
														
													</div>
												</div>
											</form>	
										</div>';
											}
										?>

									</div>
								</div>
							</div>
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
	
	<?php
		$_SESSION['erreur_co'] = false;
		$_SESSION['msg_erreur'] = "";
	?>
	
	<div class="gtco-section border-bottom">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<p>____________________________________________________________________________________</p>
					<h2>Affiche de la semaine</h2>
					<img src="images/edf.jpg" alt="Image" class="imageaffsemaine">
					<p>Ce week-end, l'Equipe de France se déplace au Luxembourg pour la 5ème journée
						du groupe A afin d'accéder à la phase finale de la coupe du monde.
						Avec de nouvelles recrues tels que Mbappé et Tolisso, l'équipe de France pourra t-elle
						s'imposer sur les terrains au Luxembourg ?</p>
                    <a href="Pronostiques.php" id="affsemainelien"> Voir les côtes --></a>
					<p>____________________________________________________________________________________</p>
				</div>
			</div>


	
	<div id="gtco-features" class="border-bottom">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Article de la semaine</h2>
					<p>Article de la semaine qui a retenu notre attention ?</p>
				</div>
			</div>

		</div>
	</div>

	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Chiffres clés</h2>
					<p> Informations relatives au site :</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Nombre de paris enregistrés</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-face-smile"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Nombre d'utilisateurs</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-money"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="100.5" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Cote maximal validée</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-time"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="212023" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Nombre d'heures passées à coder ce site</span>

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