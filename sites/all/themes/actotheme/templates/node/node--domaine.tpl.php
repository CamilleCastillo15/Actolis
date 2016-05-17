<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'field_body');
    $image = field_view_field("node",$node,'field_image');

    $fc_domaines = field_get_items('node', $node, 'field_titre_texte_image');

    if($fc_domaines){
        $idti = array();
        foreach ($fc_domaines as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }
?>

<div class="domaine">

    <div class="c-header">

        <h1 class="b2"><div class="picto"></div><span class="c-txt">pharma & biotechnologie</span></h1>
        <div class="sep"></div>

    </div>

    <div class="c-block-domaine">

        <div class="c-gris">

       <?php

        for($i = 0; $i < count($idti); $i++) {

        $collectiong_2 = $collectionsg[$idti[$i]];

        $texte = field_view_field('field_collection_item', $collectiong_2, 'field_texte');
        $image_fc = field_view_field('field_collection_item', $collectiong_2, 'field_image_bloc');

        dpm($title);
    ?>

            <div class="c-text">

                <?php print render($texte); ?>

            </div>

            <div class="c-img-1"></div>
            <div class="c-img-2"></div>
            <div class="c-img-3"></div>
            <div class="c-img-4"></div>

            <div class="clear"></div>

    <?php } ?>

        </div>

    </div>


    <div class="c-block-domaine">

        <div class="c-gris">
                
            <div class="c-text">
                <h4>ingénierie</h4>


            </div>
            <div class="c-img"> 
                
            </div>
            <div class="clear"></div>

        </div>
    
    </div>

</div>
