$(document).ready(function () {
	$("#modif-container").hide();
});

var isDisplay = false;

function displayPanelModif() {
	//$("#modif-container").fadeIn();
    //$("body").fadeTo(400, "0.5");
    //$("#modif-container").slideDown(500);

    if (isDisplay) {
        $("#modif-container").slideUp();
        isDisplay = false;
    }
    else {
        $("#modif-container").slideDown(500);
        isDisplay = true;
    }
}

function removePanelModif() {
    //document.getElementById('modif-container').removeChild(input.parentNode);
    $("#modif-container").slideUp();
    $('body').fadeTo(400, "1");
}
