<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    echo '<center><h1>ERREUR FATALE</h1><br /><a href="index.php">Retour</a></center>';
  } else {
?>

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
          <h1 class="centrer">Compte administrateur de <?php echo $_SESSION['user']['prenom_admin']; ?></h1>
          <br />
    	  <h3>Derniers inscrits :</h3>    	  <?php include_once "../php/view/general_bd.php"; ?>
      </div>
      <script src="../js/jquery-2.1.3.min.js"></script>
      <script src="../js/admin.js"></script>
    </body>
</html>
<?php } ?>
