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
		}				/* Récupère le pseudo d'un utilisateur par son id */		public function getPseudo($id) {			$req_pseudo = $this->bdd->prepare('SELECT pseudo_user FROM utilisateur WHERE id_user=:id');			$req_pseudo->execute(array('id' => $id));			$donnees = $req_pseudo->fetch();			$req_pseudo->closeCursor();			return $donnees;		}

    	/* Change le mot de passe d'un utilisateur */
		public function changePassword($email, $actual_password, $new_password, $new_password_confirm) {
			$req_mdp = $this->bdd->prepare('SELECT mdp_user FROM utilisateur WHERE email_user=:email');
			$req_mdp->execute(array('email' => $email));
			$donnees = $req_mdp->fetch();
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
		}				/* Récupère toutes les informations de tous les utilisateurs */		public function getAllUsers() {			$req_getUsers = $this->bdd->prepare('SELECT id_user, pseudo_user, email_user, DATE_FORMAT(date_inscription_user, \'%d / %m / %Y\') AS date_inscription_user, actif FROM utilisateur ORDER BY id_user DESC');			$req_getUsers->execute();			$donnees = $req_getUsers->fetchAll();      		$req_getUsers->closeCursor();			return $donnees;		}				/* Supprime un utilisateur de la base par son id */		public function deleteUser($id_user) {			$req_deleteUser = $this->bdd->prepare('DELETE FROM utilisateur WHERE id_user = :id');			$req_deleteUser->execute(array('id' => $id_user));      		$req_deleteUser->closeCursor();			return true;		}
	}
