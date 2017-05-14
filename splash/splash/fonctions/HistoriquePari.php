<?php
 session_start();

	require ('connectBD.php');
	include 'userGet.php';
	include 'HistoriqueGet.php';
	global $connexion;


	$pseudo = $_SESSION['pseudoRecherche'];
	$id = getID($pseudo);


	 $maxid = $connexion->prepare("select max(id) from Combine where IDProfile = '$id'");
						 $maxid->execute();
						 $donneesMax = $maxid->fetch();
						 $donneesMax = (int)$donneesMax['max(id)'];

					


	 $minid = $connexion->prepare("select min(id) from Combine where IDProfile = '$id'");
						 $minid->execute();
						 $donneesMin = $minid->fetch();
						 $donneesMin = (int)$donneesMin['min(id)'];


	$dif =  $donneesMax -  $donneesMin;
	if ($dif > 3) { 
		$dif = 3 ; 
	}

	


	for ($i = 0; $i <= $dif; $i++) {
		$id_combine = $donneesMax - $i;
		
    // On récupère tout le contenu de la table jeux_video
					$reponse = $connexion->prepare("select IDMatch, prono,cote from PronoUser where IDCombine='$id_combine'");
					$reponse->execute();
					
					?>


					<table style="border-collapse: collapse; margin-bottom: 10px;">
						   <tr>
						       <th style="border: 1px solid black;">Championnat</th>
						       <th style="border: 1px solid black;">Match</th>
						       <th style="border: 1px solid black;">Prono</th>
						       <th style="border: 1px solid black;">Cote</th>
						   </tr>

					<?php

						// On affiche chaque entrée une à une
					while ($donnees = $reponse->fetch())
					{
						$equipe1 = getEquipe1($donnees['IDMatch']);
						$equipe2 = getEquipe2($donnees['IDMatch']);
						$championnat = getLigue($donnees['IDMatch']);
						$prono = $donnees['prono'];
						$cote = $donnees['cote'];

						?>
						
						   <tr>
						       <td style="border: 1px solid black;"> <?php echo $championnat ?></td>
						       <td style="border: 1px solid black;"> <?php echo $equipe1 ?> - <?php echo $equipe2 ?> </td>
						       <td style="border: 1px solid black;"> <?php echo $prono ?> </td>
						       <td style="border: 1px solid black;"> <?php echo $cote ?> </td>
						   </tr>
						

						<?php  
								
								}	

								$reponse->closeCursor();
								?>

								</table>	
							<?php 
						}



?>