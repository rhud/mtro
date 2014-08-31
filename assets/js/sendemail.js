function ajaxSend(name, email, vol, message) {
	$.ajax({
		type: "POST",
	    url: ajaxurl,
	    data: ({action: 'send_email', name: name, email: email, vol: vol, message: message}),
	    success: function(e) {
	        if(e === "success") {
	        	$(".email-response").html("<p>Your results have been successfully emailed to you.</p>"); 
	        	$(".email-response").addClass("bg-success");
	        } else {
	        	$(".email-response").html("<p>We currently cannot deliver your email. We apologise for this inconvenience.</p>");
	        	$(".email-response").addClass("bg-danger");
	        }
	    },
	    error: function() {}
	});
}