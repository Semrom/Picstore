<?php
  session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	    <title>Picstore | Mon compte</title>
	    <meta charset="UTF-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

      <link rel="stylesheet" href="css/style.css" />
	    <link rel="stylesheet" href="css/bootstrap.css" />
	    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	</head>

	<body>

	    <?php if (isset($_SESSION['user'])) { ?>	    	<!-- MENU -->	    	<?php include_once('php/view/modules/menu.php'); ?>	    <?php } ?>

	    <!-- CONTENEUR D'EN-TETE -->
	    <div class="container">	    <?php if (isset($_SESSION['user'])) { ?>
	    	<div class="page-header" id="banner">
	    	    <div class="row">
	    	        <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">
	    	        </div>
	    	    </div>
	    	</div>
	    </div>

	    <div class="container">
	        <!-- AVATAR -->
	        <div id="avatar-container" class="container">
	            <div class="ratio img-responsive img-circle" style="background-image:url(<?php echo $_SESSION['user']['avatar_user']; ?>)"></div>
	        </div>
	        <div id="pseudo_user" class="centrer">
	            <h1><?php echo $_SESSION['user']['pseudo_user']; ?></h1>
	        </div>

	        <div id="nb_like_user" class="centrer">
	            <h2>13423 J'aime</h2>
	        </div>

          <div class="centrer">
	            <h2>Inscrit le : <?php echo $_SESSION['user']['date_inscription_user']; ?></h2>
	        </div>	        	        <!-- MODIFICATION INFO -->	        <div id="bouton-modif" class="centrer">	        	<a href="#" class="btn btn-primary" id="boutonText"></a>	        </div>	        <div id="modif-container" class="container">				<form class="form-horizontal">				  	<fieldset>				    	<legend>Changer mon mot de passe :</legend>				    	<div class="form-group">				      		<label class="col-lg-2 control-label" for="inputPassword">Mot de passe :</label>				      		<div class="col-lg-10">				        		<input type="password" class="form-control" id="inputPassword" placeholder="Password">				      		</div>				    	</div>				    	<div class="form-group">				      		<label class="col-lg-2 control-label" for="inputPassword">Confirmation :</label>				      		<div class="col-lg-10">				        		<input type="password" class="form-control" id="inputPassword" placeholder="Password">				      		</div>				    	</div>				    	<legend>Changer mon avatar :</legend>				    	<div class="form-group">				      		<label class="col-lg-2 control-label" for="inputFile">Avatar :</label>				      		<div class="col-lg-10">				        		<input type="file" class="form-control" id="inputFile" placeholder="Choisir mon nouvel avatar...">				      		</div>				    	</div>				    	<div id="btn-valid-modif" class="centrer">							<button type="reset" class="btn btn-default">Annuler</button>							<button type="submit" class="btn btn-primary">Valider</button>						</div>					</fieldset>				  				</form>	        </div>
      </div>
      <?php } else { ?>      	<div class="page-header" id="banner">      		    <div class="row">      		        <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">      		        	<p id="sous-titre-text"></p>      		        </div>      		    </div>      		</div>      	</div>      	          <div class="centrer">                <h1>Erreur : connectez-vous !</h1><br />              <a href="./" class="btn btn-info">Retour</a>          </div>
      <?php } ?>

	    <!-- PIED DE PAGE -->
	    <?php include_once('php/view/modules/footer.php'); ?>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>	    <script type="text/javascript" src="js/modif_compte.js"></script>
	</body>

</html>
