jQuery(document).foundation();
/*
These functions make sure WordPress
and Foundation play nice together.
*/
jQuery(document).ready(function () { // Remove empty P tags created by WP inside of Accordion and Orbit
    jQuery('.accordion p:empty, .orbit p:empty').remove(); // Adds Flex Video to YouTube and Vimeo Embeds
    jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function () { if (jQuery(this).innerWidth() / jQuery(this).innerHeight() > 1.5) { jQuery(this).wrap("<div class='widescreen responsive-embed'/>"); } else { jQuery(this).wrap("<div class='responsive-embed'/>"); } });
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
    jQuery('#in-the-studio-slideshow').slick({
        infinite: true,
        centerMode: true,
        centerPadding: '30px',
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        nextArrow: "<div class='slide-arrow slide-next'></div>",
        prevArrow: "<div class='slide-arrow slide-prev'></div>",
        speed: 900
    });
});

/*
Insert Custom JS Below
*/