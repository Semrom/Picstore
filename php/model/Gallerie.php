<?php
	class Gallerie {
		
		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}

		public function getGallerie() {
			$req_gal = this->bdd->prepare('SELECT id_gallerie, nom_gallerie FROM gallerie');
			$donnee = $req_gal->fetch();
			$req_gal->closeCursor();
			return $donnee;
		}

		public function getImageGallerie(id_gallerie) {
			$req_imgal = this->bdd->prepare('SELECT * FROM gallerie, posseder_image WHERE gallerie.id_gallerie = posseder_image.id_gallerie');
			$donnee = $req_imgal->fetch();
			$req_imgal->closeCursor();
			return $donnee;	
		}
	}