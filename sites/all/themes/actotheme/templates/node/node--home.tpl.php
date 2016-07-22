<?php

    $styles  = drupal_get_css();
    $body = field_view_field("node",$node,'field_body');
    $image = field_view_field("node",$node,'field_image');
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
            <div class="swiper-pagination"></div>
           <a href="" class="bt-scroll"></a>
            <?php for($i = 0; $i < count($idti); $i++){
                $collectiong = $collectionsg[$idti[$i]];
                $image_field = field_get_items('field_collection_item', $collectiong, 'field_image');
                $image_render = field_view_value('field_collection_item', $collectiong, 'field_image', $image_field[0], array(
                    'type' => 'image',
                    'settings' => array(
                        'image_style' => 'header',
                    )));
                $image_render_mobile = field_view_value('field_collection_item', $collectiong, 'field_image', $image_field[0], array(
                    'type' => 'image',
                    'settings' => array(
                        'image_style' => 'medium',
                    )));
                $titre = field_view_field('field_collection_item', $collectiong, 'field_titre');
                $texte = field_view_field('field_collection_item', $collectiong, 'field_texte');
            ?>

            <div class="home swiper-slide">
                <div class="block-img" >
                   <?php print render($image_render); ?>
                </div>
                <div class="block-w">
                    <h2 class="title-home"><?php print render($titre); ?></h2>
                    <div class="par-home">
                        <?php print render($texte); ?>
                    </div>
                </div>
            </div>
            <?php }  ?>
        </div>
    </div>

    <div class="c-big-cta">
        <?php
            $view_domaines = views_get_view('domaines');
            $view_domaines->execute();
            $result_domaines = $view_domaines->result;
            $i = 1;
            foreach($result_domaines as $key => $value) {
                      $n = node_load($value->nid);
                      $link =drupal_get_path_alias("node/".$value->nid);
                      $picto = field_view_field("node",$n,'field_icone');
                      $title = field_view_field("node",$n,'field_titre_domaine');

                      $title_render = '<h3>'.render($title).'</h3>';
                      $picto_render = '<div class="picto">'.render($picto).'</div>';

                      echo "<div class='b-big-cta b".$i."'>";
                      echo "<div class='color-home color-home-".$i."'></div>";
                      $couleur = field_get_items("node",$n,'field_couleur')[0]['rgb'];
                      drupal_add_css('.home .color-home-'.$i.' {background-color: '.$couleur.' !important ; } ', 'inline');
                      print l($picto_render.$title_render."<div class='cta'>voir plus</div>",$link,array("html"=>true));
                      echo "</div>";

                      $i++;
                   }
            ?>
    </div>

    <div class="c-header">
       <div class="dark-layer">
           <div class="container-vertical">
                <?php
                    $image_bkg_pictos = field_view_field("node",$node,'field_image_background_pictos');
                    $fc_textpictos = field_get_items('node', $node, 'field_pictos_textes');
                    if($fc_textpictos){
                        $idti_pictos = array();
                        foreach ($fc_textpictos as $fc_field_pictos) {
                            $idti_pictos[] = $fc_field_pictos['value'];
                        }
                        $collectionsg_pictos =  field_collection_item_load_multiple($idti_pictos);
                    }
                    for($j = 0; $j < count($idti_pictos); $j++) {
                        $collectionsg_pictos_2 = $collectionsg_pictos[$idti_pictos[$j]];
                        $pictos = field_view_field('field_collection_item', $collectionsg_pictos_2, 'field_pictos');
                        $chiffres = field_view_field('field_collection_item', $collectionsg_pictos_2, 'field_chiffres');
                        $textes = field_view_field('field_collection_item', $collectionsg_pictos_2, 'field_textes');
                ?>
                    <div class="c-picto">
                        <?php print render($pictos); ?>
                        <h2 class="chiffres"><?php print render($chiffres); ?></h2>
                        <h5><?php print render($textes); ?></h5>
                    </div>
                <?php }  ?>
           </div>
        </div>
    </div>

    <div class="acto-news swiper-container">
        <div class="swiper-wrapper">
            <?php
                $fc_acto_news = field_get_items('node', $node, 'field_acto_news');
                if($fc_acto_news){
                    $idti_acto_news = array();
                    foreach ($fc_acto_news as $fc_field_acto_news) {
                        $idti_acto_news[] = $fc_field_acto_news['value'];
                    }
                    $collectionsg_acto_news =  field_collection_item_load_multiple($idti_acto_news);

                for($j = 0; $j < count($idti_acto_news); $j++) {
                    $collectionsg_acto_news_2 = $collectionsg_acto_news[$idti_acto_news[$j]];
                    $image_acto_news = field_get_items('field_collection_item', $collectionsg_acto_news_2, 'field_image_acto_news');
                    $image_acto_news_render = field_view_value('field_collection_item', $collectionsg_acto_news_2, 'field_image_acto_news', $image_acto_news[0], array(
                        'type' => 'image',
                        'settings' => array(
                            'image_style' => 'header',
                        )));
                    $image_acto_news_render_mobile = field_view_value('field_collection_item', $collectionsg_acto_news_2, 'field_image', $image_acto_news[0], array(
                        'type' => 'image',
                        'settings' => array(
                            'image_style' => 'medium',
                        )) );
                    $title_acto_news = field_view_field('field_collection_item', $collectionsg_acto_news_2, 'field_titre_acto_news');
                    $body_acto_news = field_view_field('field_collection_item', $collectionsg_acto_news_2, 'field_texte_acto_news');
                    $link_acto_news = field_view_field('field_collection_item', $collectionsg_acto_news_2, 'field_lien_externe');

                    $link_acto_news_render = render($link_acto_news);

                    dpm($link_acto_news_render);

            ?>
            <div class="swiper-slide">
                <h3>acto - news</h3>
                <div class="image-acto-news">
                    <?php print render($image_acto_news_render); ?>
                </div>
                <div class="body-acto-news">
                    <h4> <?php print render($title_acto_news); ?> </h4>
                    <br />
                    <br />
                    <?php print render($body_acto_news);
                    if($link_acto_news_render != ""){ ?>
                        <?php print l("en savoir plus", $link_acto_news_render, array("html"=>true, 'external' => TRUE,  'attributes' => array('class' => array( 'cta', 'offre_suivante'),'target'=>'_blank'))); ?>
                    <?php } ?>
                </div>
            </div>
            <?php }  ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <?php } ?>

     <div class="c-block">
       <?php
            $title_rejoignez_nous = field_view_field("node",$node,'field_title_rejoignez_nous');
            $texte_rejoignez_nous = field_view_field("node",$node,'field_texte_rejoignez_nous');
            $images_rejoignez_nous_bloc = field_get_items('node', $node, 'field_image_background_pictos');
            $p = file_create_url($images_rejoignez_nous_bloc[0]["uri"]);
            drupal_add_css('.home .c-header {background-image: url("'.$p.'") !important ; } ', 'inline');
        ?>
        <div class="c-gradient">
            <div class="c-text">
                <h3><?php print render($title_rejoignez_nous); ?></h3>
                <?php print render($texte_rejoignez_nous); ?>
                <div class="c-cta">
                    <?php print l("en savoir plus", "/content/lecoindestalents", array("html"=>true, 'attributes' => array('class' => array('cta')))); ?>
                </div>
            </div>
            <div class="c-img">
            </div>
        </div>
    </div>
</div>


