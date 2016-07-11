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

//            $(".active").removeClass("active");
            var divClosest = $(this).closest('div');

            var classes = divClosest.attr('class');
            var theClass = classes.split(' ')[1];

//          $(this).closest('div').addClass("active");

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
//        console.log(offsetTop);
       aItemsTop[i] = offsetTop;
    });

        $(window).on('scroll', function(){

//        itemInView(aItems.slice(1));
//
//          var scrollTop = true;
//
//          if (curPos > lastScroll) {
//               scrollTop = true;
//               bgColour(aItemsTop, scrollTop);
//           } else {
//              scrollTop = false;
//              bgColour(aItemsTop, scrollTop);
//           }
//
//           lastScroll = curPos;
//           console.log(curPos);
//           console.log(lastScroll);

//           itemInView(aItems.slice(1));
//           bgColour();
           progress();

        });

    function itemInView(items) {
      items.each(function(){
        if (($(this).offset().top - $(window).scrollTop()) <= $(window).height()/2) {
          $(this).addClass('in-view');
        } else {
          $(this).removeClass('in-view');
        }
      });
    }

        var width = 0;
        var lastScrollTop = 0;

    function progress(){

        var scroll = $(window).scrollTop();
        $('.c-gris').each(function(i){

            var offsetTop = $(this).offset().top;
            var offsetBottom = $(this).height()  + offsetTop;

            if(scroll > offsetTop && scroll < offsetBottom){

                var id = i;
                var div = $('.titre-actions.titre-'+id);

                var progressBox = scroll-offsetTop;
                var h = $(this).height();

                div.addClass('bg');
                $('.titre-actions.titre-'+id).removeClass('fill');

                var percent = (100 / h) * progressBox;

                $('<style>.bg:before{width:'+percent+'%;}</style>').appendTo('head');


            } else if(scroll > offsetTop && scroll > offsetBottom) {

                var id = i;
                var div = $('.titre-actions.titre-'+id);

                div.removeClass('in-view');
                div.removeClass('bg');
                $('.titre-actions.titre-'+id).addClass('fill');

            } else if (scroll < offsetTop) {

                var id = i;
                var div = $('.titre-actions.titre-'+id);

                div.removeClass('in-view');
                div.removeClass('bg');
                $('.titre-actions.titre-'+id).removeClass('fill');

            }

        });

    }

    function bgColour(aItemsTop, scrolltop){
//      var curPos = $(window).scrollTop() + $(window).height() /2;
      var offsetTop = $(this).offset().top;

      var _leng = $(aItems).length;

      aItems.each(function(i){

        var closest = $(aItems[i]).closest('div');
        var closestParent = closest.parent('div');

        var offsetBottom = closestParent.height()  + offsetTop;

//        if(!(i+1 == _leng)) {
//            var height = $(aItems[i+1]).offset().top - $(aItems[i]).offset().top;
//        }  else {
//            var height = closest.height();
//        }

        var h = closestParent.height();

        var percent = (100 / h) * progressBox;

        $('<style>.bg:before{width:'+percent+'%;}</style>').appendTo('head');

        if (curPos > $(aItems[i]).offset().top && i+1 == _leng || curPos > $(aItems[i]).offset().top && curPos < $(aItems[i+1]).offset().top) {
            var div = $(aItems[i]).closest('div');
            var elementTop = div.offset().top;
              var distance = (height - $(window).scrollTop());
              var itemClass = ($(this).attr('class'));
              var theClass = itemClass.split(' ')[1];
              $('.titre-actions.'+theClass).addClass('bg');
              var currentaItemPos = $(aItems[i]).offset().top;
              var scrollTop = $(window).scrollTop();
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
          $('.titre-actions.'+theClass).closest('div').removeClass('bg');
          $('.titre-actions.'+theClass).removeClass('bg');
          $('.titre-actions.'+theClass).removeClass('fill');
        }

          lastScrollTop = curPos;

      });

    }

}

};

})(jQuery);
