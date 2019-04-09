(function($) {

    "use strict";

    jQuery(document).ready(function() {


        // Initialization - Ticker News Carousel 

        $('.ticker-news-carousel').owlCarousel({
            
            items: 1,
            animateOut: 'fadeOutUp',
            animateIn: 'fadeInUp',
            autoplay: true,
            loop: true,
            nav: true,
            dots: false,
        });

    });

})(jQuery);