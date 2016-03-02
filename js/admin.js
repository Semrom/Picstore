$(document).ready(function() {
  $('#form-admin').submit(function() {
		var donnees = $('#form-admin').serialize();
		/*console.log(donnees);*/
		$('.login-block').fadeOut(500, function() {
			$.ajax({
				url: '../php/controller/authentification_admin.php',
				type: 'post',
				data: donnees,
				success: function(data) {
					if (data.success) {
						$('#error-zone').fadeOut(500);
						$(location).attr('href', 'compte.php');
					} else {
						$('.login-block').fadeIn(500);
						$('#error-zone')
							.html(data.message)
							.fadeIn(500);
					}
				},
				error: function(data) {
					alert("Erreur lors de l'envoi des données en Ajax.");
					$('.login-block').fadeIn(500);
				}
			});
		});

		return false;
	});
});
