jQuery(document).ready( function($) {
	$(".accordian-heading").click( function() {
		var ques_id = jQuery(this).attr('data-id');
		var data = {
			action: 'ADV_WFAQ_add_trending',
            question_id: ques_id
		};
		// the_ajax_script.ajaxurl is a variable that will contain the url to the ajax processing file
	 	$.post(the_ajax_script.ajaxurl, data, function(response) {
			
	 	});
	 	return false;
	});
});