<?php

    $title = field_view_field("node",$node,'field_titre_de_la_case_study');
    $texte = field_view_field("node",$node,'field_texte_case_study');

    $image = field_view_field('node', $node, 'field_image_case_study');

    if($teaser){

        $title_render = render($title);

        $link = url('node/'.$node->nid, array('absolute' => TRUE));

        $images = field_get_items('node', $node, 'field_image_case_study');
        $m = file_create_url($images[0]["uri"]);

        $texte = field_view_field("node",$node,'field_texte_case_study',array(
              'label'=>'hidden',
              'type' => 'text_summary_or_trimmed',
              'settings'=>array('trim_length' => 50),
        ));

        $texte_render = render($texte);

        ?>

        <div class="item">
            <div class="c-bg" style="background-image: url(<?php print $m ?>);">
                <h2> <?php print $title_render ?></h2>
                <div class='sep'></div>
                <p><?php print $texte_render ?></p>
            </div>
        </div>

<?php    } else {

        $images_case_studies = field_get_items('node', $node, 'field_image_case_study');

        $p = file_create_url($images_case_studies[0]["uri"]);

        drupal_add_css('.case-studies .dark-layer {background-image: url("'.$p.'") !important ; } ', 'inline');
        $fc_blocscasestudies = field_get_items('node', $node, 'field_blocs_chapitres_etudes_cas');

        if($fc_blocscasestudies){
            $idti = array();
            foreach ($fc_blocscasestudies as $fc_field_pictos) {
                $idti[] = $fc_field_pictos['value'];
            }
            $collectionsg =  field_collection_item_load_multiple($idti);
        }

?>

<div class="case-studies">
    <div class="dark-layer">
        <div class="c-picto">
            <h4><?php print render($title); ?></h4>
        </div>
    </div>
    <div class="bloc-texte-case-studies">
        <?php for($j = 0; $j < count($idti); $j++) {
            $collectionsg_2 = $collectionsg[$idti[$j]];
            $title = field_view_field('field_collection_item', $collectionsg_2, 'field_title_etude_cas');
            $texte = field_view_field('field_collection_item', $collectionsg_2, 'field_texte_etude_cas'); ?>

            <h4><?php print render($title); ?></h4>
            <div class="c-text"><?php print render($texte); ?></div>
        <?php  }  ?>
    </div>
</div>

<?php } ?>


