jQuery(document).ready( function($) {	
	
	$('body').prepend(
	'<div id="switcherPnl" class="switchi baka left"><a href="#"class="dynTitle"><span class="icons-panel"></span></a><div style="clear:both"></div><div class="dynOptions"><div class="wrapp"><h3 for="e3">Custom Themes Color</h3><label for="el">ThemeColor</label><input class="bodybgColor opacity " type="text" value="#fb4235"><br/><label for="e2">Bg Comment</label><input class="borderColor opacity " type="text" value="#fb4235"><br/></div><div class="wrapp"><h3 for="el6">Choose Themes Color</h3><br/><a href="#" class="cuzColor">Theme-1</a><a href="#" class="cuzColor1">Theme-2</a><a href="#" class="cuzColor2">Theme-3</a><a href="#" class="cuzColor3">Theme-4</a><a href="#" class="cuzColor4">Theme-5</a></div></div></div>');
	

        
            $('.bodybgColor').each( function() {
                //
                // Dear reader, it's actually much easier than this to initialize 
                // miniColors. For example:
                //
                //  $(selector).minicolors();
                //
                // The way I've done it below is just to make it easier for me 
                // when developing the plugin. It keeps me sane, but it may not 
                // have the same effect on you!
                //
                $(this).minicolors({
                    //control: $(this).attr('data-control') || 'hue',
                    //defaultValue: $(this).attr('data-default-value') || '',
                    //inline: $(this).hasClass('inline'),
                   // letterCase: $(this).hasClass('uppercase') ? 'uppercase' : 'lowercase',
                    opacity: $(this).hasClass('opacity'),
                    //position: $(this).attr('data-position') || 'default',
                    //styles: $(this).attr('data-style') || '',
                    //swatchPosition: $(this).attr('data-swatch-position') || 'left',
                    //textfield: !$(this).hasClass('no-textfield'),
                    theme: $(this).attr('data-theme') || 'bootstrap',
                    change: function(hex, opacity) {

                       
                        bgBody = $(this).minicolors('rgbString');
                         $('.bg-1, .form-search .btn, #nav .current, .detail-icons, #submit, .button-color-def, .flexsliderfolio .flex-direction-nav a').css('backgroundColor',bgBody);
                        /*$('.btn-wrapp a.bg-btn-gradient').hover(function(){
                            $(this).css({
                                'background':bgBody,
                                'background':' -moz-linear-gradient(top, bgBody 0%, #144946 100%)',
                                'background':'-webkit-gradient(linear, left top, left bottom, color-stop(0%,bgBody), color-stop(100%,#144946))',
                                'background':'-webkit-linear-gradient(top,  bgBody 0%,#144946 100%)',
                                'background':'-o-linear-gradient(top, bgBody 0%,#144946 100%)',
                                'background':'-ms-linear-gradient(top, bgBody 0%,#144946 100%)',
                                'background':'linear-gradient(to bottom, bgBody 0%,#144946 100%)'
                                 });
                            },function(){
                                 $(this).css({
                                'background':'#144946',
                                'background':' -moz-linear-gradient(top,  #144946 0%, bgBody 100%)',
                                'background':'-webkit-gradient(linear, left top, left bottom, color-stop(0%,#144946), color-stop(100%,bgBody))',
                                'background':'-webkit-linear-gradient(top,  #36c6b9 0%,bgBody 100%)',
                                'background':'-o-linear-gradient(top, #144946 0%,bgBody 100%)',
                                'background':'-ms-linear-gradient(top, #144946 0%,bgBody 100%)',
                                'background':'linear-gradient(to bottom, #144946 0%,bgBody 100%)'
                            });
                       
                        });*/
//                         $('.flexslider3 .flex-control-paging li a.flex-active:even, .flexsliderfolio .flex-control-paging li a').css('background',bgBody);
                        
                         $('.color-1').css('color',bgBody);
                         $('.logo-bdr, .captionBg, .form-search .search').css('border-color',bgBody);
                        $(' .b-top-n-bottom').css({'border-left':bgBody, 'border-right':bgBody});
                         $('.permalink li a, .support li a').hover(function(){
							$(this).css('color',bgBody);
							},function(){
							//after hover
							$(this).css('color','#828282');
							});
                        $('#nav a').hover(function(){
							$(this).css('background',bgBody);
							},function(){
							//after hover
							$(this).css('background','transparent');
							});
                        $('#nav .current a').hover(function(){
							$(this).css('background',bgBody);
							},function(){
							//after hover
							$(this).css('background',bgBody);
							});
                         $('.comment .fn a, ul.comment-meta li a').hover(function(){
							$(this).css('color',bgBody);
							},function(){
							//after hover
							$(this).css('color','transparent');
							});
                    }
					
					
                });
                }); 
                
                 //======================
     $('.borderColor').each( function() {
				 $(this).minicolors({
				 opacity: $(this).hasClass('opacity'),
				 theme: $(this).attr('data-theme') || 'bootstrap',
					  change: function(hex, opacity) {
						
					borderColor = $(this).minicolors('rgbString');
                         $('.bg-6').css({
						  'background':borderColor,
						 });
						 /*$('.btn-widget a.btn').hover(function(){
							$(this).css('border-top-color',borderColor);
							},function(){
							//after hover
							$(this).css('border-top-color','transparent');
							});*/
					  }
				 });
				
			}); 
			
           
           
       
	var t = $('.dynTitle'),
		c = $('#switcherPnl'),
		curEl = '',
		fonts = {
			'Arial': 'Arial, "Helvetica Neue", Helvetica, sans-serif',
			'Arial Blank':'"Arial Black", "Arial Bold", Gadget, sans-serif',
			'Arial Narrow': '"Arial Narrow", Arial, sans-serif',
			'Century Gothic':'"Century Gothic", CenturyGothic, AppleGothic, sans-serif',
			'Courier New':'"Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace',
			'Georgia':'Georgia, Times, "Times New Roman", serif',
			'Impact':'Impact, Haettenschweiler, "Franklin Gothic Bold", Charcoal, "Helvetica Inserat", "Bitstream Vera Sans Bold", "Arial Black", sans serif',
			'Lucida Console':'"Lucida Console", "Lucida Sans Typewriter", Monaco, "Bitstream Vera Sans Mono", monospace',
			'Palantino':'Palatino, "Palatino Linotype", "Palatino LT STD", "Book Antiqua", Georgia, serif',
			'Tahoma':'Tahoma, Verdana, Segoe, sans-serif',
			'Times New Roman':'TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif',
			'Trebuchet MS':'"Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif',
			'Verdana':'Verdana, Geneva, sans-serif'
		};
		
	/* Inisialisasi input value & color */
	//var col = colorToHex($('body').css('background-color'));
	//$('#bodyColor').val(col).css('backgroundColor',col);
	//col = colorToHex($('h1, h2, h3, h4, h5, h6, a, .caption-slider > span').css('color'));
	//$('#titleColor').val(col).css('backgroundColor',col);
	
	/* Font Combobox */
	var f = '';
	//var d = '';
	for (var prop in fonts){
		f += '<option value="'+ prop+'">' + prop + '</option>';
	}
	/* for (var prop in colors){
		d += '<option value="'+ prop+'">' + prop + '</option>';
	} */
	$('.cuzColor').html();
	$('.font-header').html(f);
	$('.font-par').html(f);
	$('.font-zz').html(f);
	
	$('.font-header').on('change',function() {
		$('h1').css('fontFamily',fonts[$(this).val()]);
	});

	$('.font-par').on('change',function() {
		$('h2, h3, h4').css('fontFamily',fonts[$(this).val()]);
	});
	
	$('.font-zz').on('change',function() {
		$('p').css('fontFamily',fonts[$(this).val()]);
	});
	
	/* Pattern */
	f = '';
	for(var i=1; i<13; i++) {
		f += '<div class="pattern pattern-'+ i+'" rel="pattern-'+i+'"></div>';
	}
	$('.pattern-container').html(f);
	$('.pattern').click(function() {
		// With jQuery, the the actual DOM element is at index zero
		// replace all class with pattern-X
		$('body')[0].className = $('body')[0].className.replace(/pattern\-.*/g,'');
		
		$('body').addClass($(this).attr('rel'));

	})
	/* Pattern */
	g = '';
	for(var i=1; i<13; i++) {
		g += '<div class="pattern2 patern-'+ i+'" rel="patern-'+i+'"></div>';
	}
	$('.pattern-Slide').html(g);
	$('.pattern2').click(function() {
		// With jQuery, the the actual DOM element is at index zero
		// replace all class with pattern-X
		
		$('#s-pattern')[0].className = $('#s-pattern')[0].className.replace(/patern\-.*/g,'');
		$('#s-pattern').addClass($(this).attr('rel'));
		$('#s-pattern1')[0].className = $('#s-pattern')[0].className.replace(/patern\-.*/g,'');
		$('#s-pattern1').addClass($(this).attr('rel'));
		$('#s-pattern2')[0].className = $('#s-pattern')[0].className.replace(/patern\-.*/g,'');
		$('#s-pattern2').addClass($(this).attr('rel'));
		$('#s-pattern3')[0].className = $('#s-pattern')[0].className.replace(/patern\-.*/g,'');
		$('#s-pattern3').addClass($(this).attr('rel'));
	})
	/* Pattern */
	cuz = '';
	for(var i=1; i<13; i++) {
		cuz += '<div class="main-cuzcol cuz-'+ i+'" rel="cuz-'+i+'"></div>';
	}
	$('.wrapper-cuzcol').html(cuz);
	
t.click(function(e) {
   
     
    
//	ww = $('.dynOptions').width();
//	zz = $('#switcherPnl').width();
		if(c.hasClass('left')) {
            c.show()
            c.toggle().removeClass('left');
		      c.stop(true, false).animate();
//		  
//			$('.dynTitle').css({'background':'rgba(255, 255, 255, 1)', 'margin-right': '-39px', 'float':'right'});
//			/* $('.dynTitle').css({'background':'rgba(255, 255, 255, 1)', 'padding':'20px 10px 3px 10px', 'margin-left': ww+20}); */
//			
} else {
    c.toggle().addClass('left');
     c.stop(true, false).animate();
    /*c.stop(true, false).animate({ left: '-328px'});*/
		/*c.toggle().addClass('left');*/
//			/* $('#switcherPnl').width(0); */
//			
//$('.dynTitle').css({'background':'rgba(255, 255, 255, 1)', 'margin-right': '0px'});
//
	}
	});
//	$(window).load(function (){
//	if($('body').width() < 480){
//		$('.dynOptions').css('width','25%');
//		$('.dynTitle').css('margin-right','-5px');
//	}
//	
//	});
	$(window).resize(function (){
	btnSwitch();
	});
	function btnSwitch(){
	if($('body').width() < 480){
		$('.dynOptions').css('width','25%');
		$('.dynTitle').css('margin-right','-10%');
	}else{
	$('.dynOptions').css('width','auto');
	$('.dynTitle').css('margin-right','-12.7%');
	}
	}
	// Color Picker
	/*
	colorPicker.size = 3;
	colorPicker.palletes = ['#AE334F','#F3BFCB','#EED3B6','#6C9924','#4B554C','#B9C7B6','#FDCB82','#EED3B6','#84202C'];
	$('.inputColor').on('mousedown',function(e) {
		curEl = $(this).attr('rel');
		colorPicker(e);
	});
	
	$('.colWheel').on('click',function(e) {
		$('#'+$(this).attr('rel')).trigger('mousedown');
	})
	*/
	/*
	colorPicker.exportColor = function() {
		var prop = '';
		if (curEl === 'h1, h2, h3, h4, h5, h6, a, .caption-slider > span') {
			prop = 'color'
		} else if( curEl === 'p') {
			prop = 'color'
		} else if( curEl === 'body, #widget, .last-project span, .scrollup') {
			prop = 'backgroundColor'
		} else {
			prop = 'backgroundColor'
		}
		
		$(curEl).css( prop,'#'+colorPicker.CP.grba);
		//$(curEl).css( (curEl === 'h1') ? 'color' : 'color','#'+colorPicker.CP.hex);
	};
	*/
	// Click outside DIV
	/*
	$(document).click(function (e) {
		var container = $("#switcherPnl, .cPSkin");
		if (container.has(e.target).length === 0) {
			$('.cPSkin').hide();
		}
	});
	*/


//Function to convert color to hex
/*
function colorToHex(c) {
	var m = /^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(1|0|0?\.\d+))?\)$/.exec(c);
	return m ? ( m[4]==0 ? '#fff' : '#' + (1 << 24 | m[1] << 16 | m[2] << 8 | m[3]).toString(16).substr(1) ) : c;
}*/
//=======================================================================//

//theme 1
// customs colors


$('.cuzColor').css('background','url(img/cuzCol.jpg)');
$('.cuzColor').on('click',function() {
		$('link').eq(2).attr('href', 'css/red.css');
		$('.logo img').attr('src', 'img/red/logo.png');
	});
	
	//===================================================================//
	//theme 2
// customs colors

$('.cuzColor1').css('background','url(img/cuzCol1.jpg)');
    $('.cuzColor1').on('click',function() {
		$('link').eq(2).attr('href', 'css/green.css');
		$('.logo img').attr('src', 'img/green/logo.png');
	});
	
	//===================================================================//
	//theme 3
// customs colors


$('.cuzColor2').css('background','url(img/cuzCol2.jpg)');
    $('.cuzColor2').on('click',function() {
	$('link').eq(2).attr('href', 'css/orange.css');
		$('.logo img').attr('src', 'img/orange/logo.png');
	});
	//===================================================================//
	//theme 4
// customs colors


$('.cuzColor3').css('backgroundImage','url(img/cuzCol3.jpg)');
    $('.cuzColor3').on('click',function() {
		$('link').eq(2).attr('href', 'css/blue.css');
		$('.logo img').attr('src', 'img/blue/logo.png');
		
	});
	//===================================================================//
	//theme 5
// customs colors


$('.cuzColor4').css('background','url(img/cuzCol4.jpg)');
    $('.cuzColor4').on('click',function() {
		$('link').eq(2).attr('href', 'css/default.css');
		$('.logo img').attr('src', 'img/logo.png');
	});
});
