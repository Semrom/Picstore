<?php
/**
* @author Romain Semler
*
* @file Log.php
*
* @date 25/02/2016
*
* @brief Classe gérant la connexion et l'inscription.
*/
	class Log {

		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}

		// Récupère les informations pour la connexion selon le pseudo et le mot de passe de l'utilisateur.
		public function connexion($pseudo, $password) {
			$req_connect = $this->bdd->prepare('SELECT id_user FROM utilisateur WHERE pseudo_user=:pseudo AND mdp_user=:motDePasse');
			$req_connect->execute(array('pseudo' => $pseudo, 'motDePasse' => $password));
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

		// Vérifie si le pseudo est présent au sein de la base.
    	public function pseudoExist($pseudo) {
			$req = $this->bdd->prepare("SELECT id_user FROM utilisateur WHERE pseudo_user=:pseudo");
			$req->execute(array('pseudo' => $pseudo));
			$exist = $req->fetch();
			$req->closeCursor();

			if ($exist)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		// Vérifie si le mail est présent au sein de la base.
    	public function mailExist($email) {
			$req = $this->bdd->prepare("SELECT id_user FROM utilisateur WHERE email_user=:email");
			$req->execute(array('email' => $email));
			$exist = $req->fetch();
			$req->closeCursor();

			if ($exist)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		// Insère les données dans la base lors de l'inscription d'un utilisateur.
    	public function inscription($pseudo, $email, $password) {    	$lien = "img/avatar/defaut.png";
      	$req_insert = $this->bdd->prepare('INSERT INTO utilisateur(pseudo_user, email_user, mdp_user, avatar_user, date_inscription_user, actif) VALUES(:pseudo, :email, :mdp, :lien, NOW(), 0)');
			$req_insert->execute(array('pseudo' => $pseudo, 'email' => $email, 'mdp' => $password, 'lien' => $lien));
			$req_insert->closeCursor();
			return true;
		}

		// Vérifie l'état du compte en récupérant la clé d'activation et l'état "actif" du compte.
    	public function etatCompte($pseudo) {
			$req_etat = $this->bdd->prepare('SELECT cle, actif FROM utilisateur WHERE pseudo_user=:pseudo');
			$req_etat->execute(array('pseudo' => $pseudo));
			$donnees = $req_etat->fetch();
			$req_etat->closeCursor();
			return $donnees;
    	}

		// Active le compte en passant l'état "actif" du compte à 1.
    	public function activerCompte($pseudo) {
	      $actif = $this->bdd->prepare("UPDATE utilisateur SET actif = 1 WHERE pseudo_user=:pseudo");
	      $actif->execute(array('pseudo' => $pseudo));
	      $actif->closeCursor();
	    }
	}
