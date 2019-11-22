$('document').ready(function() {
	var email_state = false;
	$('#email').on('blur', function() {
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
// on 'input';
	$('#pass2').on('blur', function() {
		var pass = $('#pass2').val();
		if (pass == '') {
			pass_state = false;
			return
		}

		$.ajax({
			url: 'register.php',
			type: 'post',
			data: {
				'pass_check' : 1,
				'pass' : pass,
			},
			success: function(response) {
				if (response == 'no_match') {
					pass_state = false;
					$('#pass2FormErr').text('Password does not match.');		
				} else if (response == 'match') {
					pass_state = true;
					$('#pass2FormErr').text('');
				}
			}
		})

/*		or: request.done(function (response){
			....
		})*/
	})
})