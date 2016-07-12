<?php

    $domaine = field_view_field("node",$node,'field_domaines_concernes');

    $nom = field_view_field("node",$node,'field_nom_formation');

    $link = url('node/'.$node->nid, array('absolute' => TRUE));
    if($teaser){
        $nom_render =  render($nom);
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

        if ((render($domaine['0']) == 'cosmetiques' || render($domaine['1']) == 'cosmetiques' || render($domaine['2']) == 'cosmetiques') && isset($couleur_first)) {
             drupal_add_css('.cosmeto-'.$node->nid.':before {background-color: '.$couleur_first.' !important ; } ', 'inline');
          }
        if ((render($domaine['0']) == 'dispositifs' || render($domaine['1']) == 'dispositifs' || render($domaine['2']) == 'dispositifs') && isset($couleur_second)) {
             drupal_add_css('.dispositifs-'.$node->nid.':before {background-color: '.$couleur_second.' !important ; } ', 'inline');
          }
        if ((render($domaine['0']) == 'pharma' || render($domaine['1']) == 'pharma' || render($domaine['2']) == 'pharma') && isset($couleur_third)) {
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

        $image = field_view_field("node",$node,'field_image_formation');
        $objectifs = field_view_field("node",$node,'field_objectifs_formation');
        $public = field_view_field("node",$node,'field_public_concerne');
        $icone_duree = field_view_field("node",$node,'field_icone_duree');
        $duree = field_view_field("node",$node,'field_duree');
        $icone_contact_formation = field_view_field("node",$node,'field_icone_contact_formation');
        $contact_formation = field_view_field("node",$node,'field_contact_formation');
        $icone_prix = field_view_field("node",$node,'field_icone_prix');
        $prix = field_view_field("node",$node,'field_prix');
        $programme_formation = field_view_field("node",$node,'field_programme_formation');
        $images_formation = field_get_items('node', $node, 'field_image_formation');

        $fc_programme_formation = field_get_items('node', $node, 'field_programme_formation');
        if($fc_programme_formation){
            $idti = array();
            foreach ($fc_programme_formation as $fc_field) {
                $idti[] = $fc_field['value'];
            }
            $collectionsg =  field_collection_item_load_multiple($idti);
        }

        $p = file_create_url($images_formation[0]["uri"]);
        drupal_add_css('.formation-detail .dark-layer {background-image: url("'.$p.'") !important ; } ', 'inline');

?>

<div class="formation-detail">
    <h3><?php print render($nom); ?></h3>

    <div class="c-block-offres-detail">
        <div class="c-blanc">
           <div class="c-text">
               <h4>Les objectifs de cette formation</h4>
               <?php print render($objectifs); ?>
           </div>
       </div>
    </div>


    <div class="c-block-offres-detail">
        <div class="c-blanc">
           <div class="c-text">
               <h4>Public concerné</h4>
               <?php print render($public); ?>
           </div>
       </div>
    </div>

    <div class="bloc-gris">

        <?php

            print render($icone_duree);
            print render($duree);

            print render($icone_contact_formation);
            print render($contact_formation);

            print render($icone_prix);
            print render($prix);

        ?>

    </div>

    <h3>Programme de formation</h3>

    <?php

    for($i = 0; $i < count($idti); $i++) {

        $collectionsg_2 = $collectionsg[$idti[$i]];
        $titre = field_view_field('field_collection_item', $collectionsg_2, 'field_titre');
        $description = field_view_field('field_collection_item', $collectionsg_2, 'field_description');

    ?>

       <div class="c-block-offres-detail">
            <div class="c-blanc">
               <div class="c-text">
                   <h4><?php print render($titre); ?></h4>
                   <?php print render($description); ?>
               </div>
           </div>
       </div>

    <?php } ?>

</div>

<?php

    $nid = $node->nid;

    $p = $_SERVER['REQUEST_URI'];
    $a = explode("/",$p);
    $ref = $a[2];
    $link = "content/formulaire-offres-de-formations";
    print l("Pour plus de renseignements, demandez-nous nos fiches formation",$link, array("html"=>true, 'attributes' => array('class' => array('cta')), 'query' => array('nid' => $nid)));

} ?>


