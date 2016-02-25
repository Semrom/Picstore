<?php
	class Image {

		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}

		public function getInfoImage() {
			$req_info = $this->bdd->prepare('SELECT id_img, lien_img, titre_img, description_img, theme_img, is_public_img, nombre_aime_img, date_upload_img FROM images');
			$donnees = $req_info->fetch();
			$req_info->closeCursor();
			return $donnees;
		}

		public function getComImage($id_img) {
			$req_com = $this->bdd->prepare('SELECT * from commentaire, image WHERE commentaire.id_img = image.id_img');
			$donnees = $req_com->fetch();
			$req_com->closeCursor();
			return $donnees;
		}
	}