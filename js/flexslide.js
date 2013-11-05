$(window).load(function(){
//     var imgHeight = $('.flexslider .slides li img').height();
//    $('.flexslider .slides').css('height',imgHeight);
  
    $('.flexcarousel .slides img').css('height','264px');
   
   
      $('.flexslider').flexslider({
        animation: "slide"
        
      });
    
    
    });

$(window).load(function(){
    colGrid();
      $('.quote-slide').flexslider({
        animation: "slide",
	
      });
    });
/*$(window).load(function(){

 $('.flexslider .flex-direction-nav').appendTo($('.wrapp-nav'));
     }); */
  $(window).load(function(){
 $('#flex-testi').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 400,
        minItems: 1,
        maxItems: 3
      });
     
      });

//$(window).resize(function (){
//sliderHeight();
// });
//
//function sliderHeight(){
//    "use strict"
//    var slideActive = $('.main-flex .flexslider .flex-active-slide').height();
//    var slideMain = $('.main-flex .flexslider .flex-viewport').height();
//    if($('body').width() <= 800){
//        $('.main-flex .flexslider .flex-viewport').css('height', slideActive); 
//  $('.main-flex .flexslider .slides').css('height', slideActive); 
//    }else{
//        $('.main-flex .flex-viewport').css('height', 'auto');  
//    }
//}
//        
//        function navFlex(){
//            if($('body').width() < 1343){
//                 $('.flexcarousel .flex-direction-nav .flex-next').css({'right':'0'});
//                $('.flexcarousel .flex-direction-nav .flex-prev').css({'left':'0'});
//            }else{
//                $('.flexcarousel .flex-direction-nav .flex-next').css({'right':'-2.5%'});
//                $('.flexcarousel .flex-direction-nav .flex-prev').css({'left':'-2.5%'});
//            }
//        };