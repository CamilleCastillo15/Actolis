<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'body');
    $image = field_view_field("node",$node,'field_image');
    $titre = field_view_field("node",$node,'field_titre_domaine');
    $titre_2 = field_view_field("node",$node,'field_titre_domaine_2');
    $icone = field_view_field("node",$node,'field_icone');

    $fc_domaines = field_get_items('node', $node, 'field_titre_texte_image');

    if($fc_domaines){
        $idti = array();
        foreach ($fc_domaines as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }
    $images = field_get_items('node', $node, 'field_image');
    $icones = field_get_items('node', $node, 'field_icone');

    //dpm($images[0]);

    //$p = image_style_url("header",$images[0]["uri"]);

    $p = file_create_url($images[0]["uri"]);
    $m = file_create_url($icones[0]["uri"]);

    //dpm($m);

    drupal_add_css('.domaine .c-header {background-image: url("'.$p.'"); !important} ', 'inline');
    drupal_add_css('.b2 .picto {background-image: url("'.$m.'"); !important} ', 'inline');

?>

<div class="domaine">

    <div class="c-header">

        <h1 class="b2"><div class="picto"></div><span class="c-txt"><?php print render($titre_2); ?></span></h1>
        <div class="sep"></div>

    </div>

    <div class="c-block-domaine">

        <div class="c-gris">

            <div class="c-text">

                <?php print render($body); ?>

            </div>

            <div class="clear"></div>

            <?php

                $image_domaine_1 = field_get_items('node', $node, 'field_image_domaine_1');
                $image_domaine_2 = field_get_items('node', $node, 'field_image_domaine_2');
                $image_domaine_3 = field_get_items('node', $node, 'field_image_domaine_3');
                $image_domaine_4 = field_get_items('node', $node, 'field_image_domaine_4');

                $p1 = file_create_url($image_domaine_1[0]["uri"]);
                $p2 = file_create_url($image_domaine_2[0]["uri"]);
                $p3 = file_create_url($image_domaine_3[0]["uri"]);
                $p4 = file_create_url($image_domaine_4[0]["uri"]);

                dpm($p1);

                drupal_add_css('.c-block-domaine .c-img-1 {background-image: url("'.$p1.'") !important; } ', 'inline');
                drupal_add_css('.c-block-domaine .c-img-2 {background-image: url("'.$p2.'") !important; } ', 'inline');
                drupal_add_css('.c-block-domaine .c-img-3 {background-image: url("'.$p3.'") !important; } ', 'inline');
                drupal_add_css('.c-block-domaine .c-img-4 {background-image: url("'.$p4.'") !important; } ', 'inline');

            ?>

            <div class="c-img-1"></div>
            <div class="c-img-2"></div>
            <div class="c-img-3"></div>
            <div class="c-img-4"></div>

        </div>

    </div>

    <div class="e-d-c">
    
        <div class="cc-block">  

            <div class="c-block">

                <div class="c-gradient">

                <h1 class="titre">cases studies</h1>
                    <div class="grille">

                        <?php $view = views_embed_view('case_studies', 'default', $node->nid);
                        print $view; ?>


                        <div class="clear"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
