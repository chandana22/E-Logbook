$(document)
  .ready(function() {

    var
      changeSides = function() {
        $('.ui.shape')
          .eq(0)
            .shape('flip over')
            .end()
          .eq(1)
            .shape('flip over')
            .end()
          .eq(2)
            .shape('flip back')
            .end()
          .eq(3)
            .shape('flip back')
            .end()
        ;
		
 
      },
      validationRules = {
        firstName: {
          identifier  : 'USN',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter your USN number'
            }
          ]
        }
      }
    ;
	$("#tell").hide();
    $('.ui.dropdown')
      .dropdown({
        on: 'hover'
      })
    ;

    $('.ui.form')
      .form(validationRules, {
		inline:true,
		on: 'blur'
      })
    ;

    $('.masthead .information')
      .transition('scale in')
    ;

	
	$('.ui.dimmable')
		.dimmer({
    on: 'hover'
  })
;

  $("#show").click(function(){
    $("#tell").toggle();
	var t= $("#bu").text();
	$("#bu").text(t=='Read More'?'Read Less':'Read More');
  });
 

    setInterval(changeSides, 3000);

  })
;