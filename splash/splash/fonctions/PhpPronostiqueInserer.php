<script src="js/JsPronostique.js"></script>
<?php
					 session_start();

					require ('connectBD.php');
					 include 'userGet.php';
				
					global $connexion;

					if ($_SESSION['connexion'] == 1){
					///// inserer dans la base de donnée 
					if (isset($_POST['mise']) AND isset($_POST['cote'])) {
    					 $mise = $_POST['mise'];
    					 $cote = $_POST['cote'];
    					 $cote1 = floatval($cote);
    					 $mise1 = floatval($mise);
    					 $maxid = $connexion->prepare("select max(id) FROM Combine");
						 $maxid->execute();
						 $donnees = $maxid->fetch();
						 $donnees1 = (int)$donnees['max(id)'] + 1 ;
						 
						 $pseudo = $_SESSION['pseudo'];
						 $id = getID($pseudo);


						 $insererCombine = $connexion->prepare("insert into Combine(ID,IDProfile,coteTotale,mise) values(:ID,:IDProfile,:coteTotale,:mise)");
						 $insererCombine->execute(array(
						 	'ID' => $donnees1,
						 	'IDProfile' => $id,
						 	'coteTotale' =>$cote1,
						 	'mise' => $mise1
						 	));

						 $insererCombine->closeCursor();


						 echo $donnees1;

						 $maxIDPU = $connexion->prepare("select max(id) FROM PronoUser");
						 $maxIDPU->execute();
						 $donneesPUF = $maxIDPU->fetch();
						 $donneesPU = (int)$donneesPUF['max(id)'] + 1 ;
						 $data = json_decode(stripslashes($_POST['pari']));
						 foreach($data as $d){
  							$d  = get_object_vars($d);
        					$id = (int)$d['idmatch'];
       						$resultat = $d['resultat'];
        					$cote  = floatval($d['cote']);
        					$insererPU = $connexion->prepare("insert into PronoUser(ID,IDCombine,IDMatch,prono,cote) values(:ID,:IDCombine,:IDMatch,:prono,:cote)");
						 	$insererPU->execute(array(
						 		'ID' => $donneesPU,
						 		'IDCombine' => $donnees1,
						 		'IDMatch' => $id,
						 		'prono' =>$resultat,
						 		'cote' => $cote

						 	));
						 	$donneesPU=$donneesPU+1; 

						 	$insererPU->closeCursor();
						 }
						 
						 
   						}
  
					}
				
					
				?>	


