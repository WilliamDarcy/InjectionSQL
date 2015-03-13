<?php
include_once 'Metier/Utilisateur.php';
class LoginDB
{
	private function initBase()
	{
		$user = 'root';
		$pass = '';
		$hote = 'localhost';
		$port = '3306';
		$base = 'loginSecurite';
		$dsn="mysql:$hote;port=$port;dbname=$base";
	
		try
		{
			$dbh = new PDO($dsn, $user, $pass);
	
		}
		catch (PDOException $e)
		{
			$msg ='Erreur de connexion avec la base de donnée';
			die($msg);
		}
		return $dbh;
	}
	
	
	
	public function RechercheUtilisateur($nom, $mdp)
	{
		//Connexion à la base
		$base = $this->initBase();
		
		
		//SELECT avec FETCHALL()
		$sql="select id from login where nom = :nom and mdp = :mdp";
		$stmt = $base->prepare($sql);

		$stmt->BindValue(':nom', $nom);
		$stmt->BindValue(':mdp', $mdp);
		
		$retour = $stmt->execute();
		
		
		if ($retour)
		{		
			$retour = $stmt->fetchAll();
		}	
	
		
		//Libération de la ressource
		$base = NULL;
		
		return $retour;
		
	}
		
	public function RechercheUtilisateurCrypte($nom, $mdp)
	{
		//Connexion à la base
		$base = $this->initBase();
	
		
		//SELECT avec FETCHALL()
		$sql="select count(*) as nbUtil from login where nom = :nom and mdp = md5(:mdp)";
		$stmt = $base->prepare($sql);
	
		$stmt->BindValue(':nom', $nom);
		$stmt->BindValue(':mdp', $mdp);
	
		$retour = $stmt->execute();
	
	
		if ($retour)
		{
			$retour = $stmt->fetch();
		}
	
	
		//Libération de la ressource
		$base = NULL;
	
		return $retour;
	
	}
	
	public function RechercheUtilisateurSimple($nom, $mdp)
	{
		
		//Connexion à la base
		$base = $this->initBase();
	
	
		//SELECT avec FETCHALL()
		$sql="select id from login where nom = '$nom' and mdp = '$mdp'";
		
		//$sql="select id from login where nom = '' or 1 = 1 and mdp = '$mdp'";
		$resultat = $base->query($sql);
	
		
		if ($resultat === false)
		{
			$retour = false;
		}
		else
		{
			$retour = $resultat->fetchAll();
	
		}
	
		//Libération de la ressource
		$base = NULL;
	
		return $retour;
	
	}
	
	public function RechercheTousUtilisateurObj()
	{
		//Connexion à la base
		$base = $this->initBase();
	
	
		//SELECT avec FETCHALL()
		$sql="select id, nom, mdp from login";
	
		$resultat = $base->query($sql);
	
		
		if ($resultat === false)
		{
			$retour = false;
		}
		else
		{
			$retour = $resultat->fetchAll(PDO::FETCH_OBJ);
	
		}
	
		//Libération de la ressource
		$base = NULL;
	
		return $retour;
	
	}
	
	public function RechercheTousUtilisateurClasse()
	{
		//Connexion à la base
		$base = $this->initBase();
	
	
		//SELECT avec FETCHALL()
		$sql="select id, nom, mdp from login";
	
		$resultat = $base->query($sql);
	
	
		if ($resultat === false)
		{
			$retour = false;
		}
		else
		{
			$retour = $resultat->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
	
		}
	
		//Libération de la ressource
		$base = NULL;
	
		return $retour;
	
	}
	
	
}
