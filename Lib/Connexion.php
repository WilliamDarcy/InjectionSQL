<?php
include_once '/Modele/loginDB.php';


//include(dirname(__FILE__)."/../Modele/loginDB.php");
function Connexion()
{
	$msg = "";
	if (!empty($_POST['nom']) && !empty($_POST['mdp']))
	{
	
		$dbLogin = new LoginDB();
		$nom = $_POST['nom'];
		$mdp = $_POST['mdp'];
		$resultat = $dbLogin->RechercheUtilisateurCrypte($nom, $mdp);
		//$resultat = $dbLogin->RechercheUtilisateurSimple($nom, $mdp);
		if ($resultat)
		{
			if ($resultat['nbUtil'] == 1)
			{
				$msg = "Vous êtes connecté";
			}
			else
			{
				$msg = "Vous n'êtes pas connecté";
			}
		}
		else
		{
			$msg = "Vous n'êtes pas connecté";
		}
		
		
	}
	return $msg;
	
}


