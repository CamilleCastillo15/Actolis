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
        $(window).bind('scroll', function() {
            var scrollTop = $(window).scrollTop();
            console.log(scrollTop);
            if(scrollTop > 650){
                $('.frise-actions').addClass('fixed');
            }else {
                $('.frise-actions').removeClass('fixed');
            }
        });
        $('.frise-actions .titre-actions').click(function(){
            event.preventDefault();
            var divClosest = $(this).closest('div');
            var classes = divClosest.attr('class');
            var theClass = classes.split(' ')[1];
            var scrollDiv = $(this).attr('href');
            $('html, body').stop().animate({
                scrollTop: $('.'+theClass+'.liens').offset().top - 160
            }, 400);
          });

var aItems = $('.c-text .title.liens');
var lastScroll = 0;
var curPos = $(window).scrollTop() + $(window).height() /2;
var aItemsTop = [];

    aItems.each(function(i){
       var offsetTop = $(this).offset().top;
       aItemsTop[i] = offsetTop;
    });
        $(window).on('scroll', function(){
           progress();
        });

        var width = 0;
        var lastScrollTop = 0;

    function progress(){

        var scroll = $(window).scrollTop();
        var curPos = $(window).scrollTop() + $(window).height() /2;
        $('.c-gris').each(function(i){

            var offsetTop = $(this).offset().top;
            var offsetBottom = $(this).height()  + offsetTop;

            if(curPos > offsetTop && curPos < offsetBottom){

                var id = i;
                var div = $('.titre-actions.titre-'+id);
                var progressBox = curPos-offsetTop;
                var h = $(this).height();
                div.addClass('bg');
                $('.titre-actions.titre-'+id).removeClass('fill');
                var percent = (100 / h) * progressBox;
                $('<style>.bg:before{width:'+percent+'%;}</style>').appendTo('head');

            } else if(curPos > offsetTop && curPos > offsetBottom) {

                var id = i;
                var div = $('.titre-actions.titre-'+id);

                div.removeClass('in-view');
                div.removeClass('bg');
                $('.titre-actions.titre-'+id).addClass('fill');

            } else if (curPos < offsetTop) {

                var id = i;
                var div = $('.titre-actions.titre-'+id);

                div.removeClass('in-view');
                div.removeClass('bg');
                $('.titre-actions.titre-'+id).removeClass('fill');

            }
        });
    }
}

};

})(jQuery);
