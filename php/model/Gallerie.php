<?php/*** @author Thomas Allam / Romain Semler** @file Gallerie.php** @date 25/02/2016** @brief Classe chargé de récupérer une gallerie et ses images.*/
	class Gallerie {

		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}		public function linkGalleryTo($id_user, $id_img) {			//$id_gallerie_upload = $this->bdd->prepare("SELECT id_gallerie FROM gallerie WHERE id_user = :id AND nom_gallerie LIKE 'upload%'");			$id_gallerie_upload = $this->bdd->prepare("SELECT id_gallerie FROM gallerie WHERE id_user = :id AND nom_gallerie LIKE 'upload%'");			$id_gallerie_upload->execute(array('id' => $id_user));			$id_gal = $id_gallerie_upload->fetch();			$id_gallerie_upload->closeCursor();			$link_req = $this->bdd->prepare('INSERT INTO posseder_image (id_gallerie, id_img) VALUES(:gal, :img)');			$link_req->execute(array('gal' => $id_gal['id_gallerie'], 'img' => $id_img));			$link_req->closeCursor();			return true;		}
		public function getGalleryByName($id_user, $nom_gallerie) {
			$req_gal = $this->bdd->prepare('SELECT id_gallerie FROM gallerie WHERE id_user = :id AND nom_gallerie = :nomGal');			$req_gal->execute(array('id' => $id_user, 'nomGal' => $nom_gallerie));
			$id_gal = $req_gal->fetch();
			$req_gal->closeCursor();
			return $id_gal;
		}		/* NE PAS TOUCHER OU DECOMMENTER		public function getAllGalleries($id_user) {			$req_gal = $this->bdd->prepare('SELECT id_gallerie FROM gallerie WHERE id_user = :id');			$req_gal->execute(array('id' => $id_user));			$donnee = $req_gal->fetch();			$req_gal->closeCursor();			return $donnee;		}		*/

		public function getImagesFromGallery($id_gallerie) {
			$req_gal = $this->bdd->prepare('SELECT * FROM posseder_image WHERE id_gallerie = :id');			$req_gal->execute(array('id' => $id_gallerie));
			$images = $req_imgal->fetchAll();
			$req_imgal->closeCursor();
			return $images;
		}
	}
