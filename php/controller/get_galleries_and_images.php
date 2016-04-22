<?php	session_start();	/* En-tête pour le retour JSON */	header('Cache-Control: no-cache, must-revalidate');	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');	header('Content-type: application/json');	/* Inclusion des classes nécessaires */	require_once "../model/Image.php";	require_once "../model/Galerie.php";	/* Inclusion du fichier de connexion à la BD */	include_once "connect-bd.php";	/* Si une opération est soumise */	if (isset($_POST['op']) && !empty($_POST['op']))	{		/* OP : Récupération des galeries d'un utilisateur */		if ($_POST['op'] == "Galeries") {						if (isset($_POST['id_user']) && !empty($_POST['id_user'])) {								$gal = new Galerie($bdd);				$img = new Image($bdd);								$compte = 0;								$allGal = $gal->getAllGalleries($_POST['id_user']);								$tabGal = array();								foreach ($allGal as $donnee) {										$id = $gal->getImageFromGallery($donnee['id_galerie']);					$lien = $img->getImage($id);										$tabGal[] = array('title' => $donnee['nom_galerie'], 'thumbnail' => 'img/upload/mini/' . $lien['lien_img'])										$compte = $compte + 1;				}								$arr = array('items' => $tabGal, 'size' => $compte);			}			else 			{				$arr = array('Erreur' => 'Donnée \'id_user\' manquante !');			}		}				/* OP : Récupération des images d'une galerie */		else 		{			if (isset($_POST['id_gal']) && !empty($_POST['id_gal'])) {								$gal = new Galerie($bdd);				$img = new Image($bdd);								$compte = 0;								$galerie = $gal->getGallery($_POST['id_gal']);								$allImg = $img->getImagesFromGallery($_POST['id_gal']);								$tabImg = array();								foreach ($allImg as $donnee) {										$infos = $img->getImage($donnee['id_img']);										$tabGal[] = array('title' => $infos['titre_img'], 'link' => 'image.php?id=' . $donnee['id_img'], 'thumbnail' => 'img/upload/mini/' . $infos['lien_img'])										$compte = $compte + 1;				}								$arr = array('title' => $galerie['nom_galerie'], 'items' => $tabImg, 'size' => $compte);			}			else 			{				$arr = array('Erreur' => 'Donnée \'id_gal\' manquante !');			}			}	}	else 	{		$arr = array('Erreur' => 'Donnée \'op\' manquante !');	}	echo json_encode($arr);