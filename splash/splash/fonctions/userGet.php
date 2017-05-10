<?php

//require ('fonctions/connectBD.php');
	require ('connectBD.php');
	
	
	function yep(){
		return "yep";
	}
	
	function getNom($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT * FROM UserProfil WHERE pseudo = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['nom'];
		}
		return $res;
		$requete->closeCursor();
		
	} 
	
	function getPrenom($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT * FROM UserProfil WHERE pseudo = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['prenom'];
		}
		return $res;
		$requete->closeCursor();
		
	} 
	
	function getTauxSucces($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT * FROM UserProfil WHERE pseudo = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['tauxSuccesG'];
		}
		return $res;
		$requete->closeCursor();
		
	}
	
	function getBenefices($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT * FROM UserProfil WHERE pseudo = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['BeneficesG'];
		}
		return $res;
		$requete->closeCursor();
		
	}  
	
	function getCoteMoy($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT * FROM UserProfil WHERE pseudo = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['coteMoy'];
		}
		return $res;
		$requete->closeCursor();
		
	}
	
	function getMiseMoy($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT * FROM UserProfil WHERE pseudo = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['miseMoy'];
		}
		return $res;
		$requete->closeCursor();
		
	}   
	
	function getNbCombine($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT * FROM UserProfil WHERE pseudo = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['nbCombine'];
		}
		return $res;
		$requete->closeCursor();
		
	}   
	
	function getClassementTaux($ps){
	
		global $connexion;
		$res = 1;
		$fini = false;
		$requete = $connexion->prepare('SELECT pseudo, tauxSuccesG FROM UserProfil order by tauxSuccesG desc');
		$requete->execute();
		
		while($ligne = $requete->fetch()){
			if (!$fini){
				if ($ligne['pseudo'] == $ps) {
					$fini = true;
				} else {
					$res = $res + 1;
				}
			}
		}
		return $res;
		$requete->closeCursor();
	
	} 
	
	function getClassementBenefice($ps){
	
		global $connexion;
		$res = 1;
		$fini = false;
		$requete = $connexion->prepare("SELECT pseudo, BeneficesG FROM UserProfil order by BeneficesG desc");
		$requete->execute();
		
		while($ligne = $requete->fetch()){
			if (!$fini){
				if ($ligne['pseudo'] == $ps) {
					$fini = true;
				} else {
					$res = $res + 1;
				}
			}
		}
		return $res;
		$requete->closeCursor();
	
	}
	
	/*retourne des ligne de tableau contenant les pseudo des personnes suivies par l'utilisateur en paramètre*/
	function getFollowed($ps){
		global $connexion;
		$requete = $connexion->prepare(
		'SELECT pseudo
        FROM UserProfil
        WHERE ID IN (SELECT ID_Pronostiqueur
            		FROM Abonnement
                    WHERE ID_Follower = (SELECT ID
                                         FROM UserProfil
                                         WHERE pseudo = "'.$ps.'"))');
		$requete->execute();
		
		while($ligne = $requete->fetch()){
			?>
			<tr>
                <td class="pseudoAbonnement"> <?php echo $ligne['pseudo'];?></td>                                          
            </tr>
            <?php
		}
	}
	/*retourne des ligne de tableau contenant les pseudo des personnes qui suivent l'utilisateur en paramètre*/
	function getFollowers($ps){
		global $connexion;
		$requete = $connexion->prepare(
		'SELECT pseudo
		FROM UserProfil
		WHERE ID IN (SELECT ID_Follower
					FROM Abonnement
					WHERE ID_Pronostiqueur = (SELECT ID
										FROM UserProfil
										WHERE pseudo = "'.$ps.'"))');
		$requete->execute();
		while($ligne = $requete->fetch()){
			?><tr>
                <td class="pseudoAbonnés"> <?php echo $ligne['pseudo'];?></td>
                                                                    
              </tr>
            <?php
		}
	}
	
	function getCountFollowers($ps){
		global $connexion;
		$requete = $connexion->prepare(
		'SELECT COUNT(ID_Follower) as nbFollower
		FROM Abonnement
		WHERE ID_Pronostiqueur = (SELECT ID
								FROM UserProfil
								WHERE pseudo = "'.$ps.'")');
		$requete->execute();
		$donnees = $requete->fetch();
		return $donnees['nbFollower'];
	}
	
	function getCountFollowed($ps){
		global $connexion;
		$requete = $connexion->prepare(
		'SELECT COUNT(ID_Pronostiqueur) as nbFollowed
		FROM Abonnement
		WHERE ID_Follower = (SELECT ID
								FROM UserProfil
								WHERE pseudo = "'.$ps.'")');
		$requete->execute();
		$donnees = $requete->fetch();
		return $donnees['nbFollowed'];
	}

?>
