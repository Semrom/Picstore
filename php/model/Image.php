<?php/*** @author Thomas Allam / Romain Semler** @file Image.php** @date 25/02/2016** @brief Classe en charge des informations et des commentaires d'une image.*/
	class Image {

		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}
		public function newImage($lien, $titre, $description, $theme, $confidentialite, $id) {			$req_insert = $this->bdd->prepare('INSERT INTO images (lien_img, titre_img, description_img, theme_img, is_public_img, nombre_aime_img, date_upload_img, suppression_img, id_user) VALUES(:lien, :titre, :description, :theme, :confidentialite, 0, NOW(), 0, :id)');			$req_insert->execute(array('lien' => $lien, 'titre' => $titre, 'description' => $description, 'theme' => $theme, 'confidentialite' => $confidentialite, 'id' => $id));			$req_insert->closeCursor();			$req_id = $this->bdd->prepare('SELECT id_img FROM images WHERE lien_img = :lien');			$req_id->execute(array('lien' => $lien));			$id_new_image = $req_id->fetch();			$req_id->closeCursor();			return $id_new_image;		}		public function getImage($id_img) {			$req_img = $this->bdd->prepare('SELECT * FROM images WHERE id_img = :img');			$req_img->execute(array('img' => $id_img));			$info_img = $req_img->fetch();			$req_img->closeCursor();			return $info_img;		}
		public function getComImage($id_img) {
			$req_com = $this->bdd->prepare('SELECT * FROM commentaire WHERE id_img = :img');			$req_com->execute(array('img' => $id_img));
			$comment = $req_com->fetch();
			$req_com->closeCursor();
			return $comment;
		}	}?>