<?php 	session_start();	/* En-tête pour le retour JSON */	header('Cache-Control: no-cache, must-revalidate');	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');	header('Content-type: application/json');	/* Inclusion des modèles (pour la BD) */	require_once "../model/Galerie.php";	require_once "../model/Image.php";	require_once "../model/User.php";	/* Inclusion du fichier de connexion à la BD */	include_once "connect-bd.php";	/* Objet "reponse" pour JSON */	$reponse = new stdClass();	$reponse->success = false;	$reponse->message = "";	/* Si le formulaire de recherche est soumis */	if (isset($_GET['donnees']) && !empty($_GET['donnees']) && isset($_GET['op']))	{		if ($_GET['op'] == "normal") {					/* Protection des données */			$donnee = htmlspecialchars($_GET['donnees']);						$result_Gal = new Galerie($bdd);			$result_Img = new Image($bdd);			$result_Usr = new User($bdd);						$resUsr = $result_Usr->getUsersForSearch($donnee);			$resImg = $result_Img->getImagesForSearch($donnee);			$resGal = $result_Gal->getGalleriesForSearch($donnee);						if (!$resGal && !$resImg && !$resUsr) {								$reponse->message = '<div><h3 class="centrer">Aucun résultat n\'a été trouvé pour cette recherche.</h3></div>';							} else {								/*** PREPARATION DU RESULTAT UTILISATEUR ***/				if (empty($resUsr)) {					$showUsr = '<p class="decale">Aucun résultat.</p>';				} else {										$showUsr = '<table class="decale"><tr>';										foreach ($resUsr as $donnee) {												$showUsr .= '<th class="cellule"><img src="img/avatar/' . $donnee['avatar_user'] . '" alt="image-user" width="100" height="100"/></th>';					}										$showUsr .= '</tr><tr>';										foreach ($resUsr as $donnee) {												$showUsr .= '<th class="cellule"><a href="user.php?id=' . $donnee['id_user'] . '">' . $donnee['pseudo_user'] .'</a></th>';					}										$showUsr .= '</tr></table>';									}								/*** PREPARATION DU RESULTAT IMAGE ***/				if (empty($resImg)) {					$showImg = '<p class="decale">Aucun résultat.</p>';				} else {										$showImg = '<table class="decale"><tr>';										foreach ($resImg as $donnee) {											$showImg .= '<th class="cellule"><img src="img/upload/mini/' . $donnee['lien_img'] . '" alt="image-user" /></th>';								}										$showImg .= '</tr><tr>';										foreach ($resImg as $donnee) {												$pseudo = $result_Usr->getPseudo($donnee['id_user']);						$showImg .= '<th class="cellule"><a href="image.php?id=' . $donnee['id_img'] . '">' . $donnee['titre_img'] . '</a><br />(par <a href="user.php?id=' . $donnee['id_user'] . '">' . $pseudo['pseudo_user'] . '</a>)</th>';					}										$showImg .= '</tr></table>';									}								/*** PREPARATION DU RESULTAT GALERIE ***/				if (empty($resGal)) {					$showGal = '<p class="decale">Aucun résultat.</p>';				} else {										$showGal = '<table class="decale"><tr>';										foreach ($resGal as $donnee) {												$showGal .= '<th class="celluleGal">' . $donnee['nom_galerie'] . '</th>';					}										$showGal .= '</tr><tr>';										foreach ($resGal as $donnee) {												$pseudo = $result_Usr->getPseudo($donnee['id_user']);						$showGal .= '<th class="celluleGal">(par <a href="user.php?id=' . $donnee['id_user'] . '">' . $pseudo['pseudo_user'] . '</a>)</th>';					}										$showGal .= '</tr></table>';				}								/*** AFFICHAGE FINAL ***/				$reponse->success = true;				$reponse->message = '<div><h3 class="titre-recherche">Image(s) : </h3>' . $showImg . '<h3 class="titre-recherche">Picstorien(s) :</h3>' . $showUsr . '<h3 class="titre-recherche">Gallerie(s) :</h3>' . $showGal . '</div>';			}		} else {						$theme = htmlspecialchars($_GET['donnees']);			$result_Img = new Image($bdd);			$result_Usr = new User($bdd);						$resImg = $result_Img->getImagesForSearchByThemes($theme);						if (!$resImg) {				$reponse->message = '<div><h3 class="centrer">Aucune image correspondant au thème "' . $theme . '" n\'a été trouvée.</h3></div>';			} else {								$showImg = '<table class="decale"><tr>';								foreach ($resImg as $donnee) {									$showImg .= '<th class="cellule"><img src="img/upload/mini/' . $donnee['lien_img'] . '" alt="image-user" /></th>';							}								$showImg .= '</tr><tr>';								foreach ($resImg as $donnee) {										$pseudo = $result_Usr->getPseudo($donnee['id_user']);					$showImg .= '<th class="cellule"><a href="image.php?id=' . $donnee['id_img'] . '">' . $donnee['titre_img'] . '</a><br />(par <a href="user.php?id=' . $donnee['id_user'] . '">' . $pseudo['pseudo_user'] . '</a>)</th>';				}								$showImg .= '</tr></table>';								/*** AFFICHAGE FINAL ***/				$reponse->success = true;				$reponse->message = '<div><h1 class="titre-recherche">Résultats pour "' . $theme . '" : </h1>' . $showImg . '</div>';			}		}	} else {		$reponse->message = '<h3 class="centrer">Comment faire une recherche avec des espaces ?</h3>';	}	echo json_encode($reponse);