<!DOCTYPE html>
<html>
	<head>
		<title>Inscription</title>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="Picstore : Hébergez et partagez vos images !" />
        <meta name="keywords" content="hébrgement, héberger, images, partager, sockage, stocker, photos, media, share, sharing, host, hosting, sharing, pic, pics, picture, pictures, network, communauty" />

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>
    <div id="wrap">
  		<!-- MENU-->
          <div class="navbar navbar-default">
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
            </div>
          </div>

      <!-- FORMULAIRE -->
      <div id="formulaire-inscription">
    		<div class="panel panel-primary">
    	  	<div class="panel-heading centrer">
						<h2>Inscription</h2></div>
    	  			<div class="panel-body">
            		<p id="error-zone"></p>
		    				<form class="form-horizontal">
		    	  				<fieldset>
		    						  <div class="form-group">
		                    <div class="input-formulaire-inscription">
		    		    				  <input class="form-control" id="pseudo_user" placeholder="Pseudo" type="text">
		                    </div>
		    						  </div>
		    						  <div class="form-group">
		                    <div class="input-formulaire-inscription">
		    		    				  <input class="form-control" id="email_user" placeholder="Email" type="text">
		                    </div>
		    		  				</div>
		    						  <div class="form-group">
		                    <div class="input-formulaire-inscription">
		    		    				  <input class="form-control" id="mdp_user" placeholder="Mot de passe" type="password">
		                    </div>
		    		  				</div>
		    						  <div class="form-group">
		                    <div class="input-formulaire-inscription">
		    		    				  <input class="form-control" id="mdp_user_repeat" placeholder="Retapez le mot de passe" type="password">
		                    </div>
		    						  </div>
		    						  <div class="form-group">
		    							 <div class="wrapper-button centrer">
		    		    					<button type="submit" class="btn btn-primary">Valider</button>
		    		    					<button type="reset" class="btn btn-default">Annuler</button>
		    		    			 </div>
		    		  				</div>
		    	  				</fieldset>
		    				</form>
    	  			</div>
          	</div>
  			</div>

  		<!-- PIED DE PAGE -->
      <footer>
        <div class="container">
          <div class="col-lg-3">
            Picstore ©2016
          </div>
          <div class="col-lg-3 col-lg-offset-6">
            <a href="#">Contact</a>
          </div>
        </div>
      </footer>
    </div>
	</body>
</html>
