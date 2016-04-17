$(document).ready(function () {
		/* RÉCUPÈRE LES PARAMÈTRES DE L'URL */		function getUrlParameter(sParam)	{	    var sPageURL = window.location.search.substring(1);	    var sURLVariables = sPageURL.split('&');	    for (var i = 0; i < sURLVariables.length; i++)	    {	        var sParameterName = sURLVariables[i].split('=');	        if (sParameterName[0] == sParam)	        {	            return sParameterName[1];	        }	    }	    	    return "FAIL";	}		$("#modif-container").hide();		$('#boutonText').text("Modifer le profil");		var isDisplay = false;			var erreur = getUrlParameter('err');	var success = getUrlParameter('succ');		if (erreur != "FAIL") {				$("#modif-container").slideDown(500);		isDisplay = true;		$('#boutonText').text("Ne plus modifer le profil");	}		if (success != "FAIL") {				$('#ok-zone').fadeIn(500);	}		
	$('#boutonText').click(function() {
	
	    if (isDisplay) {
	        $("#modif-container").slideUp();
	        isDisplay = false;	        $('#boutonText').text("Modifer le profil");	    } else {
	        $("#modif-container").slideDown(500);
	        isDisplay = true;	        $('#boutonText').text("Ne plus modifer le profil");
	    }
	});		});
