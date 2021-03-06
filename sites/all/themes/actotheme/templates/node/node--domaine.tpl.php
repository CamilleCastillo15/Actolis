<?php
    $styles  = drupal_get_css();
    $body = field_view_field("node",$node,'body');
    $image = field_view_field("node",$node,'field_image');
    $titre = field_view_field("node",$node,'field_titre_domaine');
    $titre_2 = field_view_field("node",$node,'field_titre_domaine_2');
    $icone = field_view_field("node",$node,'field_icone');
    $couleur = field_get_items("node",$node,'field_couleur')[0]['rgb'];
    $path = current_path();
//    dpm($path);
    $path_alias = drupal_lookup_path('alias',$path);
//    dpm($path_alias);
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
    $couleur = field_get_items("node",$node,'field_couleur')[0]['rgb'];
    $p = image_style_url("header",$images[0]["uri"]);
    $m = file_create_url($icones[0]["uri"]);
    drupal_add_css('.domaine .c-header {background-image: url("'.$p.'") !important; } ', 'inline');
    drupal_add_css('.b2 .picto {background-image: url("'.$m.'"); !important} ', 'inline');


    $bullet = field_get_items('node', $node, 'field_url_bullets');
    $bullet_firefox = field_get_items('node', $node, 'field_url_bullets_firefox');

    $n = file_create_url($bullet[0]["uri"]);
    $o = file_create_url($bullet_firefox[0]["uri"]);

    drupal_add_css('.ul-style, .c-text ul, .node-type-poste .l-content ul {list-style-image: url("'.$n.'") !important; list-style-image: url("'.$o.'") !important; } ', 'inline');
?>

