jQuery(document).ready(function($){
	(function($){

	$('#select-make').on('change',function(){
		var make_val=jQuery(this).val();
		//alert('make'+ make_val);
		
		var data = {
			'action' : 'filter_model',
	        'make_val': make_val,
	    };
	   	$('#select-model').hide();
	    $('#select-model').html(' ');
    	$('#select-model').append('<option value="" >Select Model... </option>');
    	$('#loader').show();
	    $.post(ajax_object.ajax_url, data, function(response) {
	    	if(response!=''){
	    		$('#loader').hide();
	    		$('#select-model').show();
		    	var JSONArray = $.parseJSON( response );
		    	$.each(JSONArray,function(i,outer_obj){
		    		$.each(outer_obj,function(i,data_object){
			    		$('#select-model').append('<option value="'+data_object.name+'">'+data_object.name+'</option>');
			    	});
		    	});
		    }
		    else{
		    	$('#loader').hide();
		    	$('#select-model').show();
		    	$('#select-model').append('<option value=""></option>');
		    }
		});
			
	});

	}(jQuery));
});