(function ($) {


  Drupal.behaviors.ateliers_mod_mapBehavior = {
    attach: function (context, settings) {

        var mobile = (navigator.userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i) ? true : false );
        var clickmethod = mobile ? "touchstart" : "click";
        var locpick = settings.map.locpick;
        console.log("coucou");
        var doc = $(document);
        var win = $(window);
        function initMap() {
           console.log("initmap",locpick);
            var pos  = {
                    lat:parseFloat(locpick.user_latitude),
                    lng:parseFloat(locpick.user_longitude)
                }
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: pos,
                zoom: 18
            });
            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'Les ateliers de l\'Îlot'
              });
        }
        initMap();

        //$(window).trigger("resize");
    }
  };

})(jQuery);
