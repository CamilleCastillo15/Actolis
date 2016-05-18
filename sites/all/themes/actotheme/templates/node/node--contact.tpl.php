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

<div class="contact">

    <div class="c-text">
            
        <h4><?php print $title ?></h4>
        <?php print render($body) ?>

    </div>

    <div class="c-block-contact">

        <div class="c-blanc">
                
            <div class="c-text">
                <h5>actolis lyon</h5>
                1 rue jardin des plantes</br>
                69001 Lyon</br>
                <span class="phone">09 81 80 31 65</span>

                <h5>actolis île-de-france</h5>
                Parc Biocitech </br>
                102 avenue Gaston Roussel </br>
                93230 Romainville</br>
                <span class="phone">06 59 16 81 15</span>

                <h5>e-mail</h5>
                <span class="mail">contact@actolis.com</span>
            </div>
            
            <div class="c-img"> 
                <a href="" class="bt-nord"><span class="pointer"></span></a>
                <a href="" class="bt-sud"><span class="pointer"></span></a>
            </div>


        </div>
    
    </div>



    <div class="c-form"> 
        
        <div class="cc-block">  

            <div class="c-block">

                <div class="c-gradient">

                        <h4>contactez-nous</h4>

                        <div class="form-col">
                            <div class="form-item" id="edit-name-wrapper">
                             <label for="edit-name">label <span class="form-required" title="This field is required.">*</span></label>
                             <input type="text" maxlength="60" name="name" id="edit-name" size="30" value="" class="form-text required">
                
                            </div>
                        </div>
                         <div class="form-col">
                            <div class="form-item" id="edit-name-wrapper">
                             <label for="edit-name">label <span class="form-required" title="This field is required.">*</span></label>
                             <input type="text" maxlength="60" name="name" id="edit-name" size="30" value="" class="form-text required">
                
                            </div>
                        </div>
                        <div class="clear"></div>
                            
                </div>
        
            </div>

        </div>
        
    </div>


</div>
