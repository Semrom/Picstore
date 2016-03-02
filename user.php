<!DOCTYPE html>
<html>
	<head>
	    <title>Picstore</title>
	    <meta charset="UTF-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    
	    <link rel="stylesheet" href="css/bootstrap.css" />
	    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	    <link rel="stylesheet" type="text/css" href="slider-images/css/demo.css" />
	    <link rel="stylesheet" type="text/css" href="slider-images/css/slider.css" />
	    <link rel="stylesheet" type="text/css" href="slider-images/css/elastislide.css" />
	    <link rel="stylesheet" href="css/style.css" />
	
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
	    <!-- MENU -->	    <?php include_once('php/view/modules/menu.php'); ?>	    	    <!-- CONTENEUR D'EN-TETE -->	    <div class="container">	    	<div class="page-header" id="banner">	    	    <div class="row">	    	        <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">	    	        </div>	    	    </div>	    	</div>	    </div>
	
	    <div class="container">
	        <!-- AVATAR -->
	        <div id="avatar-container" class="container">
	            <div class="ratio img-responsive img-circle" style="background-image:url(http://placekitten.com/g/400/200)"></div>
	        </div>
	        <div id="pseudo_user">
	            <h1>ChaTLourd</h1>
	        </div>
	
	        <div id="nb_like_user">
	            <h2>13423 J'aime</h2>
	        </div>
	
	        <!-- GRILLE DE GALLERIES -->
	        <div id="album-container" class="container">
	            <div class="row">
	                <div class="col-xs-3">
	                    <div class="dummy"></div>
	                    <div class="in yellow" role="button">
	                    </div>
	                </div>
	                <div class="col-xs-3">
	                    <div class="dummy"></div>
	                    <div class="in green" role="button">
	                    </div>
	                </div>
	                <div class="col-xs-3">
	                    <div class="dummy"></div>
	                    <div class="in red" role="button">
	                    </div>
	                </div>
	                <div class="col-xs-3">
	                    <div class="dummy"></div>
	                    <div class="in magenta" role="button">
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-xs-3">
	                    <div class="dummy"></div>
	                    <div class="in gray" role="button">
	                    </div>
	                </div>
	                <div class="col-xs-3">
	                    <div class="dummy"></div>
	                    <div class="in blue" role="button">
	                    </div>
	                </div>
	                <!-- Bouton +
	                <div class="col-xs-3">
	                    <div class="dummy"></div>
	                    <div class="in add" role="button">
	                        <span class="glyphicon glyphicon-plus"></span>
	                    </div>
	                </div>
	                -->
	            </div>
	        </div>
	    </div>
	
	    <!-- PIED DE PAGE -->
	    <?php include_once('php/view/modules/footer.php'); ?>
	
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="slider-images/js/jquery.tmpl.min.js"></script>
	    <script type="text/javascript" src="slider-images/js/jquery.easing.1.3.js"></script>
	    <script type="text/javascript" src="slider-images/js/jquery.elastislide.js"></script>
	    <script type="text/javascript" src="slider-images/js/gallery.js"></script>
	</body>

</html>
