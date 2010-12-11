$(document).ready(function() {


		
	// triangle pointer prepend class
	
	
	$("li.active").prepend("<div id='triangle'></div>");	
		
		
	// menutoggle system
	
	$(".toggle").click(function() {
				
		if($(this).hasClass("active")) {
			$("#triangle").hide();
			$(this).toggleClass("active");
			$("#menuContainer.open").removeClass("open").addClass("closed").slideUp();
			}
		
		else if($("#menuContainer").hasClass("closed")) {			
			$("#triangle").show();
			$("#menuContainer").removeClass("closed").addClass("open").slideDown();
			$(this).addClass("active");
			}
		
		if($("#menuContainer").hasClass("open")) {
					
			if ($("#quoteToggle").hasClass("active")) {
	  	  		$("#quoteToggle.active").removeClass("active");
	 	   		$(this).toggleClass("active");
		   		}

	    	else if ($("#menuToggle").hasClass("active")) {
	   			$("#menuToggle.active").removeClass("active");
	    		$(this).toggleClass("active");
	    		}
			
			else {
				$(this).addClass("active");
				}


				if($("#menuToggle").hasClass("active")) {
					$("#siloMenu").animate({left:'0'});
					$("#quoteMenu").animate({left:'980px'});
				 	$("#triangle").animate({left: '80px'});
					}
				else if($("#quoteToggle").hasClass("active")) {
					
					$("#siloMenu").animate({left:'-980px'});
					$("#quoteMenu").animate({left:'0'});
					$("#triangle").animate({left: '905px'});
					}

			}

   		});





	// focusin and out function for sitesearch input

 	$("#siteSearch input").focusin(function() {
   		$(this).val("");
   			})
   		.focusout(function() {
   			$(this).val("Search");
   		});
   		
		
		
	// equal height function for column layouts
	
	function equalHeight(group) {
		var tallest = 0;
		group.each(function() {
			var thisHeight = $(this).height();
			if(thisHeight > tallest) {
				tallest = thisHeight;
			}
		});
		group.height(tallest);
	}
	
	// give all featurette columns equal height
	
	equalHeight($(".featurettes li"));



	// give aside the height of it's parent container to stretch 100% 
   	$("aside.leftCol").height($("aside.leftCol").parent().height());
   	$("aside.rightCol").height($("aside.rightCol").parent().height());

   		
 	});