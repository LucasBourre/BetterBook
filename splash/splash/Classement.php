<!DOCTYPE HTML>
<html>
<head>
    <?php
    include('fonctions/connectBD.php');
    session_start();

    ?>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BetterBook &mdash; Just Bet It</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projet PAI pour parier en ligne"/>
    <meta name="keywords" content="paris en ligne, classement paris,statistiques,pronostiques"/>
    <meta name="author" content="BetterBook Corp"/>
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
    <link rel=”stylesheet” href="css/jquery.dataTables.min.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Style CSS Classement -->
    <link rel="stylesheet" href="css/Classement.css" type="text/css">


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
                            if ($_SESSION['connexion'] == 1) { ?>
                                <li class="btn-cta"> <a href="Profil.php"><span><img id="Utilisateur" src="images/utilisateur.jpg" width=50px/><?php echo  " ".$_SESSION['pseudo']; ?></span></a></li>
                            <?php } ?>
                            <li><a href="Pronostiques.php">Pronostiques</a></li>
                            <li><a href="Classement.php">Classement</a></li>
                            <li><a href="Informations.php">Comment Ca Marche ?</a></li>
                            <li><a href="Contact.php">Contact</a></li>
                            <li class="btn-cta"><a href="fonctions/Deconnexion.php"><span>
                                <?php
                                if ($_SESSION['connexion'] == 1) {
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
                style="background-image: url(images/goal.jpg)">
            <div class="overlay"></div>
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-left">


                        <div class="row row-mt-15em">

                            <div class="animate-box" data-animate-effect="fadeInUp">
                                <span class="intro-text-small">La Ligue 1 des parieurs, c'est ici</span>
                                <h1> Classement des pronostiqueurs</h1>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </header>


        <div class="gtco-section border-bottom">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-xs-12  text-left gtco-heading">
                        <p> Le classement des meilleurs pronostiqueurs sur BetterBook - Découvrez qui est le meilleur
                            parieur durant ces dernieres semaines afin que vous puissiez essayer de suivre leurs
                            conseils.
                            <br>Êtes-vous un bon pronostiqueur sportif ? BetterBook vous donne une chance de mettre en
                            oeuvre vos talents gratuitement.
                            <br> Plus vos pronostics seront bons, plus vous monterez dans le classement ! </p>
                            <br>
                            <br> Cliquez sur un pseudo pour afficher son Profil.
                    </div>
                </div>
                <div class="row"  style="overflow-x:auto;">
                    <div class="col-xs-12 text-center gtco-heading">
                            <p>Top Classement</p>
                            <table id="myTable"  cellspacing="0" width="100%" class="cell-border col-xs-12">
                                <thead>
                                <tr>
                                    <th class="col-xs-3"><h1> Pseudo </h1></th>
                                    <th class="col-xs-3"><h1>Benefices</h1></th>
                                    <th class="col-xs-3"><h1>Côte moyenne</h1></th>
                                    <th class="col-xs-2"><h1>% de reussite</h1></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                require('fonctions/connectBD.php');
                                global $connexion;

                                $reponse = $connexion->prepare(
                                    'select pseudo , BeneficesG, tauxSuccesG,coteMoy
                                from UserProfil
                                where tauxSuccesG > 0
                                order by BeneficesG desc'

                                );
                                $reponse->execute();
                                while ($donnees = $reponse->fetch()) {
                                    ?>
                                    <tr>
                                        <td class="pseudoClassement"> <?php echo $donnees['pseudo']; ?></td>
                                        <td><?php echo $donnees['BeneficesG']; ?> €</td>
                                        <td><?php echo $donnees['coteMoy']; ?></td>
                                        <td><?php echo $donnees['tauxSuccesG']; ?> </td>
                                    </tr>
                                    <?php
                                }

                                $reponse->closeCursor(); // Termine le traitement de la requête

                                ?>
                                </tbody>
                            </table>
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
                            <p>BetterBook est un site proposant aux utilisateurs d'inscrire leurs paris. Un
                                classement des meilleurs parieurs est réalisé afin que les nouveaux utilisateurs
                                puissent suivre les pronostiques proposés par les plus connaisseurs.</p>
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
                                <li> Rechercher un Utilisateur :<form id="formulaire_Recherche" action="Profil_Recherche.php">
                                        <input type="text" id="recherche" name="pseudo" placeholder="Recherche">
                                        <input type="submit" id="butonRecherche" value=">>">
                                    </form>
                                </li>
                                <li><a href="tel://0612345678"><i class="icon-phone"></i> 06 12 34 56 78</a>
                                </li>
                                <li><a href="mailto:BetterBookContact@gmail.com"><i class="icon-mail2"></i>
                                        BetterBookContact@gmail.com</a></li>
                                <li><a href="https://www.facebook.com/BetterBook-911540932320733/"><i
                                                class="icon-facebook-with-circle"></i> Facebook </a></li>
                                <li><a href="https://twitter.com/BetterBookFR"><i
                                                class="icon-twitter-with-circle"></i> Twitter </a></li>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
<!-- DataTables.js -->
<script src="js/jquery.dataTables.min.js"></script>
<!-- Pour chercher un profil -->
<script src="js/JsProfil_Recherche.js"></script>




<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable( {
            "oLanguage": {
                "sProcessing":     "Traitement en cours...",
                "sSearch":         "Rechercher&nbsp;:",
                "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo":           "Affichage de l'utilisateur _START_ &agrave; _END_ ",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix":    "",
                "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                "sLoadingRecords": "Chargement en cours...",
                "oPaginate": {
                    "sFirst": "Première page",
                    "sLast": "Dernière page",
                    "sNext": "Page suivante",
                    "sPrevious": "Page précédente"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            }
        } );
    } );
</script>


</body>
</html>

