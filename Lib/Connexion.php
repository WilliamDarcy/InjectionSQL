<?php



/***
 * Vérifie si la requête est un POST
 * @return boolean true si POST
 */
function VerificationMessagePost()
{
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}


/***
 * Teste si l'utilisateur est présent dans la base et s'il a le bon mot de passe
 * @return string le message à afficher
 */
function VerificationConnexion()
{
	if (!VerificationMessagePost())	 return "";
	
	$msg = "Les identifiants sont incorrects";
		
		if (!empty($_POST['nom']) && !empty($_POST['mdp']))
		{	
			$nom = $_POST['nom'];
			$mdp = $_POST['mdp'];
			
			$dbLogin = new LoginDB();
			$resultat = $dbLogin->RechercheUtilisateurSimple($nom, $mdp);
			
			if ($resultat)
			{	
				$msg = "Vous êtes connecté";
			}
		}
		return $msg;
}


