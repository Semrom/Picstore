<?php
	session_start();

	// En-tête pour le retour JSON
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json');

	// Inclusion des modèles (pour la BD)
	require_once "../model/Log.php";
	require_once "../model/User.php";

	//Inclusion du fichier de connexion à la BD
	include_once "connect-bd.php";

	// Objet "reponse" pour JSON
	$reponse = new stdClass();
	$reponse->success = false;
	$reponse->message = "";

	// Si le formulaire d'inscription est soumis
	if (isset($_POST['form']) && $_POST['form'] == "signup")
	{
		// Si toutes les données existent et ne sont pas vides
		if (isset($_POST['pseudo_user']) && !empty($_POST['pseudo_user']) &&
			isset($_POST['email_user']) && !empty($_POST['email_user']) &&
			isset($_POST['mdp_user']) && !empty($_POST['mdp_user']) &&
			isset($_POST['mdp_confirm_user']) && !empty($_POST['mdp_confirm_user']))
		{
			// Protection des données
			$pseudo = htmlspecialchars($_POST['pseudo_user']);
			$email = htmlspecialchars($_POST['email_user']);
			$motDePasse = htmlspecialchars($_POST['mdp_user']);
			$motDePasseConfirm = htmlspecialchars($_POST['mdp_confirm_user']);

			// Si les deux mots de passe sont identiques
			if ($motDePasse == $motDePasseConfirm)
			{				$mdp_complet = $motDePasse . 'graindeselpourlasecurite';				$mdp_crypt = sha1($mdp_complet);				
				// Si le format de l'e-mail est correct
				if (preg_match('/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i', $email))
				{
					// Nouvel objet "Log"
					$log = new Log($bdd);
					// Vérification de l'existance du mail
					$mailExist = $log->mailExist($email);

					// Si le mail n'existe pas, OK
					if (!$mailExist)
					{
						$pseudoExist = $log->pseudoExist($pseudo);

						if (!$pseudoExist) {

							// Inscription
							$isSuccess = $log->inscription($pseudo, $email, $mdp_crypt);

							if ($isSuccess)
							{
								/***** EMAIL DE CONFIRMATION *****/

								// Clé d'activation propre à l'utilisateur pour l'activation
								$cle = md5(microtime(TRUE)*100000);

								// Insertion de la clé en base
								$stmt = $bdd->prepare("UPDATE utilisateur SET cle=:cle WHERE email_user=:email");
								$stmt->execute(array('cle' => $cle, 'email' => $email));

								// Corps du mail
								$sujet = "Activer votre compte" ;
								$nom = "Picstore";
								$contact = "contact@picstore.16mb.com";

								$entete = "From: " . $nom . " <" . $contact . ">\n";

								$message = 'Bienvenue sur Picstore !' . "\n\n";

								$message .= 'Afin d\'activer votre compte, veuillez cliquer sur le lien ci-dessous :' . "\n\n";

								$message .= 'http://picstore.16mb.com/php/controller/activation.php?pseudo=' . urlencode($pseudo) . '&cle=' . urlencode($cle) . '' . "\n\n";

								$message .= '---------------' . "\n" . 'Si vous n\'êtes pas à l\'origine de cette inscription, veuillez ne pas en tenir compte.';

								$message .= '---------------' . "\n" . 'Ceci est un mail automatique, merci de ne pas y répondre.';

								mail($email, $sujet, $message, $entete);

								unset($_POST);
								$reponse->success = true;

								$bdd = null;								
							}
							else
							{
								$reponse->message = "Erreur : l'inscription a échoué. Veuillez réessayer.";
							}
						} else {
							$reponse->message = "Ce pseudo est déjà utilisé.";
						}
					}
					else
					{
						$reponse->message = "Cette adresse mail existe déjà, avez-vous un compte ?";
					}
				}
				else
				{
					$reponse->message = "Le format de l'adresse e-mail est incorrect.";
				}
			}
			else
			{
				$reponse->message = "Les deux mots de passe ne sont pas identiques.";
			}
		}
		else
		{
			$reponse->message = "Le formulaire est incomplet.";
		}
	}
	// Si le formulaire de connexion est soumis
	else
	{
		// Si toutes les données existent et ne sont pas vides
		if (isset($_POST['pseudo_user']) && !empty($_POST['pseudo_user']) &&
			isset($_POST['mdp_user']) && !empty($_POST['mdp_user']))
		{
			// Protection des données
			$pseudo = htmlspecialchars($_POST['pseudo_user']);
			$mdp = htmlspecialchars($_POST['mdp_user']);			$mdp_complet = $mdp . 'graindeselpourlasecurite';			$mdp_crypt = sha1($mdp_complet);

			// Nouvel objet "Log"
			$log = new Log($bdd);
			$isSuccess = $log->connexion($pseudo, $mdp_crypt);

			// Si la connexion a réussi
			if ($isSuccess)
			{
				// Nouvel objet "User"
				$user = new User($bdd);
				// Récupération des informations de l'utilisateur
				$userInfos = $user->getInfos($pseudo);
				// Si le compte de l'utilisateur est activé
				if ($userInfos['actif'] == 1)
				{
					// Création de la session contenant toutes les données de l'utilisateur
					$_SESSION['user'] = $userInfos;
					$bdd = null;
					$reponse->success = true;
				}
				else
				{
					$reponse->message = "Erreur : connexion impossible.";
				}
			}
			else
			{
				$reponse->message = "Les identifiants entrés sont incorrects.";
			}
		}
		else
		{
			$reponse->message = "Le formulaire est incomplet.";
		}
	}

	echo json_encode($reponse);
