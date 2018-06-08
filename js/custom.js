(function($) {

    // Left/right aligned containers padding offset
    // to keep things lined up
    function doResizeActions() {

        var nav         = $('#mainNav');
        var padding     = $("#refContainer").offset().left;
        var windowWidth = window.innerWidth;

        if(windowWidth > 1199) {
            $(".container-r .f-info").css('padding-left', padding + 'px');
            $(".container-l .f-info").css('padding-right', padding + 'px');
        } else {
            $(".container-r .f-info").css('padding-left', '24px');
            $(".container-l .f-info").css('padding-right', '24px');
            $(".container-r .f-home .f-info").css('padding-left', '16px');
        }

        // Mobile or desktop nav
        if( windowWidth < 992 ) {
            $(nav).removeClass('main-nav').addClass('mobile-nav');
        } else {
            $(nav).addClass('main-nav').removeClass('mobile-nav');
        }
        return true;
    }

    function onHashChange() {
        if(window.location.hash) {
            var hash = window.location.hash;
            $('body').addClass('sticky-header');
            setTimeout(function() {
                console.log(hash);
                var scrollTo = $(hash).offset().top - 70;
                $('body').animate({
                    scrollTop: scrollTo
                }, 'slow');
            }, 500);
        }
    }
    $(document).ready(function() {
        doResizeActions();
        onHashChange();
    });

    $(window).on('resize', function() {
        doResizeActions();
    });

    $(window).on('hashchange', function() {
        onHashChange();
    });

    $('.more-cory').on('click', function() {
        var more = $('.more-cory-text');
        $(more).toggleClass('open');
        // console.log($(this).text());
        if( $(more).hasClass('open') ) {
            $(this).text('Show less...');
        } else {
            $(this).text('Read more...');
        }
    });

    $(document).ready(function() {
        $('#testimonials').slick({
            autoplay: true,
            autoplaySpeed: 6000,
            fade: true,
            prevArrow: $(".slick-testimonial-prev"),
            nextArrow: $(".slick-testimonial-next")
        }).show();
        $('#productLine').slick({
            infinite: true,
            slidesToShow: 4,
            variableWidth: true,
            slidesToScroll: 1,
            autoplay: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            prevArrow: $(".slick-product-prev"),
            nextArrow: $(".slick-product-next")
        }).show();

    });


        var isSticky = false;
        var siteHeader = jQuery(".site-header");
        var mainNav = jQuery("#mainNav");
        jQuery(document).on("scroll", function() {
            if ( jQuery(document).scrollTop() >= 191 ) {
                if(!isSticky) {
                    // jQuery(siteHeader).slideUp();
                    jQuery("body").addClass("sticky-header");
                    // jQuery(siteHeader).slideDown();
                    isSticky = true;
                }
            } else {
                if(isSticky) {
                    // jQuery(siteHeader).slideUp();
                    jQuery("body").removeClass("sticky-header");
                    // jQuery(siteHeader).slideDown();
                    isSticky = false;
                }
            }
        });

        jQuery('#navToggle, #closeNav, #openNavOverlay, .get-quote, #megaMenu').on('click', function() {
            if(jQuery(this).context.className != 'get-quote' && jQuery(this).context.id != 'megaMenu') {
                jQuery(mainNav).toggleClass('open');
                jQuery('#closeNav').toggleClass('open');
                jQuery('body').toggleClass('no-scroll');
            } else {
                jQuery(mainNav).removeClass('open');
                jQuery('#closeNav').removeClass('open');
                jQuery('body').removeClass('no-scroll');
            }
            // console.log(jQuery(this).context.className);
        });


        /////////////////////////////Smooth Scrolling For Scroll to top/////////////////////////////////////
          $(document).ready(function(){
        	//Check to see if the window is top if not then display button
        	$(window).scroll(function(){
        		if ($(this).scrollTop() > 400) {
        			$('.scrollToTop').fadeIn();
        		} else {
        			$('.scrollToTop').fadeOut();
        		}
        	});
        	//Click event to scroll to top
        	$('.scrollToTop').click(function(){
        		$('html, body').animate({scrollTop : 0},1000);
        		return false;
        	});

        });

////////////////////////////Fix Conflict With Bootstrap & Woocommerce//////////////////////////////

    $( '.woocommerce-tabs .panel.entry-content' ).hide();

    $( '.woocommerce-tabs ul.tabs li a' ).click( function() {

        var $tab = $( this ),
            $tabs_wrapper = $tab.closest( '.woocommerce-tabs' );

        $( 'ul.tabs li', $tabs_wrapper ).removeClass( 'active' );
        $( 'div.panel.entry-content', $tabs_wrapper ).hide();
        $( 'div' + $tab.attr( 'href' ), $tabs_wrapper).show();
        $tab.parent().addClass( 'active' );

        return false;
    });


})(jQuery);
