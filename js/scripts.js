(function ($) {
	var ua = window.navigator.userAgent;
	var isIE = /MSIE|Trident/.test(ua);

	if ( !isIE ) {
		//IE specific code goes here
		"use strict";
	}

	/** Adobe typekit font */
	try{Typekit.load({ async: true });}catch(e){};

	/*** Sticky header */
	$(window).scroll(function(){
		if($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
			$(".header").addClass("stop");
		} else {
			$(".header").removeClass("stop");
		}
	});

	/*** Sidr Menu */
	$('.navbar-toggle').sidr({
     	name: 'sidr-main',
      	side: 'right',
      	source: '#sidr',
      	displace: false,
      	renaming: false,
    });

    $('.navbar-toggle.in').on('click', function(){
		$.sidr('close', 'sidr-main');
	});

    //credits 
    $(".btn-view-credits" ).first().click(function() {
        $(this).toggleClass("visible");
        $(".credits__card-content ul.view-credits").fadeToggle("slow", "linear");
    });

	// trigger scroll
    $('a.scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            var o = $(this.hash);
            if ((o = o.length ? o : $("[name=" + this.hash.slice(1) + "]")).length) return $("html, body").animate({
                scrollTop: o.offset().top - 70
            }, 1e3, "easeInOutExpo"), !1
        }
    });

    /*** Magnific Popu Setting */
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        midClick: true,
          fixedBgPos: true,
          removalDelay: 500,
          fixedContentPos: true,
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile mfp-popup-gallery',
        gallery: {
            enabled: true,
            preload: [0,1],
            navigateByImgClick: true,
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                  return item.el.find('img').attr('alt');
              }
        },
        callbacks: {
            beforeOpen: function() {
                  this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                  this.st.mainClass = 'mfp-move-from-top vertical-middle enable-lightbox-wrapper';
              },
            buildControls: function() {
                // re-appends controls inside the main container
                this.arrowLeft.appendTo(this.contentContainer);
                this.arrowRight.appendTo(this.contentContainer);
            }
        }
    });

    $('.credits-popup-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        image: {
            verticalFit: false
        },
        callbacks: {
            beforeOpen: function() {
              this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
              this.st.mainClass = 'mfp-move-from-top vertical-middle enable-lightbox-wrapper';
            }
        }
    });

    /*** Select Wrap */
	$( "select" ).wrap( "<div class='select-wrapper'></div>" );

	/*** Header height = gutter height */
	function setGutterHeight(){
		var header = document.querySelector('.header'),
			  gutter = document.querySelector('.header-gutter'),
			  banner = document.querySelector('.banner');
		if (gutter) {
			gutter.style.height = header.offsetHeight + 'px';
		}

		if (banner) {
			banner.style.paddingTop = header.offsetHeight + 'px';
		}
	}
	window.onload = setGutterHeight;
	window.onresize = setGutterHeight;

    function lastNobullet() {
        var lastElement = false;
        $("ul.footer__widget-nav li, .banner__content ul.list-unstyled li").each(function() {
            if (lastElement && lastElement.offset().top != $(this).offset().top) {
                $(lastElement).addClass("nobullet");
            } else {
                $(lastElement).removeClass("nobullet");
            }
            lastElement = $(this);
        }).last().addClass("nobullet");
    };
    lastNobullet();

    $(window).resize(function(){
        lastNobullet();
    });

}(jQuery));
