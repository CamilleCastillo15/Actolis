(function ($) {
    Drupal.behaviors.actothemeHome = {
    attach: function (context, settings) {
        var swiper = new Swiper('.logos-partenaires .swiper-container', {
            spaceBetween: 0,
            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
        });
        console.log("swiperpartenaires");
    }
};
})(jQuery);
