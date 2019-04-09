(function($) {

    "use strict";

    jQuery(document).ready(function() {


        // Initialization - Retina js

        retinajs();


        // Initialization - Small menu for small devices

        $('.main-navigation').meanmenu({
            meanMenuContainer: '.menu-container',
            meanScreenWidth: "768",
            meanRevealPosition: "right",
        });

        
        // Definition of Sticky Sidebar

        jQuery('.sticky-section').theiaStickySidebar({
            additionalMarginTop: 0
        });        


        // Definition Toggle Function of Search Container 

        $('.search-icon').click(function() {
            $('.search-form-container').fadeToggle();
        });


        // Initialization - Ticker News Carousel 

        $('.ticker-news-carousel').owlCarousel({
            items: 1,
            animateOut: 'fadeOutUp',
            animateIn: 'fadeInUp',
            autoplay: true,
            loop: true,
            nav: false,
            dots: false,
        });


        // Initialization - Featured Carousel

        $('.highlight-carousel').owlCarousel({
            items: 2,
            animateIn: 'fadeIn',
            autoplay: true,
            loop: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 2
                },
                991: {
                    items: 2
                },
                1199: {
                    items: 3
                }
            }
        });


        // Initialization - Featured Widget With Carousel

        $('.highlight-left-carousel').owlCarousel({
            items: 1,
            autoplay: true,
            loop: true,
            nav: true,
            dots: false,
        });


        // Definition of Scroll Top Functions

        $('#scroll-top').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });
    });


    // Definition of Scroll Top Functions

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scroll-top').fadeIn(600);
        } else {
            $('.scroll-top').fadeOut(600);
        }
    });

})(jQuery);