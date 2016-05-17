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

?>

<div class="rejoignez_nous">

    <div class="c-block-histoire">

        <div class="c-blanc">
                
            <div class="c-text">
                <h4>rejoignez-nous</h4>
                <p>                    
                    <strong>Pourquoi nous rejoindre :</strong>
                    <ul>
                        <li>Projets riches et variés</li>
                        <li>L’humain est au centre de nos interventions</li>
                        <li>Une société à taille humaine</li>
                        <li>Vous progresserez avec nous</li>
                        <li>Vous avez un vrai rôle dans la société</li>
                    
                    </ul>
                </p>
                <?php print render($body) ?>

            </div>
            <div class="c-img"> 
                
            </div>


        </div>
    
    </div>



    <div class="c-block-offres">
         <h4>nos offres</h4>
         <div class="cc">
        <?php

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

         <?php } ?>
         </div>
    </div>

    <div class="c-form"> 
        
        <div class="c-text"> 
            <p> 
                Aucune offre ne correspond à ton domaine de compétence ?
                C’est le moment de nous envoyer ta candidature spontanée !
                C’est avec plaisir et intérêt que nous l’étudierons
            </p>
        </div>

        <div class="cc-block">  

            <div class="c-block">

                <div class="c-gradient">

                        formulaire !!!!!
                            
                </div>
        
            </div>

        </div>
        
    </div>


</div>