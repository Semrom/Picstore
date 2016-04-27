<?php	session_start();		include_once "php/model/User.php";	include_once "php/model/Image.php";	include_once "php/controller/connect-bd.php";?><!DOCTYPE html>
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
			<?php if (isset($_GET['id']) && !empty($_GET['id'])) {						$infoUser = new User($bdd);						$infos = $infoUser->getInfosById($_GET['id']);						$img = new Image($bdd);						$nbJaime = $img->getNbJaime($_GET['id']);					?>		
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

	    <div class="container">
	        <!-- AVATAR -->
	        <div id="avatar-container" class="container">
	            <div class="ratio img-responsive img-circle" <?php echo 'style="background-image:url(img/avatar/' . $infos['avatar_user'] . ')"'; ?> ></div>
	        </div>
	        <div id="pseudo_user" class="centrer">
	            <h1><?php echo $infos['pseudo_user']; ?></h1>
	        </div>

	        <div id="nb_like_user" class="centrer">
	            <h3><?php echo $nbJaime . ' "J\'aime"'; ?></h3>
	        </div>

	        <!-- GRILLE DE GALLERIES -->
            <div id="album" class="container album">
                <div id="control-bar-album" class="container-fluid">
                    <h4 class="col-xs-5 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 centrer"><?php echo 'Galeries de ' . $infos['pseudo_user']; ?></h4>
                </div>

                <div id="album-content" class="container album-content">
                    <div id="loading" class="loading"></div>
                </div>
	        </div>
	    </div>

	    <!-- PIED DE PAGE -->
	    <?php include_once('php/view/modules/footer.php'); ?>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/freewall.js"></script>
        <script type="text/javascript" src="js/varWall.js"></script>
        <script type="text/javascript" src="js/user.js"></script>
        <script type="text/javascript" src="js/authentification.js"></script>
              <?php       		} else {      ?>            <!-- CONTENEUR D'EN-TETE -->      <div class="container">      	<div class="page-header" id="banner">      	    <div class="row">      	        <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">      	        </div>      	    </div>      	</div>      </div>            	<div class="centrer">      	      <h1>Une erreur est survenue.</h1><br />      	    <a href="./" class="btn btn-info">Retour</a>      	</div>          <?php } ?>      
	</body>

</html>
