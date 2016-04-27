$(document).ready(function() {
    wall = new Freewall("#album-content");
    prepareLoadingGif();
    $.ajax({
        url: 'php/controller/get_galleries_and_images.php',
        type: 'POST',
        data: 'id_user=' + getUrlParameter('id') + '&op=Galeries',
        dataType: 'json',
        success: function(data) {
            galeries = data;
        },
        complete: function(result, statut) {
            loadWall(galeries);
            enterClickBind("contentGalerie");
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
        var albumsListTitle = "Galeries de " + $("h1").text();
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
        enterClickBind("contentGalerie");
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

    for (var i = 0; i < contents.size; ++i) {
        if (contents == contentGalerie)
            html += "<a href='" + contents.items[i].link + "'>\n";
        if (contents.items[i].id_galerie != undefined)
            html += addNewCell(contents.items[i].title, contents.items[i].thumbnail, wallConfig.width,
                wallConfig.height, contents.items[i].id_galerie);
        else
            html += addNewCell(contents.items[i].title, contents.items[i].thumbnail, wallConfig.width,
                wallConfig.height);
        if (contents == contentGalerie)
            html += "</a>\n"
    }

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
function addNewCell(title, imgLink, width, height, id_galerie) {
    var temp = "<div class='cell' ";
    if (id_galerie != undefined)
        temp += "data-id_galerie='" + id_galerie + "'";
    temp += " style='width:" + width + "px; height:" + height +
        "px;background-image: url(./" + imgLink + ")'>\n" +
        "<div class='layer'>" + "<span class='desc'>" + title + "</span>" + "</div>\n</div>\n";
    return temp;
}
