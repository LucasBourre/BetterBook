<script src="js/JsPronostique.js"></script>
<?php


					require ('connectBD.php');
				
					global $connexion;

					if (isset($_POST['voteid'])) {
    					 $x = $_POST['voteid'];
   						}else{
   						echo 'no variable received';
   						}
   						$int = (int)$x;
					
					// On récupère tout le contenu de la table jeux_video
					$reponse = $connexion->prepare("SELECT m.id, e1.nom AS m1, e2.nom AS m2, m.cote1, m.cote2, m.coteN FROM Matchs m JOIN Equipes e1 ON m.equipe1 = e1.id JOIN Equipes e2 ON m.equipe2 = e2.id WHERE m.championnat ='$int' AND  `date` >= DATE( SYSDATE( ) ) AND  `heureDebut` > TIME( SYSDATE( ) )");

				
					$reponse->execute();
					
						// On affiche chaque entrée une à une
					while ($donnees = $reponse->fetch())
					{
						if ($donnees['m1'] === null) {
    					echo 'Pas de matchs disponible pour cette ligue en ce moment' ;
    					exit;
					}

					?>
					    <p value =<?php echo $donnees['id']; ?>  >
					    	 <span class="equipe" value="1"> <?php echo $donnees['m1']; ?>   
					    	 	<button class="bouton" value=<?php echo $donnees['cote1']; ?>> <?php echo $donnees['cote1']; ?> </button>
					    	 </span>
					    	 
					    	 <span class ="equipe" value="N"> match null  
								<button class="boutonX" value=<?php echo $donnees['coteN']; ?>> <?php echo $donnees['coteN']; ?></button>
							</span>
							
							<span class="equipe" value="2"> <?php echo $donnees['m2']; ?> 
								<button class= "bouton2" value=<?php echo $donnees['cote2']; ?>> <?php echo $donnees['cote2']; ?></button>
							</span>

							
							
					   </p>
					<?php
					}

					$reponse->closeCursor(); // Termine le traitement de la requête
  
					
					// On récupère tout le contenu de la table jeux_video
				?>	


