(function ($) {
    Drupal.behaviors.actothemeHome = {
        attach: function (context, settings) {

             $(".checkboxes .checkboxe").click(function(){

                $(".views-row").each(function(i){
                    $(this).show();
                });

                var click = $(this);

                var classes = $(this).attr('class');
                var domaine = classes.split(' ')[1];

//                console.log(domaine);

                var picto = $(".picto."+domaine);
                var j = 0;
                var long = $(".picto."+domaine).length;

                 $(".picto."+domaine).each(function(i){

                    var classes_checked = $(this).attr('class');
                    var checked = classes_checked.split(' ')[1];

                    if(checked != "checked") {
                        j++;

                        console.log(j);
                        var parent = $(this).parents().eq(1);
                        parent.hide();
                    }
                });

                if(j == long && domaine != "tous"){
                    $('.cc').prepend($('<span class="nom aucune"> Aucune offre ne correspond à vos critères </span>'));
                }else{
                    $('.cc .nom.aucune').hide();
                }
            });
        }
    };

})(jQuery);
