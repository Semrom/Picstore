var wall, wallConfig = {
    "width": 150,
    "height": 150
};

var galeries = { /* variable qui stock toutes les galeries disponibles a afficher, a charger une seule fois au debut */
        "items": [{
            "title": "Uploads",
            "thumbnail": "test.jpg",
            "id_galerie": 0
        }, {
            "title": "Favoris",
            "thumbnail": "test.jpg",
            "id_galerie": 1
        }, {
            "title": "Images turfesques",
            "thumbnail": "test.jpg",
            "id_galerie": 2
        }, {
            "title": "Galerie lourde",
            "thumbnail": "test.jpg",
            "id_galerie": 3
        }],
        "size": 4
    },
    contentGalerie = { /*variable qui stock le contenue d'une galerie , a charger avec ajax avant de l'utiliser */
        "title": "Something",
        "items": [{
            "id_img":0,
            "title": "Lourdeur",
            "link": "test.jpg",
            "thumbnail": "test.jpg"
        }, {
            "id_img":1,
            "title": "Epic",
            "link": "test.jpg",
            "thumbnail": "test.jpg"
        }, {
            "id_img":2,
            "title": "MRW ta geule",
            "link": "test.jpg",
            "thumbnail": "test.jpg"
        }, {
            "id_img":3,
            "title": "Red",
            "link": "FatGuyShootingRed.gif",
            "thumbnail": "FatGuyShootingRed.gif"
        }, {
            "id_img":4,
            "title": "Blue",
            "link": "FatGuyShootingBlue.gif",
            "thumbnail": "FatGuyShootingBlue.gif"
        }, {
            "id_img":5,
            "title": "who",
            "link": "test.jpg",
            "thumbnail": "test.jpg"
        }, {
            "id_img":6,
            "title": "piouu",
            "link": "test2.jpg",
            "thumbnail": "test2.jpg"
        }, {
            "id_img":7,
            "title": ",piouu",
            "link": "test.jpg",
            "thumbnail": "test.jpg"
        }, {
            "id_img":8,
            "title": "^_^",
            "link": "test.jpg",
            "thumbnail": "test.jpg"
        }],
        "size": 9
    },
    modififyItem = { //contenue de l'objet a modifier
        "id":"id_1",
        "title": "Titre",
        "nbLike": 45,
        "isPublic": true,
        "thumbnail":"img/test.jpg",
        "galeries": [{
            "id_gal":0,
            "title": "galerie_1"
        }, {
            "id_gal":0,
            "title": "galerie_2"
        }],
        "size": 2
    };

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }

    return "FAIL";
}
