<div class="case-studies-detail">

    <div class="c-block-domaine">
        <?php

            for($i = 0; $i < count($view); $i++) {

                $node = $view[$i];

                $title = field_view_field("node",$node,'field_titre_de_la_case_study');
                $description = field_view_field("node",$node,'field_texte_case_study');
                $image = field_get_items("node",$node,'field_image_case_study');

                $nid = $node->nid;
//                dpm($nid);

                $url = $_GET['fragment'];
//                dpm($url);

                $p = image_style_url("bloc_image",$image[0]["uri"]);

                drupal_add_css('.c-block-domaine .c-img-'.$i.'{background-image: url("'.$p.'") !important; } ', 'inline');

                $image_alignement = field_view_field("node",$node,'field_alignement_image');
                $alignment = render($image_alignement['#items']['0']['value']);
                drupal_add_css('.c-block-domaine .c-img-'.$i.' {background-position: '.$alignment.' !important; } ', 'inline');

            ?>

            <div class="c-gris num_<?php print $nid ?>">
                <div class="c-text" id="num-<?php print render($nid);?>" >
                    <h3 class="title titre-<?php print $i ?> liens"><?php print render($title); ?></h3>
                    <?php print render($description); ?>
                </div>
                    <div class='c-img-<?php print $i ?> c-img'></div>
                    <div class="clear"></div>
                </div>

        <?php } ?>

        </div>

</div>
