$(document).ready(function () {
	
	$("#com").hide();
	
	$('#masquer-com').text("Afficher les commentaires");
	
	var isDisplay = false;
		
	$('#masquer-com').click(function() {
	
	    if (isDisplay) {
	        $("#com").slideUp();
	        isDisplay = false;
	        $('#masquer-com').text("Afficher les commentaires");
	    } else {
	        $("#com").slideDown(500);
	        isDisplay = true;
	        $('#masquer-com').text("Masquer les commentaires");
	    }
	});
		
});