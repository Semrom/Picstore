$(function() {		/* RÉCUPÈRE LES PARAMÈTRES DE L'URL */		function getUrlParameter(sParam)	{	    var sPageURL = window.location.search.substring(1);	    var sURLVariables = sPageURL.split('&');	    for (var i = 0; i < sURLVariables.length; i++)	    {	        var sParameterName = sURLVariables[i].split('=');	        if (sParameterName[0] == sParam)	        {	            return sParameterName[1];	        }	    }	    	    return "FAIL";	}		/* SAVOIR SI UN UTILISATEUR A DÉJÀ AIMÉ L'IMAGE COURANTE */		function dejaAimer(user, id) {				$.ajax({			url: 'php/controller/aimer_operation.php',			type: 'POST',			data: "id_usr=" + user + "&id_img=" + id + "&op=verif",			success: function(data) {				if (data.success) {					$('#aimer').text("Je n'aime plus");					$('#aimer').attr('data-op', 'dislike');									} else {					$('#aimer').text("Aimer l'image");					$('#aimer').attr('data-op', 'like');				}			},			error: function(data) {				alert("Erreur du serveur, merci de réessayer (Code : 001).");			}		});	}	
	/* ======================= imagesLoaded Plugin ===============================
	// Commentaires français : Romain Semler

	// https://github.com/desandro/imagesloaded

	// $('#my-container').imagesLoaded(myFunction)
	// execute a callback when all images have loaded.
	// needed because .load() doesn't work on cached images

	// callback function gets image collection as argument
	//  this is the container

	// original: mit license. paul irish. 2010.
	// contributors: Oren Solomianik, David DeSandro, Yiannis Chatzikonstantinou*/

	$.fn.imagesLoaded = function( callback ) {
	var $images = this.find('img'),
		len 	= $images.length,
		_this 	= this,
		blank 	= 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

	function triggerCallback() {
		callback.call( _this, $images );
	}

	function imgLoaded() {
		if ( --len <= 0 && this.src !== blank ){
			setTimeout( triggerCallback );
			$images.off( 'load error', imgLoaded );
		}
	}

	if ( !len ) {
		triggerCallback();
	}

	$images.on( 'load error',  imgLoaded ).each( function() {
		// cached images don't fire load sometimes, so we reset src.
		if (this.complete || this.complete === undefined){
			var src = this.src;
			// webkit hack from http://groups.google.com/group/jquery-dev/browse_thread/thread/eee6ab7b2da50e1f
			// data uri bypasses webkit log warning (thx doug jones)
			this.src = blank;
			this.src = src;
		}
	});

	return this;
	};

	// Stockage de la gallerie
	var $rgGallery = $('#rg-gallery'),
	// Recherche du slider dans la gallerie
	$esCarousel	= $rgGallery.find('div.es-carousel-wrapper'),
	// Recherhe des items (<li>) dans le slider
	$items = $esCarousel.find('ul > li'),
	// Nombre total d'items
	itemsCount = $items.length;

	// Création de l'objet "Gallery"
	Gallery	= (function() {				var imageEnCours = getUrlParameter('img');		
		// ID de l'item courant
		var current	= 0,
		// Mode du slider : carousel || fullview
		mode = 'carousel',
		// Contrôle si une image est en cours de chargement
		anim = false,		
		// Méthode d'initialisation de la gallerie
		// Contient des méthodes nécessaires au
		// fonctionnement de la gallerie
		init = function() {
								if (imageEnCours != "FAIL" && imageEnCours < itemsCount) {					current = imageEnCours;				}					
				// Image en cas de préhargement des images et appel du callback
				$items.add('<img src="img/ajax-loader.gif"/><img src="img/black.png"/>').imagesLoaded( function() {

				// Ajout des options d'affichage de la gallerie
				_addViewModes();

				// Ajout de la structure d'affichage
				// pour le grand format d'image
				_addImageWrapper();

				// Affichage de la première image ou de l'image indiquée en paramètre.
				_showImage( $items.eq( current ) );

			});

				// Initialisation du slider si
				// le mode d'affichage de l'image est
				// de type "carousel"
				if( mode === 'carousel' )
					_initCarousel();

			},
			// Méthode d'initialisation du slider
			_initCarousel	= function() {

				// Utilisation du plugin "elastislide"
				// http://tympanus.net/codrops/2011/09/12/elastislide-responsive-carousel/
				$esCarousel.show().elastislide({
					imageW 	: 65,
					onClick	: function( $item ) {
						if( anim ) return false;
						anim	= true;
						// Affichage de l'image lors du clic
						_showImage($item);
						// Changement de l'item courant
						current	= $item.index();												/* Mémoriser dans l'URL l'id de l'image */						history.pushState('data', '', 'http://localhost:8888/Picstore/?img=' + current);
					}
				});

				// Mettre l'elastislide à l'item courant
				$esCarousel.elastislide( 'setCurrent', current );

			},
			// Méthode d'ajout des fonctions d'affichage de la gallerie
			_addViewModes	= function() {

				// Boutons en haut à droite :
				// "viewfull" pour l'image seulement
				// "viewthumbs" pour l'image et la gallerie
				var $viewfull	= $('<a href="#" class="rg-view-full"></a>'),
					$viewthumbs	= $('<a href="#" class="rg-view-thumbs rg-view-selected"></a>');

				// Ajout des boutons à la suite de la div "rg-gallery"
				$rgGallery.prepend( $('<div class="rg-view"/>').append( $viewfull ).append( $viewthumbs ) );

				// Clic sur le bouton "viewfull"
				$viewfull.on('click.rgGallery', function( event ) {
						if( mode === 'carousel' )
							$esCarousel.elastislide( 'destroy' );
						$esCarousel.hide();
					$viewfull.addClass('rg-view-selected');
					$viewthumbs.removeClass('rg-view-selected');
					mode = 'fullview';
					return false;
				});

				// Clic sur le bouton "viewthumbs"
				$viewthumbs.on('click.rgGallery', function( event ) {
					_initCarousel();
					$viewthumbs.addClass('rg-view-selected');
					$viewfull.removeClass('rg-view-selected');
					mode = 'carousel';
					return false;
				});

				// Initialisation du slider si
				// le mode d'affichage de l'image est
				// de type "carousel"
				if( mode === 'fullview' )
					$viewfull.trigger('click');

			},
			// Méthode d'ajout de la structure
			// pour le grand format d'image
			_addImageWrapper = function() {

				// adds the structure for the large image and the navigation buttons (if total items > 1)
				// also initializes the navigation events

				$('#img-wrapper-tmpl').tmpl( {itemsCount : itemsCount} ).appendTo( $rgGallery );

				if( itemsCount > 1 ) {
					// Ajouter les boutons de navigation (précédent / suivant)
					var $navPrev = $rgGallery.find('a.rg-image-nav-prev'),
						$navNext = $rgGallery.find('a.rg-image-nav-next'),
						$imgWrapper	= $rgGallery.find('div.rg-image');

					// Clic sur le bouton "précédent"
					$navPrev.on('click.rgGallery', function( event ) {
						_navigate( 'left' );
						return false;
					});

					// Clic sur le bouton "suivant"
					$navNext.on('click.rgGallery', function( event ) {
						_navigate( 'right' );
						return false;
					});

					// Ajout des évènements de navigation (précédent / suivant)
					$imgWrapper.touchwipe({
						wipeLeft : function() {
							_navigate( 'right' );
						},
						wipeRight	: function() {
							_navigate( 'left' );
						},
						preventDefaultEvents: false
					});

					// Ajout des évènements de navigation par le clavier (flèches gauche et droite)
					$(document).on('keyup.rgGallery', function( event ) {
						if (event.keyCode == 39)
							_navigate( 'right' );
						else if (event.keyCode == 37)
							_navigate( 'left' );
					});

				}

			},
			// Méthode de navigation entre les images
			_navigate	= function( dir ) {

				// Si un changement d'image est en cours
				// alors annuler
				if( anim ) return false;
				anim = true;

				// Si le changement se fait vers la droite
				if( dir === 'right' ) {
					// Si on est à la fin du slider
					// alors l'index courant est 0
					if( current + 1 >= itemsCount )
						current = 0;
					// Sinon incrémenter le compteur de l'index courant
					else
						++current;
				}
				// Si le changement se fait vers la gauche
				else if( dir === 'left' ) {
					// Si on est au début du slider
					// Alors l'index courant est le dernier item.
					if( current - 1 < 0 )
						current = itemsCount - 1;
					// Sinon décrémenter le compteur de l'index courant
					else
						--current;
				}				
				// Enfin, afficher l'image correspondant
				// à l'index courant
				_showImage( $items.eq( current ) );
			},
			// Méthode d'affichage de l'image
			// selon l'item correspondant
			_showImage = function( $item ) {								/* Mémoriser dans l'URL l'id de l'image */				history.pushState('data', '', 'http://localhost:8888/Picstore/?img=' + current);				
				var $loader	= $rgGallery.find('div.rg-loading').show();

				$items.removeClass('selected');
				$item.addClass('selected');

				var $thumb = $item.find('img'),
					largesrc = $thumb.data('large'),
					title = $thumb.data('description'),					author = $thumb.data('author'),					id = $thumb.data('id'),					jaime = $thumb.data('jaime'),					idAuthor = $thumb.data('author-id');									/*$('#aimer').attr('href', '');*/				$('#aimer').attr('data-img', id);								var user = $('#aimer').data('user');								/* SAVOIR SI L'UTILISATEUR A DEJA AIME L'IMAGE */				dejaAimer(user, id);								$('#auteur').html('Mis en ligne par <a href="user.php?id=' + idAuthor + '">' + author + '</a>');				$('#nb-jaime').text(jaime);

				$('<img/>').load( function() {

					$rgGallery.find('div.rg-image').empty().append('<a href="image.php?id=' + id + '&img=' + current + '"><img src="' + largesrc + '"/></a>');					
					if( title )
						$rgGallery.find('div.rg-caption').show().children('p').empty().text( title );

					$loader.hide();

					if( mode === 'carousel' ) {
						$esCarousel.elastislide( 'reload' );
						$esCarousel.elastislide( 'setCurrent', current );
					}

					anim = false;

				}).attr( 'src', largesrc );
			},
			// Méthode d'ajout d'un item (d'une image)
			// à la gallerie.
			addItems = function( $new ) {
				$esCarousel.find('ul').append($new);
				$items = $items.add( $($new) );
				itemsCount = $items.length;
				$esCarousel.elastislide( 'add', $new );
			};

		return {
			init 		: init,
			addItems	: addItems
		};

	})(); // Objet gallerie

	// Initialisation de la gallerie
	Gallery.init();

	/*
 	Exemple pour ajouter un item à la gallerie :

	var $new  = $('<li><a href="#"><img src="slider-imagesimages/thumbs/1.jpg" data-large="slider-images/images/1.jpg" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li>');
	Gallery.addItems( $new );

	*/	
});
