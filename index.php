<?php	session_start();?><!DOCTYPE html>
<html>
	<head>
	    <title>Picstore</title>
	    <meta charset="UTF-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <meta name="description" content="Picstore : Hébergez et partagez vos images !" />
	    <meta name="keywords" content="picstore, hébrgement, héberger, images, partager, sockage, stocker, photos, media, share, sharing, host, hosting, sharing, pic, pics, picture, pictures, network, communauty" />
		<!-- CSS Site -->
	    <link rel="stylesheet" href="css/bootstrap.css" />
	    <link rel="stylesheet" href="css/style.css" />
	    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

		<!-- CSS Slider -->
	    <link rel="stylesheet" type="text/css" href="slider-images/css/demo.css" />
	    <link rel="stylesheet" type="text/css" href="slider-images/css/slider.css" />
	    <link rel="stylesheet" type="text/css" href="slider-images/css/elastislide.css" />
		<!-- Script Slider -->
	    <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">
	        <div class="rg-image-wrapper">
	            {{if itemsCount > 1}}
	            <div class="rg-image-nav">
	                <a href="#" class="rg-image-nav-prev">Précédent Image</a>
	                <a href="#" class="rg-image-nav-next">Suivant Image</a>
	            </div>
	            {{/if}}
	            <div class="rg-image"></div>
	            <div class="rg-loading"></div>
	            <div class="rg-caption-wrapper">
	                <div class="rg-caption" style="display:none;">
	                    <p></p>
	                </div>
	            </div>
	        </div>
	    </script>
	</head>

	<body>
	    <!-- MENU -->	    <?php include_once('php/view/modules/menu.php'); ?>
	    <!-- SOUS-TITRE -->
	    <div class="container">
	        <div class="page-header" id="banner">
	            <div class="row">
	                <div class="col-lg-12 centrer">
	                    <p id="sous-titre-text">Hébergez et partagez vos images avec une grande communauté !</p>
	                </div>
	            </div>
	        </div>

	        <!-- RECHERCHE -->
	        <form class="form-horizontal" id="formulaire-recherche">
	            <div class="col-lg-12 centrer" id="normal">
	                <input type="text" name="recherche" id="recherche-accueil" placeholder="Rechercher..." />
	            </div>	            <div class="col-lg-4 col-lg-offset-4" id="themes">	            	<select class="form-control" id="recherche-themes-accueil">		            	<option value="Null">-- Choisir un thème --</option>		            	<option value="Abstrait">Abstrait</option>		            	<option value="Animaux">Animaux</option>		            	<option value="Architecture">Architecture</option>		            	<option value="Arts">Arts</option>		            	<option value="Astrophotographie">Astrophotographie</option>		            	<option value="Automobile">Automobile</option>		            	<option value="Cinéma et Films">Cinéma et Films</option>		            	<option value="Concerts">Concerts</option>		            	<option value="Cosplay">Cosplay</option>		            	<option value="Cuisine">Cuisine</option>		            	<option value="Culture étrangère">Culture étrangère</option>		            	<option value="Divers">Divers</option>		            	<option value="Humanité">Humanité</option>		            	<option value="Humour">Humour</option>		            	<option value="Informations / Breaking News">Informations / Breaking News</option>		            	<option value="Informatique">Informatique</option>		            	<option value="Jeux">Jeux</option>		            	<option value="Jeux Vidéo">Jeux Vidéo</option>		            	<option value="Lieux Célèbres">Lieux Célèbres</option>		            	<option value="Logo">Logo</option>		            	<option value="Manga">Manga</option>		            	<option value="Mariage">Mariage</option>		            	<option value="Medecine">Medecine</option>		            	<option value="Monument">Monument</option>		            	<option value="Musique">Musique</option>		            	<option value="Mode">Mode</option>		            	<option value="Nature">Nature Morte</option>		            	<option value="Nature Morte">Nature Morte</option>		            	<option value="Objets et Goodies">Objets et Goodies</option>		            	<option value="Paysages">Paysages</option>		            	<option value="Peinture">Peinture</option>		            	<option value="Personnalités">Personnalités</option>		            	<option value="Photographie">Photographie</option>		            	<option value="Portraits">Portraits</option>		            	<option value="Projets">Projets</option>		            	<option value="Radio">Radio</option>		            	<option value="Sciences">Sciences</option>		            	<option value="Séries">Séries</option>		            	<option value="Spectacles">Spectacles</option>		            	<option value="Sport">Sport</option>		            	<option value="Technologie">Technologie</option>		            	<option value="Télévision">Télévision</option>		            	<option value="Théâtre">Théâtre</option>		            	<option value="Vacances">Vacances</option>		            	<option value="Véhicules">Véhicules</option>		            	<option value="Vie quotidienne">Vie quotidienne</option>		            	<option value="Ville">Ville</option>		            	<option value="Voyages">Voyages</option>		            	<option value="Wallpaper">Wallpaper</option>	            	</select>	            </div>
	        </form>
	        <div class="centrer">
	            <a href="#" id="search-themes"></a>
	        </div>	        <div id="resultats-recherche"></div>
	    </div>

	    <!-- SECTION GALLERIE IMAGES -->
	    <section id="slider">
	        <div class="container">
	            <div class="content">
	                <div id="rg-gallery" class="rg-gallery">
	                    <div class="rg-thumbs">
	                        <div class="es-carousel-wrapper">
	                            <div class="es-nav">
	                                <span class="es-nav-prev">Précédent</span>
	                                <span class="es-nav-next">Suivant</span>
	                            </div>
	                            <div class="es-carousel">
	                                <ul>	                                	<?php include_once('php/view/show_images.php'); ?>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>

	    <!-- SECTION COMMENTAIRES -->
	    <section>
	        <div class="container">
	            <div class="col-lg-12 centrer">	            	<div class="col-lg-4">	            	    <div class="well well-sm">	            	        <p id="auteur"></p>	            	    </div>	            	</div>
	                <div class="col-lg-2 col-lg-offset-6">
	                    <div class="well well-sm" id="like-zone">
	                        <?php if (isset($_SESSION['user'])) { ?>
	                        <span id="aimer" <?php echo 'data-user="' . $_SESSION['user']['id_user'] . '"'; ?>></span>	                        <span class="badge" id="nb-jaime"></span>
	                        <?php } else { ?>
	                        <p><span id="nb-jaime"></span> J'aime</p>
	                        <?php } ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <!-- PIED DE PAGE -->
	    <?php include_once('php/view/modules/footer.php'); ?>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>	    <script type="text/javascript" src="js/authentification.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="slider-images/js/jquery.tmpl.min.js"></script>
	    <script type="text/javascript" src="slider-images/js/jquery.easing.1.3.js"></script>
	    <script type="text/javascript" src="slider-images/js/jquery.elastislide.js"></script>
	    <script type="text/javascript" src="slider-images/js/gallery.js"></script>	    <script type="text/javascript" src="js/main.js"></script>
	</body>

</html>
