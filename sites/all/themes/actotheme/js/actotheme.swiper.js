(function ($) {

    Drupal.behaviors.ateliersthemeSwiper = {

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

        $(".atelier-gallerie-image").on("click",function() {

            swiper.slideTo($(this).data("id"));

        });

        $(".offres-speciales-gallerie-image").on("click",function() {

            console.log(".offres-speciales-gallerie-image");
            swiper.slideTo($(this).data("id"));

        });

        $(".offres-speciales-gallerie-image").on("click",function() {

            console.log(".offres-speciales-gallerie-image");
            swiper.slideTo($(this).data("id"));

        })

    }

};

})(jQuery);