<div class="domaine">
    <div class="c-header">
       <div class="dark-layer">

            <h1 class="b2"><div class="picto"></div><span class="c-txt"><?php print render($titre_2); ?></span></h1>
            <div class="sep"></div>

        </div>
    </div>
    <div class="frise-actions">
        <?php
           for($i = 0; $i < count($idti); $i++) {
               $collectionsg_2 = $collectionsg[$idti[$i]];
               $titre_actions = field_view_field('field_collection_item', $collectionsg_2, 'field_titre_frise');
               drupal_add_css('.domaine .frise-actions .titre-actions:after {border-right: 2px solid '.$couleur.' !important; } ', 'inline');
               drupal_add_css('.domaine .frise-actions .titre-actions:hover,  .domaine .frise-actions .titre-actions.active, .domaine .frise-actions .titre-actions.fill{background-color: '.$couleur.' !important; color: white !important; cursor :pointer !important; } ', 'inline');
               drupal_add_css('.domaine .frise-actions .titre-actions.bg::before{background-color: '.$couleur.' !important; } ', 'inline');
        ?>
           <div class="titre-actions titre-<?php print $i." "; ?>">
               <a href="#"><?php print render($titre_actions); ?></a>
            </div>
        <?php } ?>
    </div>
    <div class="nos-actions">
        <h3>Nos actions</h3>
        <?php
            $actions = field_view_field("node",$node,'field_nos_actions');
            $ancre_case_studies = field_view_field("node",$node,'field_phrase_ancre_case_studies');

             $view = views_get_view('case_studies');
             $view->set_arguments(array($node->nid));
             $view->execute();
             $i = 0;

            print render($actions);
            if($view->result) { ?>

            <a href="#anchor"><?php print render($ancre_case_studies); ?></a>

            <?php } ?>

    </div>
    <div class="c-block-domaine">
        <?php
           for($i = 0; $i < count($idti); $i++) {
               $collectionsg_2 = $collectionsg[$idti[$i]];
               $titre = field_view_field('field_collection_item', $collectionsg_2, 'field_titre_frise');
               $titre_render = render($titre);
               $texte = field_view_field('field_collection_item', $collectionsg_2, 'field_texte');
               $image = field_get_items('field_collection_item', $collectionsg_2, 'field_image_bloc');
               $image_alignement = field_view_field('field_collection_item', $collectionsg_2, 'field_alignement_image');
    //           dpm($image_alignement);
    //           dpm($image_alignement['#items']);
    //           dpm($image_alignement['#items']['0']);
               $alignment = render($image_alignement['#items']['0']['value']);
               drupal_add_css('.c-block-domaine .c-img-'.$i.'{background-position: '.$alignment.' !important; } ', 'inline');
               $n = image_style_url("bloc_image",$image[0]["uri"]);
               drupal_add_css('.c-block-domaine .c-img-'.$i.'{background-image: url("'.$n.'") !important; } ', 'inline');
        ?>
    <div class="c-gris">
        <div class="c-text">
            <h3 class="title titre-<?php print $i ?> liens"><?php print render($titre); ?></h3>
            <?php print render($texte); ?>
        </div>
        <div class="specs-container">
        <?php
           $fc_blocs_specs = field_get_items('field_collection_item', $collectionsg_2, 'field_specifications');
           if($fc_blocs_specs){
                $idti_specs = array();
                foreach ($fc_blocs_specs as $fc_field) {
                    $idti_specs[] = $fc_field['value'];
                }
                $collectionsg_specs =  field_collection_item_load_multiple($idti_specs);
              for($j = 0; $j < count($idti_specs); $j++) {
                  $collectionsg_specs_2 = $collectionsg_specs[$idti_specs[$j]];
                  $spec_title = field_view_field('field_collection_item', $collectionsg_specs_2, 'field_titre');
                  $spec_type = field_view_field('field_collection_item', $collectionsg_specs_2, 'field_type_spec');
                  $spec_num = field_view_field('field_collection_item', $collectionsg_specs_2, 'field_numero');
                  drupal_add_css('.c-block-domaine .c-gris .specs{background-color: '.$couleur.' !important; } ', 'inline');
                ?>
            <div class="specs specs-<?php print $j ?>">
                <div class="spec-textes">
                    <div class="spec-title"><?php print render($spec_title); ?></div>
                    <div class="spec-type"><?php print render($spec_type); ?></div>
                    <div class="spec-num"><?php print render($spec_num); ?></div>
                </div>
            </div>
            <?php }
                    } ?>
            </div>
            <div class='c-img-<?php print $i ?> c-img'></div>
            <div class="clear"></div>
        </div>
    <?php } ?>
        <div class="clear"></div>
    </div>
    <?php



         if($view->result) {

    ?>

    <div id="anchor" class="e-d-c">
            <div class="cc-block ">
<!--                <div class="c-block">-->
<!--                    <div class="c-gradient">-->

                <div class="grille">

                    <h3>case studies</h3>

                    <div class="acto-news swiper-container">

                        <div class="swiper-wrapper">
                        <?php

                                  foreach($view->result as $value) {
                                          $node = node_load($value->nid);
                                          $titre = field_view_field('node',$node,'field_titre_de_la_case_study');
                                          $texte = field_view_field("node",$node,'field_texte_case_study',array(
                                                'label'=>'hidden',
                                                'type' => 'text_summary_or_trimmed',
                                                'settings'=>array('trim_length' => 20),
                                          ));
                                          $domaine = field_view_field('node',$node,'field_domaine');
                                          $blocs = field_view_field('node',$node,'field_blocs_chapitres_etudes_cas');
                                          $image = field_get_items('node',$node,'field_image_case_study');
                                          $o = image_style_url("case_studies",$image[0]["uri"]);
                                          drupal_add_css('.e-d-c .grille .views-row .c-bg-'.$i.'{background-image: url("'.$o.'") !important; } ', 'inline');
                                          $link = url('node/'.$node->nid, array('absolute' => TRUE));
                                          $link2 = $node->nid;

                                          $titre_render =  render($titre);
                                          $texte_render =  render($texte);

                                          $nid = $node->nid;


                                    if($i % 3 == 0 || $i == 0) {  ?>

                                        <div class="views-row swiper-slide">

                                    <?php } ?>
                                    <div class="item">
                                        <div class="c-bg c-bg-<?php print $i ?>">
                                            <?php print l("
                                            <div class='container-case-studies'>
                                                <h2>".$titre_render."</h2>
                                                <div class='sep'></div>
                                                <div class='en_savoir_plus cta'>en savoir plus</div>
                                            </div>"
                                            ,"/case-studies/".$path_alias, array("html"=>true, 'fragment' => "num-".$nid));
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                    $i++;
                                    if($i % 3 == 0 ) {
                                 ?>
                               </div>
                            <?php }
                                    } ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                </div>
        </div>
    </div>

    <?php } ?>

</div>

