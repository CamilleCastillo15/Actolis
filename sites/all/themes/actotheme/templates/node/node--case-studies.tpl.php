<?php

    $title = field_view_field("node",$node,'field_titre_de_la_case_study');
    $texte = field_view_field("node",$node,'field_texte_case_study');

    $image = field_view_field('node', $node, 'field_image_case_study');

    if($teaser){

        $title_render = render($title);


         $link = url('node/'.$node->nid, array('absolute' => TRUE));

        $images = field_get_items('node', $node, 'field_image_case_study');
        $m = file_create_url($images[0]["uri"]);

        //drupal_add_css('.e-d-c .grille .item .c-bg {background-image: url("'.$m.'") !important; } ', 'inline');

        $texte = field_view_field("node",$node,'field_texte_case_study',array(
              'label'=>'hidden',
              'type' => 'text_summary_or_trimmed',
              'settings'=>array('trim_length' => 50),
        ));

        $texte_render = render($texte);

        ?>

        <div class="item">
            <div class="c-bg" style="background-image: url(<?php print $m ?>);">
                    <?php print l("
                    <h2>".$title_render."</h2>
                    <div class='sep'></div>
                    <p>".$texte_render."</p>
                    <div class='cta'>lire la suite</div>", $link, array("html"=>true)); ?>
            </div>
        </div>

<?php    } else {

        $images_case_studies = field_get_items('node', $node, 'field_image_case_study');

        $p = file_create_url($images_case_studies[0]["uri"]);

        drupal_add_css('.case-studies .dark-layer {background-image: url("'.$p.'") !important ; } ', 'inline');
?>

<div class="case-studies">

                <div class="dark-layer">

                    <div class="c-picto">
                        <h4><?php print render($title); ?></h4>
                    </div>
            </div>

        <div class="c-text"><?php print render($texte); ?></div>


    <?php  }  ?>

</div>


