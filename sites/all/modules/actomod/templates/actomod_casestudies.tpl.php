<?php //dpm($view);

//    dpm($titre);

    for($i = 0; $i < count($view); $i++) {

        $node = $view[$i];

        $title = field_view_field("node",$node,'field_titre_de_la_case_study');
        $description = field_view_field("node",$node,'field_texte_case_study');
        $image = field_get_items("node",$node,'field_image_case_study');

        $nid = $node->nid;

        $p = image_style_url("large",$image[0]["uri"]);

        drupal_add_css('.partenaires_list .c-img-'.$nid.' {background-image: url("'.$p.'") !important; } ', 'inline');

        $img = field_view_field("node",$node,'field_image_case_study');

    }

    ?>

    <div class="case-studies-detail">

        <div class="c-block-histoire">

            <div class="case-studies_list c-gris">
                <div class="c-text" id="num-<?php print render($nid); ?>">
                    <h4 class="title liens"><?php print render($title); ?></h4>
                    <?php print render($description); ?>
                </div>
                <div class='c-img c-img-<?php print $nid ?>'></div>
                <div class="clear"></div>
            </div>

        </div>

    </div>
