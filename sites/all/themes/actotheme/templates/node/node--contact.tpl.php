<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'body');
    $image = field_view_field("node",$node,'field_image');

    $fc_adresses = field_get_items('node', $node, 'field_fc_adresses');

    if($fc_adresses){
        $idti = array();
        foreach ($fc_adresses as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }


    $fc_emails = field_get_items('node', $node, 'field_fc_emails');

    if($fc_emails){
        $idty = array();
        foreach ($fc_emails as $fc_field) {
            $idty[] = $fc_field['value'];
        }
        $collectionsh =  field_collection_item_load_multiple($idty);
    }

?>

<div class="contact">

    <div class="c-text">
            
        <h4><?php print $title ?></h4>
        <?php print render($body) ?>

    </div>

    <div class="c-block-contact">

        <div class="c-blanc">
                
            <div class="c-text">

                <?php

                    for($i = 0; $i < count($idti); $i++) {

                    $collectiong_2 = $collectionsg[$idti[$i]];

                    $title_adresse = field_view_field('field_collection_item', $collectiong_2, 'field_title_adresse');

                    $adresse = field_view_field('field_collection_item', $collectiong_2, 'field_adresse');

                    $telephone = field_view_field('field_collection_item', $collectiong_2, 'field_telephone');

                ?>

                <h5><?php print render($title_adresse); ?></h5>
                <?php print render($adresse); ?>
                <span class="phone"> <?php print render($telephone); ?></span>

            <?php } ?>

            <?php

                for($i = 0; $i < count($idty); $i++) {

                $collectionh_2 = $collectionsh[$idty[$i]];

                $title_email = field_view_field('field_collection_item', $collectionh_2, 'field_title_email');

                $email = field_view_field('field_collection_item', $collectionh_2, 'field_texte_email');

            ?>

                <h5><?php print render($title_email); ?></h5>
                <span class="mail"><?php print render($email); ?></span>

            <?php } ?>

            </div>
            
            <div class="c-img"> 
                <a target="blank" href="https://www.google.fr/maps/place/Montpellier/@43.6100166,3.8391422,13z/data=!3m1!4b1!4m5!3m4!1s0x12b6af0725dd9db1:0xad8756742894e802!8m2!3d43.610769!4d3.876716" class="bt-nord"><span class="pointer montpellier"></span></a>
                <a target="blank" href="https://www.google.fr/maps/place/BIOCITECH/@48.89392,2.4316879,17.71z/data=!4m8!1m2!2m1!1sParc+Biotech+102+avenue+Gaston+Roussel+93230+Romainville!3m4!1s0x0000000000000000:0x35cc4ec0dc203b21!8m2!3d48.8941708!4d2.4330157" class="bt-nord"><span class="pointer"></span></a>
                <a target="blank" href="https://www.google.fr/maps/place/Actolis/@45.7695649,4.8283971,18z/data=!3m1!4b1!4m5!3m4!1s0x47f4eb0210d1f02f:0x17c7a70a70914863!8m2!3d45.7695649!4d4.8294914" class="bt-sud"><span class="pointer"></span></a>
            </div>


        </div>
    
    </div>

    <div class="c-form"> 
        
        <div class="cc-block">  

            <div class="c-block">

                <div class="c-gradient">

                        <h4>contactez-nous</h4>

                       <?php $form = node_load(14);

                         $view = node_view($form);

                        print render($view); ?>
                        <div class="clear"></div>
                            
                </div>
        
            </div>

        </div>
        
    </div>


</div>
