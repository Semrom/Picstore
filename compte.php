<?php
  session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	    <title>Picstore</title>
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
	    	        <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">
	    	        </div>
	    	    </div>
	    	</div>
	    </div>

      <?php if (isset($_SESSION['user'])) { ?>
	    <div class="container">
	        <!-- AVATAR -->
	        <div id="avatar-container" class="container">
	            <div class="ratio img-responsive img-circle" style="background-image:url(http://placekitten.com/g/400/200)"></div>
	        </div>
	        <div id="pseudo_user" class="centrer">
	            <h1><?php echo $_SESSION['user']['pseudo_user']; ?></h1>
	        </div>

	        <div id="nb_like_user" class="centrer">
	            <h2>13423 J'aime</h2>
	        </div>

          <div class="centrer">
	            <h2>Inscrit le : <?php echo $_SESSION['user']['date_inscription_user']; ?></h2>
	        </div>
      </div>
      <?php } else { ?>
        <div class="container centrer">
  	        <h1>Erreur : connectez-vous !</h1>
            <a href="./">Retour</a>
        </div>
      <?php } ?>

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
