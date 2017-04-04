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
		$res = 0;
		$fini = false;
		$requete = $connexion->prepare("SELECT tauxSuccesG FROM UserProfil order by tauxSuccesG desc");
		$requete->execute();
		
		while($ligne = $requete->fetch()){
			if (!$fini){
				if ($ligne['pseudo'] == $ps) {
					$fini = true;
				} else {
					$res = $res + 1;
			}
		}
		return $res;
		$requete->closeCursor();
	
	} 
	
	function getClassementBenefice($ps){
	
		global $connexion;
		$res = 0;
		$fini = false;
		$requete = $connexion->prepare("SELECT BeneficesG FROM UserProfil order by BeneficesG desc");
		$requete->execute();
		
		while($ligne = $requete->fetch()){
			if (!$fini){
				if ($ligne['pseudo'] == $ps) {
					$fini = true;
				} else {
					$res = $res + 1;
			}
		}
		return $res;
		$requete->closeCursor();
	
	}

?>
