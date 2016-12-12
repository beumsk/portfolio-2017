// smooth scrollspy
	$(function () {
	  $('li>a').on('click', function(e) {
	    e.preventDefault();
	    var hash = this.hash;
	    $('html, body').animate({
	      scrollTop: $(this.hash).offset().top
	    }, 500, function(){
	      window.location.hash = hash;
	    });
	  });

	});

	$(function () {
		$('#send_form').on('click', function() {
			$('#send_form').text('Thank you !')
		});
	});