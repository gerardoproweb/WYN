
// If JavaScript is enabled remove 'no-js' class and give 'js' class
jQuery('html').removeClass('no-js').addClass('js');

// Add .osx class to html if on Os/x
if (navigator.appVersion.indexOf("Mac") !== -1) {
	jQuery('html').addClass('osx');
}
 
// When DOM is fully loaded
jQuery(document).ready(function($) {
  "use strict";





  
    
  $(window).load(function() {  // on load	ON LOAD  


/* --------------------------------------------------------	
	 Preloader
   --------------------------------------------------------	*/
 

	$("#loadind").fadeOut();
	$("#loading-wrap").delay(250).fadeOut("fast");



/* --------------------------------------------------------	
	 Isotope
   --------------------------------------------------------	*/
    
    $('.portfolio-mansonry-container').isotope({
        itemSelector: '.portfolio-masonry-item',
        layoutMode: 'masonry',
        onLayout: function () {

        }
    });

    $('.blog-masonry-container').isotope({
        itemSelector: '.blog-masonry-post',
        layoutMode: 'masonry'
    });

    $('.filter li a').click(function () {
        event.preventDefault();
        var selector = $(this).attr('data-filter');
        var container = $(this).closest('.portfolio-mansonry-all').find('.portfolio-mansonry-container');
        container.isotope({
            filter: selector
        });
        $(this).closest('.filter').children('li').removeClass('active');
        $(this).parent('li').addClass('active');

    });
    
    
    
/* --------------------------------------------------------	
	 Fitvids
   --------------------------------------------------------	*/	

   
      $("body").fitVids();
   
  
 
 /* --------------------------------------------------------	
	 External links
   --------------------------------------------------------	*/
   

		$('a[rel=external]').attr('target','_blank');	
    
    
 /* --------------------------------------------------------	
	 Flex slider
   --------------------------------------------------------	*/  
   

  $('.testimonal-slider').flexslider({
    animation: "slide",
    slideshow: false,
    useCSS : false,
    prevText: "",
    nextText: "",    
    animationLoop: true 	
  });    
        
    
    
  });  // on load ends
  
 
 
/* --------------------------------------------------------	
	 Tabs to accordion
   --------------------------------------------------------	*/
  $(function() {
      fakewaffle.responsiveTabs(['xs', 'sm']);
  }); 




 /* --------------------------------------------------------	
	 Tooltips
   --------------------------------------------------------	*/
    $('body').tooltip({
        delay: { show: 300, hide: 0 },
        selector: '[data-toggle=tooltip]:not([disabled])'
    });
  
  
 /* --------------------------------------------------------	
	 Back To Top Button
   --------------------------------------------------------	*/	

  // hide #back-top first
	$(".back-to-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 1000) {
				$('.back-to-top').fadeIn(500);
			} else {
				$('.back-to-top').fadeOut(500);
			}
		});

	  // scroll body to 0px on click
		$('.back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1200);
			return false;
		});
	}); 
  	


 /* --------------------------------------------------------	
	 One page navigation
   --------------------------------------------------------	*/

$('.navbar .nav').onePageNav({
   currentClass: 'active',
	 changeHash: false,
	 scrollSpeed: 750,
	 scrollOffset: 100,
	 scrollThreshold: 0.3,
	 filter: ':not(.ext)',
	 easing: 'swing'
});



 /* --------------------------------------------------------	
	 navbar toggle hide on click
   --------------------------------------------------------	*/

$('.navbar-nav a').on('click', function(){
	if($('.navbar-toggle').css('display') != 'none')
    $('.navbar-toggle').click();

});



$(function() {
		$('.down').bind('click', function(event) {
			var $tag = $(this);
			var header = $('.header').outerHeight();
			$('html, body').stop().animate({
				scrollTop : $($tag.attr('href')).offset().top - 80
			}, 1200, 'easeInOutExpo');
			event.preventDefault();
		});
	});

 /* --------------------------------------------------------	
	 Move navigation
  --------------------------------------------------------	*/

  
 
$(window).scroll(function(){ 
 if ($(this).scrollTop() > 250){ 
  $('.navbar-default .navbar-nav>li>a').css({"display": "inline-block"});
  $('.navbar-default').css({"background-color": "#FFFFFF"}); 
  $('.navbar-default').css({"border-color": "#EBEFF2"});
  $('.navbar-default').css({"position": "fixed", "top": "0"});
  $('.navbar-default .navbar-nav>li.move>').css({"display": "none"});
  $('.navbar-default .navbar-nav>li.move>a i').css({"margin-left": "0"});
  $('.navbar-default .navbar-nav>li.move>a').removeClass("down");
  $('.navbar-default .navbar-nav>li.move').removeClass("active");
  
  
 } 
 else{
  $('.navbar-default .navbar-nav>li>a').css({"display": "none"});
  $('.navbar-default .navbar-nav>li.move>a').css({"display": "inline-block"});
  $('.navbar-default').css({"background-color": "transparent"}); 
  $('.navbar-default').css({"border-color": "transparent"});  
  $('.navbar-default .navbar-nav>li.move>a span').css({"display": "inline-block"});
  $('.navbar-default .navbar-nav>li.move>a i').css({"margin-left": "20"});
  $('.navbar-default .navbar-nav>li.move>a').addClass("down");  
 }
});


