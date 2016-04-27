<?php 
	session_start();    	include_once("php/controller/modif_compte.php");  	include_once("php/model/Image.php");  	  	$img = new Image($bdd);  	  	$nbJaime = $img->getNbJaime($_SESSION['user']['id_user']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Picstore | Mon compte</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

      <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    </head>

    <body>

        <!-- FENETRE MODALE  (doit etre tout en haut pour eviter probleme selon bootstrap) -->
        <div class="modal fade" id="windowM" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 id="titleM" class="modal-title">Titre</h3>
                    </div>
                    <div class="modal-body">
                        <div>
                            <img id="imgM"src="./img/test.jpg" style="float:left;margin-right:10px;" height="200" width="200">
                        </div>
                        <p id="nbLikeTitleM" style="font-weight:bold;">Nombre de 'J'aime' :</p>
                        <p id="nbLikeM" >54</p>
                        <p>
                            <form role="form">
                                <label for="visibility">Visibilité :</label>
                                <select class="form-control" style="width:auto;" id="visibilityM">
                                    <option value="private">Privé</option> 
                                    <option value="public">Publique</option> 
                                </select>
                            </form>
                        </p>
                        <br style="clear:both;line-height:0;">
                        <form id="galFormM" role="form">
                            <fieldset>
                                <legend id="galeriesM" style="margin-bottom:5px;">Galeries :</legend>
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary">Sauvegarder changements</button>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_SESSION['user'])) { ?>	    	<!-- MENU -->	    	<?php include_once('php/view/modules/menu.php'); ?>	    <?php } ?>

        <!-- CONTENEUR D'EN-TETE -->
        <div class="container">	    <?php if (isset($_SESSION['user'])) { ?>
            <div class="page-header" id="banner">
                <div class="row">
                    <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">		    		    <div class="alert alert-dismissible alert-success centrer" id="ok-zone">		      <button type="button" class="close" data-dismiss="alert">×</button>		      <strong>C'est fait !</strong> <br />Vos informations ont bien été mises à jour.		    </div>		    
            <!-- AVATAR -->
            <div id="avatar-container" class="container">
                <div class="ratio img-responsive img-circle" <?php $user = new User($bdd); $img = $user->getAvatar($_SESSION['user']['id_user']); echo 'style="background-image:url(img/avatar/' . $img['avatar_user'] . ');"'; ?>></div>
            </div>
            <div id="pseudo_user" class="centrer">
                <h1 id="pseudo_user" data-id="<?php echo $_SESSION['user']['id_user']; ?>"><?php echo $_SESSION['user']['pseudo_user']; ?></h1>
            </div>

            <div id="nb_like_user" class="centrer">
            <h2><?php echo $nbJaime . ' "J\'aime"'; ?></h2>
            </div>

          <div class="centrer">
                <h2>Inscrit le : <?php echo $_SESSION['user']['date_inscription_user']; ?></h2>
            </div>	        	        <!-- MODIFICATION INFO -->	        <div id="bouton-modif" class="centrer">	        	<a href="#" class="btn btn-primary" id="boutonText"></a>	        </div>	        <div id="modif-container" class="container">	        	<div class="alert alert-dismissible alert-danger centrer" <?php echo $style; ?> id="error-zone">	        	  <p id="error-text"><?php echo $erreur; ?></p>	        	</div>				<form class="form-horizontal" id="form-password" method="POST" action="compte.php?err=true" enctype="multipart/form-data">				  	<fieldset>				    	<legend>Changer mon mot de passe :</legend>				    	<div class="form-group">				      		<label class="col-lg-2 control-label" for="inputPasswordActual">Mot de passe actuel :</label>				      		<div class="col-lg-10">				        		<input type="password" class="form-control" id="inputPasswordActual" name="actual_pass" <?php if(isset($_POST['actual_pass'])) { echo 'value="' . $_POST['actual_pass'] . '"'; }?> placeholder="Mot de passe actuel">				      		</div>				    	</div>				    	<div class="form-group">				      		<label class="col-lg-2 control-label" for="inputPasswordNew">Nouveau mot de passe :</label>				      		<div class="col-lg-10">				        		<input type="password" class="form-control" id="inputPasswordNew" name="new_pass" <?php if(isset($_POST['new_pass'])) { echo 'value="' . $_POST['new_pass'] . '"'; }?> placeholder="Nouveau mot de passe">				      		</div>				    	</div>				    	<div class="form-group">				    			<label class="col-lg-2 control-label" for="inputPasswordConf">Confirmation :</label>				    			<div class="col-lg-10">				    			<input type="password" class="form-control" id="inputPasswordConf" name="new_pass_confirm" <?php if(isset($_POST['new_pass_confirm'])) { echo 'value="' . $_POST['new_pass_confirm'] . '"'; }?> placeholder="Confirmez le nouveau mot de passe">				    			</div>				    	</div>				    	<br />				    	<legend>Changer mon avatar : </legend>				    	<p>Formats acceptés :   | <strong>.jpg</strong>  |  <strong>.jpeg</strong>  |  <strong>.png</strong> |</p>				    	<div class="form-group">				      		<label class="col-lg-2 control-label" for="inputFile">Avatar (2 Mo max.) :</label>				      		<div class="col-lg-10">				        		<input type="file" class="form-control" id="inputFile" name="avatar" >				      		</div>				    	</div>				    	<input type="hidden" name="id" <?php echo 'value="' . $_SESSION['user']['id_user'] . '"'; ?> />				    	<div id="btn-valid-modif" class="centrer">				    		<button type="submit" class="btn btn-primary">Valider</button>							<button type="reset" class="btn btn-default">Annuler</button>						</div>					</fieldset>				  				</form>	        </div>
      </div>
      <?php } else { ?>      	<div class="page-header" id="banner">      		    <div class="row">      		        <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">      		        	<p id="sous-titre-text"></p>      		        </div>      		    </div>      		</div>      	</div>      	          <div class="centrer">                <h1>Erreur : connectez-vous !</h1><br />              <a href="./" class="btn btn-info">Retour</a>          </div>
      <?php } ?>
	        <!-- GRILLE DE GALLERIES -->
            <div id="album" class="container album">
                <div id="control-bar-album" class="container-fluid">
                    <h4 class="col-xs-5 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 centrer">Vos galeries</h4>
                </div>

                <div id="album-content" class="container album-content">
                    <div id="loading" class="loading"></div>
                </div>
	        </div>



        <!-- PIED DE PAGE -->
        <?php include_once('php/view/modules/footer.php'); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/freewall.js"></script>
        <script type="text/javascript" src="js/modif_compte.js"></script>
        <script type="text/javascript" src="js/compte.js"></script>
    </body>

</html>
