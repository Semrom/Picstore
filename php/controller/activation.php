<?php
	session_start();

  	// Inclusion des modèles pour la BD
	require_once "../model/Log.php";
	require_once "../model/User.php";

  	// Si les paramètres dans l'URL existent
	if (isset($_GET['mail']) && isset($_GET['cle']))
	{
		//Inclusion du fichier de connexion à la BD
		include_once "connect-bd.php";

    // Récupération des données
		$email = $_GET['mail'];
		$cle = $_GET['cle'];

    	// Nouvel objet "Log"
		$log = new Log($bdd);
    	// Récupération de la clé et de l'état "actif" du compte
		$donnees = $log->etatCompte($email);

		if($donnees)
		{
		    $clebdd = $donnees['cle'];	// Récupération de la clé
		    $actif = $donnees['actif']; // $actif contiendra alors 0 ou 1
	 	}

    	// Si "actif" est à 1, alors le compte est déjà activé
	 	if($actif == '1')
    	{
	      	// Redirection vers la page du message de compte déjà actif
	     	header('Location: ../view/confirmation.php?msg=DejaActif');
  		}
    	// Si "actif" est à 0, alors le compte n'est pas encore activé
		else
  		{
			// On vérifie alors si la clé de l'URL corresond à la clé dans la base
			if($cle == $clebdd)
			{
				// La fonction qui va passer notre champ actif de 0 à 1
				$log->activerCompte($email);
				// Nouvel objet "User"
				$user = new User($bdd);
				// Création de la session contenant toutes les informations de l'utilisateur
				$_SESSION['user'] = $user->getInfos($email);
				// Redirection vers la page de confirmation
				header('Location: ../view/confirmation.php?msg=Actif');
			}
			else
	      	{
	          	// Redirection vers une erreur, mauvaise URL
	        	header('Location: ../view/confirmation.php?msg=Error');
	      	}
		}
	}
	else
	{
		echo "<center><h1>Erreur Fatale !</h1><br /><a href=\"../../index.php\">Retour</a></center>";
	}
