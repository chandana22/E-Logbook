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
	  experiments: {
      identifier : 'exp',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a number'
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
	

	 USN: {
      identifier : 'USN',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a usn'
        }
      ]
    },
	batch: {
      identifier  : 'batch',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please select a batch'
        }
      ]
    },
	subject: {
      identifier  : 'subject',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a subject'
        }
      ]
    },
	labs: {
      identifier : 'labs',
      rules: [
        {
          type   : 'checked',
          prompt : ''
        }
      ]
    },
	terms: {
      identifier : 'terms',
      rules: [
        {
          type   : 'checked',
          
        }
      ]
    }
        
      }
    ;

    $('.ui.dropdown')
      .dropdown({
        on: 'hover'
      },'destroy')
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
$('.green.leaf')

  .transition('set looping')
  .transition('tada', '2000ms')
;

 $('.positive.button')
  .on('click', function(value) {
     $('.basic.modal')
  .modal('setting', 'closable', false)
  .modal('show')
;
	}
  )
;

    setInterval(changeSides, 3000);

  })
;