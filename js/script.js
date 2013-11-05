
$(window).load(function() {
"use strict";

//     var navheight = $('.main-nav').height();
//    $('.main-logo').css('height', navheight);
    
    $('a.comment-reply-link').click(function(){
        $('.reply-form').fadeIn();
    });
    
    $('.reply-form input#submit, .reply-form a.cancel').click(function(){
        $('.reply-form').fadeOut();
    });
 var head = $('header').height();
$('.nav').removeAttr('style').css({'position':'absolute', 'width':'100%', 'top':head, 'z-index':'888'});
   
hoverCaption();
    if($('body').width() <=1024){
  $('.nav .span5').prependTo('.main-nav');
    // $('.logo').css({'float':'left', 'margin-left':'24px'});
 }else{
      $('.nav .span5').prependTo('.nav .main-content');
     //$('.logo').css({'float':'none', 'margin-left':'0'});
 }
 var head = $('header').height();
     $('.nav').removeAttr('style').css({'position':'absolute', 'width':'100%', 'top':head, 'z-index':'888'});
$('.capText-wrapp a').hover(function(){
$('.capText-wrapp a span').addClass('icon-white');
}, function(){
$('.capText-wrapp a span').removeClass('icon-white');
});

});

function logoOnScreen(){
 if($('body').width() <=1024){
  $('.nav .span5').prependTo('.main-nav');
    // $('.logo').css({'float':'left', 'margin-left':'24px'});
 }else{
      $('.nav .span5').prependTo('.nav .main-content');
     //$('.logo').css({'float':'none', 'margin-left':'0'});
 }
}
$(window).load(function() {
    "use strict";
    $('#myModalF').on('shown', function (e) {
    colGrid();
    initFlexModal();
    
    });
        
   $('#myModal').on('shown', function (e) {
    colGrid();
    initFlexModal2();
    });
    
    function initFlexModal() {
    $('#flex1').flexslider({
    animation: 'slide'
    });
    };
//    $('#myModalF').on('shown', function (e) {
//    colGrid();
//    initFlexModal2();
//    }); 
    
    function initFlexModal2() {
    $('#flex2').flexslider({
    animation: 'slide'
    });
     
    };
    
    if($('body').width() < 503){
    $('.modal').css({'width':'85.104%', 'margin-left':'-43%'});
    }else{
    $('.modal').css({'width':'64.4%', 'margin-left':'-31.5%'});
    }
        
   
   
    $('.icons-view-link a.data-folio').on('click', function(e){
        $('.modal').css({'width':' 92.56%', 'margin-left':'-47%'});
   
 
    });
    
    $('a.data-load').on('click', function(e){
        $('.modal').css({'width':' 64.4%', 'margin-left':'-31.5%'});
   
 
    });
 
    $(function() {
        "use strict";
    $('#top').click(function() {
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
    });
    
    $('.hcaption-folio').hide(); 
    $('.folio-img').hover(function(){
     $(this).children('.hcaption-folio').fadeIn();
    },function(){
    //after hover
    $(this).children('.hcaption-folio').fadeOut();
    });
    
   $('.quote-slide .flex-direction-nav').appendTo($('.control-nav2'));
   
//$(window).ready(function(){
           // navScroll();
            //});
    
 $(document).scroll(function() {
     "use strict";
 var head = $('header').height();
                    var top = $(document).scrollTop();

                    if (top > 85) {
                       $('.nav').css({'position':'fixed', 'width':'100%', 'top':'0', 'z-index':'888'});
//navHeight();
                    }else {
                       $('.nav').removeAttr('style').css({'position':'absolute', 'width':'100%', 'top':head, 'z-index':'888'});
                    }   

                });
});


function navHeight(){
    var h = $('#nav .current').height();
		$('.nav, .menu-button').css('height',h);
}


  
  $(window).resize(function (){
      "use strict";
//      navHeight();
     var head = $('header').height();
$('.nav').removeAttr('style').css({'position':'absolute', 'width':'100%', 'top':head, 'z-index':'888'});
      $(document).scroll(function() {
 var head = $('header').height();
                    var top = $(document).scrollTop();

                    if (top > 85) {
                       $('.nav').css({'position':'fixed', 'width':'100%', 'top':'0', 'z-index':'888'});
//                    navHeight();
                    }else {
                       $('.nav').removeAttr('style').css({'position':'absolute', 'width':'100%', 'top':head, 'z-index':'888'});
                    }   

                });
      navScroll();
     logoOnScreen();
});
function navScroll(){
 
     $(window).scroll(function() {
		    var head = $('header').height();
                    var top = $(window).scrollTop();

                    if (top > 85) {
                       $('.nav').css({'position':'fixed', 'width':'100%', 'top':'0', 'z-index':'888'});
// navHeight();
                    }else {
                       $('.nav').removeAttr('style').css({'position':'absolute', 'width':'100%', 'top':head, 'z-index':'888'});
                      
                    }

         
         
                });
};
//function navHeight(){
// "use strict";
//    var navheight = $('.main-nav').height();
//    $('.main-logo').css('height', navheight);
//}
function navClick(){
 var windowHeight = $(window).height();
     var h = $('#nav .current').height();
     $('.main-nav, .main-nav .btn').click(function(){
     $('.nav').css({'overflow':'scroll', 'height':windowHeight});
     },function(){
     $('.nav').css({'position':'fixed'});
     });
}
//	definegrid = function() {
//		var browserWidth = $(window).width(); 
//		if (browserWidth >= 0) 
//		{
//            pageUnits = 'px';
//            colUnits = 'px';
//			pagewidth = 1200;
//			columns = 12;
//			columnwidth = 100;
//			gutterwidth = 0;
//			pagetopmargin = 24;
//			rowheight = 24;
//			gridonload = 'off';
//			makehugrid();
//		} 
//		if (browserWidth <= 1024) 
//		{
//            pageUnits = '%';
//            colUnits = '%';
//			pagewidth = 1024;
//			columns = 12;
//			columnwidth = 3;
//			gutterwidth = 43;
//			pagetopmargin = 21;
//			pageleftmargin = 58;
//			rowheight = 21;
//			gridonload = 'off';
//			makehugrid();
//		}
//		if (browserWidth <= 768) 
//		{
//            pageUnits = '%';
//            colUnits = '%';
//			pagewidth = 96;
//			columns = 2;
//			columnwidth = 49;
//			gutterwidth = 2;
//			pagetopmargin =21;
//			rowheight = 20;
//			gridonload = 'off';
//			makehugrid();
//		}
//	}
//    $(document).ready(function() {
//        "use strict";
//		definegrid();
//		setgridonload();
//    });    
//    
//    $(window).resize(function() {
//        "use strict";
//		definegrid();
//        setgridonresize();
//        arrowDownTable();
//       // heightImgTeam();
//    });
$(window).load(function(){ 
   "use strict";
    // Gallery
    if($(".container_folio").length){
        
        // Declare variables
        var totalImages = $(".container_folio > .item").length, 
            imageWidth = $(".container_folio > .item:first").outerWidth(true),
            totalWidth = imageWidth * totalImages - 1740,
            visibleImages = Math.round($(".folioWrapp").width() / imageWidth),
            visibleWidth = visibleImages * imageWidth + 550,
            stopPosition = (visibleWidth - totalWidth);
            
        $(".container_folio").width(totalWidth);
        
        $("#gallery-prev").click(function(e){
            if($(".container_folio").position().left < 192 && !$(".container_folio").is(":animated")){
                $(".container_folio").animate({left : "+=" + imageWidth + "px"});
            }
            return false;
            
        });
        
        $("#gallery-next").click(function(e){
            if($(".container_folio").position().left > stopPosition && !jQuery(".container_folio").is(":animated")){
                $(".container_folio").animate({left : "-=" + imageWidth + "px"});
            }
            return false;
           
        });
       
    }
        
});
function hoverCaption(){
    $('.myToggle').hide(); 
    $('.hcaption').hover(function(){
     $(this).children('.myToggle').fadeIn();
  $(this).children('.hcaption img').css('opacity','0.6');
    },function(){
    //after hover
    $(this).children('.myToggle').fadeOut();
      $(this).children('.hcaption img').css('opacity','1');
    });

}


//css margin setting
$(window).load(function(){ 

    "use strict";
$('.client ul li a img.client1').hover(function(){
    $(this).attr('src', 'img/graphcriver-color.png');
    }, function(){
    $(this).attr('src', 'img/graphcriver-gray.png');
    });
    $('.client ul li a img.client2').hover(function(){
    $(this).attr('src', 'img/videohive-color.png');
    }, function(){
    $(this).attr('src', 'img/videohive-gray.png');
    });
    $('.client ul li a img.client3').hover(function(){
    $(this).attr('src', 'img/themeforest-color.png');
    }, function(){
    $(this).attr('src', 'img/themeforest-gray.png');
    });
    $('.client ul li a img.client4').hover(function(){
    $(this).attr('src', 'img/photodune-color.png');
    }, function(){
    $(this).attr('src', 'img/photodune-gray.png');
    });
    $('.client ul li a img.client5').hover(function(){
    $(this).attr('src', 'img/audiojungle-color.png');
    }, function(){
    $(this).attr('src', 'img/audiojungle-gray.png');
    });
    
//===============
var arrowTbl = $('.price_figure').width() / 2;
$('.arrowDown').css({
    'border-left-width':arrowTbl,
    'border-right-width':arrowTbl
});
});


//function heightImgTeam(){
//   var hImg = $('.teamDet ul.social').height();
//  var bImg = $('.blog-img .img-attr').height();
// if($('body').width() <= 480){
//$('.teamDet img').css('height',hImg);
//$('.blog-img img').css('height',bImg);
// }else{
//    $('.teamDet img').css('height','auto'); 
//    $('.blog-img img').css('height','auto'); 
// }
//}
function arrowDownTable(){
   var arrowTbl = $('.price_figure').width() / 2;
$('.arrowDown').css({
    'border-left-width':arrowTbl,
    'border-right-width':arrowTbl
}); 
}
$(document).ready(function()
{
"use strict";
	//Add Inactive Class To All Accordion Headers
	$('.accordion-header, .accordion-header2').toggleClass('inactive-header');
	
	//Set The Accordion Content Width
	var contentwidth = $('.accordion-header, .accordion-header2').width();
	$('.accordion-content').css({'width' : contentwidth });
	
	//Open The First Accordion Section When Page Loads
	$('.accordion-header, .accordion-header2').first().toggleClass('active-header').toggleClass('inactive-header');
	$('.accordion-content').first().slideDown().toggleClass('open-content');
	
	// The Accordion Effect
	$('.accordion-header, .accordion-header2').click(function () {
		if($(this).is('.inactive-header')) {
			$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
		
		else {
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
	});
	
	return false;
});

//function sliderHeight(){
//    "use strict"
//    var slideActive = $('.main-flex .flexslider .flex-active-slide').height();
//    if($('body').width() < 1024){
// $('.main-flex .flexslider').css('height', slideActive); 
//    }else{
//        $('.main-flex .flexslider').css('height', 'auto');  
//    }
//}