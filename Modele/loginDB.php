<?php

class LoginDB
{
	/***
	 * Initialisation de la connexion à la base de données
	 */
	private function initBase()
	{
		$user = 'root';
		$pass = '';
		$hote = 'localhost';
		$port = '3306';
		$base = 'password';
		$dsn="mysql:$hote;port=$port;dbname=$base";
	
		try
		{
			$dbh = new PDO($dsn, $user, $pass);
	
		}
		catch (PDOException $e)
		{
			$msg ='Erreur de connexion avec la base de données';
			die($msg);
		}
		return $dbh;
	}
	
	
	/***
	 * Recherche si le nom et le mot de passe sont présents dans la base de données
	 * @param string $nom le nom de l'utilisateur
	 * @param string $mdp le mot de passe de l'utilisateur
	 */
	public function RechercheUtilisateurSimple($nom, $mdp)
	{
		
		//Connexion à la base
		$base = $this->initBase();
		
		
		$sql="select count(*) as nbUtil from utilisateur where mdp = md5('$mdp') and nom = '$nom' ";
		
		$resultat = $base->query($sql);
		
		if ($resultat === false)
		{
			return $resultat;
		}
		else
		{		
			$utilisateur = $resultat->fetch();
			return $utilisateur['nbUtil'] > 0;
		}
	
	}
}
