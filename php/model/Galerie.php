<?php /*** @author Thomas Allam / Romain Semler** @file Galerie.php** @date 25/02/2016** @brief Classe chargé de récupérer une galerie et ses images.*/
	class Galerie {

		public $bdd;

		function __construct($bdd) {
			$this->bdd = $bdd;
		}		public function linkGalleryUploadTo($id_user, $id_img) {			$id_galerie_upload = $this->bdd->prepare("SELECT id_galerie FROM galerie WHERE id_user = :id AND nom_galerie LIKE 'upload%'");			$id_galerie_upload->execute(array('id' => $id_user));			$id_gal = $id_galerie_upload->fetch();			$id_galerie_upload->closeCursor();			$link_req = $this->bdd->prepare('INSERT INTO posseder_image (id_galerie, id_img) VALUES(:gal, :img)');			$link_req->execute(array('gal' => $id_gal['id_galerie'], 'img' => $id_img));			$link_req->closeCursor();			return true;		}				public function linkGalleryFavoriteTo($id_user, $id_img) {					$id_galerie_favoris = $this->bdd->prepare("SELECT id_galerie FROM galerie WHERE id_user = :id AND nom_galerie LIKE 'favoris%'");			$id_galerie_favoris->execute(array('id' => $id_user));			$id_gal = $id_galerie_favoris->fetch();			$id_galerie_favoris->closeCursor();			$link_req = $this->bdd->prepare('INSERT INTO posseder_image (id_galerie, id_img) VALUES(:gal, :img)');			$link_req->execute(array('gal' => $id_gal['id_galerie'], 'img' => $id_img));			$link_req->closeCursor();			return true;		}				public function delGalleryFavoriteTo($id_user, $id_img) {							$id_galerie_favoris = $this->bdd->prepare("SELECT id_galerie FROM galerie WHERE id_user = :id AND nom_galerie LIKE 'favoris%'");			$id_galerie_favoris->execute(array('id' => $id_user));			$id_gal = $id_galerie_favoris->fetch();			$id_galerie_favoris->closeCursor();			$link_req = $this->bdd->prepare('DELETE FROM posseder_image WHERE id_galerie = :gal AND id_img = :img');			$link_req->execute(array('gal' => $id_gal['id_galerie'], 'img' => $id_img));			$link_req->closeCursor();			return true;		}
		public function getGallery($id_gal) {
			$req_gal = $this->bdd->prepare('SELECT * FROM galerie WHERE id_galerie = :id');			$req_gal->execute(array('id' => $id_gal));
			$rep = $req_gal->fetch();
			$req_gal->closeCursor();
			return $rep;
		}				public function getImagesFromGallery($id_gal) {			$req_gal = $this->bdd->prepare('SELECT id_img FROM posseder_image WHERE id_galerie = :id');			$req_gal->execute(array('id' => $id_gal));			$rep = $req_gal->fetchAll();			$req_gal->closeCursor();			return $rep;		}				public function getAllGalleries($id_user) {			$req_gal = $this->bdd->prepare('SELECT * FROM galerie WHERE id_user = :id AND is_public_galerie = 1 AND suppression_galerie = 0');			$req_gal->execute(array('id' => $id_user));			$id_gal = $req_gal->fetchAll();			$req_gal->closeCursor();			return $id_gal;		}		
		public function getImageFromGallery($id_galerie) {
			$req_gal = $this->bdd->prepare('SELECT id_img FROM posseder_image WHERE id_galerie = :id');			$req_gal->execute(array('id' => $id_galerie));
			$image = $req_gal->fetch();
			$req_gal->closeCursor();
			return $image;
		}				public function deleteUserGalleries($id_user) {					$req_del = $this->bdd->prepare('DELETE FROM galerie WHERE id_user = :id');			$req_del->execute(array('id' => $id_user));			$req_del->closeCursor();						return true;		}				public function getGalleriesForSearch($donnee) {			$req_gal = $this->bdd->prepare("SELECT id_user, nom_galerie FROM galerie WHERE is_public_galerie = 1 AND is_supprimable_galerie = 1 AND suppression_galerie = 0 AND nom_galerie LIKE :data");			$req_gal->execute(array('data' => "%" . $donnee . "%"));			$donnee = $req_gal->fetchAll();			$req_gal->closeCursor();						return $donnee;		}
	}
