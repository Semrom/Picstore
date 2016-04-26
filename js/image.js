$(document).ready(function () {
		var url = $(location).attr('href');		/* RÉCUPÈRE LES PARAMÈTRES DE L'URL */		function getUrlParameter(sParam)	{	    var sPageURL = window.location.search.substring(1);	    var sURLVariables = sPageURL.split('&');	    for (var i = 0; i < sURLVariables.length; i++)	    {	        var sParameterName = sURLVariables[i].split('=');	        if (sParameterName[0] == sParam)	        {	            return sParameterName[1];	        }	    }	    	    return "FAIL";	}		/* CLIC SUR LE BOUTON "AIMER" */		$('#aimer').click(function() {				var id_usr = $(this).attr('data-user');		var id_img = getUrlParameter('id');		var operation = $(this).attr('data-op');				$.ajax({			url: 'php/controller/aimer_operation.php',			type: 'POST',			data: "id_usr=" + id_usr + "&id_img=" + id_img + "&op=" + operation,			success: function(data) {							if (data.success) {					window.location.href = url;				} else {					alert("une erreur est survenue : " + data.message);				}			},			error: function(data) {				alert("Erreur du serveur, merci de réessayer (Code : 002).");			}		});			});		/* SAVOIR SI UN UTILISATEUR A DÉJÀ AIMÉ L'IMAGE COURANTE */		function dejaAimer(user, id, nbJaime) {				$.ajax({			url: 'php/controller/aimer_operation.php',			type: 'POST',			data: "id_usr=" + user + "&id_img=" + id + "&op=verif",			success: function(data) {				if (data.success) {					$('#aimer').text("Je n'aime plus (" + nbJaime + ")");					$('#aimer').attr('data-op', 'dislike');									} else {					$('#aimer').text("J'aime (" + nbJaime + ")");					$('#aimer').attr('data-op', 'like');				}			},			error: function(data) {				alert("Erreur du serveur, merci de réessayer (Code : 001).");			}		});	}		var user = $('#aimer').data('user');	var jaime = $('#aimer').data('jaime');	var id = getUrlParameter("id");		dejaAimer(user, id, jaime);	
	$("#com").hide();
	
	$('#masquer-com').text("Afficher les derniers commentaires");
	
	var isDisplay = false;
		
	$('#masquer-com').click(function() {
	
	    if (isDisplay) {
	        $("#com").slideUp();
	        isDisplay = false;
	        $('#masquer-com').text("Afficher les derniers commentaires");
	    } else {
	        $("#com").slideDown(500);
	        isDisplay = true;
	        $('#masquer-com').text("Masquer les commentaires");
	    }
	});		
		
});