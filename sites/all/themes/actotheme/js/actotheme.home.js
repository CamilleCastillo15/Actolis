(function ($) {

    Drupal.behaviors.actothemeHome = {

    attach: function (context, settings) {
        $(window).on("resize",function(){
            if($(this).width() < 768){
                $(".block-all").css("height",$(this).height());
            }else{
                $(".block-all").css("height","auto");

            }

        });
        var swiper = new Swiper('.block-all.swiper-container', {


            effect:"fade",
            spaceBetween: 0,
//            autoHeight:true,
            autoplay : 5000

        });

        console.log("swiperhome");

    }

};

})(jQuery);
