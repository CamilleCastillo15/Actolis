<?php
    $styles  = drupal_get_css();
    $texte_formation = field_view_field("node",$node,'field_texte_centre_formation');
    $titre_fc_formation = field_view_field("node",$node,'field_titre_fc_centre_formation');

    $fc_centre_formation = field_get_items('node', $node, 'field_fc_centre_formation');

    if($fc_centre_formation){
        $idti = array();
        foreach ($fc_centre_formation as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }


    $image_alignement = field_view_field("node",$node,'field_alignement_image');
    $alignment = render($image_alignement['#items']['0']['value']);
    drupal_add_css('.centre-formation .c-block-histoire .c-img{background-position: '.$alignment.' !important; } ', 'inline');

     $image_formation = field_get_items("node",$node,'field_image_centre_formation');
     $m = image_style_url("bloc_image",$image_formation[0]["uri"]);
     drupal_add_css('.centre-formation .c-block-histoire .c-img {background-image: url("'.$m.'") !important; } ', 'inline');

     $bkg_fc_formation = field_get_items("node",$node,'field_bkg_fc_formation');
     $p = image_style_url("header",$bkg_fc_formation[0]["uri"]);
     drupal_add_css('.centre-formation .c-header {background-image: url("'.$p.'") !important; } ', 'inline');

     $titre_offres_formations = field_view_field("node",$node,'field_titre_offres_formations');
     $texte_mobilite = field_view_field("node",$node,'field_texte_mobilite');
?>

<div class="centre-formation">
    <div class="c-block-histoire">
        <div class="c-blanc">
            <div class="c-text">
                <h3><?php print render($title) ?></h3>
                <?php print render($texte_formation) ?>

            </div>
            <div class="c-img">
            </div>
        </div>
    </div>
    <div class="c-header">
        <div class="dark-layer">
            <div class="container-vertical">
                <h4><?php print render($titre_fc_formation) ?></h4>
                 <?php for($i = 0; $i < count($idti); $i++){
                        $collectiong_2 = $collectionsg[$idti[$i]];
                        $picto_centre_formation = field_view_field('field_collection_item', $collectiong_2, 'field_picto_centre_formation');
                        $titre_picto_formation = field_view_field('field_collection_item', $collectiong_2, 'field_titre_picto_formation');
    //                    dpm(get_defined_vars());
                    ?>
                    <div class="c-picto">
                        <?php print render($picto_centre_formation); ?>
                        <h5><?php print render($titre_picto_formation); ?></h5>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="c-block-offres">
         <h3>nos offres</h3>
         <p>
            <?php print render($titre_offres_formations) ?><br />
         </p>
         <div class="checkboxes">
             <input name="radio" type="radio" class='checkboxe tous'><span class='nom'> tous </span>
             <input name="radio" type="radio" class='checkboxe cosmeto'><span class='nom'> cosmétiques & OTC </span>
             <input name="radio" type="radio" class='checkboxe dispositifs'><span class='nom'> Dispositifs médicaux </span>
             <input name="radio" type="radio" class='checkboxe pharma'><span class='nom'> Pharma & Biotech </span>
         </div>
         <?php //$i == 0; ?>
         <div class="cc cc-1">
             <?php $view = views_embed_view('offres_de_formations', 'default', $node->nid);
            print $view; ?>
         </div>
         <?php //$i++; ?>
    </div>
    <div class="renseignements-container">
            <?php
            $link = "content/formulaire-offres-de-formations";
            print l("Pour plus de renseignements, demandez-nous nos fiches formation",$link, array("html"=>true, 'attributes' => array('class' => array('renseignements')))); ?>
    </div>
</div>


