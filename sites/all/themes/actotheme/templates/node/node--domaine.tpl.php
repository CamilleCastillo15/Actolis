<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'body');
    $image = field_view_field("node",$node,'field_image');
    $titre = field_view_field("node",$node,'field_titre_domaine');
    $icone = field_view_field("node",$node,'field_icone');

    $fc_domaines = field_get_items('node', $node, 'field_titre_texte_image');

    if($fc_domaines){
        $idti = array();
        foreach ($fc_domaines as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }
    $images = field_get_items('node', $node, 'field_image');
    $icones = field_get_items('node', $node, 'field_icone');

    dpm($images[0]);

    $p = image_style_url("large",$images[0]["uri"]);
    $m =  file_build_uri($icones[0]["uri"]);

    @dpm($m);

    drupal_add_css('.domaine .c-header {background-image: url("'.$p.'"); !important} ', 'inline');
    drupal_add_css('.b2 .picto {background-image: url: ("'.$icones[0]["uri"].'"); !important} ', 'inline');

?>

<div class="domaine">

    <div class="c-header">

        <h1 class="b2"><div class="picto"></div><span class="c-txt"><?php print render($title); ?></span></h1>
        <div class="sep"></div>

    </div>

    <div class="c-block-domaine">

        <div class="c-gris">

            <div class="c-text">

                <?php print render($body); ?>

            </div>

            <div class="clear"></div>

            <div class="c-img-1"></div>
            <div class="c-img-2"></div>
            <div class="c-img-3"></div>
            <div class="c-img-4"></div>

        </div>

    </div>

    <div class="e-d-c">
    
        <div class="cc-block">  

            <div class="c-block">

                <div class="c-gradient">

                <h1 class="titre">cases studies</h1>
                    <div class="grille">
                        <div class="item">
                            <div class="c-bg">
                                <a href="">
                                    <h2>Titre 1</h2>
                                    <div class="sep"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquet tincidunt odio ut venenatis. </p>
                                    <div class="cta">voir plus</div>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="c-bg">
                                <a href="">
                                    <h2>Titre 1</h2>
                                    <div class="sep"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquet tincidunt odio ut venenatis. </p>
                                    <div class="cta">voir plus</div>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="c-bg">
                                <a href="">
                                    <h2>Titre 1</h2>
                                    <div class="sep"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquet tincidunt odio ut venenatis. </p>
                                    <div class="cta">voir plus</div>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="c-bg">
                                <a href="">
                                    <h2>Titre 1</h2>
                                    <div class="sep"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquet tincidunt odio ut venenatis. </p>
                                    <div class="cta">voir plus</div>
                                </a>
                            </div>
                        </div>

                        <div class="clear"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
