<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'field_body');
    $image = field_view_field("node",$node,'field_image');

    $texte = field_view_field("node",$node,'field_texte');

    $fc_leitmotiv = field_get_items('node', $node, 'field_titre_texte_image');

    if($fc_leitmotiv){
        $idti = array();
        foreach ($fc_leitmotiv as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }

?>

<div class="histoire">

    <div class="c-header">

        <div class="dark-layer">

           <?php

                for($i = 0; $i < count($idti); $i++) {

                $collectiong_2 = $collectionsg[$idti[$i]];

                $title = field_view_field('field_collection_item', $collectiong_2, 'field_titre');
                $icone = field_view_field('field_collection_item', $collectiong_2, 'field_icone');

                dpm($title);
            ?>

                <div class="c-picto">
                    <?php print render($icone); ?>
                    <?php print render($title); ?>
                </div>

            <?php } ?>

        </div>

    </div>

    <div class="c-block-histoire">

        <div class="c-blanc">
                
            <div class="c-text">
                <h4>valeurs clefs</h4>
                <?php print render($texte); ?>
                <p>               
                    <strong>Respect et égalité</strong>

                    <ul>
                        <li>Travail collaboratif avec nos clients : nous avons un même objectif</li>
                        <li>Accès donné à l’ensemble de nos locaux aux personnes à mobilité réduite</li>
                    </ul>
                        
                    <strong>Transparence</strong>

                    <ul>
                        <li>Ensemble des informations fournies à nos clients</li>
                        <li>Transparence sur la capacité ou non à prendre un projet</li>
                    </ul>
               
                    <strong>écoute</strong>

                    <ul>
                        <li>Ecoute des équipes et partenaires Actolis</li>
                        <li>Ecoute de besoins clients</li>
                    </ul>

                </p>

            </div>
            <div class="c-img"> 
                
            </div>


        </div>
    
    </div>


</div>
