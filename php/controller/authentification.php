<?php
	session_start();

	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json');

	require_once "../model/Log.php";
	require_once "../model/User.php";

	$reponse = new stdClass();
	$reponse->success = false;
	$reponse->message = "";

	if (isset($_POST['form']) && $_POST['form'] == "signup")
	{
		if (isset($_POST['nom']) && !empty($_POST['nom']) &&
			isset($_POST['prenom']) && !empty($_POST['prenom']) &&
			isset($_POST['email']) && !empty($_POST['email']) &&
			isset($_POST['password']) && !empty($_POST['password']) &&
			isset($_POST['password_confirm']) && !empty($_POST['password_confirm']))
		{
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
			$destinataire = htmlspecialchars($_POST['email']);
			$password = sha1(htmlspecialchars($_POST['password']));
			$password_confirm = sha1(htmlspecialchars($_POST['password_confirm']));

			if ($password == $password_confirm)
			{
				if (!is_numeric($nom) || !is_numeric($prenom))
				{
					if (preg_match('/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i', $destinataire))
					{
						try
						{
							$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u320567403_base;charset=utf8', 'u320567403_user', 'ingodwetrust1776');
						}
						catch (Exception $e)
						{
						        die('Erreur : ' . $e->getMessage());
						}

						$log = new Log($bdd);
						$mailExist = $log->mailExist($destinataire);

						if (!$mailExist)
						{
							$isSuccess = $log->inscription($nom, $prenom, $destinataire, $password);

							if ($isSuccess)
							{
								/***** EMAIL DE CONFIRMATION *****/

								$cle = md5(microtime(TRUE)*100000);

								$stmt = $bdd->prepare("UPDATE membres SET cle=:cle WHERE email=:email");
								$stmt->execute(array('cle' => $cle, 'email' => $destinataire));

								$sujet = "Activer votre compte" ;
								$nom = "Semrom-Projects";
								$email = "contact@semrom-projects.com";

								$entete = "From: " . $nom . " <" . $email . ">\n";

								$message = 'Bienvenue sur Semrom Projects,' . "\n\n";

								$message .= 'Afin d\'activer votre compte, veuillez cliquer sur le lien ci-dessous :' . "\n\n";

								$message .= 'http://semrom-projects.com/php/controller/activation.php?mail=' . urlencode($destinataire) . '&cle=' . urlencode($cle) . '' . "\n\n";

								$message .= '---------------' . "\n" . 'Ceci est un mail automatique, merci de ne pas y répondre.';

								mail($destinataire, $sujet, $message, $entete);

								unset($_POST);
								$reponse->success = true;
								$reponse->message = "Un mail contenant un lien de validation a été envoyé à votre adresse pour activer votre compte. <br />
													 Si vous ne le trouvez pas, vérifiez votre dossier 'spams' ou 'courriers indésirables'.<br />";

								$bdd = null;
							}
							else
							{
								$reponse->message = "Erreur : l'inscription a échoué. Veuillez réessayer.";
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
					$reponse->message = "Veuillez ne pas mettre de valeurs numériques dans les champs 'Nom' et 'Prénom'.";
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
	else
	{
		if (isset($_POST['email']) && !empty($_POST['email']) &&
			isset($_POST['password']) && !empty($_POST['password']))
		{
			$email = htmlspecialchars($_POST['email']);
			$password = sha1(htmlspecialchars($_POST['password']));

			try
			{
				$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u320567403_base;charset=utf8', 'u320567403_user', 'ingodwetrust1776');
			}
			catch (Exception $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}

			$log = new Log($bdd);
			$isSuccess = $log->connexion($email, $password);

			if ($isSuccess)
			{
				$user = new User($bdd);
				$userInfos = $user->getInfos($email);
				if ($userInfos['actif'] == 1)
				{
					$log->addConnect($email);
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
