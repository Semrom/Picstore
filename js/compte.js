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

$(document).ready(function() {
    wall = new Freewall("#album-content");
    prepareLoadingGif();
    $.ajax({
        url: 'php/controller/get_galleries_and_images.php',
        type: 'POST',
        data: 'op=compteGal',
        dataType: 'json',
        success: function(data) {
            galeries = data;
        },
        complete: function(result, statut) {
            loadWall(galeries);
            enterClickBind();
            modifiableClickBind();
            $("#imageWindowM").on('hidden.bs.modal',function(e){ 
                $("#imageGalFormM").remove("label");
            });
        },
        error: function(result, statut, erreur) {
            alert("Echec du chargement des galeries, erreur: " + erreur);
        }
    });
});

/*
 * addControlBar()
 *
 * La fonction ajoute une barre de controle pour sortir de la galerie et revenir vers la liste de
 * galeries
 *
 */
function addControlBar() {
    var htmlInsideAlbum =
        "<button id='returnBtn' class='btn btn-default col-xs-3 col-sm-2 col-md-1' type='button'>Retour</button>";
    $("#control-bar-album").prepend(htmlInsideAlbum);
    $("#returnBtn").one("click", function() {
        leaveGalerie(galeries);
    });
}

/*
 * leaveGalerie(contents, contentsClick)
 *
 * Cette fonction va quitter l'affichage d'une galerie et afficher les items du parametres contents. 
 *
 */
function leaveGalerie(contents) {
    $("#control-bar-album").fadeOut(function() {
        $("#returnBtn").remove();
        var albumsListTitle = "Vos galeries";
        $("h4").text(albumsListTitle);
        $("h4").removeClass();
        $("h4").addClass(
            "col-xs-5 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 centrer"
        );
    });
    $("#album-content").fadeOut(function() {

        $("#album-content a").remove();
        wall.refresh();
        wall.fitWidth();
        loadWall(contents);
        enterClickBind();
        modifiableClickBind();
    });

    $("#control-bar-album,#album-content").fadeIn();
}

/*
 * enterGalerie(contents)
 *
 * Cette fonction permet de voir le contenue d'une galerie, elle va ajouter une barre de contrôle
 * ainsi que charger le mur pour afficher toutes les items de contents.
 *
 */
function enterGalerie(contents) {
    $("#control-bar-album").fadeOut(function() {
        addControlBar();
        var albumTitle = contents.title;
        $("h4").text(albumTitle);
        $("h4").removeClass();
        $("h4").addClass(
            "col-xs-5 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-3 centrer"
        );
    });
    $("#control-bar-album,#album-content").fadeOut(function() {
        $(".cell").remove();
        wall.refresh();
        wall.fitWidth();
        loadWall(contents);
        $(document).ready(function(){
            modifiableClickBind();
        });
    });
    $("#control-bar-album,#album-content").fadeIn();
}
/*
 *
 *  loadWall(contents, callback)
 *
 *  Cette fonction permet d'initialiser le mur du plugin freewall en parcourant le tableau items[]
 *  du parametres contents, la fonction va creer une case pour chaque objet dans ce tableau en
 *  utilisant le lien nommé thumbnail de chaque items pour creer l'aperçu utilisé par la case.
 */
function loadWall(contents) {
    var html = '';
    var id_item = {
        "id":-1,
    }

    for (var i = 0; i < contents.size; ++i) {
        if (contents == contentGalerie)
            html += "<a href='" + contents.items[i].link + "'>\n";

        if (contents.items[i].id_galerie != undefined){
            id_item.id=contents.items[i].id_galerie;
            html += addNewCell(contents.items[i].thumbnail, wallConfig.width,
                wallConfig.height, id_item,"galerie");
        }
        else{
            id_item.id=contents.items[i].id_img;
            html += addNewCell(contents.items[i].thumbnail, wallConfig.width,
                wallConfig.height, id_item,"image");
        }


        if (contents == contentGalerie)
            html += "</a>\n"
    }
    if (contents == galeries)
        html += addPlusCell(wallConfig.width, wallConfig.height);

    $("#album-content").append(html);

    wall.reset({
        selector: '.cell',
        animate: true,
        cellW: wallConfig.width,
        cellH: wallConfig.height,
        onResize: function() {
            wall.refresh();
        }
    });
    wall.fitWidth();
    $(window).trigger("resize");
}

