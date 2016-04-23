<?php 
	class Galerie {

		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}
		public function getGallery($id_gal) {
			$req_gal = $this->bdd->prepare('SELECT * FROM galerie WHERE id_galerie = :id');
			$rep = $req_gal->fetch();
			$req_gal->closeCursor();

		}
		public function getImageFromGallery($id_galerie) {
			$req_gal = $this->bdd->prepare('SELECT id_img FROM posseder_image WHERE id_galerie = :id');
			$image = $req_gal->fetch();
			$req_gal->closeCursor();

		}
	}