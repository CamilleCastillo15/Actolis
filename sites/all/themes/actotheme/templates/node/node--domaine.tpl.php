<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'body');
    $image = field_view_field("node",$node,'field_image');
    $titre = field_view_field("node",$node,'field_titre_domaine');
    $titre_2 = field_view_field("node",$node,'field_titre_domaine_2');
    $icone = field_view_field("node",$node,'field_icone');

    $fc_blocs_domaines = field_get_items('node', $node, 'field_titre_texte_image');

    if($fc_blocs_domaines){
        $idti = array();
        foreach ($fc_blocs_domaines as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }

    $images = field_get_items('node', $node, 'field_image');
    $icones = field_get_items('node', $node, 'field_icone');

    $p = file_create_url($images[0]["uri"]);
    $m = file_create_url($icones[0]["uri"]);

    drupal_add_css('.domaine .c-header {background-image: url("'.$p.'"); !important} ', 'inline');
    drupal_add_css('.b2 .picto {background-image: url("'.$m.'"); !important} ', 'inline');

?>

<div class="domaine">

    <div class="c-header">

        <h1 class="b2"><div class="picto"></div><span class="c-txt"><?php print render($titre_2); ?></span></h1>
        <div class="sep"></div>

    </div>

    <div class="c-block-domaine">

       <?php

           for($i = 0; $i < count($idti); $i++) {

               $collectionsg_2 = $collectionsg[$idti[$i]];

               $texte = field_view_field('field_collection_item', $collectionsg_2, 'field_texte');
               $image = field_get_items('field_collection_item', $collectionsg_2, 'field_image_bloc');

               $p1 = file_create_url($image[0]["uri"]);

                drupal_add_css('.c-block-domaine .c-img-'.$i.'{background-image: url("'.$p1.'") !important; } ', 'inline');

        ?>

        <div class="c-gris">

            <div class="c-text">

                <?php print render($texte); ?>

            </div>

            <div class='c-img-<?php print $i ?> c-img'></div>

            <div class="clear"></div>

        </div>

        <?php } ?>

        <div class="clear"></div>

    </div>

        <div class="e-d-c">

                <div class="cc-block ">

                    <div class="c-block">

                        <div class="c-gradient">

                        <h1 class="titre">cases studies</h1>

                        <div class="grille">

                            <div class="swiper-container">

                                <div class="swiper-wrapper">

                                <?php

                                 $view = views_get_view('case_studies');
                                 $view->set_arguments(array($node->nid));
                                 $view->execute();
//                                 dpm($view->result);

                                 $i = 0;

                                 if($i % 3 == 0 || $i == 0) {  ?>

                                    <div class="views-row swiper-slide">

                                        <?php }

                                        foreach($view->result as $value) {

                                                $node = node_load($value->nid);
//                                                dpm($node);
                                                $titre = field_view_field('node',$node,'field_titre_de_la_case_study');
                                                $texte = field_view_field('node',$node,'field_texte_case_study');
                                                $domaine = field_view_field('node',$node,'field_domaine');
                                                $blocs = field_view_field('node',$node,'field_blocs_chapitres_etudes_cas');

                                                $image = field_get_items('node',$node,'field_image_case_study');

                                                $p1 = file_create_url($image[0]["uri"]);

                                                drupal_add_css('.e-d-c .grille .views-row .c-bg-'.$i.'{background-image: url("'.$p1.'") !important; } ', 'inline');

                                            ?>

                                        <div class="item ">
                                            <div class="c-bg c-bg-<?php print $i ?>">
                                                <a href="#">
                                                    <div class="">
                                                        <h2><?php print render($titre); ?></h2>
                                                        <div class='sep'></div>
                                                        <p><?php print render($texte); ?></p>
                                                        <div class="cta">Lire la suite</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>


                                <?php $i++;

                                    if($i % 3 == 0 ) {

                                 ?>

                                   </div>

                                <?php }

                                        } /*

                                 $view = views_embed_view('case_studies', 'default', $node->nid);
                                 print $view; */?>



                                <div class="clear"></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

