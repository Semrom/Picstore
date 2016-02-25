<?php
	session_start();

	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json');

	require_once "../model/LogAdmin.php";

	$reponse = new stdClass();
	$reponse->success = false;
	$reponse->message = "";

	if (isset($_POST['email']) && !empty($_POST['email']) &&
		  isset($_POST['pass']) && !empty($_POST['pass']))
	{
		$email = htmlspecialchars($_POST['email']);
		$motDePasse = sha1(htmlspecialchars($_POST['pass']));

    try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=picstore;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		$log = new LogAdmin($bdd);
		$isSuccess = $log->connexion($email, $motDePasse);

		if ($isSuccess)
		{
				$prenom = $log->getPrenom($email);
				$_SESSION['user'] = $prenom;
				$bdd = null;
				$reponse->success = true;
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

	echo json_encode($reponse);
