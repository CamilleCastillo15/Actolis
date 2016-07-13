(function ($) {
    Drupal.behaviors.actothemeHome = {
        attach: function (context, settings) {
            console.log($(".checkboxes .checkboxe"));

             $(".checkboxes .checkboxe").click(function(){

                $(".views-row").each(function(i){
                    $(this).show();
                });

//                $(this).toggleClass("click");
                var click = $(this);

                var classes = $(this).attr('class');
                var domaine = classes.split(' ')[1];

                var picto = $(".picto."+domaine);
                console.log(picto);

                 $(".picto."+domaine).each(function(i){

//                    console.log($(this));

//                    console.log($(this));

                    var classes_checked = $(this).attr('class');
                    var checked = classes_checked.split(' ')[1];

                    if(checked != "checked") {

                        console.log("not matched");

                        var parent = $(this).parents().eq(1);
                        console.log(parent);
                        parent.hide();
                    }

                });

//            var parent = picto.parents().eq(3);
////            console.log(parent);
//
//            $('.pictos-container').children('.picto').each(function(i){
////               console.log(this);
//               var classes_pictos = $(this).attr('class');
//               var domaine_pictos = classes_pictos.split(' ')[1];
//
//              if (domaine_pictos != domaine) {
//
//                  var parent_pictos = $(this).parents().eq(3);
//                  console.log(parent_pictos);
////                  parent_pictos.hide();
//              }

            });
        }
    };
})(jQuery);
