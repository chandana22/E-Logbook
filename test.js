$(document)
  .ready(function() {

   
      validationRules = {
	  username: {
      identifier : 'username',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a username'
        }
      ]
    },
	
    password1: {
      identifier : 'password1',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a new password'
        },
        {
          type   : 'length[6]',
          prompt : 'Your new password must be at least 6 characters'
        }
      ]
    },
	   password2: {
      identifier : 'password2',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter the new password again'
        },
        {
          type   : 'length[6]',
          prompt : 'Your new password must be at least 6 characters'
        }
      ]
    },
	password: {
      identifier : 'password',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a password'
        },
        {
          type   : 'length[6]',
          prompt : 'Your password must be at least 6 characters'
        }
      ]
    },
	gender: {
      identifier  : 'gender',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a gender'
        }
      ]
    },

	 USN: {
      identifier : 'USN',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a usn'
        }
      ]
    },
terms: {
      identifier : 'terms',
      rules: [
        {
          type   : 'checked',
          prompt : 'You must agree to the terms and conditions'
        }
      ]
    }

        
      }
    ;

    $('.ui.dropdown')
      .dropdown({
        on: 'hover'
      })
    ;

    $('.ui.form')
      .form(validationRules, {
		inline : true,
        on: 'blur'

      })
    ;

    $('.masthead .information')
      .transition('scale in')
    ;
	$('.ui.radio.checkbox')
  .checkbox()
;
	$('.ui.toggle.checkbox')
  .checkbox()
;
$('.ui.checkbox')
  .checkbox()
;
$('.enable.button')
  .on('click', function() {
    $(this)
      .nextAll('.checkbox')
        .checkbox('enable')
    ;
  })
;
$('.disable.button')
  .on('click', function() {
    $(this)
      .nextAll('.checkbox')
        .checkbox('disable')
    ;
  })
;
$('.toggle.button')
  .on('click', function() {
    $(this)
      .nextAll('.checkbox')
        .checkbox('toggle')
    ;
  })
;
    setInterval(changeSides, 3000);

  })
;