<?php 
/**
* @author Romain Semler
*
* @file LogAdmin.php
*
* @date 25/02/2016
*
* @brief Classe gérant la connexion à l'interface de l'administration.
*/

	class LogAdmin {

		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}

		/* Récupère les informations lors de la connexion */
		public function connexion($email, $password) {
			$req_connect = $this->bdd->prepare('SELECT id_admin FROM administrateur WHERE email_admin=:email AND mdp_admin=:motDePasse');
			$req_connect->execute(array('email' => $email, 'motDePasse' => $password));
			$exist = $req_connect->fetch();
      		$req_connect->closeCursor();

			if ($exist)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Récupère le prénom d'un membre par son email */
    	public function getPrenom($email) {
      		$req_connect = $this->bdd->prepare('SELECT prenom_admin FROM administrateur WHERE email_admin=:email');
			$req_connect->execute(array('email' => $email));
			$prenom = $req_connect->fetch();
      		$req_connect->closeCursor();
      		return $prenom;
    	}
	}
