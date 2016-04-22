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
            <!-- IMAGE -->
            <div id="image-container" class="container">
                <!--<div id="bouton-retour" class="#">
                    <a href="user.php" class="btn btn-default">Retour</a>
                </div>-->
                <img id="image-courante" src="img/test.jpg" class="img-responsive col-lg-12" >
                <div id="image-info" class="col-lg-12">
                    <div id="image-titre" class="col-lg-9">
                        <h2>Titre image test</h2>
                    </div>
                    <div id="image-like-fav" class="col-lg-3">
                        <div id="nb-like" class="col-lg-2">
                            <h4>56</h4>
                        </div>
                        <div id="like-fav-button" class="clo-lg-2">
                            <a href="#" class="btn btn-info">J'aime</a>
                            <a href="#" class="btn btn-primary">Favoris</a>
                        </div>
                    </div>
                </div>
                <div id="description" class="centrer">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac velit ligula. Proin maximus nisi nec congue posuere.</p>
                </div>
            </div>

            <!-- ECRIRE UN COMMENTAIRE -->
            <div id="com-container" class="container">
                <form>
                    <h3>Commentaires</h3>
                    <div id="ecrire-com" class="col-lg-12">
                        <div id="ecrire-com-info" class="col-lg-1">
                            <div class="ratio img-responsive img-circle" style="background-image:url(http://placekitten.com/g/400/200)"></div>
                            <h4 class="centrer">Pseudo</h4>
                        </div>
                        <div id="zone-ecrire-com" class="col-lg-10">
                            <textarea class="form-control" rows="3" id="textArea"></textarea>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-primary">Publier</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- AUTRES COMMENTAIRES -->
            <div id="com-container-other" class="container">
                <div class="col-lg-12 col-lg-offset-9">
                    <button id="masquer-com" class="btn btn-default"></button>
                </div>
                <div id="com" class="col-lg-12">
                    <!-- PREMIER COMMENTAIRE -->
                    <div id="com-1">
                        <div id="com-info-1" class="col-lg-1">
                            <div class="ratio img-responsive img-circle" style="background-image:url(img/FatGuyShootingRed.gif)"></div>
                            <h4 class="centrer">Pseudo</h4>
                        </div>
                        <div id="zone-com-1" class="col-lg-9">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac velit ligula. Proin maximus nisi nec congue posuere. Sed bibendum porta sapien ut facilisis. Donec et viverra nunc, sit amet vestibulum urna. Aliquam aliquet elit nec ligula cursus condimentum. Vestibulum et orci nisl.</p>
                        </div>
                        <div id="nb-like-com" class="col-lg-1">
                            <h5>56</h5>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-info">J'aime</button>
                        </div>
                    </div>
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
        <script type="text/javascript" src="js/freewall.js"><script>
        <script type="text/javascript" src="slider-images/js/gallery.js"></script>
        <script type="text/javascript" src="js/user.js"></script>
        <script type="text/javascript" src="js/image.js"></script>
    </body>

</html>
