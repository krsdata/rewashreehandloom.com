jQuery(document).ready(function($){
	(function($){
		/* registration form validation */
		$.validate({
		   form : '#rgstrform,#loginform,#resetform',
		   validateOnBlur : false, // disable validation when input looses focus
		    scrollToTopOnError : false,
		    modules : 'security',
	    });
	
	/* mobile menu function */
		$('#swipeNav').swipeNav();

		/* set login form field placeholder */
		jQuery('#user_login').attr({'placeholder':"Email Address or User Name	",'data-validation':"required",'data-validation-error-msg-required':"enter a user name or e-mail"});
		jQuery('#user_pass').attr({'placeholder':'Password','data-validation':"required",'data-validation-error-msg-required':"enter a password"});

	 /* login registration form popup */
		jQuery('.lg-reg-btn a').click(function(event){
	    	event.preventDefault();
	   		jQuery(this).parents().find('#login-register-popup').slideDown(500).css('top','150px');
	   		jQuery(this).parents().find('.overlay-bg').addClass('overlay-show');
	    });	
	    /* popup close */
		jQuery('.popup-close').click(function(){
			jQuery(this).parents().find('#login-register-popup').css('top','0px');
			jQuery(this).parent().hide();
			jQuery(this).parents().find('.reset-password').css('top','0px');
			jQuery(this).parents().find('.overlay-bg').removeClass('overlay-show');
		});

		/* reset form popup */
		jQuery('.reset-password').click(function(){
			jQuery(this).parents().find('#login-register-popup').hide();
			jQuery(this).parents().find('#reset-pwd-form-popup').slideDown(500).css('top','150px');
			jQuery(this).parent().find('.overlay-bg').addClass('overlay-show');
		});
		
		/* subscriber form title change */
		jQuery('.chargify-form table tr:first-child p').text('Choose A Plan');

		/* date picker */
    	$( "#datepicker" ).datepicker();	

    	/* set placeholder to top search input field */
    	jQuery('#searchform input#s').attr('placeholder','search');

        /* hide breadcrum separator for last child */
	    jQuery('.breadcrumb-container li:last-child a').next().hide();

	    /* search functio filter */
	   
	    jQuery('#RegSearchButton').click(function(){
	    	var searchProfession = jQuery('#searchProfession option:selected').val();
	    	var searchRegistration = jQuery('#searchRegistration').val();
	    	var radioVal = jQuery('input[name="search_option"]:checked').val();
	    	var match_surname = searchRegistration.match('/^\d/');
	    	//alert(match_surname);
	    	if(searchProfession == '' && searchRegistration == '' ){
	    		alert('Please enter search terms');
	    	}else if(searchProfession != '' && searchRegistration == '' ){
	    		if(radioVal == 'surnameRadioButton')
	    			alert('Please enter a surname');
	    		else
	    			alert('Please enter a registration number');
	    	}else if(searchProfession == '' && searchRegistration != '' ){
	    		alert("Please Choose a profession");
	    	}
	    	
	    	// }else if(searchRegistration != '' && radioVal == 'surnameRadioButton'  && !searchRegistration.match("/^[a-zA-Z]+$/")){
	    	// 	alert('Please enter a name, only alphabaticals characters, hyphens and appostrophe allowed');
	    	// }else if(searchRegistration != '' && radioVal == 'registrationRadioButton'  && !searchRegistration.match('/^[0-9]+$/') && searchRegistration.length<=6){
	    	// 	alert('Please enter a valid registration number');
	    	// }

	    });
	}(jQuery));
});

