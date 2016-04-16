<?php	session_start();
	include_once "php/controller/upload_traitement.php";
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

	    <?php if (isset($_SESSION['user'])) { ?>	    	<!-- MENU -->	    	<?php include_once('php/view/modules/menu.php'); ?>	    <?php } ?>

	    <!-- SOUS-TITRE -->
	    <div class="container">	    <?php if (!isset($_SESSION['user'])) { ?>	        <div class="page-header" id="banner">	                <div class="row">	                    <div class="col-lg-12 centrer">	                        <p id="sous-titre-text"></p>	                    </div>	                </div>	            </div>	        </div>
	        <div class="centrer">	              <h1>Erreur : connectez-vous !</h1><br />	            <a href="./" class="btn btn-info">Retour</a>	        </div>	    <?php } else { ?>
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
  				<form action="upload.php#ancre" method="POST" class="form-horizontal" id="form-signup" enctype="multipart/form-data">
  				  <fieldset>
  				    <legend>Mettre en ligne une image</legend>  				    <p class="centrer" id="ancre">Votre image ne doit pas excéder une taille de <strong>5 Mo</strong>. <br /><br />Formats autorisés :  |<strong>.png</strong> | <strong>.jpg</strong> | <strong>.jpeg</strong> | <strong>.gif</strong><br /><br />Tous les champs sont obligatoires.</p><br />
  				    <div class="alert alert-dismissible alert-danger centrer" id="error-zone-upload" <?php if (isset($style)){echo $style;} ?> >
  				      <p id="error-text"><?php if (isset($erreur)){echo $erreur;} ?></p>
  				    </div>

  				    <div class="form-group">
  				      <label for="inputUpload" class="col-lg-2 control-label">Fichier :</label>
  				      <div class="col-lg-10">
  				        <input type="file" class="form-control" name="image" id="inputUpload">
  				      </div>
  				    </div>

  				    <div class="form-group">
  				      <label for="inputTitre" class="col-lg-2 control-label">Titre :</label>
  				      <div class="col-lg-10">
  				        <input type="text" class="form-control" name="titre_img" id="inputTitre" maxlength="50" placeholder="Titre (50 car. Maximum)" <?php if(isset($_POST['titre_img'])) { echo 'value="' . htmlspecialchars($_POST['titre_img']) . '"'; }?> >
  				      </div>
  				    </div>

  				    <div class="form-group">
  				      <label for="inputDescription" class="col-lg-2 control-label">Description :</label>
  				      <div class="col-lg-10">
  				        <textarea class="form-control" name="description_img" id="inputDescription" maxlength="255" placeholder="Description (255 car. Maximum)"><?php if(isset($_POST['titre_img'])) { echo $_POST['description_img']; }?></textarea>
  				      </div>
  				    </div>

  				    <div class="form-group">
  				      <label for="selectTheme" class="col-lg-2 control-label">Thème :</label>
  				      <div class="col-lg-10">
  				        <select class="form-control" id="selectTheme" name="theme_img">  				        	<?php if (isset($_POST['theme_img']) && !empty($_POST['theme_img'])) {
  				        			echo '<option value="' . $_POST['theme_img'] . '">' . $_POST['theme_img'] . '</option>';  				        		  } else {  				        		  	echo '<option value="">-- Choisir --</option>';  				        		  }  				        	?>                    		<option value="Abstrait">Abstrait</option>                    		<option value="Animaux">Animaux</option>                    		<option value="Architecture">Architecture</option>                    		<option value="Arts">Arts</option>                    		<option value="Astrophotographie">Astrophotographie</option>                    		<option value="Automobile">Automobile</option>                    		<option value="Cinéma et Films">Cinéma et Films</option>                    		<option value="Concerts">Concerts</option>                    		<option value="Cosplay">Cosplay</option>                    		<option value="Cuisine">Cuisine</option>                    		<option value="Culture étrangère">Culture étrangère</option>                    		<option value="Divers">Divers</option>                    		<option value="Humanité">Humanité</option>                    		<option value="Humour">Humour</option>                    		<option value="Informations / Breaking News">Informations / Breaking News</option>                    		<option value="Informatique">Informatique</option>                    		<option value="Jeux">Jeux</option>                    		<option value="Jeux Vidéo">Jeux Vidéo</option>                    		<option value="Lieux Célèbres">Lieux Célèbres</option>                    		<option value="Logo">Logo</option>                    		<option value="Manga">Manga</option>                    		<option value="Mariage">Mariage</option>                    		<option value="Medecine">Medecine</option>                    		<option value="Monument">Monument</option>                    		<option value="Musique">Musique</option>                    		<option value="Mode">Mode</option>                    		<option value="Nature">Nature Morte</option>                    		<option value="Nature Morte">Nature Morte</option>                    		<option value="Objets et Goodies">Objets et Goodies</option>                    		<option value="Paysages">Paysages</option>                    		<option value="Peinture">Peinture</option>                    		<option value="Personnalités">Personnalités</option>                    		<option value="Photographie">Photographie</option>                    		<option value="Portraits">Portraits</option>                    		<option value="Projets">Projets</option>                    		<option value="Radio">Radio</option>                    		<option value="Sciences">Sciences</option>                    		<option value="Séries">Séries</option>                    		<option value="Spectacles">Spectacles</option>                    		<option value="Sport">Sport</option>                    		<option value="Technologie">Technologie</option>                    		<option value="Télévision">Télévision</option>                    		<option value="Théâtre">Théâtre</option>                    		<option value="Vacances">Vacances</option>                    		<option value="Véhicules">Véhicules</option>                    		<option value="Vie quotidienne">Vie quotidienne</option>                    		<option value="Ville">Ville</option>                    		<option value="Voyages">Voyages</option>
							<option value="Wallpaper">Wallpaper</option>
                  		</select>
  				      </div>
  				    </div>
  				    <div class="form-group">			          <label class="col-lg-2 control-label">Confidentialité :</label>			          <div class="col-lg-10">			            <div class="radio">			              <label>			                <input type="radio" name="is_public_img" id="optionsRadios1" value="true" <?php if (isset($_POST['is_public_img']) && $_POST['is_public_img'] == "true") { echo 'checked="checked"';} else if (!isset($_POST['is_public_img'])) { echo 'checked="checked"'; } else {echo '';} ?> >			                Publique			              </label>			            </div>			            <div class="radio">			              <label>			                <input type="radio" name="is_public_img" id="optionsRadios2" value="false" <?php if (isset($_POST['is_public_img']) && $_POST['is_public_img'] == "false") { echo 'checked="checked"';} else {echo '';} ?>>			                Privée			              </label>			            </div>			          </div>			        </div>
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
  		</section>	  	<?php } ?>

	    <!-- PIED DE PAGE -->
	    <?php include_once('php/view/modules/footer.php'); ?>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>

</html>
