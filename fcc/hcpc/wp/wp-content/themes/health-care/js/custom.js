jQuery(document).ready(function($){
	(function($){
		/* registration form validation */
		$.validate({
		   form : '#rgstrform,#loginform,#resetform,#vehicle-form,#claim-form',
		   validateOnBlur : false, // disable validation when input looses focus
		    scrollToTopOnError : false,
		    modules : 'security',
	    });
		
		$('#claim-submit').click(function(e){
		   var val=$('#odometer-reading').val();
		   if(val>200){
		   		$('#odometer-reading').parent().addClass('has-error').append('<span class="help-block form-error">Odometer Reading Will be Less Than 200K</span>');
		   		e.preventDefault();
		   }
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

		/* form tabber */
		jQuery('.show-lreg-forms .forms:first-child').addClass('active');
		jQuery('#form-tab li:first-child').addClass('active-tab');
		jQuery('#form-tab li a').click(function(event){
			event.preventDefault();
			var rel_id=jQuery(this).attr('rel');
			jQuery('#form-tab li').removeClass('active-tab');
			jQuery(this).parent().addClass('active-tab');
			jQuery(this).parents().find('.forms').removeClass('active');
			jQuery(this).parents().find('#'+rel_id).addClass('active');

		});

		/* reset form popup */
		jQuery('.reset-password').click(function(){
			jQuery(this).parents().find('#login-register-popup').hide();
			jQuery(this).parents().find('#reset-pwd-form-popup').slideDown(500).css('top','150px');
			jQuery(this).parent().find('.overlay-bg').addClass('overlay-show');
		});
		
		/* vehicle form */
		jQuery('#select-year').click(function(){
			var val= jQuery(this).val();
			if(val!=''){
				jQuery('#select-make').removeAttr('disabled');
			}
		});
		jQuery('#select-make').click(function(){
			var val= jQuery(this).val();
			if(val!=''){
				jQuery('#select-model').removeAttr('disabled');
			}
		});

		/* claim form */
		/*jQuery('.claim-form-td a.enabled').click(function(){
			var height= jQuery('.claim-form').height();
			jQuery(this).parent().css('height',height);
			jQuery(this).parent().find('.claim-form').toggle(500);
			jQuery(this).parent().css('height',0);
		});*/

		/* subscriber form title change */
		jQuery('.chargify-form table tr:first-child p').text('Choose A Plan');

		/* date picker */
		 $( "#datepicker" ).datepicker();	

		 /* fancybox js */
		 jQuery('#fancybox').fancybox({
			openEffect	: 'none',
			closeEffect	: 'none'
		});


		 /* extra repair fields show */
		 var completed_checked=jQuery('#repair-completed-btn input[name="repair_completed"]:checked').val();
		 if(completed_checked=="Yes"){
		 	jQuery('.on-yes-repair-completed,.on-yes-commom-fields,.on-yes-common-shop-fields,.common-submit-fields,.completed-repair-upload,.terms-and-conditions').show();
		 }
		 else{
			if(completed_checked=="No"){
			 	jQuery('.on-No-repair-completed,.completed-repair-upload,.terms-and-conditions,.on-yes-common-shop-fields').show();
			 	var quote_checked=jQuery('#have-quote-shop-btn input[name="have_quote_shop"]:checked').val();
				 console.log( 'fvgdf'+quote_checked);
				 if(quote_checked=="Yes"){
				 	jQuery('.on-yes-commom-fields,.common-submit-fields').show();
				 	jQuery('.on-No-have-quote-shop').hide();
				 }
				else{
				 	if(quote_checked=="No"){
					 	jQuery('.on-No-have-quote-shop,.common-submit-fields').show();
					}
				}
				/*var doing_checked=jQuery('#doing-repair-btn input[name="doing_repair"]:checked').val();
				if(doing_checked=="Shop"){
				 	jQuery('.on-yes-common-shop-fields,.common-submit-fields').show();
				}*/
		 	}

		}
		

		jQuery('#repair-completed-btn input').on('change', function() {
		   var radio_val=jQuery(this).val(); 
		   	if(radio_val=='Yes'){
		   		jQuery('.on-yes-repair-completed,.on-yes-commom-fields,.on-yes-common-shop-fields,.common-submit-fields,.completed-repair-upload,.terms-and-conditions').show();
		   		jQuery('.on-No-repair-completed, .on-No-have-quote-shop,.future-repair-upload').hide();
   		   		jQuery('#quote-no').attr("checked","checked");
   		   		jQuery('#self').attr("checked","checked");
   			}
		   	else{
		   		jQuery('.on-yes-repair-completed,.on-yes-commom-fields,.completed-repair-upload').hide();
		   		jQuery('.on-No-repair-completed,.completed-repair-upload,.terms-and-conditions').show();
		   		jQuery('#quote-no').attr("checked","checked");
		   		jQuery(this).parents().find('.on-No-have-quote-shop,.common-submit-fields').show();
		   	}
		});

		jQuery('#have-quote-shop-btn input').on('change', function() {
		   var radio_valu=jQuery(this).val(); 
		   	if(radio_valu=='Yes'){
		   		jQuery('.on-yes-commom-fields,.common-submit-fields').show();
		   		jQuery('.on-No-have-quote-shop').hide();
		   	}
		   	else{
		   		jQuery('.on-yes-commom-fields').hide();
		   		jQuery('.on-No-have-quote-shop,.common-submit-fields').show();
		   	}
		});

		/*jQuery('#doing-repair-btn input').on('change', function() {
		   var radio_valu=jQuery(this).val(); 
		   	if(radio_valu=='Shop'){
		   		jQuery('.on-yes-common-shop-fields,.common-submit-fields').show();
		   	}
		   	else{
		   		jQuery('.on-yes-common-shop-fields').hide();
		   	}
		});
*/
	
	}(jQuery));
});
