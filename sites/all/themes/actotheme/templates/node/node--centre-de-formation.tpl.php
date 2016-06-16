<?php
    $styles  = drupal_get_css();
    $texte_formation = field_view_field("node",$node,'field_texte_centre_formation');
    $image_formation = field_view_field("node",$node,'field_image_centre_formation');
    $titre_fc_formation = field_view_field("node",$node,'field_titre_fc_centre_formation');

    $fc_centre_formation = field_get_items('node', $node, 'field_fc_centre_formation');

    if($fc_centre_formation){
        $idti = array();
        foreach ($fc_centre_formation as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }

     //$bkg_fc_formation = field_view_field("node",$node,'field_bkg_fc_formation');

     $bkg_fc_formation = field_get_items("node",$node,'field_bkg_fc_formation');
     $p = image_style_url("large",$bkg_fc_formation[0]["uri"]);

     drupal_add_css('.centre-formation .c-header .c-img {background-image: url("'.$p.'") !important; } ', 'inline');

     $titre_offres_formations = field_view_field("node",$node,'field_titre_offres_formations');
     $texte_mobilite = field_view_field("node",$node,'field_texte_mobilite');

?>

<div class="centre-formation">

    <div class="c-block-histoire">

        <div class="c-blanc">
                
            <div class="c-text">
                <h4><?php print render($title) ?></h4>
                <?php print render($texte_formation) ?>

            </div>
            <div class="c-img"> 
                
            </div>

        </div>
    
    </div> 

    <div class="c-header">

        <div class="dark-layer">

            <h4><?php print render($titre_fc_formation) ?></h4> 

             <?php for($i = 0; $i < count($idti); $i++){

                    $collectiong_2 = $collectionsg[$idti[$i]];
                    $picto_centre_formation = field_view_field('field_collection_item', $collectiong_2, 'field_picto_centre_formation');
                    $titre_picto_formation = field_view_field('field_collection_item', $collectiong_2, 'field_titre_picto_formation');
                ?>

                <div class="c-picto">
                    <?php print render($picto_centre_formation); ?>
                    <h2><?php print render($titre_picto_formation); ?></h2>
                </div>

            <?php } ?>

        </div>

    </div>

    <div class="c-block-offres">
         <h4>nos offres</h4>
         <p class="ss">
            <?php print render($titre_offres_formations) ?>
         </p>
        
         <div class="cc">

         <?php $view = views_embed_view('offres_de_formations', 'default', $node->nid);
            print $view; ?>

         </div>
    </div>

    <?php
        $link = "content/formulaire-offres-de-formations";
        print l("Pour plus de renseignements, demandez-nous nos fiches formation",$link, array("html"=>true, 'attributes' => array('class' => array('cta')))); ?>

</div>


