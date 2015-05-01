jQuery(document).ready(function ($) {
	"use strict";
	
	$(document).on('click', '.dropdown-toggle', function(){
		var $this = $(this);
		if( $this.attr('href') !== "#" && $(window).width() > 1025 ){
			window.location = $this.attr('href');
		}
	});
	
	$(document).ready(function() {
      $('body').jpreLoader({
			splashVPos: '0%',
			loaderVPos: '50%',
			showSplash: false,
			showPercentage: true,
			autoClose: true,
		});
    });

    jQuery(document).ready(function($) { //noconflict wrapper
		$('input#submit').addClass('btn btn-default blog-button button-dark');
	});//end noconflict
	
	/*=============================SUBSCRIPTION===================================*/
	$(document).on( 'keypress', '.subscribe', function(e){		
		var code = e.keyCode || e.which;
		if(code == 13) {
			var $this = $(this);
			var parent = $this.parents('.lex_newsletter');
			var result_div = parent.find('.subscription_result');
			result_div.html( '' );
			
			$.ajax({
				url: ajaxurl,
				method: "POST",
				data: {
					email: $this.val(),
					action: 'subscribe'
				},
				dataType: "JSON",
				success: function( response ){
					if( !response.error ){
						result_div.html( '<p class="success">'+response.success+'</p>' );
					}
					else{
						result_div.html( '<p class="error">'+response.error+'</p>' );
					}
				},
				error: function(){
					
				},
				complete: function(){
					
				}
			});
		}
	});	
		
	function preloadModal( fadeSpeed ){
		$('.modal-loader-wrap').fadeIn( fadeSpeed );
	}	
	
	/* MODALS */
	if( $('.open_modal').length > 0 ){
		var type = $('.open_modal').val();
		$(document).on( 'click', '.lex_modal', function(e){
			e.preventDefault();
			preloadModal(10);
			var $this = $(this);
			var link = $this.attr('href');
			$.ajax({
				url: link,
				dataType: "HTML",
				success: function( response ){
					switch( type ){
						case 'case_result':
							var result = $(response).find('.case-result-box').html();
							var content = $(response).find('#content').html(); 
							$('.modal_content').html( '<div class="case-result-box">' + result + '</div><hr class="divider"  />' + content );
							$('.modal').modal('show');
							
							break;
						case 'lawyer':
							var img = $(response).find('.lex_modal_image').attr('src');
							var name = $(response).find('.lex_modal_name').html();
							var position = $(response).find('.lex_modal_position').html();
							var social = $(response).find('.lex_modal_social').html();
							var content = $(response).find('.lex_modal_content').html(); 
							
							if( $(response).find('.lex_modal_image').length > 0 ){
								img = '<img class="media-object img-thumbnail img-responsive img-circle center-block" src="'+img+'"  title="" alt="" />';
							}
							else{
								img = '';
							}
							
							$('.modal_content').html( 
								img +' \
								<h3 class="text-center">'+name+'</h3> \
								<h6 class="subheading text-center"><i>'+position+'</i></h6> \
								<div class="social text-center"> \
									'+social+' \
								</div> \
								<hr class="divider" /> \
								' + content );
							$('.modal').modal('show');
							
							break;
						case 'practice_area':
							var content = $(response).find('#content').html();
							$('.modal_content').html( content );
							$('.modal').modal('show');							
							break;
					}
				},
				error: function( response ){
				},
				complete: function(){
					$('.modal-loader-wrap').fadeOut();
				}
			})
			
		});
	}
	 
    /*********** Navigation fixed top **********/
    if ($(window).width() > 1025) {
        $('.navbar-brand').hide();
    } else {
        $('.navbar-brand').show();
    }

    $('.nav.navbar-nav.navbar-right').hide();

	var main_nav = $('.navbar.navbar-default');
	var lex_nav_trig =  $('.lex_nav_trig');
	
	$(window).scroll(function () {
		var offset = lex_nav_trig.offset();
		var top = offset.top - $(document).scrollTop();
		if ( top <= 0 ) {
			main_nav.addClass('fixed-nav');
			$('.navbar-brand').show();
			$('.nav.navbar-nav.navbar-right').show();
			$('.container_toggle').removeClass('container').addClass('container-fluid');
		} else {
			main_nav.removeClass('fixed-nav');
			if ($(window).width() >= 1025) {
				$('.navbar-brand').hide()
			} else {
				$('.navbar-brand').show()
			}
			$('.nav.navbar-nav.navbar-right').hide();
			$('.container_toggle').removeClass('container-fluid').addClass('container');
		}
	});
	
    /*********** count numbers *************/
    $('.counter').counterUp({
        delay: 30,
        time: 2000
    });

    /*********** intro text changing *************/
    $(".rotate").textrotator({
        animation: "dissolve",
        separator: "[dyn]",
        speed: 5000
    });

    /****** open drop down on hover ********/
    if ($(window).width() >= 767) {
        $('ul.nav li.dropdown, ul.nav li.dropdown-submenu').hover(function () {
            $(this).find(' > .dropdown-menu').stop(true, true).delay(0).fadeIn();
        }, function () {
            $(this).find(' > .dropdown-menu').stop(true, true).delay(0).fadeOut();

        });
    }

    /*********** to top ***********/
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $('.to-top').fadeIn();
            } else {
                $('.to-top').fadeOut();
            }
        });

        $('.to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

    /*************** sliding sidebar ***********/
    if ($(window).width() > 1025) {

        var $sidebar = $('.affix-box'),
            $content = $('#content');

        if ($sidebar.length > 0 && $content.length > 0) {
            var $window = $(window),
                offset = $sidebar.offset(),
                topPadding = 220,
                timer;

            $window.scroll(function () {
                clearTimeout(timer);
                timer = setTimeout(function () {
                    if ($content.height() > $sidebar.height()) {
                        var new_margin = $window.scrollTop() - offset.top + topPadding;
                        if ($window.scrollTop() > offset.top && ($sidebar.height() + new_margin) <= $content.height()) {
                            // Following the scroll...
                            $sidebar.stop().animate({
                                marginTop: new_margin
                            });
                        } else if (($sidebar.height() + new_margin) > $content.height()) {
                            // Reached the bottom...
                            $sidebar.stop().animate({
                                marginTop: $content.height() - $sidebar.height()
                            });
                        } else if ($window.scrollTop() <= offset.top) {
                            // Initial position...
                            $sidebar.stop().animate({
                                marginTop: 0
                            });
                        }
                    }
                }, 0);
            });
        }

    }
	
	/* masonry */
	var $container = $('.masonry');
	$container.imagesLoaded(function() {
		$container.masonry({
			itemSelector: '.post-box',
			columnWidth: '.post-box',
			transitionDuration: 400
		});
	});	

	/* CONTACT FORM VALIDATION */
	if( $('#captcha').length > 0 ){
		$.ajax({
			url: ajaxurl,
			method: "POST",
			data: {
				action: 'captcha',
				new_captcha: 'yes'
			},
			dataType: "JSON",
			success: function(response){
				$('#captcha').attr('placeholder',response.captcha);
				$('#captcha').val();
			}
		})
	}
	
	$("#feedbackSubmit").click(function() {
		var $btn = $(this);
		$btn.button('loading');
		//clear any errors
		contactForm.clearErrors();

		//do a little client-side validation -- check that each field has a value and e-mail field is in proper format
		var hasErrors = false;
		$('#feedbackForm input,textarea').not('.optional').each(function() {
			if (!$(this).val()) {
				hasErrors = true;
				contactForm.addError($(this));
			}
		});
		var $email = $('#email');
		if (!contactForm.isValidEmail($email.val())) {
			hasErrors = true;
			contactForm.addError($email);
		}

		var $phone = $('#phone');
		if (!contactForm.isValidPhone($phone.val())) {
			hasErrors = true;
			contactForm.addError($phone);
		}

		//if there are any errors return without sending e-mail
		if (hasErrors) {
			$btn.button('reset');
			return false;
		}

		//send the feedback e-mail
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: $("#feedbackForm").serialize(),
			dataType: "JSON",
			success: function(data) {
				contactForm.addAjaxMessage(data.message, false);
				$('#captcha').attr( 'placeholder', data.captcha );
				$('#captcha').val('');
			},
			error: function(response) {
				contactForm.addAjaxMessage(response.responseJSON.message, true);
				$('#captcha').attr( 'placeholder', response.responseJSON.captcha );
				$('#captcha').val('');
			},
			complete: function() {
				$btn.button('reset');
			}
		});
		return false;
	});
	$('#feedbackForm input').change(function () {
		var asteriskSpan = $(this).siblings('.glyphicon-asterisk');
		if ($(this).val()) {
			asteriskSpan.css('color', '#00FF00');
		} 
		else {
			asteriskSpan.css('color', 'black');
		}
	});


//namespace as not to pollute global namespace
	var contactForm = {
		isValidEmail: function (email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		},
		/**
		* Validates that phone number has 10 digits.
		*
		* @param  {String}  phone phone number to validate
		* @return {Boolean} if phone number is valid
		*/
		isValidPhone: function (phone) {
			phone = phone.replace(/[^0-9]/g, '');
			return (phone.length > 3);
		},
		clearErrors: function () {
			$('#emailAlert').remove();
			$('#feedbackForm .help-block').hide();
			$('#feedbackForm .form-group').removeClass('has-error');
		},
		clearForm: function () {
			$('.glyphicon-asterisk').css('color', 'black');
			$('#feedbackForm input,textarea').val("");
		},
		addError: function ($input) {
			$input.siblings('.help-block').show();
			$input.parent('.form-group').addClass('has-error');
		},
		addAjaxMessage: function(msg, isError) {
			$("#feedbackSubmit").after('<div id="emailAlert" class="alert alert-' + (isError ? 'danger' : 'success') + '" style="margin-top: 5px;">' + $('<div/>').text(msg).html() + '</div>');
		}
	};
	
});