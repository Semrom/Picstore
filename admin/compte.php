<?php
  error_reporting(E_ALL);  ini_set('display_errors', '1');  session_start();  
  if (!isset($_SESSION['admin'])) {
    echo '<center><h1>ERREUR FATALE</h1><br /><a href="index.php">Retour</a></center>';
  } else {?>

<!DOCTYPE html>
<html>
    <head>
        <title>Picstore</title>
        <meta charset="UTF-8" />

        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/admin.css" />
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>

    <body>

        <!-- MENU-->
        <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">

            <!-- ITEM PRINCIPAL -->
            <div class="navbar-header">
              <a href="./" class="navbar-brand">Picstore</a>

              <!-- BOUTON MENU FORMAT MOBILE -->
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- AUTRES ITEMS -->
            <div class="navbar-collapse collapse" id="navbar-main">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../php/controller/deconnexion_admin.php">Déconnexion</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="page-header" id="banner">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-6">
                </div>
            </div>
          </div>
          <h1 class="centrer">Compte administrateur de <?php echo $_SESSION['admin']['prenom_admin']; ?></h1>
          <br />          <section>          
	    	  <h3 id="title-users">Derniers inscrits :</h3>	    	  <?php include_once "../php/view/all_users.php"; ?>	    	  <h3 id="title-images">Dernières images mises en ligne :</h3>	    	  <?php include_once "../php/view/all_images.php"; ?>	      </section>
      </div>
      <script src="../js/jquery-2.1.3.min.js"></script>
      <script src="../js/admin.js"></script>      <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
<?php } ?>
