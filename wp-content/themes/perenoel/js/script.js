
/* Script on scroll
------------------------------------------------------------------------------*/
$(window).scroll(function() {

	
});

/* Script on resiz
------------------------------------------------------------------------------*/
$(window).resize(function() {

});

/* Script on load
------------------------------------------------------------------------------*/
$(window).load(function() {
	
});

/* Script on ready
------------------------------------------------------------------------------*/	
$(document).ready(function(){
	
	//---- navigation script ----//
	 $(".hamburger").click(function(){
		if($(this).hasClass("active")){
			$(this).removeClass("active");
			$(".nav-box").removeClass("mobile-nav-open");
			
		}else{
			$(this).addClass("active");
			$(".nav-box").addClass("mobile-nav-open");
			$(".link-my-account").removeClass("active");
		}
	 });
	
	//---- my account script ----//
	 $(".link-my-account").click(function(){
		if($(this).hasClass("active")){
			$(this).removeClass("active");
		}else{
			$(this).addClass("active");
			$(".hamburger").removeClass("active");
			$(".nav-box").removeClass("mobile-nav-open");
		}
	 });
	
});


/* Script all functions
------------------------------------------------------------------------------*/	

	



	