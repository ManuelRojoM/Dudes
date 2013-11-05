
/* $.noConflict();  */


$(window).load(function(){

 function lightboxPhoto() {
	
	$("a[data-rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'slow',
			slideshow:3000,
			show_title:false,
			overlay_gallery: false
		});
	$(".gallery:gt(0) a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
    
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
	
	}
	
		if($().prettyPhoto) {
	
		lightboxPhoto(); 
			prettyAttr();
	} 			
    
 hoverCaption();
    colGrid();
if ($().quicksand) {
// Clone applications to get a second collection
	var $data = $("ul.container_folio").clone();
  // get the action filter option item on page load
  var $filterClass = $('#filterOptions li.current a').attr('class');
	
  // get and assign the ourHolder element to the
	// $holder varible for use later
  //var $holder = $('ul.ourHolder');

  // clone all items within the pre-assigned $holder element
  //var $data = $holder.clone();

  // attempt to call Quicksand when a filter option
	// item is clicked
	$('#filterOptions li a').click(function(e) {
		// reset the active class on all the buttons
		$('#filterOptions li').removeClass('current');
		$('#filterOptions li a').removeClass('current');
	
		// assign the class of the clicked filter option
		// element to our $filterType variable
		/*var $filterType = $(this).attr('class');
		$(this).parent().addClass('actived');
		
		if ($filterType == 'all') {
			// assign all li items to the $filteredData var when
			// the 'All' filter option is clicked
			var $filteredData = $data.find('li');
		} 
		else {
			// find all li elements that have our required $filterType
			// values for the data-type element
			var $filteredData = $data.find('li[data-type=' + $filterType + ']');
		}*/
		// Use the last category class as the category to filter by. This means that multiple categories are not supported (yet)
		var filterClass=$(this).attr('class').split(' ').slice(0)[0];
		$(this).parent().addClass('current');
      
		if (filterClass == 'all') {
        
			var $filteredData = $data.find('li');
            
		} else {
			var $filteredData = $data.find('li[data-type~=' + filterClass + ']');
		}
		
		$("ul.container_folio").quicksand($filteredData, {
			duration: 800,
			adjustHeight: 'auto'
		}, function () {
         
            lightboxPhoto();
 hoverCaption();
           colGrid();
       	
						});
		
		
		$(this).addClass("current"); 
      
		return false;
	});
    
	   
}


});


$(window).resize(function(){
    $("ul.container_folio").height('auto');
 

});
function prettyAttr() {  
      
    $('a[data-rel="prettyPhoto[gallery2]"]').click(function() {
     var ppW = $('.pp_default').height() * 2.2;
    $('.pp_content_container').css('height',ppW);
         $('.pp_default').css('left','16.381% !important');
            $('.pp_close').appendTo('.pp_content_container');
            $('.pp_close').addClass('b-radius-full');
                 $('.pp_close').addClass('border-close');
        });
$('.icons-view-see a[data-rel="prettyPhoto[gallery2]"], .blog-img ul li a[data-rel="prettyPhoto[gallery2]"]').click(function() {
             $('.desc-photo').fadeIn();
    $('.pp_content').prepend('<div class="desc-photo-title clearfix"><h3 class="color-1">Foto <span>Detalle</span></h3><p>But also the leap into electronic typesetting essentially unchanged. ed in theLap into electronic typesetting, remaining essentially ed in theLap into electronic typesetting, remaining essentially</p></div>');
             $('.pp_details').prepend('<div class="desc-photo clearfix"><a href="#"><span class="gui5-user gui5-icon"></span>Erick Fradika</a><a href="#"><span class="gui5-calendar gui5-icon"></span>Sep, 23 Juli 2013</a><a href="#"><span class="gui5-eyes gui5-icon"></span>456 views</a><a href="#"><span class="gui5-comment gui5-icon"></span>160comment</a><a href="#"><span class="gui5-tag gui5-icon"></span>Computer, Photo Collection</a></div>');
             $('.pp_details div:eq(1)').remove();
             $('.pp_close').addClass('bg-1');
             
         });
    }
