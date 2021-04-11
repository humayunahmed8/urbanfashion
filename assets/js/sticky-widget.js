
(function ($) {
	"use strict";

    jQuery(document).ready(function($){

	




		
  var $window = $(window);  
  var $sidebar = $(".content-sticky-block"); 
  var $sidebarHeight = $sidebar.innerHeight();   
  var $footerOffsetTop = $(".sticky-target").offset().top; 
  var $sidebarOffset = $sidebar.offset();
  
  $window.scroll(function() {
    if($window.scrollTop() > $sidebarOffset.top) {
      $sidebar.addClass("fixed");   
    } else {
      $sidebar.removeClass("fixed");   
    }    
    if($window.scrollTop() + $sidebarHeight > $footerOffsetTop) {
      $sidebar.css({"top" : -($window.scrollTop() + $sidebarHeight - $footerOffsetTop)});        
    } else {
      $sidebar.css({"top": "0",});  
    }    
  });   


	});
	
	


}(jQuery));	




