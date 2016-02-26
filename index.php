<!DOCTYPE html>
<html>

<head>
    <title>Picstore</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Picstore : Hébergez et partagez vos images !" />
    <meta name="keywords" content="hébrgement, héberger, images, partager, sockage, stocker, photos, media, share, sharing, host, hosting, sharing, pic, pics, picture, pictures, network, communauty" />

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" type="text/css" href="slider-images/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="slider-images/css/slider.css" />
    <link rel="stylesheet" type="text/css" href="slider-images/css/elastislide.css" />

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

    <!-- MENU-->
    <nav class="navbar navbar-default navbar-fixed-top">
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
                    <li><a href="inscription.php" target="_blank">Inscription</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" id="menu-connexion">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="bouton-connexion" role="button">
	            			Connexion
			            </a>
                        <div class="dropdown-menu dropdown-menu-left " style="padding:15px;min-width:200px">
                            <form class="form" name="formulaire-connexion" action="connexion.php" method="POST">
                                <div class="form-group">
                                    <label for="pseudo_user">Nom d'utilisateur</label>
                                    <input type="text" class="form-control" id="pseudo_user" name="pseudo_user" placeholder="Utilisateur">
                                </div>
                                <div class="form-group">
                                    <label for="mdp_user">Mot de passe</label>
                                    <input type="password" class="form-control" id="mdp_user" name="mdp_user" placeholder="Mot de passe">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Connexion </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SOUS-TITRE -->
    <div class="container">
        <div class="page-header" id="banner">
            <div class="row">
                <div class="col-lg-12 col-md-7 col-sm-6" id="sous-titre-bloc">
                    <p id="sous-titre-text">Hébergez et partagez vos images avec une grande communauté !</p>
                </div>
            </div>
        </div>

        <!-- RECHERCHE -->
        <form class="form-horizontal" id="formulaire-recherche" action="" method="">
            <div class="col-lg-12 centrer">
                <input type="text" name="recherche" id="recherche-accueil" placeholder="Rechercher..." />
            </div>
        </form>
        <div class="centrer">
            <a href="#">Recherche avancée</a>
        </div>
    </div>

    <!-- SECTION GALLERIE IMAGES -->
    <section>
        <div class="container">
            <div class="content">
                <div id="rg-gallery" class="rg-gallery">
                    <div class="rg-thumbs">
                        <div class="es-carousel-wrapper">
                            <div class="es-nav">
                                <span class="es-nav-prev">Précédent</span>
                                <span class="es-nav-next">Suivant</span>
                            </div>
                            <div class="es-carousel">
                                <ul>
                                    <li>
                                        <a href="#"><img src="http://numerik.blogspirit.com/media/01/00/1498064827.gif" data-large="http://numerik.blogspirit.com/media/01/00/1498064827.gif" alt="image01" data-description="TITRE DE L'IMAGE" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="http://image.blingee.com/images17/content/output/000/000/000/667/589841183_1865656.gif" data-large="http://image.blingee.com/images17/content/output/000/000/000/667/589841183_1865656.gif" alt="image02" data-description="A plaintful story from a sistering vale" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="http://tv5.ca/media/98y5tdwaxu8l5r/2000X1125/00555059.jpg?t=3fe18c0d9bea244e91153c0503bcd108" data-large="http://tv5.ca/media/98y5tdwaxu8l5r/2000X1125/00555059.jpg?t=3fe18c0d9bea244e91153c0503bcd108" alt="image03" data-description="A plaintful story from a sistering vale" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/4.jpg" data-large="slider-images/images/4.jpg" alt="image04" data-description="My spirits to attend this double voice accorded" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/5.jpg" data-large="slider-images/images/5.jpg" alt="image05" data-description="And down I laid to list the sad-tuned tale" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/6.jpg" data-large="slider-images/images/6.jpg" alt="image06" data-description="Ere long espied a fickle maid full pale" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/7.jpg" data-large="slider-images/images/7.jpg" alt="image07" data-description="Tearing of papers, breaking rings a-twain" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/8.jpg" data-large="slider-images/images/8.jpg" alt="image08" data-description="Storming her world with sorrow's wind and rain" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/9.jpg" data-large="slider-images/images/9.jpg" alt="image09" data-description="Upon her head a platted hive of straw" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/10.jpg" data-large="slider-images/images/10.jpg" alt="image10" data-description="Which fortified her visage from the sun" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/11.jpg" data-large="slider-images/images/11.jpg" alt="image11" data-description="Whereon the thought might think sometime it saw" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/12.jpg" data-large="slider-images/images/12.jpg" alt="image12" data-description="The carcass of beauty spent and done" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/13.jpg" data-large="slider-images/images/13.jpg" alt="image13" data-description="Time had not scythed all that youth begun" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/14.jpg" data-large="slider-images/images/14.jpg" alt="image14" data-description="Nor youth all quit; but, spite of heaven's fell rage" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/15.jpg" data-large="slider-images/images/15.jpg" alt="image15" data-description="Some beauty peep'd through lattice of sear'd age" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/16.jpg" data-large="slider-images/images/16.jpg" alt="image16" data-description="Oft did she heave her napkin to her eyne" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/17.jpg" data-large="slider-images/images/17.jpg" alt="image17" data-description="Which on it had conceited characters" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/18.jpg" data-large="slider-images/images/18.jpg" alt="image18" data-description="Laundering the silken figures in the brine" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/19.jpg" data-large="slider-images/images/19.jpg" alt="image19" data-description="That season'd woe had pelleted in tears" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/20.jpg" data-large="slider-images/images/20.jpg" alt="image20" data-description="And often reading what contents it bears" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/21.jpg" data-large="slider-images/images/21.jpg" alt="image21" data-description="As often shrieking undistinguish'd woe" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/22.jpg" data-large="slider-images/images/22.jpg" alt="image22" data-description="In clamours of all size, both high and low" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/23.jpg" data-large="slider-images/images/23.jpg" alt="image23" data-description="Sometimes her levell'd eyes their carriage ride" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="slider-images/images/thumbs/24.jpg" data-large="slider-images/images/24.jpg" alt="image24" data-description="As they did battery to the spheres intend" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION COMMENTAIRES -->
    <section>
        <div class="container">
            <div class="col-lg-12 centrer">
                <div class="col-lg-2">
                    <div class="well well-sm">
                        <?php if (isset($_SESSION['user'])) { ?>
                        <a href="#">Aimer l'image</a>
                        <span class="badge">30</span>
                        <?php } else { ?>
                        <p>30 J'aime</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slider-images/js/jquery.tmpl.min.js"></script>
    <script type="text/javascript" src="slider-images/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="slider-images/js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="slider-images/js/gallery.js"></script>
</body>

</html>
