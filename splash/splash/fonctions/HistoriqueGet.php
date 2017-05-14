<?php
	require ('connectBD.php');
	
		function getIDEquipe1($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT equipe1 FROM Matchs WHERE ID = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['equipe1'];
		}
		return $res;
		$requete->closeCursor();
		
	} 


		function getIDEquipe2($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT equipe2 FROM Matchs WHERE ID = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['equipe2'];
		}
		return $res;
		$requete->closeCursor();

	}
		



	function getEquipe1($ps){
		global $connexion;
		$id_equipe = getIDEquipe1($ps);
		$res = "null";
		$requete = $connexion->prepare('SELECT nom FROM Equipes WHERE ID = "'.$id_equipe.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['nom'];
		}
		return $res;
		$requete->closeCursor();
		
	}

		function getEquipe2($ps){
		global $connexion;
		$id_equipe = getIDEquipe2($ps);
		$res = "null";
		$requete = $connexion->prepare('SELECT nom FROM Equipes WHERE ID = "'.$id_equipe.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['nom'];
		}
		return $res;
		$requete->closeCursor();
		
	} 
	 
		function getIDLigue($ps){
		global $connexion;
		$res = "null";
		$requete = $connexion->prepare('SELECT championnat FROM Matchs WHERE ID = "'.$ps.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['championnat'];
		}
		return $res;
		$requete->closeCursor();
		
		}


	function getLigue($ps){
		global $connexion;
		$id_ligue = getIDLigue($ps);
		$res = "null";
		$requete = $connexion->prepare('SELECT nom FROM Championnats WHERE ID = "'.$id_ligue.'"');
				$requete->execute();
	
		while($ligne = $requete->fetch()){
			$res = $ligne['nom'];
		}
		return $res;
		$requete->closeCursor();
		
	}
?>