<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Recherche</title>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>

  		<!-- MENU -->
  		<?php include_once('php/view/modules/menu.php'); ?>
		<!-- CONTENEUR D'EN-TETE -->
		<div class="container">
			<div class="page-header" id="banner">
			    <div class="row">
			        <div class="col-lg-12 col-md-7 col-sm-6">
			        </div>
			    </div>
			</div>
		</div>

		<!-- ZONE DE RECHERCHE -->
		<div class="container">
    		<form class="form" id="form-research">
  				<fieldset>
    				<legend>Recherche avancée</legend>

    				<div class="form-group">
      					<div class="col-lg-8 col-lg-offset-2">
        					<input type="text" class="form-control" id="input-research" placeholder="Rechercher">
      					</div>
    				</div>

    				<div class="form-group row">
		      			<div class="col-lg-4 col-lg-offset-3">
		      				<div id="checkbox-research">
		        				<div class="checkbox-inline">
		          					<label>
		            					<input type="checkbox"> Titre
		          					</label>	
		        				</div>
		        				<div class="checkbox-inline">
		        					<label>
		            					<input type="checkbox"> Auteur
		          					</label>
		          				</div>
		          				<div class="checkbox-inline">
		          					<label>
		            					<input type="checkbox"> Description
		          					</label>
		          				</div>
		      				</div>
		      			</div>

		    			<div class="col-lg-3">
			    			<select class="form-control" id="select-theme-research">
			          			<option value="">-- Choisir --</option>
                    			<option value="Abstrait">Abstrait</option>
                    			<option value="Animaux">Animaux</option>
                    			<option value="Astrophotographie">Astrophotographie</option>
                    			<option value="Architecture">Architecture</option>
                    			<option value="Concerts">Concerts</option>
                    			<option value="Cosplay">Cosplay</option>
                    			<option value="Cuisine">Cuisine</option>
                    			<option value="Culture étrangère">Culture étrangère</option>
                    			<option value="Humour">Humour</option>
                    			<option value="Jeux">Jeux</option>
                    			<option value="Jeux Vidéo">Jeux Vidéo</option>
                    			<option value="Mariage">Mariage</option>
                    			<option value="Mode">Mode</option>
                    			<option value="Nature Morte">Nature Morte</option>
                    			<option value="Paysage">Paysage</option>
                    			<option value="Peinture">Peinture</option>
                    			<option value="Personnalité">Personnalité</option>
                    			<option value="Portrait">Portrait</option>
                    			<option value="Séries">Séries</option>
                    			<option value="Spectacles">Spectacles</option>
                    			<option value="Sport">Sport</option>
                    			<option value="Télévision">Télévision</option>
                    			<option value="Vacances">Vacances</option>
                    			<option value="Vie quotidienne">Vie quotidienne</option>
                    			<option value="Ville">Ville</option>
                    			<option value="Voyages">Voyages</option>
                    			<option value="Wallpaper">Wallpaper</option>
			        		</select>
		    			</div>
		    		</div>

    				<div class="form-group">
      					<div class="col-lg-10 col-lg-offset-5">
        					<button type="submit" class="btn btn-primary">Rechercher</button>
      					</div>
    				</div>
  				</fieldset>
			</form>
		</div>
		
  		<!-- PIED DE PAGE -->
  		<?php include_once('php/view/modules/footer.php'); ?>

  		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
		<script src="js/jquery-2.1.3.min.js"></script>
  		<script type="text/javascript" src="js/bootstrap.min.js"></script>
  		<script type="text/javascript" src="js/authentification.js"></script>
    </div>
	</body>
</html>
