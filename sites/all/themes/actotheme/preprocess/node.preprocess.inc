<?php function actotheme_preprocess_node(&$var) {
        $theme_path = drupal_get_path('theme', 'actotheme');
        switch($var["type"]) {  
            case "home" :                
                drupal_add_js($theme_path."/js/Swiper/dist/js/swiper.jquery.min.js");
                drupal_add_js($theme_path."/js/actotheme.home.js");
            break;
            case "domaine":
                drupal_add_js($theme_path."/js/Swiper/dist/js/swiper.jquery.min.js");
                drupal_add_js($theme_path."/js/actotheme.domaine.js");
            break;
            case "centre_de_formation":
                drupal_add_js($theme_path."/js/Swiper/dist/js/swiper.jquery.min.js");
                drupal_add_js($theme_path."/js/actotheme.centre_formation.js");
            break;
            case "equipes_et_partenaire":
                drupal_add_js($theme_path."/js/Swiper/dist/js/swiper.jquery.min.js");
                drupal_add_js($theme_path."/js/actotheme.partenaires.js");
            break;
        }
    }
?>


