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

    <div class="c-header">
       <div class="dark-layer">

        <?php
            $image_bkg_pictos = field_view_field("node",$node,'field_image_background_pictos');
            //drupal_add_css('.c-header:'.$image_bkg_pictos.' !important;}', 'inline');
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
                <p><?php print render($textes); ?></p>
            </div>
            <?php }  ?>
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
                }
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
                        )));
                    $title_acto_news = field_view_field('field_collection_item', $collectionsg_acto_news_2, 'field_titre_acto_news');
                    $body_acto_news = field_view_field('field_collection_item', $collectionsg_acto_news_2, 'field_texte_acto_news');
            ?>
            <div class="swiper-slide">
                <div class="image-acto-news">
                    <?php print render($image_acto_news_render); ?>
                </div>
                <div class="body-acto-news">
                    <?php print render($title_acto_news); ?>
                    <?php print render($body_acto_news); ?>
                </div>
            </div>
            <?php }  ?>
        </div>
    </div>
</div>

