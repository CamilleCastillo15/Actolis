<?php

    $domaine = field_view_field("node",$node,'field_domaines_concernes');

    $nom = field_view_field("node",$node,'field_nom_formation');
    $description = field_view_field("node",$node,'field_description_formation');
    $date = field_view_field("node",$node,'field_date_formation');

    $link = url('node/'.$node->nid, array('absolute' => TRUE));
    if($teaser){
        $nom_render =  render($nom);
        dpm($node->nid);
        $date_render =  render($date);

?>

<div class='sep'></div>

<?php
        $view_domaines = views_get_view('domaines');
        $view_domaines->execute();
        $result_domaines = $view_domaines->result;
        $i = 1;

        ?>
    <?php print l("
        <div class='item-offre'>
            <span class='nom'>".$nom_render."</span>
        </div>", $link, array("html"=>true)); ?>

<?php

    foreach($result_domaines as $key => $value) {

        $n = node_load($value->nid);

        $link =drupal_get_path_alias("node/".$value->nid);
        $picto = field_view_field("node",$n,'field_icone');
        $title = field_view_field("node",$n,'field_titre_domaine');

        $title_render = '<h3>'.render($title).'</h3>';

        $picto_render = '<div class="picto">'.render($picto).'</div>';

if($domaine){
        if($i ==1  ){
            $picto_render = '<div class="picto cosmeto-'.$node->nid.'">'.render($picto).'</div>';
            $couleur_first = field_get_items("node",$n,'field_couleur')[0]['rgb'];
        }
        if($i ==2){
            $picto_render = '<div class="picto dispositifs-'.$node->nid.'">'.render($picto).'</div>';
            $couleur_second = field_get_items("node",$n,'field_couleur')[0]['rgb'];
        }
        if($i ==3){
            $picto_render = '<div class="picto pharma-'.$node->nid.'">'.render($picto).'</div>';
            $couleur_third = field_get_items("node",$n,'field_couleur')[0]['rgb'];
        }

        if (render($domaine['0']) == 'cosmetiques' || render($domaine['1']) == 'cosmetiques' || render($domaine['2']) == 'cosmetiques') {
             drupal_add_css('.cosmeto-'.$node->nid.':before {background-color: '.$couleur_first.' !important ; } ', 'inline');
          }
        if (render($domaine['0']) == 'dispositifs' || render($domaine['1']) == 'dispositifs' || render($domaine['2']) == 'dispositifs') {
             drupal_add_css('.dispositifs-'.$node->nid.':before {background-color: '.$couleur_second.' !important ; } ', 'inline');
          }
        if (render($domaine['0']) == 'pharma' || render($domaine['1']) == 'pharma' || render($domaine['2']) == 'pharma') {
             drupal_add_css('.pharma-'.$node->nid.':before {background-color: '.$couleur_third.' !important ; } ', 'inline');
          }
    }

    echo"<div class='pictos-container'>";
    echo "<div class='color-home color-home-".$i."'></div>";
    $couleur = field_get_items("node",$n,'field_couleur')[0]['rgb'];
    drupal_add_css('.home .color-home-'.$i.' {background-color: '.$couleur.' !important ; } ', 'inline');

    print $picto_render;

            echo"</div>";

              $i++;
           }

    } else {

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
//dpm($node);
//dpm($_SERVER['REQUEST_URI']);

$p = $_SERVER['REQUEST_URI'];
$a = explode("/",$p);
$ref = $a[2];
//dpm($a);
//dpm($ref);
//dpm($nid);
$link = "content/formulaire-offres-de-formations";
print l("Pour plus de renseignements, demandez-nous nos fiches formation",$link, array("html"=>true, 'attributes' => array('class' => array('cta')), 'query' => array('nid' => $nid))); ?>



<?php } ?>


