<!DOCTYPE html>
<html>
	<head>
		<title>Inscription</title>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="Picstore : Inscrivez-vous !" />
        <meta name="keywords" content="picstore, signup, inscription, hébrgement, héberger, images, partager, sockage, stocker, photos, media, share, sharing, host, hosting, sharing, pic, pics, picture, pictures, network, communauty" />

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	</head>	
	<body>
	  		  		<!-- MENU -->  		<?php include_once('php/view/modules/menu.php'); ?>
		<!-- CONTENEUR D'EN-TETE -->		<div class="container">			<div class="page-header" id="banner">			    <div class="row">			        <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">			        </div>			    </div>			</div>		</div>				<!-- SECTION FORMULAIRE -->
		<section id="formulaire-inscription">			<div class="container">				<form class="form-horizontal">				  <fieldset>				    <legend>Inscription</legend>				    <div class="form-group">				      <label for="inputPseudo" class="col-lg-2 control-label">Pseudo :</label>				      <div class="col-lg-10">				        <input type="text" class="form-control" name="pseudo_user" id="inputPseudo" placeholder="Pseudo">				      </div>				    </div>				    <div class="form-group">				      <label for="inputEmail" class="col-lg-2 control-label">Email :</label>				      <div class="col-lg-10">				        <input type="text" class="form-control" name="pseudo_user" id="inputEmail" placeholder="Email">				      </div>				    </div>				    <div class="form-group">				      <label for="inputPassword" class="col-lg-2 control-label">Mot de passe :</label>				      <div class="col-lg-10">				        <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe">				      </div>				    </div>				    <div class="form-group">				      <label for="inputPassword" class="col-lg-2 control-label">Confirmation :</label>				      <div class="col-lg-10">				        <input type="password" class="form-control" id="inputPassword" placeholder="Retapez le mot de passe">				      </div>				    </div>				    <div class="form-group">			          <div class="col-lg-10 col-lg-offset-2">			            <button type="submit" class="btn btn-primary">Valider</button>			            <button type="reset" class="btn btn-default">Annuler</button>		      			          </div>			        </div>				  </fieldset>				</form>			</div>
		</section>		
  		<!-- PIED DE PAGE -->  		<?php include_once('php/view/modules/footer.php'); ?>  		  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  		<script type="text/javascript" src="js/bootstrap.min.js"></script>
    </div>
	</body>
</html>
