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
	        <form class="form-horizontal" id="formulaire-recherche" action="" method="">
	            <div class="col-lg-12 centrer">
	                <input type="text" name="recherche" id="recherche-accueil" placeholder="Rechercher..." />
	            </div>
	        </form>
	        <div class="centrer">
	            <a href="recherche.php">Recherche avancée</a>
	        </div>
	    </div>

	    <!-- SECTION GALLERIE IMAGES -->
	    <section>
	        <div class="container" id="slider">
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
	                        <a href="index.php#slider" id="aimer" <?php echo 'data-user="' . $_SESSION['user']['id_user'] . '"'; ?>></a>
	                        <span class="badge" id="nb-jaime"></span>
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
