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

        var swiper = new Swiper('.swiper-container', {

            spaceBetween: 0,
            autoplay : 5000,
            autoHeight:true,
            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'

        });

//        console.log("swiperdomaine");

        $(window).bind('scroll', function() {
            var scrollTop = $(window).scrollTop();
            console.log(scrollTop);

            if(scrollTop > 498){
                $('.frise-actions').addClass('fixed');
            }else {
                $('.frise-actions').removeClass('fixed');
            }

        });

        $('.frise-actions .titre-actions').click(function(){

            event.preventDefault();
//            console.log("nav-actions");

            $(".active").removeClass("active");
//            console.log(this);
//
            var divClosest = $(this).closest('div');
//            console.log(divClosest);

            var classes = divClosest.attr('class');
            var theClass = classes.split(' ')[1];

            $(this).closest('div').addClass("active");
//
//            var theClass = $(this).attr("class");
//            console.log(theClass);

            var scrollDiv = $(this).attr('href');
//            console.log(scrollDiv);

//            console.log($('.'+scrollDiv));
//
//            $('.'+theClass).parent('li').addClass('active');
//            //Animate
            $('html, body').stop().animate({
                scrollTop: $('.'+theClass+'.liens').offset().top - 160
            }, 400);
//            return false;
          });
//          $('.scrollTop a').scrollTop();

}

};

})(jQuery);
