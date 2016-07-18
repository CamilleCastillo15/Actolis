(function ($) {

    Drupal.behaviors.actothemeHome = {

    attach: function (context, settings) {

        var swiper = new Swiper('.logos-partenaires .swiper-container', {


//            effect:"fade",
            spaceBetween: 0,
            autoHeight:true,
            autoplay : 5000,
            autoHeight:true,
            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'

        });

        console.log("swiperpartenaires");

    }

};

})(jQuery);
