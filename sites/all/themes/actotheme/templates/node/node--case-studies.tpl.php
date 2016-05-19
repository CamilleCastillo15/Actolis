<?php if($teaser){

    $title = field_view_field("node",$node,'field_titre_de_la_case_study');
    //$texte = field_view_field("node",$node,'field_texte_case_study');

    $title_render = render($title);
    $texte_render = render($texte);

     $link = url('node/'.$node->nid, array('absolute' => TRUE));
//     dpm($link);
//
//    print render($link);

    $images = field_get_items('node', $node, 'field_image_case_study');
    $m = file_create_url($images[0]["uri"]);

    //drupal_add_css('.e-d-c .grille .item .c-bg {background-image: url("'.$m.'") !important; } ', 'inline');

    $texte = field_view_field("node",$node,'field_texte_case_study',array(
          'label'=>'hidden',
          'type' => 'text_summary_or_trimmed',
          'settings'=>array('trim_length' => 150),
    ));

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

        ?>

        <h4>  </h4>

<?php    }

    ?>
