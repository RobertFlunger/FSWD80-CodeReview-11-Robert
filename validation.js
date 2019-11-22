$('document').ready(function() {
	var email_state = false;

	$('#email').on('keyup', function() {
		var email = $('#email').val();

		if (email == '') {
			email_state = false;
			return
		}

		$.ajax({
			url: 'register.php',
			type: 'post',
			data: {
				'email_check' : 1,
				'email' : email,
			}, 
			success: function(response) {
				if (response == 'taken') {
					email_state = false;
					$('#emailFormErr').text('Email is already taken.');
				} else if (response == 'not_taken') {
					email_state = true;
					$('#emailFormErr').text('');
				}
			}
		})
	});



})