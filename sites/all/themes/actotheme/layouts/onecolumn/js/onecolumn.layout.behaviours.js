(function ($) {
    Drupal.behaviors.masBehavior = {
        attach: function (context, settings) {
            var mobile = (navigator.userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i) ? true : false);
            var clickmethod = mobile ? "touchstart" : "click";
            var doc = $(document);
            var win = $(window);
            var burger = document.getElementsByClassName("burger")[0];
            var l_off = document.getElementsByClassName("l-off")[0];
            var l_shield= document.getElementsByClassName("l-shield")[0];
            var toggle = 1;
            $(window).on("resize",function(){
                l_shield.setAttribute("class", "l-shield");
                burger.setAttribute("class", "burger");
                l_off.setAttribute("class", "l-off h");
                toggle = 1;

            })
            $(".l-shield").on(clickmethod, function () {
                 l_shield.setAttribute("class", "l-shield");
                burger.setAttribute("class", "burger");
                l_off.setAttribute("class", "l-off h");
                toggle = 1;

            })
            $(".burger").on(clickmethod, function () {


                if (toggle == 1) {
                    l_shield.setAttribute("class", "l-shield o");
                    burger.setAttribute("class", "burger o");
                    l_off.setAttribute("class", "l-off o");
                    toggle = 0;

                } else {
                    l_shield.setAttribute("class", "l-shield");
                    burger.setAttribute("class", "burger");
                    l_off.setAttribute("class", "l-off h");
                    toggle = 1;

                }
            });
        }
    }


})(jQuery);
