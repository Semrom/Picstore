$(document).ready(function(){
    initAlbum();
});

function initAlbum(){
    var temp = "<div class='cell' style='width:{width}px; height:{height}px;background-image: url(./img/test.jpg)'></div> \n";
    var w=200, h=200 ,html='',limitItem = 20;
    for(var i= 0; i<limitItem;++i){
        html+=temp.replace(/\{height\}/g,h).replace(/\{width\}/g,w);
    }
    $("#album-content").append(html);

    var wall = new Freewall("#album-content");
    wall.reset({
        selector: '.cell',
        animate: true,
        cellW: 200,
        cellH: 200,
        onResize:function(){
            wall.refresh();
        }
    });
    wall.fitWidth();
    $(window).trigger("resize");
}
