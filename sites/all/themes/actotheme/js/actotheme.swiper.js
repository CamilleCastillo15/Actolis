(function ($) {

    Drupal.behaviors.actothemeSwiper = {

    attach: function (context, settings) {

        var swiper = new Swiper('.swiper-container', {

            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 30,
            autoWidth:true,
            autoHeight:true,
            autoplay : 5000

        });

        console.log("swiper");

    }

};

})(jQuery);
