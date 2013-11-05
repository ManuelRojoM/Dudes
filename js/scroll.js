$(window).load(function(){
    "use strict";
$(window)._scrollable();
	$('#nav').onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollOffset: 192,
        scrollThreshold: 0.5,
        scrollSpeed: 1000
		
    });
  
//    $('#nav li:first-child a, #top').click(function(){
//        $('.nav').css({'position':'relative', 'width':'100%', 'bottom':'0', 'z-index':'999'});
//    });
//    
//    $('#nav li:nth-child(2) a, #nav li:nth-child(3) a, #nav li:nth-child(4) a,  #nav li:nth-child(5) a,  #nav li:nth-child(6) a').click(function(){
//        $('.nav').removeAttr('style').css({'position':'fixed', 'width':'100%', 'top':'0', 'z-index':'999'});
//    });
   $(' #nav li:last-child() a').click(function(){
//        $(' #nav li:nth-last-child(2) a').addClass('current');
       // $(' #nav li:last-child()').removeClass('current');
       scrollNav();
   
    
  return false;
   });
   /* $(window).scroll(function () {
  $('.nav').css({'position':'fixed', 'width':'100%', 'top':'0', 'z-index':'9999'});
    });*/

});
function scrollNav(){
 $(window)._scrollable();
	$('#nav').onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollOffset: 192,
        scrollThreshold: 0.5,
        scrollSpeed: 1000
		
    });   
}