/*
 * addNewCell(imgLink, width, height)
 *
 * Cette fonction retourne une variable qui contient le code html d'une case qui compose la galerie.
 * On cree une case en donnant le lien vers le thumbnail/lien direct de l'image ainsi que les
 * dimensions de la case qui va etre crée.
 *
 * Return: le code html d'une case
 *
 */
function addNewCell(imgLink, width, height, id_item, mode) {
    var temp = "<div class='cell' ";
    if (mode.localeCompare("galerie") == 0)
        temp += "data-id_galerie='" + id_item.id + "'";
    else if (mode.localeCompare("image") == 0)
        temp += "data-id_img='" + id_item.id+ "'";
    temp += " style='width:" + width + "px; height:" + height +
        "px;background-image: url(./" + imgLink + ")'>\n" +
        "<div class='layer'>" +
        "<span class='desc modifiable'>Modifier</span>" +
        "</div>\n</div>\n";
    return temp;
}

function addPlusCell(width, height) {
    var temp = "<div class='cell' ";
    temp += " style='width:" + width + "px; height:" + height +
        "px;background-image: url(\"./img/black.png\")'>\n" +
        "<div class='layer'> <span class='plus glyphicon glyphicon-plus'> </span>\n</div>\n</div>\n";
    return temp;
}

function initModalImage(image){
    $("#imageTitleM").text(image.title);
    $("#imageImgM").attr({
        src:image.thumbnail,
        alt:image.title
    });
    $("#imageNbLike").text(image.nbLike);
    if(image.isPublic)
        $("select#imageVisibilityM").val("public");
    else
        $("select#imageVisibilityM").val("private");
    $("#imageGaleriesM").append(addGaleriesCheckboxModal(galeries.items));

    if(image.size > 0){
        $("#imageGaleriesM").show();
        var i;
        for (i=0; i< image.size; ++i) /* check toutes les galeries ou l'image est deja presente */
            $("#"+image.galeries.id+"Checkbox").prop('checked', true);
    } else {
        $("#imageGaleriesM").hide();
    }
}

function addGaleriesCheckboxModal(galeriesArray, size){
    var i, html='';
    for(i=0; i<size; ++i){
        html+="<label class='checkbox-inline'>\n"
            +"<input id='"+ galeriesArray.id_gal +"Checkbox' value='"+galeriesArray.id_gal+"' type='checkbox'>"
            + galeriesArray.title + "</label>";
    }
    
    return html;
}

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

function prepareLoadingGif() {
    $("#loading").hide();
    $(document).ajaxStart(function() {
        $("#loading").show();
    });

    $(document).ajaxStop(function() {
        $("#loading").hide();
    });

}

function ajaxEnterGalerie(cell) {
    $.ajax({
        url: 'php/controller/get_galleries_and_images.php',
        type: 'POST',
        data: 'id_gal=' + cell.data("id_galerie") + '&op=compteImg',
        dataType: 'json',
        success: function(data) {
            contentGalerie = data;
        },
        complete: function(result, statut) {
            enterGalerie(contentGalerie);
        },
        error: function(result, statut, erreur) {
            alert("Echec du chargement de la galerie, erreur: " + erreur);
        }
    });
}

function ajaxGetModifyItem(item, operation) {
    var id_item;
    if(operation == "modifGal")
        id_item=item.data("id_galerie");
    else 
        id_item=item.data("id_img");
    $.ajax({
        url: 'php/controller/get_galleries_and_images.php',
        type: 'POST',
        data: 'id='+id_item+'&op='+operation,
        dataType: 'json',
        success: function(data) {
            modififyItem = data;
        },
        complete: function(result, statut) {
            if(modififyItem.galeries != undefined){
                initModalImage(modififyItem);
                $("#imageWindowM").modal("toggle");
            }
            else
                alert("Modif des galeries pas encore implementée");
        },
        error: function(result, statut, erreur) {
            alert("Echec du chargement des informations pour modification, erreur: " +
                erreur);
        }
    });
}

function enterClickBind() {
    $(".cell").one("click", function(e) {
        ajaxEnterGalerie($(this));
    });
}

function modifiableClickBind() {
    $(".modifiable").on("click", function(e) {
        if($(this).closest(".cell").data("id_galerie"))
            ajaxGetModifyItem($(this).closest(".cell"), "modifGal");
        else if($(this).closest(".cell").data("id_img"))
            ajaxGetModifyItem($(this).closest(".cell"), "modifImg");
        e.preventDefault();
    });
}
