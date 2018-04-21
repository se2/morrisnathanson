jQuery(document).foundation();
/*
These functions make sure WordPress
and Foundation play nice together.
*/
jQuery(document).ready(function () {
    // Remove empty P tags created by WP inside of Accordion and Orbit
    jQuery('.accordion p:empty, .orbit p:empty').remove();
    // Adds Flex Video to YouTube and Vimeo Embeds
    jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function () { if (jQuery(this).innerWidth() / jQuery(this).innerHeight() > 1.5) { jQuery(this).wrap("<div class='widescreen responsive-embed'/>"); } else { jQuery(this).wrap("<div class='responsive-embed'/>"); } });
    // homepage slick slider
    jQuery('#home-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: true,
        nextArrow: "<div class='slide-arrow slide-next'></div>",
        prevArrow: "<div class='slide-arrow slide-prev'></div>",
        speed: 900,
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    // In the Studio page center slider
    jQuery('#in-the-studio-slideshow').slick({
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        speed: 900,
        responsive: [
            {
                breakpoint: 481,
                settings: {
                    centerMode: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    // custom next/prev functions
    jQuery('#in-the-studio-arrows .slide-next').click(function () {
        jQuery('#in-the-studio-slideshow').slick('slickNext');
    });
    jQuery('#in-the-studio-arrows .slide-prev').click(function () {
        jQuery('#in-the-studio-slideshow').slick('slickPrev');
    });
    // smooth-scroll entire site
    // Select all links with hashes
    jQuery('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    jQuery('html, body').animate({
                        scrollTop: target.offset().top
                    }, 500, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = jQuery(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });
    jQuery(window).scroll(function () {
        let deviceWidth = jQuery(window).outerWidth();
        let tabletWidth = 768;
        var scroll = jQuery(window).scrollTop();
        let headerHeight = (deviceWidth >= tabletWidth) ? 158 : 100;
        if (scroll >= headerHeight) {
            jQuery(".page-sidebar").addClass("pos-fixed");
        }
        if (scroll <= headerHeight) {
            jQuery(".page-sidebar").removeClass("pos-fixed");
        }
    }); //missing );

    function scrollToOffset(target, offset) {
        jQuery('html,body').animate({scrollTop: (target.top) - offset}, 1000);
    }
});
