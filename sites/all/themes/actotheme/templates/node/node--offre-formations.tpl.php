<?php

    $nom = field_view_field("node",$node,'field_nom_formation');
    $description = field_view_field("node",$node,'field_description_formation');
    $date = field_view_field("node",$node,'field_date_formation');

    $link = url('node/'.$node->nid, array('absolute' => TRUE));

    if($teaser){

        $nom_render =  render($nom);
        $date_render =  render($date);

        ?>

<div class='sep'></div>

            <?php print l("
                <div class='item-offre'>
                    <span class='nom'>".$nom_render."</span>
                    <span class='date'>".$date_render."</span>
                </div>", $link, array("html"=>true)); ?>

<?php    } else {

        $images_formation = field_get_items('node', $node, 'field_image_formation');

        $p = file_create_url($images_formation[0]["uri"]);

        drupal_add_css('.formation-detail .dark-layer {background-image: url("'.$p.'") !important ; } ', 'inline');

?>

<div class="formation-detail">

        <div class="dark-layer">

            <div class="c-picto">
                <h4><?php print render($nom); ?></h4>
            </div>

        </div>

        <div class="bloc-texte-formation-detail">

                <h4><?php print render($date); ?></h4>
                <div class="c-text"><?php print render($description); ?></div>

        </div>

</div>

<?php
$nid = $node->nid;
dpm($node);
dpm($_SERVER['REQUEST_URI']);

$p = $_SERVER['REQUEST_URI'];
$a = explode("/",$p);
$ref = $a[2];
dpm($a);
dpm($ref);
dpm($nid);
$link = "content/formulaire-offres-de-formations";
print l("Pour plus de renseignements, demandez-nous nos fiches formation",$link, array("html"=>true, 'attributes' => array('class' => array('cta')), 'query' => array('nid' => $nid))); ?>



<?php } ?>


