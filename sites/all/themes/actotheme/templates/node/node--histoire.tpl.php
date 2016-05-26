<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'field_body');

    $images = field_get_items("node",$node,'field_image_bloc');
    $p = image_style_url("large",$images[0]["uri"]);

    drupal_add_css('.c-block-histoire .c-img {background-image: url("'.$p.'") !important; } ', 'inline');

    $texte = field_view_field("node",$node,'field_texte');

    $image_intro = field_get_items("node",$node,'field_image_introduction');
    $p_intro = image_style_url("large",$image_intro[0]["uri"]);

    drupal_add_css('.c-block-histoire-introduction .c-img {background-image: url("'.$p_intro.'") !important; } ', 'inline');

    $texte_intro = field_view_field("node",$node,'field_texte_introduction');

    $fc_leitmotiv = field_get_items('node', $node, 'field_leitmotiv');

    if($fc_leitmotiv){
        $idti = array();
        foreach ($fc_leitmotiv as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }

    $fc_phrases_valeurs = field_get_items('node', $node, 'field_fc_phrases_valeurs');

    if($fc_phrases_valeurs){
        $idti_phrases_valeurs = array();
        foreach ($fc_phrases_valeurs as $fc_field) {
            $idti_phrases_valeurs[] = $fc_field['value'];
        }
        $collectionsg_phrases_valeurs =  field_collection_item_load_multiple($idti_phrases_valeurs);
    }

?>

<div class="histoire">

    <div class="c-block-histoire-introduction">

        <div class="c-blanc">

            <div class="c-text">

                <?php print render($texte_intro); ?>

            </div>
            <div class="c-img">

            </div>

        </div>

    </div>

    <div class="c-header">

        <div class="dark-layer">

           <?php

                for($i = 0; $i < count($idti); $i++) {

                $collectiong_2 = $collectionsg[$idti[$i]];

                $title = field_view_field('field_collection_item', $collectiong_2, 'field_titre');
                $icone = field_view_field('field_collection_item', $collectiong_2, 'field_icone');

            ?>

                <div class="c-picto">
                    <?php print render($icone); ?>
                    <h2><?php print render($title); ?></h2>
                </div>

            <?php } ?>

        </div>

    </div>

    <div class="c-header phrases-valeurs">

        <div class="dark-layer">

            <div class="c-phrases-container">

                <?php

                    for($i = 0; $i < 2; $i++) {

                    $collectiong_2_phrases_valeurs = $collectionsg_phrases_valeurs[$idti_phrases_valeurs[$i]];

                    $phrase = field_view_field('field_collection_item', $collectiong_2_phrases_valeurs, 'field_phrase');

                    $valeur = field_view_field('field_collection_item', $collectiong_2_phrases_valeurs, 'field_valeur');

                ?>

                <div class="c-in">
                    <div class="c-picto">
                        <h2 class="phrase"><?php print render($phrase); ?></h2>
                        <h2 class="valeur"><?php print render($valeur); ?></h2>
                    </div>
                </div>

                <?php } ?>

            </div>

            <div class="c-phrases-container">

                <?php

                for($i = 2; $i < 4; $i++) {

                    $collectiong_2_phrases_valeurs = $collectionsg_phrases_valeurs[$idti_phrases_valeurs[$i]];

                    $phrase = field_view_field('field_collection_item', $collectiong_2_phrases_valeurs, 'field_phrase');

                    $valeur = field_view_field('field_collection_item', $collectiong_2_phrases_valeurs, 'field_valeur');

                ?>
                <div class="c-in">
                <div class="c-picto">
                    <h2 class="phrase"><?php print render($phrase); ?></h2>
                    <h2 class="valeur"><?php print render($valeur); ?></h2>
                </div>
                </div>


                <?php } ?>

            </div>

            <div class="c-phrases-container phrases-container-2">

            <?php

                    $valeur_cle = field_view_field("node", $node, 'field_valeur_cle');

                    $phrase_valeur_cle = field_view_field("node", $node, 'field_phrase_valeur_cle');

            ?>

                <div class="c-picto c-picto-cle">
                    <h2 class="phrase phrase_cle"><?php print render($phrase_valeur_cle); ?></h2>
                    <h2 class="valeur valeur_cle"><?php print render($valeur_cle); ?></h2>
                </div>

            </div>

        </div>

    </div>

    <div class="c-block-histoire">

        <div class="c-blanc">
                
            <div class="c-text">
               
                <?php print render($texte); ?>

            </div>
            <div class="c-img"> 
                
            </div>

        </div>
    
    </div>

</div>


