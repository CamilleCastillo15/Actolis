<?php

    $styles  = drupal_get_css();
    $body = field_view_field("node",$node,'field_body');
    $images = field_get_items("node",$node,'field_image_bloc');
    $p = image_style_url("bloc_image",$images[0]["uri"]);

    $image_alignement = field_view_field("node",$node,'field_alignement_image_2');
    $alignment = render($image_alignement['#items']['0']['value']);
    drupal_add_css('.c-block-histoire .c-img {background-position: '.$alignment.' !important; } ', 'inline');

    drupal_add_css('.c-block-histoire .c-img {background-image: url("'.$p.'") !important; } ', 'inline');

    $texte = field_view_field("node",$node,'field_texte');
    $image_intro = field_get_items("node",$node,'field_image_introduction');

    $image_alignement_intro = field_view_field("node",$node,'field_alignement_image');
    $alignment_intro = render($image_alignement_intro['#items']['0']['value']);
    drupal_add_css('.c-block-histoire-introduction .c-img {background-position: '.$alignment_intro.' !important; } ', 'inline');

    $p_intro = image_style_url("bloc_image",$image_intro[0]["uri"]);

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

    <div class="c-block-histoire odd-block">
        <div class="c-blanc">
            <div class="c-text">
                <h3>Les valeurs clés</h3>
                <?php print render($texte); ?>

            </div>
            <div class="c-img">
            </div>
        </div>
    </div>

    <div class="c-header">
        <div class="dark-layer">
          <div class="container-vertical">
                <?php
                    for($i = 0; $i < count($idti); $i++) {

                    $collectiong_2 = $collectionsg[$idti[$i]];

                    $title = field_view_field('field_collection_item', $collectiong_2, 'field_titre');
                    $icone = field_view_field('field_collection_item', $collectiong_2, 'field_icone');
                ?>
                    <div class="c-picto">
                        <?php print render($icone); ?>
                        <h5><?php print render($title); ?></h5>
                    </div>
                <?php } ?>
          </div>
        </div>
    </div>
</div>


