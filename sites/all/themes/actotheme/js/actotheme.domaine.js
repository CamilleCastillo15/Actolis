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

            if(scrollTop > 498){
                $('.frise-actions').addClass('fixed');
            }else {
                $('.frise-actions').removeClass('fixed');
            }

        });

        $('.frise-actions .titre-actions').click(function(){

            event.preventDefault();

            $(".active").removeClass("active");
            var divClosest = $(this).closest('div');

            var classes = divClosest.attr('class');
            var theClass = classes.split(' ')[1];

//            $(this).closest('div').addClass("active");

            var scrollDiv = $(this).attr('href');

            $('html, body').stop().animate({
                scrollTop: $('.'+theClass+'.liens').offset().top - 160
            }, 400);
          });

var aItems = $('.c-text .title.liens');
//console.log(aItems);

var aItemsTop = [];

    aItems.each(function(i){
       var offsetTop = $(this).offset().top;
//        console.log(offsetTop);
       aItemsTop[i] = offsetTop;
    });

//$(aItems[0]).addClass('in-view');
//
        $(window).on('scroll', function(){
//          console.log(aItems.slice(1));
          itemInView(aItems.slice(1));
          bgColour(aItemsTop);
        });
//
        function itemInView(items) {
          items.each(function(){
            if (($(this).offset().top - $(window).scrollTop()) <= $(window).height()/2) {
              $(this).addClass('in-view');
            } else {
              $(this).removeClass('in-view');
            }
          });
        }

        function bgColour(){
          var curPos = $(window).scrollTop() + $(window).height() /2;
//          console.log(curPos);
          var _leng = $(aItems).length;
          aItems.each(function(i){
            if (curPos > $(aItems[i]).offset().top && i+1 == _leng || curPos > $(aItems[i]).offset().top && curPos < $(aItems[i+1]).offset().top) {
              var itemClass = ($(this).attr('class'));
              var theClass = itemClass.split(' ')[1];
//              console.log(theClass);
              $('.titre-actions.'+theClass).addClass('bg');
              var currentaItemPos = $(aItems[i]).offset().top;
              aItems.each(function(i){

                  if($(aItems[i]).offset().top < currentaItemPos) {

                      var itemClass = ($(this).attr('class'));
                      var theClass = itemClass.split(' ')[1];

                      $('.titre-actions.'+theClass).addClass('fill');
                  }

              });

            } else {
              var itemClass = ($(this).attr('class'));
              var theClass = itemClass.split(' ')[1];

              $('.titre-actions.'+theClass).removeClass('bg');
              $('.titre-actions.'+theClass).removeClass('fill');
            }
          });
        }
    }
};

})(jQuery);
