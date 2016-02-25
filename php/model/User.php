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
		public function getInfos($email) {
			$req_info = $this->bdd->prepare('SELECT peudo_user, date_inscription_user FROM utilisateur WHERE email_user=:email');
			$req_info->execute(array('email' => $email));
			$donnees = $req_info->fetch();
			$req_info->closeCursor();

			// Conversion de la date au format français.
			$format = 'Y-m-d H:i:s';
			$date = DateTime::createFromFormat($format, $donnees['date_inscription']);
			$dateFr = $date->format('d / m / Y');

			$donnees['date_inscription_user'] = $dateFr;

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
