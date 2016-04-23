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
                <img id="image-courante" src="img/test.jpg" class="img-responsive center-block" >
                <!-- INFO SUR L'IMAGE -->
                <div id="image-info" class="col-lg-12">
                    <!-- TITRE DE L'IMAGE -->
                    <div id="image-titre" class="col-lg-10">
                        <h2>Titre image test</h2>
                    </div>
                    <!-- NB LIKE + BOUTON LIKE DE L'IMAGE -->
                    <div class="col-lg-2">
                        <div id="image-nb-like" class="col-lg-1">
                            <h4>56</h4>
                        </div>
                        <div id="image-like-button" class="col-lg-1">
                            <a type="submit" class="btn btn-info">J'aime</a>
                        </div>
                    </div>
                </div>
                <!-- DESCRIPTION DE L'IMAGE -->
                <div id="image-description" class="centrer">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac velit ligula. Proin maximus nisi nec congue posuere.</p>
                </div>
            </div>

            <!-- ECRIRE UN COMMENTAIRE -->
            <div id="com-container" class="container">
                <form>
                    <h3>Commentaires :</h3>
                    <div id="ecrire-com" class="col-lg-12 row-lg-3">
                        <!-- INFO POUR ECRIRE UN COMMENTAIRE (PSEUDO & AVATAR DE L'UTILISATEUR COURANT) -->
                        <div id="ecrire-com-info" class="col-lg-1">
                            <div class="ratio img-responsive img-circle" style="background-image:url(http://placekitten.com/g/400/200)"></div>
                            <h4 class="centrer">Pseudo</h4>
                        </div>
                        <!-- ZONE POUR ECRIRE UN COMMENTAIRE -->
                        <div id="zone-ecrire-com" class="col-lg-10">
                            <textarea class="form-control" rows="3" id="textArea"></textarea>
                        </div>
                        <!-- BOUTON POUR PUBLIER LE COMMENTAIRE -->
                        <div id="button-publier-com" class="col-lg-1">
                            <button type="submit" class="btn btn-primary">Publier</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- AUTRES COMMENTAIRES -->
            <div id="com-container-other" class="container">
                <div class="centrer">
                    <button id="masquer-com" class="btn btn-default"></button>
                </div>
                <div id="com">
                    <!-- PREMIER COMMENTAIRE -->
                    <div class="col-lg-12">
                        <!-- INFO SUR L'AUTEUR DU COMMENTAIRE (PSEUDO & AVATAR) -->
                        <div class="col-lg-1">
                            <div class="ratio img-responsive img-circle" style="background-image:url(img/FatGuyShootingRed.gif)"></div>
                            <h4 class="centrer">Pseudo</h4>
                        </div>
                        <!-- COMMENTAIRE -->
                        <div class="col-lg-9">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac velit ligula. Proin maximus nisi nec congue posuere. Sed bibendum porta sapien ut facilisis. Donec et viverra nunc, sit amet vestibulum urna. Aliquam aliquet elit nec ligula cursus condimentum. Vestibulum et orci nisl.</p>
                        </div>
                        <!-- NB DE LIKE + BOUTON DE LIKE -->
                        <div class="col-lg-2">
                            <div class="col-lg-1">
                                <h5>56</h5>
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-info">J'aime</button>
                            </div>
                        </div>
                    </div>

                    <!-- 2EME COMMENTAIRE -->
                    <div class="col-lg-12">
                        <!-- INFO SUR L'AUTEUR DU COMMENTAIRE (PSEUDO & AVATAR) -->
                        <div class="col-lg-1">
                            <div class="ratio img-responsive img-circle" style="background-image:url(img/FatGuyShootingBlue.gif)"></div>
                            <h4 class="centrer">Pseudo</h4>
                        </div>
                        <!-- COMMENTAIRE -->
                        <div class="col-lg-9">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac velit ligula. Proin maximus nisi nec congue posuere. Sed bibendum porta sapien ut facilisis. Donec et viverra nunc, sit amet vestibulum urna. Aliquam aliquet elit nec ligula cursus condimentum. Vestibulum et orci nisl.</p>
                        </div>
                        <!-- NB DE LIKE + BOUTON DE LIKE -->
                        <div class="col-lg-2">
                            <div class="col-lg-1">
                                <h5>3</h5>
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-info">J'aime</button>
                            </div>
                        </div>
                    </div>

                    <!-- ETC -->

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
