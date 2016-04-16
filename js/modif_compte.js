$(document).ready(function () {
		$("#modif-container").hide();

	var isDisplay = false;		$('#boutonText').text("Modifer le profil");
	
	$('#boutonText').click(function() {
	
	    if (isDisplay) {
	        $("#modif-container").slideUp();
	        isDisplay = false;	        $('#boutonText').text("Modifer le profil");
	    }
	    else {
	        $("#modif-container").slideDown(500);
	        isDisplay = true;	        $('#boutonText').text("Ne plus modifer le profil");
	    }
	});});
