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

    $fc_phrases_valeurs = field_get_items('node', $node, 'field_fc_phrases_valeurs');

    if($fc_phrases_valeurs){
        $idti_phrases_valeurs = array();
        foreach ($fc_phrases_valeurs as $fc_field) {
            $idti_phrases_valeurs[] = $fc_field['value'];
        }
        $collectionsg_phrases_valeurs =  field_collection_item_load_multiple($idti_phrases_valeurs);
    }

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

    <div class="c-header phrases-valeurs">

        <div class="dark-layer">

            <div class="c-phrases-container">

                <?php

                    for($i = 0; $i < 2; $i++) {

                    $collectiong_2_phrases_valeurs = $collectionsg_phrases_valeurs[$idti_phrases_valeurs[$i]];

                    dpm($collectiong_2_phrases_valeurs);

                    $phrase = field_view_field('field_collection_item', $collectiong_2_phrases_valeurs, 'field_phrase');

                    $valeur = field_view_field('field_collection_item', $collectiong_2_phrases_valeurs, 'field_valeur');

                    $picto_valeur = field_view_field('field_collection_item', $collectiong_2_phrases_valeurs, 'field_pictos');

                    dpm($picto_valeur);

                ?>

                <div class="c-in">
                    <div class="c-picto">
                        <h2 class="phrase"><?php print render($phrase); ?></h2>

                        <div class="valeur-container">

                            <h2 class="valeur"><div class="picto_valeur <?php print "number_".$i; ?>"><?php print render($picto_valeur); ?></div><?php print render($valeur); ?></h2>
                        </div>

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

                    $picto_valeur = field_view_field('field_collection_item', $collectiong_2_phrases_valeurs, 'field_pictos');

                ?>
                <div class="c-in">
                    <div class="c-picto">
                        <h2 class="phrase"><?php print render($phrase); ?></h2>

                        <div class="valeur-container">
                            <h2 class="valeur"><div class="picto_valeur <?php print "number_".$i; ?>"><?php print render($picto_valeur); ?></div><?php print render($valeur); ?></h2>
                        </div>

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
