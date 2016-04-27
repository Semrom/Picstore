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
            enterClickBind("compteImg");
            modifiableClickBind();
            $("#windowM").on('hidden.bs.modal', function(e) {
                $("#galFormM").remove("label");
            });
        },
        error: function(result, statut, erreur) {
            alert("Echec du chargement des galeries, erreur: " + erreur);
        }
    });
});

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
        enterClickBind("compteImg");
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
        $(document).ready(function() {
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
    var id_item;

    for (var i = 0; i < contents.size; ++i) {
        if (contents == contentGalerie)
            html += "<a href='" + contents.items[i].link + "'>\n";

        if (contents.items[i].id_galerie != undefined) {
            id_item = contents.items[i].id_galerie;
            html += addNewCell(contents.items[i].title, contents.items[i].thumbnail, wallConfig.width,
                wallConfig.height, id_item, "galerie");
        } else {
            id_item = contents.items[i].id_img;
            html += addNewCell(contents.items[i].title, contents.items[i].thumbnail, wallConfig.width,
                wallConfig.height, id_item, "image");
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

function addNewCell(title, imgLink, width, height, id_item, mode) {
    var temp = "<div class='cell' ";
    if (mode.localeCompare("galerie") == 0)
        temp += "data-id_galerie='" + id_item + "'";
    else if (mode.localeCompare("image") == 0)
        temp += "data-id_img='" + id_item + "'";
    temp += " style='width:" + width + "px; height:" + height +
        "px;background-image: url(./" + imgLink + ")'>\n" +
        "<div class='layer'>" +
        "<span class='desc'>" + title + "</span>" +
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

function initModalImage(item) {
    $("#titleM").text(item.title);
    $("#imgM").attr({
        src: item.thumbnail,
        alt: item.title
    });
    if (item.nbLike != undefined) { /* AFFICHAGE DU NB DE LIKE SI IMAGE */
        $("#nbLikeTitleM").show();
        $("#nbLikeM").show();
        $("#nbLikeM").text(item.nbLike);
    } else {
        $("#nbLikeTitleM").hide();
        $("#nbLikeM").hide();
    }
    if (item.isPublic)
        $("select#visibilityM").val("public");
    else
        $("select#visibilityM").val("private");

    if (item.galeries != undefined && item.size > 0) {
        $("#galeriesM").show();
        $("#galeriesM").append(addGaleriesCheckboxModal(galeries.items));
        var i;
        for (i = 0; i < item.size; ++i) /* check toutes les galeries ou l'image est deja presente */
            $("#" + item.galeries.id + "Checkbox").prop('checked', true);
    } else {
        $("#galeriesM").hide();
    }
}

function addGaleriesCheckboxModal(galeriesArray, size) {
    var i, html = '';
    for (i = 0; i < size; ++i) {
        html += "<label class='checkbox-inline'>\n" + "<input id='" + galeriesArray.id_gal +
            "Checkbox' value='" + galeriesArray.id_gal + "' type='checkbox'>" + galeriesArray.title +
            "</label>";
    }

    return html;
}

function ajaxGetModifyItem(item, operation) {
    var id_item;
    if (operation == "modifGal")
        id_item = item.data("id_galerie");
    else
        id_item = item.data("id_img");
    $.ajax({
        url: 'php/controller/get_galleries_and_images.php',
        type: 'POST',
        data: 'id=' + id_item + '&op=' + operation,
        dataType: 'json',
        success: function(data) {
            modififyItem = data;
        },
        complete: function(result, statut) {
            if (modififyItem.galeries != undefined) {
                initModalImage(modififyItem);
                $("#windowM").modal("toggle");
            } else
                alert("Modif des galeries pas encore implementée");
        },
        error: function(result, statut, erreur) {
            alert("Echec du chargement des informations pour modification, erreur: " +
                erreur);
        }
    });
}

function modifiableClickBind() {
    $(".modifiable").on("click", function(e) {
        if ($(this).closest(".cell").data("id_galerie"))
            ajaxGetModifyItem($(this).closest(".cell"), "modifGal");
        else if ($(this).closest(".cell").data("id_img"))
            ajaxGetModifyItem($(this).closest(".cell"), "modifImg");
        e.preventDefault();
    });
}
