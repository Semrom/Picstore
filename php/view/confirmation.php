<?php
	session_start();

	$inView = true;
?>
<!DOCTYPE html>
<html>
	<head>
	    <title>Bienvenue sur Picstore</title>
	    <meta charset="UTF-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- CSS Site -->
	    <link rel="stylesheet" href="../../css/bootstrap.css" />
	    <link rel="stylesheet" href="../../css/style.css" />
	    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	</head>

	<body>		<?php if (isset($_SESSION['user'])) { ?>			<!-- MENU -->			<?php include_once('modules/menu.php'); ?>		<?php } ?>
	    <!-- SOUS-TITRE -->
	    <div class="container">
	        <div class="page-header" id="banner">
	            <div class="row">
	                <div class="col-lg-12 centrer">
	                </div>
	            </div>
	        </div>

          <?php if (isset($_SESSION['user'])) {          		if (isset($_GET['msg']) && $_GET['msg'] == "Actif") { ?>
			      	<div class="centrer">
				      	<h3>Votre compte a été activé avec succès !</h3><br />
				      	<a href="../../compte.php" class="btn btn-info">Accéder à mon compte</a><br /><br />				      	<a href="../../upload.php" class="btn btn-info">Mettre en ligne une image</a>
				    </div>
				<?php } else if (isset($_GET['msg']) && $_GET['msg'] == "DejaActif") { ?>
			    	<div style="text-align: center;">
				      	<h3>Votre compte est déjà actif !</h3><br />
				      	<a href="../../" class="btn btn-info">Retour</a><br />
				    </div>
				<?php } else if (isset($_GET['msg']) && $_GET['msg'] == "Error") { ?>
			    	<div style="text-align: center;">
				      	<h3>Votre compte n'a pas pu être activé.</h3><br />
				      	<a href="../../" class="btn btn-info">Retour</a><br />
				    </div>
				<?php } else { ?>
					<div style="text-align: center;">
				      	<h3>Erreur fatale</h3><br />
				      	<a href="../../" class="btn btn-info">Retour</a><br />
				    </div>
				<?php }				} else { ?>					<div class="centrer">					      <h1>Erreur Fatale</h1><br />					    <a href="../../" class="btn btn-info">Retour</a>					</div>				<?php } ?>

	    </div>


	    <!-- PIED DE PAGE -->
	    <?php include_once('modules/footer.php'); ?>

	    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
			<script src="js/jquery-2.1.3.min.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>

</html>
