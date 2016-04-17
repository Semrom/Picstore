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

    	/* Récupère les informations d'un utilisateur par son pseudo */
		public function getInfos($pseudo) {
			$req_info = $this->bdd->prepare('SELECT id_user, pseudo_user, email_user, avatar_user, actif, DATE_FORMAT(date_inscription_user, \'%d / %m / %Y\') AS date_inscription_user FROM utilisateur WHERE pseudo_user=:pseudo');
			$req_info->execute(array('pseudo' => $pseudo));
			$donnees = $req_info->fetch();
			$req_info->closeCursor();

			return $donnees;
		}				/* Récupère le pseudo d'un utilisateur par son id */		public function getPseudo($id) {			$req_pseudo = $this->bdd->prepare('SELECT pseudo_user FROM utilisateur WHERE id_user=:id');			$req_pseudo->execute(array('id' => $id));			$donnees = $req_pseudo->fetch();			$req_pseudo->closeCursor();			return $donnees;		}				/* Récupère l'avatar d'un utilisateur par son id */		public function getAvatar($id) {			$req_avatar = $this->bdd->prepare('SELECT avatar_user FROM utilisateur WHERE id_user=:id');			$req_avatar->execute(array('id' => $id));			$donnees = $req_avatar->fetch();			$req_avatar->closeCursor();			return $donnees;		}
		/* Vérifie si le mot de passe actuel est correct */		public function verifierMdp($id_user, $mdp) {			$req_verif_mdp = $this->bdd->prepare('SELECT * FROM utilisateur WHERE id_user = :id AND mdp_user = :mdp');			$req_verif_mdp->execute(array('id' => $id_user, 'mdp' => $mdp));			$rep = $req_verif_mdp->fetch();			$req_verif_mdp->closeCursor();						if (empty($rep)) {				return false;			} else {				return true;			}		}
    	/* Modifie le mot de passe d'un utilisateur */
		public function modifierMdp($id_user, $mdp) {

			$req_new_mdp = $this->bdd->prepare('UPDATE utilisateur SET mdp_user = :password WHERE id_user = :id');
			$req_new_mdp->execute(array('password' => $mdp, 'id' => $id_user));
			$req_new_mdp->closeCursor();

			return true;
		}				/* Récupère toutes les informations de tous les utilisateurs */		public function getAllUsers() {			$req_getUsers = $this->bdd->prepare('SELECT id_user, pseudo_user, email_user, DATE_FORMAT(date_inscription_user, \'%d / %m / %Y\') AS date_inscription_user, actif FROM utilisateur ORDER BY id_user DESC');			$req_getUsers->execute();			$donnees = $req_getUsers->fetchAll();      		$req_getUsers->closeCursor();			return $donnees;		}				/* Supprime un utilisateur de la base par son id */		public function deleteUser($id_user) {			$req_deleteUser = $this->bdd->prepare('DELETE FROM utilisateur WHERE id_user = :id');			$req_deleteUser->execute(array('id' => $id_user));      		$req_deleteUser->closeCursor();			return true;		}				public function ajouterAvatar($lien, $id_user) {					$req_select = $this->bdd->prepare('SELECT avatar_user FROM utilisateur WHERE id_user = :id');			$req_select->execute(array('id' => $id_user));			$ancien = $req_select->fetch();			$req_select->closeCursor();						if ($ancien['avatar_user'] != "defaut.png") {								unlink('img/avatar/' . $ancien['avatar_user']);			}				  	$req_avatar = $this->bdd->prepare('UPDATE utilisateur SET avatar_user = :lien WHERE id_user = :id');			$req_avatar->execute(array('lien' => $lien, 'id' => $id_user));			$req_avatar->closeCursor();						return true;		}
	}
