<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'body');
    $image = field_view_field("node",$node,'field_image');

    $fc_rejoignez_nous = field_get_items('node', $node, 'field_fc_rejoignez_nous');

    if($fc_rejoignez_nous){
        $idti = array();
        foreach ($fc_rejoignez_nous as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }

    $images = field_get_items("node",$node,'field_image_rejoignez_nous');
    $p = image_style_url("large",$images[0]["uri"]);

    drupal_add_css('.rejoignez_nous .c-block-histoire .c-img {background-image: url("'.$p.'") !important; } ', 'inline');

?>

<div class="rejoignez_nous">

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

    <div class="c-block-offres">
         <h4>nos offres</h4>
         <div class="cc">
        <?php /*

            for($i = 0; $i < count($idti); $i++) {

            $collectiong_2 = $collectionsg[$idti[$i]];

            $nom = field_view_field('field_collection_item', $collectiong_2, 'field_nom_poste');
            $date = field_view_field('field_collection_item', $collectiong_2, 'field_date');

        ?>


             <div class="item-offre">
                 <span class="nom"><?php print render($nom) ?></span>
                 <span class="date"><?php print render($date) ?></span>
                 <div class="sep"></div>
             </div>

         <?php } */?>

         <?php $view = views_embed_view('offres_de_postes', 'default', $node->nid);
                        print $view; ?>

         </div>
    </div>

    <div class="c-form"> 
        
        <div class="c-text"> 

        <?php

            $texte_formulaire = field_view_field("node",$node,'field_texte_formulaire');

        ?>

           <p><?php print render($texte_formulaire); ?></p>

        </div>

        <div class="cc-block">  

            <div class="c-block">

                <div class="c-gradient">

                   <h4>Candidature spontanée</h4>

                    <?php $form = node_load(13);

                         $view = node_view($form);

                        print render($view); ?>
                            
                </div>
        
            </div>

        </div>
        
    </div>

</div>
