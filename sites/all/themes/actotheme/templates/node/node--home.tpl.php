<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'field_body');
    $image = field_view_field("node",$node,'field_image');
    $gallerie = field_get_items("node",$node,'field_image_multi');

    $fc_textimage = field_get_items('node', $node, 'field_bloc_presentation_actolis');

    if($fc_textimage){
        $idti = array();
        foreach ($fc_textimage as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }
?>


<div class="home">
    <div class="block-all swiper-container">
        <div class="swiper-wrapper">
            <?php for($i = 0; $i < count($idti); $i++){
                $collectiong = $collectionsg[$idti[$i]];
                $image_field = field_get_items('field_collection_item', $collectiong, 'field_imge_presentation');
                $image_render = field_view_value('field_collection_item', $collectiong, 'field_imge_presentation', $image_field[0], array(
                    'type' => 'image',
                    'settings' => array(
                        'image_style' => 'header',
                    )));
                $image_render_mobile = field_view_value('field_collection_item', $collectiong, 'field_imge_presentation', $image_field[0], array(
                    'type' => 'image',
                    'settings' => array(
                        'image_style' => 'slider',
                    )));
                $titre = field_view_field('field_collection_item', $collectiong, 'field_titre');
                $chapeau = field_view_field('field_collection_item', $collectiong, 'field_body_presentation');
            ?>
            <div class="home swiper-slide">
                <div class="block-img" >
                   <?php print render($image_render); ?>
                </div>
                <div class="block-w">
                    <h2 class="title-bienvenue"><?php print render($titre); ?></h2>
                    <div class="par-bienvenue">
                        <?php print render($chapeau); ?>
                    </div><!--
                    --><div class="ateliers">
                    <!--
                    <?php
                    foreach($result_ateliers as $key => $value) { ?>
                        --><div class="atelier">
                        <?php
                          $n = node_load($value->nid);
                          $link =drupal_get_path_alias("node/".$value->nid);
                          $picto = field_view_field("node",$n,'field_picto');
                          $title = field_view_field("node",$n,'field_title');
                          $class = field_view_field("node",$n,'field_class');
                          $title_render = render($title);
                          $class_render = render($class);
                          $picto_render = render($picto);
                          print l($picto_render, $link,array("html"=>true, 'attributes' => array('class' => array('picto_ateliers', $class_render))));
                          $title_render = render($title);
                          echo "<p class=\"title-pictos ".$class_render."\">";
                            print l($title_render, $link,array("html"=>true, 'attributes' => array('class' => array('picto_ateliers'))));
                            echo "</p>";
                          // print l($picto_render,$link,array("html"=>true, 'attributes' => array('class' => array('plus'))));
                        ?>
                        </div><!--
                     <?php } ?>
                      -->
                    </div>
                </div>
            </div>
            <?php }  ?>
        </div>
    </div>
</div>
