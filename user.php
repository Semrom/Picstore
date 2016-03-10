<!DOCTYPE html>
<html>
	<head>
	    <title>Picstore</title>
	    <meta charset="UTF-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	    <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css" />
	    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	</head>

	<body>
	    <!-- MENU -->	    <?php include_once('php/view/modules/menu.php'); ?>	    <!-- CONTENEUR D'EN-TETE -->	    <div class="container">	    	<div class="page-header" id="banner">	    	    <div class="row">	    	        <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">	    	        </div>	    	    </div>	    	</div>	    </div>

	    <div class="container">
	        <!-- AVATAR -->
	        <div id="avatar-container" class="container">
	            <div class="ratio img-responsive img-circle" style="background-image:url(http://placekitten.com/g/400/200)"></div>
	        </div>
	        <div id="pseudo_user" class="centrer">
	            <h1>ChaTLourd</h1>
	        </div>

	        <div id="nb_like_user" class="centrer">
	            <h3>13423 J'aime</h3>
	        </div>

	        <!-- GRILLE DE GALLERIES -->
            <div id="album" class="container album">
                <div id="control-bar-album" class="container-fluid">
                    <h4 class="col-xs-5 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 centrer">Galerie de ChaTLourd</h4>
                </div>

                <div id="album-content" class="container album-content"></div>
	                <!-- Bouton +
	                <div class="col-xs-3">
	                    <div class="dummy"></div>
	                    <div class="in add" role="button">
	                        <span class="glyphicon glyphicon-plus"></span>
	                    </div>
	                </div> -->
	        </div>
	    </div>

	    <!-- PIED DE PAGE -->
	    <?php include_once('php/view/modules/footer.php'); ?>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="slider-images/js/jquery.tmpl.min.js"></script>
	    <script type="text/javascript" src="slider-images/js/jquery.easing.1.3.js"></script>
	    <script type="text/javascript" src="slider-images/js/jquery.elastislide.js"></script>
        <script type="text/javascript" src="js/freewall.js"><script>
	    <script type="text/javascript" src="slider-images/js/gallery.js"></script>
        <script type="text/javascript" src="js/user.js"></script>
	</body>

</html>
