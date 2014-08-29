/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      	// JavaScript to be fired on all pages
      	
      	addToHomescreen({
      		startDelay: 1,
      		maxDisplayCount: 0
      	});
      	var resP = 0, resM = 0, resT = 0, resE = 0, resG = 0, resL = 0, resC = 0;
      	// P = Prophesy
      	// M = Ministry
      	// T = Teaching
      	// E = Exhorter
      	// G = Giver
      	// L = Leading
      	// C = Mercy
      	
      	//$(".result").hide();
      	
      	$(".btn").click(function() {
			var score = $(this).find("input").val();
			var parent = '#' + $(this).parent().attr('id');
			$(parent).addClass("done").children("label").addClass("unchecked");
			$(parent).parent().find('input.answer').val(score);
			
			var answer = "-", comp = 0, uncomp = 0;
			$(".answer").each(function(index){
				answer = $(this).val();
				if(answer !== "-") {
					comp++;
				} else {
					uncomp++;
				}
			});
			var percentage = parseFloat((comp / 175) * 100).toFixed(1);
			var perString = percentage + "% COMPLETE";
			$(".percentage").text(perString);
			//console.log(percentage + "%");
			
			if (uncomp === 0) {
				$(".tellme").text("Tell Me!").removeClass("disabled").addClass("btn-success");
			}
		});
      	
      	$(".form").submit(function( event ) {
      	  	event.preventDefault();
      	  	calculateScore();
      	  	$("#mgs").fadeOut(400);
      		$(".result").fadeIn(400);
      		$("html, body").animate({scrollTop: 0}, 1000);
      	});
      	
      	function calculateScore() {
      		resP = 0; resM = 0; resT = 0; resE = 0; resG = 0; resL = 0; resC = 0;
      		$(".answer").each(function(index){
      			var a = $(this).val();
      			i = (index + 1) % 7;
      			console.log("Q. " + parseInt(index + 1) + ": " + a);
      			switch(i) {
      				case 1:
      					resP = resP + parseFloat(a);
      					break;
      				case 2:
      					resM = resM + parseFloat(a);
      					break;
      				case 3:
      					resT = resT + parseFloat(a);
      					break;
      				case 4:
      					resE = resE + parseFloat(a);
      					break;
      				case 5:
      					resG = resG + parseFloat(a);
      					break;
      				case 6:
      					resL = resL + parseFloat(a);
      					break;
      				case 0:
      					resC = resC + parseFloat(a);
      					break;
      			}
      			$("#p").text(resP);
      			$("#m").text(resM);
      			$("#t").text(resT);
      			$("#e").text(resE);
      			$("#g").text(resG);
      			$("#l").text(resL);
      			$("#c").text(resC);
      			
      			$(".sort>h2").tsort('span', {order: 'desc'});
      			      			
      		});
      	}
      	
      	$('[data-toggle="popover"]').popover({trigger: 'click',html: true});
      	
      	$("#print").click(function() {
      		var emailName = $(".name").val();
      		if(emailName !== "") {
      			$('[data-toggle="popover"]').popover('hide');
      			$("#submitted-name").text("Name: " + emailName);
      			window.print();
      		} else {
      			
	      		$(document).on('click', '#popover-cancel', function(){ 
	      			$('[data-toggle="popover"]').popover('hide');
	      		});
	      		$(document).on('click', '#popover-print', function(){ 
	      			var name = $("#popover-name").val();
	      			if(name !== "") {
	      				$("#submitted-name").text("Name: " + name);
	      				$('[data-toggle="popover"]').popover('hide');
	      				window.print();
	      			} else {
	      				alert("Please enter your name.");
	      			}
	      		});
	      	}
      	});
      	
      	$("#send").click(function(){
      		var name = $(".name").val();
      		var email = $(".email").val();
      		$("#submitted-name").text("Name: " + emailName);
      		var message = $(".sort").html();
      		
      		var flag = 1;
      		
      		if(name === "") {
      			$(".name").parent().removeClass("has-success");
      			$(".name").parent().addClass("has-error");
      			flag = 0;
      		} else {
      			$(".name").parent().addClass("has-success");
      			$(".name").parent().removeClass("has-error");
      			flag = 1;
      		}
      		
      		var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
      		
      		if(email === "" || !email_reg.test($.trim(email))){
      		    $(".email").parent().removeClass("has-success");
      		    $(".email").parent().addClass("has-error");     
      		    flag = 0;      
      		} else {
      			$(".email").parent().addClass("has-success");
      			$(".email").parent().removeClass("has-error");
      			if(flag !== 0){
      				flag = 1;
      			}
      		}
      		
      		if (flag === 0) {
      			return false;
      		}
      		
      		ajaxSend(name, email, message);
      	});	
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
