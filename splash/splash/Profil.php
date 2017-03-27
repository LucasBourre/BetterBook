<!DOCTYPE HTML>
<?php
/**
 * Created by PhpStorm.
 * User: clemi
 * Date: 27/03/2017
 * Time: 15:13
 */
include ('connectBD.php');
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
                    <div class="col-sm-4 col-xs-12">
                        <div id="gtco-logo"><a href="Accueil.php">BetterBook <em>.</em></a></div>
                    </div>
                    <div class="col-xs-8 text-right menu-1">
                        <ul>
                            <li><a href="Pronostiques.php">Pronostiques</a></li>
                            <li><a href="Classement.php">Classement</a></li>
                            <li><a href="Informations.php">Comment Ca Marche ?</a></li>
                            <li><a href="Contact.php">Contact</a></li>
                            <li class="btn-cta"><a href="#"><span>Connexion</span></a></li>
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

                            <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                                <span class="intro-text-small"> </span>
                                <h1>Profil</h1>
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
                        <div class="col-md-6 animate-box">
                            <h3>Voici le profil de <?php if (isset($_POST)) {
                                    echo $_POST['username'];
                                } ?>  </h3>
                            <form action="#">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <?php
                                        //On verifie que lidentifiant de lutilisateur est defini
                                        if(isset($_GET['id']))
                                        {
                                        $id = intval($_GET['id']);
                                        //On verifie que lutilisateur existe
                                        $dn = mysql_query('select username, nom, prenom, email from UserProfil where ID="'.$id.'"');
                                        if(mysql_num_rows($dn)>0)
                                        {
                                        $dnn = mysql_fetch_array($dn);
                                        //On affiche les donnees de lutilisateur
                                        ?>
                                    </div>

                                </div>

                            </form>
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
                            <h3>A propos de <span class="footer-logo">BetterBook<span>.<span></span></h3>
                            <p>BetterBook est un site proposant aux utilisateurs d'inscrire leurs paris. Un classement
                                des meilleurs parieurs est réalisé afin que les nouveaux utilisateurs puissent suivrent
                                les pronostiques proposés par les plus connaisseurs.</p>
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