$(window).resize(function() {
  if( $(window).width() < 992) {
    $('.navbar-default').css({"background-color": "#FFFFFF"}); 
    $('.navbar-default').css({"border-color": "#EBEFF2"});
    $('.navbar-default').css({"position": "fixed", "top": "0"});   
  }
else {
  $('.navbar-default').css({"background-color": "transparent"}); 
  $('.navbar-default').css({"border-color": "transparent"});  
  
}  
});




 /* --------------------------------------------------------	
	 Sticky navbar
   --------------------------------------------------------	*/
  //$('.navbar').sticky({topSpacing:0});



 /* --------------------------------------------------------	
	 Detect mobile devices
   --------------------------------------------------------	*/

   var detectmob = false;	
   if(navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/webOS/i)
    || navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i)) {							
      detectmob = true;
	}
  
  if (detectmob === false) {
      $('*[data-ani]').addClass('animated');
  }
  
  /* --------------------------------------------------------	
	 Remove animations for mobile devices
   --------------------------------------------------------	*/ 
  
 $('.animated').appear(function() {
  $(this).each(function(){ 
    $(this).css('visibility','visible');
    $(this).addClass($(this).data('type'));
  });
},{accY: -100});


 /* --------------------------------------------------------	
	 Animated progress bars
   --------------------------------------------------------	*/

$('.skill-shortcode').appear(function() {
  $('.progress').each(function(){ 
    $('.progress-bar').css('width',  function(){ return ($(this).attr('data-percentage')+'%')});
  });
},{accY: -100}); 




 /* --------------------------------------------------------	
	Parallax
   --------------------------------------------------------	*/
	if (detectmob === true) {
    $( '.parallax' ).each(function(){
				$(this).addClass('parallax-mobile');
		});
  }
  else {
  
  	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
      $( '#parallax-one' ).parallax("100%", 0.5,true);
      $( '#parallax-two' ).parallax("100%", 2,false); // Add more
      $( '#parallax-three' ).parallax("100%", 0.5,true); // Add more
    }







   

  

 /* --------------------------------------------------------	
	 Master slider
   --------------------------------------------------------	*/


				var slider = new MasterSlider();


				// slider setup
				slider.setup("masterslider", {
						width           : 1200,
						height          : 900,
						space           : 0,
						start           : 1,
						grabCursor      : true,
						swipe           : true,
						mouse           : true,
						layout          : "fullwidth", 
						wheel           : false,
						autoplay        : true,
						instantStartLayers:false,
						loop            : true,
						shuffle         : false,
						preload         : 1,
						heightLimit     : true,
						autoHeight      : false,
						smoothHeight    : true,
						endPause        : false,
						overPause       : false,
						fillMode        : "fill", 
						centerControls  : true,
						layersMode      : "center", 
						hideLayers      : false, 
						fullscreenMargin: 0,
						speed           : 20, 
						dir             : "h", 
						view            : "scale"
				});

				// slider controls
				slider.control('arrows'     ,{ autohide:true, overVideo:true , hideUnder:780 });                    
				slider.control('timebar'    ,{ autohide:false, overVideo:true, align:'top', color:'#bbbbbb' , hideUnder:370 , width:3, margin:0 });



 /* --------------------------------------------------------	
	 Color picker - demo only
   --------------------------------------------------------	*/
  
$(".color-1" ).click(function(){
	$("#color" ).attr("href", "css/color/color-1.css" );
	return false;
});

    
$(".color-2" ).click(function(){
	$("#color" ).attr("href", "css/color/color-2.css" );
	return false;
});
    
$(".color-3" ).click(function(){
	$("#color" ).attr("href", "css/color/color-3.css" );
	return false;
});

$(".color-4" ).click(function(){
	$("#color" ).attr("href", "css/color/color-4.css" );
	return false;
});

$(".color-5" ).click(function(){
	$("#color" ).attr("href", "css/color/color-5.css" );
	return false;
});


$('.color-picker').animate({left: '-239px'});
  		
$('.color-picker a.handle').click(function(e){
	e.preventDefault();
	var div = $('.color-picker');
	if (div.css('left') === '-239px') {
		$('.color-picker').animate({left: '0px'}); 
	} 
  else {
    $('.color-picker').animate({left: '-239px'});
	}
})

});




