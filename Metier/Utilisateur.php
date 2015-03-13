<?php
class Utilisateur
{
	public $id;
	public $nom;
	public $mdp;
	
	public function AfficherNom()
	{
		return 'votre nom est ' . $this->nom;
	}
}