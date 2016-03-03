<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	    <title>Picstore | Upload</title>
	    <meta charset="UTF-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- CSS Site -->
	    <link rel="stylesheet" href="css/bootstrap.css" />
	    <link rel="stylesheet" href="css/style.css" />
	    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	</head>

	<body>

	    <!-- MENU -->
	    <?php include_once('php/view/modules/menu.php'); ?>

	    <!-- SOUS-TITRE -->
	    <div class="container">
	        <div class="page-header" id="banner">
	            <div class="row">
	                <div class="col-lg-12 centrer">
	                    <p id="sous-titre-text">Partagez vos images préférées !</p>
	                </div>
	            </div>
	        </div>
	    </div>

      <!-- SECTION FORMULAIRE -->
  		<section>
  			<div class="container">
  				<div class="alert alert-dismissible alert-success centrer" id="ok-zone-upload">
  				  <strong>Super !</strong> <br /> Vous pouvez maintenant <a href="#" id="consult-image">consulter votre image</a>.
  				</div>
  				<form class="form-horizontal" id="form-signup">
  				  <fieldset>
  				    <legend>Mettre en ligne une image</legend>
  				    <div class="alert alert-dismissible alert-danger centrer" id="error-zone-upload">
  				      <p id="error-text"></p>
  				    </div>
  				    <div class="form-group">
  				      <label for="inputUpload" class="col-lg-2 control-label">Fichier :</label>
  				      <div class="col-lg-10">
  				        <input type="file" class="form-control" name="" id="inputUpload" >
  				      </div>
  				    </div>
  				    <div class="form-group">
  				      <label for="inputTitre" class="col-lg-2 control-label">Titre :</label>
  				      <div class="col-lg-10">
  				        <input type="text" class="form-control" name="titre_img" id="inputTitre" placeholder="Titre">
  				      </div>
  				    </div>
  				    <div class="form-group">
  				      <label for="inputDescription" class="col-lg-2 control-label">Description :</label>
  				      <div class="col-lg-10">
  				        <textarea class="form-control" name="description_img" id="inputDescription" placeholder="..."></textarea>
  				      </div>
  				    </div>
  				    <div class="form-group">
  				      <label for="selectTheme" class="col-lg-2 control-label">Thème :</label>
  				      <div class="col-lg-10">
  				        <select class="form-control" id="selectTheme" name="theme_img">
                    <option>-- Choisir --</option>
                  </select>
  				      </div>
  				    </div>
  				    <input type="hidden" name="form" value="upload" />
  				    <div class="form-group">
  			          <div class="col-lg-10 col-lg-offset-2">
  			            <button type="submit" class="btn btn-primary">Valider</button>
  			            <button type="reset" class="btn btn-default">Annuler</button>
  			          </div>
  			        </div>
  				  </fieldset>
  				</form>
  			</div>
  		</section>

	    <!-- PIED DE PAGE -->
	    <?php include_once('php/view/modules/footer.php'); ?>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>

</html>
