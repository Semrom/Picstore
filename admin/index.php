<!DOCTYPE html>
<html>
    <head>
        <title>Picstore</title>
        <meta charset="UTF-8" />

        <link rel="stylesheet" href="../css/bootstrap.css" />        <link rel="stylesheet" href="../css/admin.css" />        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    </head>

    <body>

        <!-- MENU-->
        <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">

            <!-- ITEM PRINCIPAL -->
            <div class="navbar-header">
              <a href="../" class="navbar-brand">Picstore</a>

              <!-- BOUTON MENU FORMAT MOBILE -->
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- AUTRES ITEMS
            <div class="navbar-collapse collapse" id="navbar-main">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#" target="_blank">Inscription</a></li>
                <li><a href="#" target="_blank">Connexion</a></li>
              </ul>
            </div>-->
          </div>
        </div>

        <div class="container">
          <div class="page-header" id="banner">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-6">
                </div>
            </div>          </div>          <h1 style="text-align: center;">Interface Administrateur</h1>          <br />    			<div class="login-block">    		    <h1>Login</h1>            <p id="error-zone"></p>    		    <form id="form-admin">    			    <input type="text" value="" placeholder="Email" id="username" name="email"/>    			    <input type="password" value="" placeholder="Mot de passe" id="password" name="pass"/>    			    <input type="submit" name="submit" value="Connexion" />    				</form>    			</div>
      </div>
      <script src="../js/jquery-2.1.3.min.js"></script>
      <script src="../js/admin.js"></script>
    </body>
</html>
