(function ( $ ) {
    $.fn.slideamonjaro = function( options ) {
		// default settings
        settings = $.extend({
            transition	: "fade",
            selectors   : "",
            speed		: 3000,
            transspeed  : 300,
            responsive  : false,
            container   : ''
        }, options );
        if(settings.responsive != true && settings.responsive != false){
	        settings.responsive = false;
        }



        //Methods
        this.init = function(){
			//variables
		    $this = $(this.selector);
		    $slides = $this.children(settings.selectors).length;

	    	//prep the slides
			$this.children(settings.selectors).each(function(){
				$index = $(this).index();
				$(this).addClass('slide-order-'+$index);
			});
			$this.children(settings.selectors).eq(0).addClass('active');
			if($slides > 1){
			// functions for each transition
				//Fade
			if(settings.transition == 'fade'){
			this.play = function(){
				$slidetimer = setInterval(function(){
				//get the variables
				$active = $this.children(settings.selectors+'.active');
				$curindex = $active.index();
				$next   = $active.next();
				if($curindex+1 >= $slides){
					$next = $this.children(settings.selectors).eq(0);
				}
				$prev   = $active.prev();

				//prep the transition
				$next.show();

				//do the transition
				$active.fadeOut(settings.transspeed,function(){
					$active.removeClass('active');
					$next.addClass('active');
				});

				//Set function variable
				$slidefunction = "$active = $this.children(settings.selectors+'.active');$curindex = $active.index();$next   = $active.next(); if($curindex+1 >= $slides){ $next = $this.children(settings.selectors).eq(0); } $prev   = $active.prev(); $next.show(); $active.fadeOut(settings.transspeed,function(){ $active.removeClass('active'); $next.addClass('active'); });";
			}, settings.speed);
			}

			//Slide
			}else if(settings.transition == 'slide'){
				//Responsive
				if(settings.responsive = true){
					//create the cloned panel
					$this.children(settings.selectors).eq(0).clone().appendTo($this).removeClass('active').addClass('cloned-slide');
					var $slides = $this.children(settings.selectors).length;
					$this.width($(settings.container).width() * $slides);
					$this.children(settings.selectors).each(function(){
						$(this).width($(settings.container).width());
					});
					//responsive resize logic


					$(window).resize(function(){
						$this.width($(settings.container).width() * $slides);
						$this.children(settings.selectors).each(function(){
							$(this).width($(settings.container).width());
						});
						//get the variables
						$active = $this.children(settings.selectors+'.active');
						$curindex = $active.index();
						var slideWidth = $active.width()*($curindex);
						$this.css('left',function(){
							return 0 - slideWidth;
						});
					});


					//do the transition
					this.play = function(){
						$slidetimer = setInterval(function(){
						//get the variables
						$active = $this.children(settings.selectors+'.active');
						$curindex = $active.index();
						$next   = $active.next();
						if($curindex+1 >= $slides){
							$next = $this.children(settings.selectors).eq(0);
						}
						$prev   = $active.prev();
						var slideWidth = $active.width()*($curindex+1);
						$this.animate({
							left: "-"+slideWidth
						}, settings.transspeed,function(){
							$active.removeClass('active');
							$next.addClass('active');
							if($this.children(settings.selectors+'.active').hasClass('cloned-slide')){
								$this.css('left','0');
								$this.children(settings.selectors+'.active').removeClass('active');
								$this.children(settings.selectors).eq(0).addClass('active');
							}
						});

						$slidefunction = "$active = $this.children(settings.selectors+'.active'); $curindex = $active.index(); $next   = $active.next(); if($curindex+1 >= $slides){ $next = $this.children(settings.selectors).eq(0); } $prev   = $active.prev(); var slideWidth = $active.width()*($curindex+1); $this.animate({ left: \"-\"+slideWidth }, settings.transspeed,function(){ $active.removeClass('active'); $next.addClass('active'); if($this.children(settings.selectors+'.active').hasClass('cloned-slide')){ $this.css('left','0'); $this.children(settings.selectors+'.active').removeClass('active'); $this.children(settings.selectors).eq(0).addClass('active'); } });";
					}, settings.speed);
					}
				}else{
					//Not responsive
				}

			}else{
				//Invalid
				console.log('Invalid transition: declaration. Transitions are Fade, Slide, and Scroll');
			}
		}
			this.play();
	        return this;
        };
        this.pause = function(){
			clearInterval($slidetimer);
        };
        this.resume = function(){
			this.play();
        };
        return this.init();




    };

}( jQuery ));