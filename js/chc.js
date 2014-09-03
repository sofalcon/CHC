jQuery(document).ready(function($){
	//Height balancing
	$cH = $('#content #contentPrimary').height();
	if($cH < $(window).height()){
		$('#content').addClass('hundredheight');
	}else{
		$('#content').removeClass('hundredheight');
	}

	if($('#content:not(.blog)').height() < $(document).height() - 355){
		$('#content:not(.blog)').height($('#content').height() - 355);
	}
	$('.colorbar, #content.blog, #content.blog #contentPrimary, #content.blog #contentSecondary').height($(document).height() - 120);
	$('#contentContainer').height($(window).height() - 110);
	$(window).resize(function() {
	    var scrollVal = $(document).height;
	    if (scrollVal > 700) {
	        $('footer').addClass('stop');
	    }else{
		    $('footer').removeClass('stop');
	    }
	    $cH = $('#content #contentPrimary').height();
		if($cH < $(window).height()){
			$('#content').addClass('hundredheight');
		}else{
			$('#content').removeClass('hundredheight');
		}
	    $('#contentContainer').height($(window).height() - 110);
	    $('.colorbar').height($(window).height());
	});

	//Slideshow
	if($('#slides').length > 0){
		$slideshow = $('#slides').slideamonjaro({
						transition : 'slide',
						selectors  :  ".slide",
						speed      : 6000,
						transspeed : 400,
						container  : '#slideContainer',
						responsive : true
					});
	}else{
		$slideshow = undefined;
	}

	if($('#sidebar-menu ul#sidebar-nav > li > ul > li.current-menu-ancestor > ul').height > $('#sidebar-menu').height){
		$('#sidebar-menu').height($('#sidebar-menu ul#sidebar-nav > li > ul > li.current-menu-ancestor > ul').height);
	}

	//Megamenu
	$timer='';
	$('header nav ul#main > li').hoverIntent(function(){
		if($timer){
			clearTimeout($timer);
		}
		$clone = $(this).children('div.megamenuData-columnLeftest').clone();
		$leftcolumn = $(this).children('div.megamenuData-columnLeft').clone();
		$rightcolumn = $(this).children('div.megamenuData-columnRight').clone();
		$('#megamenuCont').addClass('active');
		$('#megamenuCont #first .gutter').html($clone);
		$('#megamenuCont #second .gutter').html($leftcolumn);
		$('#megamenuCont #third .gutter').html($rightcolumn);
		if($slideshow !== undefined){
			console.log($slideshow);
			$slideshow.pause();
		}
	});
	$('#megamenuCont').hover(function(){
	},function(){
		$timer = setTimeout(function(){
			$('#megamenuCont').removeClass('active');
			if($slideshow !== undefined){
				$slideshow.resume();
			}
		}, 250);
	});

	//Modal box
	$('#welcome-callout').parent('a').click(function(e){
		e.preventDefault();
		$('#modal').addClass('active');
		if($slideshow !== undefined){
			$slideshow.pause();
		}
	});
	$('#modalClose,#modal-overlay').click(function(){
		$('#modal').removeClass('active');
		if($slideshow !== undefined){
			$slideshow.resume();
		}
	});

	//Sidebar Nav Title
	$('#contentSecondary .titleCont a').text( function() { return $(this).attr('title'); });
});