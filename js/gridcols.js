    $(window).load(function(){
        "use strict";
        colWidth();
//        var windowHeight = $(window).height() - 100;
//        
//        var  wrapp = $('.wrapper').width();
//        if($('.sidebar').width() == 400){
//            $('.main-content').css('width', '800px');
//        }else {
//            $('.main-content').css('width', wrapp);
//        }
        colGrid();
        startProgressbar();
        $(document).ready(function(){
        "use strict";
//        var windowHeight = $(window).height() - 100;
//            var h = $('#nav .current').height();
        if($('.main-content').width() <= 900){
        $('.main-content .span3 .col').css('width', '94%');
        $('.main-content .span4 .col').css('width', '94%');
        $('.main-content .span6 .col').css('width', '94%');
        $('.main-content .span8 .col').css('width', '94%');
        $('.main-content .span12 .col').css('width', '94%');
    //    $('ul.flexnav').css('height',windowHeight);
        }else{
        colGrid();
    //    $('ul.flexnav').css('height','96px');
        }
        });
    
  $(document).ready(function(){
      "use strict";
   if($('body').width() < 1343){
        $('.nav .span5').css({
        'width':'25%'
        });
        $('.nav .span5 .col').css('width', '84%');
    }else{
        $('.nav .span5').css({
        'width':'41.66666666666667%'
        });
        
    }
    });

});
function prettyAttr() {  
    $('a[data-rel="prettyPhoto[gallery2]"]').click(function() {
            $('.pp_close').addClass('b-radius-full');
                 $('.pp_close').addClass('border-close');
        });
$('.link-folio li a[data-rel="prettyPhoto[gallery2]"]').click(function() {
             $('.desc-photo').fadeIn();
             $('.pp_details').prepend('<div class="desc-photo"><h3 class="color-1">Proin Gracida Dapitus</h3><a href="#"><span class="icon-calendar"></span>Sep, 23 Juli 2013</a><a href="#"><span class="icon-eye-open"></span>456 views</a><a href="#"><span class="icon-comment"></span>160comment</a><a href="#"><span class="icon-tag"></span>Computer, Photo Collection</a><a href="#"><span class=" icon-user"></span>Erick Fradika</a></div>');
             $('.pp_details div:eq(1)').remove();
             $('.pp_close').addClass('bg-1');
             
         });
    }
$(window).resize(function(){
    "use strict";
   
colWidth();
 widthRes();
//contentWidth();
});

function colWidth(){
//     var windowHeight = $(window).height() - 100;
//    var h = $('#nav .current').height();
colGrid();
if($('.main-content').width() <= 900){
$('.main-content .span3 .col').css('width', '94%');
$('.main-content .span4 .col').css('width', '94%');
$('.main-content .span6 .col').css('width', '94%');
$('.main-content .span8 .col').css('width', '94%');
$('.main-content .span12 .col').css('width', '94%');
// $('ul.flexnav').css('height',windowHeight);
}else{
colGrid();
//$('ul.flexnav').css('height','96px');
}
}

function widthRes(){
      if($('body').width() < 1343){
        $('.nav .span5').css({
        'width':'25%'
        });
        $('.nav .span5 .col').css('width', '84%');
    }else{
        $('.nav .span5').css({
        'width':'41.66666666666667%'
        });
        
    }
}

function colGrid(){
$('.span1 .col').css('width', '52%');
$('.span2 .col').css('width', '76%');
$('.span3 .col').css('width', '84%');
$('.span4 .col').css('width', '88%');
$('.span5 .col').css('width', '90.4%');
$('.span6 .col').css('width', '92%');
$('.span7 .col').css('width', '93.14285%');
$('.span8 .col').css('width', '94%');
$('.span9 .col').css('width', '94.66666666666667%');
$('.span10 .col').css('width', '95.2%');
$('.span11 .col').css('width', '95.63636363636364%');
$('.span12 .col').css('width', '96%');
$('.sidebar .col').css('width', '88%');
}

$(function () {
    "use strict";
$("[data-tip='tooltip']").tooltip();
});

$( function(){
    "use strict";
$( 'nav ul li:has(ul)' ).doubleTapToGo();
});

function startProgressbar() {
$('.meter > span').each(function() {
var a = $('.skill').width();
$(this)
.data("origWidth", $(this).width())
.width('0%')
.animate({
    width: $(this).data("origWidth")*100/a+'%'
},3000);
});
}

$('.capText-wrapp a').hover(function(){
$('.capText-wrapp a span').addClass('icon-white');
});

//function contentWidth(){
// var  wrapp = $('.wrapper').width();
//    if($('.sidebar').width() == 400){
//        $('.main-content').css('width', '800px');
//    }else {
//        $('.main-content').css('width', wrapp);
//    }   
//}