<?php

include_once 'Lib/Connexion.php';


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"> 
 <title>Formulaire PHP</title>
</head>
<body>
	<form method="post" action="index.php">
	<table>
	<tr>
		<td>Nom</td><td> <input type="text" name="nom" ></td>
	</tr>
	<tr>
		<td>Mot de passe</td><td><input type="password" name="mdp" ></td>
	</tr>
	<tr>
		<td></td><td><input type="submit" value="OK" ></td>
    </tr>
	<tr>
		<td><?php echo Connexion(); ?></td>
    </tr>
	</table>
	</form>
<?php 	
	$dbLogin = new LoginDB();
	/*$resultat = $dbLogin->RechercheTousUtilisateurObj();
	if ($resultat)
	{
		foreach($resultat as $utilisateur)
		{	
  			echo $utilisateur->nom;
  			echo '<br>';
		}
	}*/
	/*
	$resultat = $dbLogin->RechercheTousUtilisateurClasse();
	if ($resultat)
	{
		foreach($resultat as $utilisateur)
		{
			echo $utilisateur->AfficherNom();
			echo '<br>';
		}
	}
	*/
?>
</body>
</html>


<?php



