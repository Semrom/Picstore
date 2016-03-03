<?php
/**
* @author Romain Semler
*
* @file User.php
*
* @date 25/02/2016
*
* @brief Classe en charge des informations de l'utilisateur.
*/

class User {

		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}

    	// Récupère les informations d'un l'utilisateur par son email
		public function getInfos($pseudo) {
			$req_info = $this->bdd->prepare('SELECT pseudo_user, email_user, actif, DATE_FORMAT(date_inscription_user, \'%d / %m / %Y\') FROM utilisateur WHERE pseudo_user=:pseudo');
			$req_info->execute(array('pseudo' => $pseudo));
			$donnees = $req_info->fetch();
			$req_info->closeCursor();

			return $donnees;
		}

    	// Change le mot de passe d'un utilisateur
		public function changePassword($email, $actual_password, $new_password, $new_password_confirm) {
			$req_mdp = $this->bdd->prepare('SELECT mdp_user FROM utilisateur WHERE email_user=:email');
			$req_mdp->execute(array('email' => $email));
			$mdp = $req_mdp->fetch();
			$req_mdp->closeCursor();

			if ($actual_password == $password['password'])
			{
				$req_new_mdp = $this->bdd->prepare('UPDATE utilisateur SET mdp_user=:password WHERE email_user=:email');
				$req_new_mdp->execute(array('password' => $new_password, 'email' => $email));
				$req_new_mdp->closeCursor();

				return "OK";
			}
			else
			{
				return "error_actual_mdp";
			}
		}
	}
