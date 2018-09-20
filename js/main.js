jQuery(function($) {'use strict',

	//#main-slider
	/*$(function(){
		$('#main-slider.carousel').carousel({
			interval: 10000
		});
	});*/


	// accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});

	//Initiat WOW JS
	new WOW().init();

	// portfolio filter
	$(window).load(function(){'use strict';
		var $portfolio_selectors = $('.portfolio-filter >li>a');
		var $portfolio = $('.portfolio-items');
		$portfolio.isotope({
			itemSelector : '.portfolio-item',
			layoutMode : 'fitRows'
		});
		
		$portfolio_selectors.on('click', function(){
			$portfolio_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$portfolio.isotope({ filter: selector });
			return false;
		});
	});

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();			
		$.ajax({
			type:'POST',
			url: '../send.php', 
			data: $(this).serialize(),	
			success: function(data){
				if(data=="OK"){
					document.getElementById('main-contact-form').reset();
					$('div#flash_message').removeClass('alert-danger alert-warning').addClass('alert-success');			
					$('div#flash_message').html('<p>El mensaje fue enviado satisfactoriamente.</p>').delay(2200).fadeOut(800);
				}
				else{					
					$('div#flash_message').removeClass('alert-success alert-warning').addClass('alert-danger');
					$('div#flash_message').html('<p>El mensaje no se envió, no olvide demostrar que no es un robot.</p>').delay(2200).fadeOut(800);	
				}
			},
			beforeSend: function(){
				$('div#flash_message').removeClass('alert-danger alert-success').addClass('alert-warning');
				$('div#flash_message').html('<p> <i class="fa fa-spinner fa-spin"></i> El mensaje se está intentando enviar...</p>').fadeIn(500);
			}
		});
	});

	
	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});	

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	
});