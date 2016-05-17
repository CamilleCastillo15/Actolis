<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'field_body');
    $image = field_view_field("node",$node,'field_image_bloc');

    $texte = field_view_field("node",$node,'field_texte');

    $fc_leitmotiv = field_get_items('node', $node, 'field_leitmotiv');

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

            ?>

                <div class="c-picto">
                    <?php print render($icone); ?>
                    <h2><?php print render($title); ?></h2>
                </div>

            <?php } ?>

        </div>

    </div>

    <div class="c-block-histoire">

        <div class="c-blanc">
                
            <div class="c-text">
               
                <?php print render($texte); ?>

            </div>
            <div class="c-img"> 
                
            </div>

        </div>
    
    </div>

</div>

<div class="e-d-c">
    
    <div class="cc-block">  

            <div class="c-block">

                <div class="c-gradient">

                      
                    <h1 class="titre">cases studies</h1>
                    <div class="grille">
                        <div class="item">
                            <a href="">
                                <h2>Titre 1</h2>
                                <div class="sep"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquet tincidunt odio ut venenatis. </p>
                                <div class="cta">voir plus</div>
                            </a>
                        </div>
                    </div>

                            
                </div>
        
            </div>

    </div>

</div>
