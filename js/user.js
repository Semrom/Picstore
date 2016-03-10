var wall,
    contentsAlbumsList = {
        "width": 200,
        "height": 200,
        "limitItem": 4,
        "images": [{
            "link": "test.jpg"
        }]
    },
    contentsAlbum = {
        "title": "Galerie",
        "width": 200,
        "height": 200,
        "limitItem": 20,
        "images": [{
            "link": "test.jpg"
        }]
    };

$(document).ready(function() {
    wall = new Freewall("#album-content");
    initAlbumContent(contentsAlbumsList);
    $(".cell").click(function() {
        enterAlbum(contentsAlbum);
    });
});

function insideAlbumBar() {
    var htmlInsideAlbum =
        "<button id='returnBtn' class='btn btn-default col-xs-3 col-sm-2 col-md-1' type='button'>Retour</button>";
    $("#control-bar-album").prepend(htmlInsideAlbum);
    $("#returnBtn").click(function() {
        revertToAlbumsList(contentsAlbumsList,contentsAlbum);
    });
}

function revertToAlbumsList(contents,contentsClick) {
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

        $(".cell").remove();
        wall.refresh();
        wall.fitWidth();
        initAlbumContent(contents);
        $(".cell").click(function() {
            enterAlbum(contentsClick);
        });
    });

    $("#control-bar-album,#album-content").fadeIn();
}

function enterAlbum(contents) {
    $("#control-bar-album").fadeOut(function() {
        insideAlbumBar();
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
        initAlbumContent(contents);
        $(".cell").click(function(){
            var url = "img/"+contents.images[0].link;
            window.open(url);
        });
    });
    $("#control-bar-album,#album-content").fadeIn();
}

function initAlbumContent(contents) {
    var html = '';

    for (var i = 0; i < contents.limitItem; ++i) {
        //     html+=temp.replace(/\{height\}/g,h).replace(/\{width\}/g,w);
        html += addNewCell(contents.images[0].link, contents.width, contents.height);
    }

    $("#album-content").append(html);

    wall.reset({
        selector: '.cell',
        animate: true,
        cellW: contents.width,
        cellH: contents.height,
        onResize: function() {
            wall.refresh();
        }
    });
    wall.fitWidth();
    $(window).trigger("resize");
}

function addNewCell(imgLink, width, height) {
    var temp = "<div class='cell' style='width:" + width + "px; height:" + height +
        "px;background-image: url(./img/" + imgLink + ")'></div> \n";
    return temp;
}
