<!DOCTYPE HTML>
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


	<!-- Pronostic.css -->
	<link rel="stylesheet" href="css/Pronostic.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
	<body>
	
	<script type="text/javascript">
		var matche = "1";

		/** Fonction basculant la visibilité d'un élément dom
		 * @parameter anId string l'identificateur de la cible à montrer, cacher
		 */
		function toggle(anId,game)
		{
			node = document.getElementById(anId);
			if (node.style.visibility=="hidden")
			{
				// Contenu caché, le montrer
				node.style.visibility = "visible";
				node.style.height = "auto";
				matche=game;								// Optionnel rétablir la hauteur
			}
			else
			{
				// Contenu visible, le cacher
				node.style.visibility = "hidden";
				node.style.height = "0";
				matche="1";			// Optionnel libérer l'espace
			}

			var x = game;
			alert(x);
			$.ajax({
                    type: "POST",
                    url: 'Pronostiques.php',
                    data: {voteid: x },
                    success: function(data)
                    {
                       alert("success! X:" + data);
                    }

        });
		}
/**
		function myFunction(id) {
			var node = document.getElementById(id);
			if (node.style.background =="rgb(159, 218, 144)"){
				node.style.background = "rgb(233, 233, 233)";
				document.getElementById("cotetotal").innerHTML=parseFloat(document.getElementById("cotetotal").innerHTML) / parseFloat(node.value);

			}
			else {
				node.style.background = "rgb(159, 218, 144)";
				var cote = parseFloat(document.getElementById("cotetotal").innerHTML);
				if(cote == 0)
				{ document.getElementById("cotetotal").innerHTML=parseFloat(node.value);}
				else {
					document.getElementById("cotetotal").innerHTML = parseFloat(document.getElementById("cotetotal").innerHTML) * parseFloat(node.value);
				}
			}
		}


			$(document).ready(function() {
			  $(".bouton,.boutonX,.bouton2").hover(function() {
				  $(this).css("background-color", "rgb(159, 218, 144)");
   					 }, function(){
    			$(this).css("background-color", "rgb(233, 233, 233)");

					});    
			});    
			
*/

		$(document).ready(function() {
		$("button").on('click', function(){
			if($(this).css("background-color") == "rgb(159,218,144)"){  // rgb(159,218,144) = vert 
				$(this).css("background-color","rgb(233, 233, 233)");   // rgb(233,233,233) = gris
				var cote = parseFloat ($( this ).val());
			 	$("#cotetotal").html(parseFloat($("#cotetotal").html()) / cote);
			 }
			 else {
			 	 $(this).css("background-color","rgb(159, 218, 144)");
			 	var cote = parseFloat ($( this ).val());
			 	$("#cotetotal").html(parseFloat($("#cotetotal").html()) * cote);
			 }
			
				});
		});



	


	</script>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">
		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">

				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="Accueil.php">BetterBook <em>.</em></a></div>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							<li><a href="Pronostiques.php">Pronostiques</a></li>
							<li><a href="Classement.php">Classement</a></li>
							<li><a href="Informations.php">Comment Ca Marche ?</a></li>
							<li><a href="Contact.php">Contact</a></li>
							<li class="btn-cta"><a href="Accueil.php"><span>Connexion</span></a></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_2.jpg)">
		<div class="overlay">
			<img id="pronostic" src="images/pronostic.png" />
		</div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">

						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">See Our</span>
							<h1>Pronostiques</h1>
						</div>
						
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
	
	
	<div id="gtco-features" class="border-bottom">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Pronostiques </h2>
					<p>Ouvrez le champs des possibilités! Les paris n'auront plus de secret pour vous!</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn"> 
						<span class="icon">
							<a href="#match" onclick="toggle('foo','1')" ><img id= "ligue1" src="images/ligue1.png"/ > </a>
							          													   <!-- liiiigggguuuueeee 1   -->
						</span>
						<h3>Ligue 1</h3>
						<p>Le championnat de France de football professionnel masculin. </p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<img id="liga"  src="images/Liga-bbva.jpg" />     <!-- liiiiggggaaaaaaaaaaaaaaaaaa   -->
						</span>
						<h3>Liga </h3>
						<p>Le championnat d'Espagne de football.</p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<img id="Premier-League" src="images/Premier-League-Logo-shield.png" />   <!--  Premier-Leagueeeeeeeeeeeeeeeeeee   -->
						</span>
						<h3>Premier League</h3>
						<p>Le Championnat d'Angleterre de football. </p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<img id="calcio" src="images/calcio.png" />     <!--  calciooooooooooooooooooooo   -->
						</span>
						<h3>Calcio</h3>
						<p>Le championnat d'Italie de football. </p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<img id="Bundesliga" src="images/Bundesliga-logo-2010.png" />     <!--  bundesliiiiiiiiiiiiiiiiiiigggaaaaaaaaaaaaa   -->
						</span>
						<h3>Bundesliga</h3>
						<p>Le Championnat d'Allemagne de football. </p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<img id="Ligue_des_Champions" src="images/UEFA_Ligue_des_Champions.svg.png" />     <!--  ligue des championnnnnnnnnnnnnnnnssss   -->
						</span>
						<h3>Ligue des Champions</h3>
						<p>La Ligue des champions de l'UEFA. </p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<img id="Europa_League" src="images/UEFA_Europa_League_logo.png" />     <!--  ligue des championnnnnnnnnnnnnnnnssss   -->
						</span>
						<h3>Europa League</h3>
						<p>La Ligue Europa de l'UEFA. </p>
					</div>
				</div>

					<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<img id="Matchs_Internationaux" src="images/international-friendly-match-logo.jpg" />     <!--  ligue des championnnnnnnnnnnnnnnnssss   -->
						</span>
						<h3>Matchs Internationaux</h3>
						<p>Matchs_Internationaux entre des selections nationales</p>
					</div>
				</div>

			</div>
		</div>
	</div>

		<div id ="foo">
		<div id="gtco-features" class="border-bottom">
			<h2 id="match">Les matchs</h2>
				<?php


					require ('fonctions/connectBD.php');
				
					global $connexion;

					if (isset($_POST['voteid'])) {
    					 $x = $_POST['voteid'];
     					echo $x;
   						echo "ok";
   						}else{
   						echo 'no variable received';
   						}
					
					// On récupère tout le contenu de la table jeux_video
					$reponse = $connexion->prepare('select e1.nom as m1 ,e2.nom as m2,m.cote1,m.cote2,m.coteN from Matchs m join Equipes e1 on m.equipe1 = e1.id 
													join Equipes e2 on m.equipe2 = e2.id');
					$reponse->execute();
						// On affiche chaque entrée une à une
					while ($donnees = $reponse->fetch())
					{
					?>
					    <p>
					    	 <strong> <?php echo $donnees['m1']; ?>  vs </strong> 	 <strong> <?php echo $donnees['m2']; ?> </strong>
					    	 <button class="bouton" value=<?php echo $donnees['cote1']; ?>> <?php echo $donnees['cote1']; ?> </button>
							<button class="boutonX" value=<?php echo $donnees['coteN']; ?>> <?php echo $donnees['coteN']; ?></button>
							<button class= "bouton2" value=<?php echo $donnees['cote2']; ?>> <?php echo $donnees['cote2']; ?></button>
							
							
					   </p>
					<?php
					}

					$reponse->closeCursor(); // Termine le traitement de la requête

					?>	

			

		</div>
			<div id="cote"> <strong>Cote total</strong> </div>
			<div id="cotetotal">1</div>
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

