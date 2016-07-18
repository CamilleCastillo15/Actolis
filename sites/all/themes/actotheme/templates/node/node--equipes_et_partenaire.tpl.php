<?php

    $styles  = drupal_get_css();

    //$title = field_view_field("node",$node,'title');
    $body = field_view_field("node",$node,'body');
    $image = field_view_field("node",$node,'field_image_equipe_partenaire');

    $fc_temoignage = field_get_items('node', $node, 'field_temoignage');

    if($fc_temoignage){
        $idti = array();
        foreach ($fc_temoignage as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }

    $images = field_get_items("node",$node,'field_image_equipe_partenaire');
    $p = image_style_url("large",$images[0]["uri"]);

    drupal_add_css('.equipes_et_partenaire .c-block-histoire .c-img {background-image: url("'.$p.'") !important; } ', 'inline');

    $fc_logos_partenaires = field_get_items('node', $node, 'field_fc_partenaires');

    if($fc_logos_partenaires){
        $idti_logos = array();
        foreach ($fc_logos_partenaires as $fc_field) {
            $idti_logos[] = $fc_field['value'];
        }
        $collectionsg_logos =  field_collection_item_load_multiple($idti_logos);
    }

    $title_logos_partenaires = field_view_field("node",$node, 'field_title_logos_partenaires');

?>

<div class="equipes_et_partenaire">

    <div class="c-block-histoire">

        <div class="c-blanc">
                
            <div class="c-text">
                <h4><?php print $title ?></h4>

                <?php print render($body) ?>

            </div>
            <div class="c-img"> 
                
            </div>


        </div>
    
    </div>

   <?php

        for($i = 0; $i < count($idti); $i++) {

        $collectiong_2 = $collectionsg[$idti[$i]];
        $title = field_view_field('field_collection_item', $collectiong_2, 'field_titre');
        $image = field_view_field('field_collection_item', $collectiong_2, 'field_image_temoignage');
        $title_image = field_view_field('field_collection_item', $collectiong_2, 'field_titre_image');
        $texte = field_view_field('field_collection_item', $collectiong_2, 'field_texte_temoignage');

    ?>

    <div class="c-block-temoignage">
        <h5><?php print render ($title); ?></h5>
        <div class="sep"></div>
        <div class="clear"></div>
        <div class="c-avatar">
        <div class="c-img">
             <?php print render($image) ?>
        </div>
           
            <span class="nom"><?php print render($title_image) ?></span>
        </div>
        <div class="c-text"><?php print render($texte) ?></div>
    </div>

    <?php } ?>

    <div class="logos-partenaires">

       <div class="gradient"></div>

          <div class="va">

            <h4><?php //print render($title_logos_partenaires); ?></h4>

       <?php

            for($i = 0; $i < count($idti); $i++) { /*

            $collectionsg_logos_2 = $collectionsg_logos[$idti_logos[$i]];
            $title_logos = field_view_field('field_collection_item', $collectionsg_logos_2, 'field_title_logo_partenaire');
            $image_logos = field_view_field('field_collection_item', $collectionsg_logos_2, 'field_image_logo_partenaire');
            $link_logos = field_view_field('field_collection_item', $collectionsg_logos_2, 'field_link_logo_partenaire');
        ?>

            <div class="c-picto">

                <a href="<?php print render($link_logos)?>" target="_blank">
                    <?php print render($image_logos); ?>
                    <h6><?php print render($title_logos); ?></h6>
                </a>

            </div>

        <?php */}

                $view = views_get_view('partenaires');

              $view->set_display('blockhome');

                $view->execute();
                $result = $view->result;

              ?>

          <div class="acto-news swiper-container">
            <div class="swiper-wrapper">
                <?php foreach($result as $key => $value) { ?>
                   <div class="swiper-slide">
                       <?php
                            $n = node_load($value->nid);
                            $img = field_view_field("node",$n,'field_image');
                            $title = field_view_field("node",$n,'field_titre');
                            $desc = field_view_field("node",$n,'field_description');
                       ?>
                        <h4>Nos partenaires</h4>
                        <div class="image-acto-news">
                            <?php print render($img); ?>
                        </div>
                        <div class="body-acto-news">
                            <h1 class="title"> <?php print render($title); ?> </h1>
                            <br />
                            <br />
                            <?php print render($desc); ?>
                        </div>
                    </div>
                <?php  } ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

      </div>
    </div>
</div>
