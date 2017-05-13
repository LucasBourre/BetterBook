<?php
 session_start();

					require ('connectBD.php');
					include 'userGet.php';
				
					global $connexion;
 					$pseudo = $_SESSION['pseudo'];
 					$pseudoFollow = $_SESSION['pseudoRecherche'];
					 $id = getID($pseudo);
					 $idFollow =getID($pseudoFollow); 
					
					
					if ($_POST['variable'] == "Follow") {
   						 
						 $insererFollow = $connexion->prepare("insert into Abonnement(ID_Follower,ID_Pronostiqueur) values(:ID_Follower,:ID_Pronostiqueur)");
						 $insererFollow->execute(array(
						 	'ID_Follower' =>  $id,
						 	'ID_Pronostiqueur' =>  $idFollow
						 	));
						 $insererFollow->closeCursor();

					}
					else {

						 $deleteFollow = $connexion->prepare("delete FROM Abonnement WHERE ID_Follower='$id' and ID_Pronostiqueur =' $idFollow'");
						 $deleteFollow->execute();
					
						$deleteFollow->closeCursor();

					}



?>