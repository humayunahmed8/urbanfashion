(function ($) {
	"use strict";

    jQuery(document).ready(function($){


      // Slick Nav for Main Menu 

   		$("#single-page-navigation").slicknav({
          allowParentLinks: true,
          prependTo: '.responsive-menu-wrap',
          label: 'MENU',
      });


      // Nice Select 

      $('select').niceSelect();


      // Scroll to Top 

     jQuery("#scrollTop").click(function () {
          jQuery("body,html").animate({
              scrollTop: 0
          }, 600);
      });
      jQuery(window).scroll(function () {
          if (jQuery(window).scrollTop() > 250) {
              jQuery("#scrollTop").addClass("visible");
          } else {
              jQuery("#scrollTop").removeClass("visible");
          }
      });


      // Collpasable Search Bar

      $(".search-btn").click(function(){
          $(".search-container form").toggleClass("active_search");
          $(".go_btn").addClass("search_active_go_btn");
          $(".search-btn").toggleClass("search_close");
      });


      // Single Post Share 

      $('.share-buttons li a').click(function(e) {
          e.preventDefault();
          window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
          return false;
      });


    });



    // Window Load JS Load Here

    jQuery(window).load(function(){


    });


}(jQuery));	

