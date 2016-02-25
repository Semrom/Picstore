<?php
	class Log {

		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}

		public function connexion($email, $password) {
			$req_connect = $this->bdd->prepare('SELECT id_user FROM utilisateur WHERE email_user=:email AND mdp_user=:motDePasse');
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

    public function inscription($pseudo, $email, $password, $avatar) {
      $req_insert = $this->bdd->prepare('INSERT INTO utilisateur(pseudo_user, email_user, mdp_user, avatar_user, date_inscription, actif) VALUES(:pseudo, :email, :mdp, :avatar, NOW(), 0)');
			$req_insert->execute(array('pseudo' => $pseudo, 'email' => $email, 'mdp' => $password, 'avatar' => $avatar));
			$req_insert->closeCursor();
			return true;
		}

    public function etatCompte($email) {
			$req_etat = $this->bdd->prepare('SELECT cle, actif FROM utilisateur WHERE email_user=:email');
			$req_etat->execute(array('email' => $email));
			$donnees = $req_etat->fetch();
			$req_etat->closeCursor();
			return $donnees;
    }

    public function activerCompte($email) {
      $actif = $this->bdd->prepare("UPDATE utilisateur SET actif = 1 WHERE email_user=:email");
      $actif->execute(array('email' => $email));
      $actif->closeCursor();
    }
}
