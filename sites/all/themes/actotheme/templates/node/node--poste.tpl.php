<?php

    $nom = field_view_field("node",$node,'field_nom_du_poste');
    $link = url('node/'.$node->nid, array('absolute' => TRUE));

    if($teaser){
        $nom_render =  render($nom);

        ?>
            <?php print l("
                <div class='item-offre'>
                    <span class='nom'>".$nom_render."</span>
                    <div class='sep'></div>
                </div>", $link, array("html"=>true)); ?>

<?php    } else {

        $caracteristiques = field_view_field("node",$node,'field_caracteristiques_du_poste');
        $description = field_view_field("node",$node,'field_description_de_l_offre');
        $qualites = field_view_field("node",$node,'field_qualit_s_requises');
        $date = field_view_field("node",$node,'field_date');

        ?>

        <h1><?php print render($nom); ?></h1>

        <div class="caracteristiques"><h4>Caractéristiques de l'offre :</h4>
        <?php print render($caracteristiques); ?></div>

        <div class="description"><h4>Description de l'offre :</h4>
        <?php print render($description); ?></div>

        <div class="qualites"><h4>Qualités requises :</h4>
        <?php print render($qualites); ?></div>

        <?php

        $nid = $node->nid;

        $p = $_SERVER['REQUEST_URI'];
        $a = explode("/",$p);
        $poste = $a[2];

//        dpm($nid);

        print l("Postuler", "/content/formulaire-rejoignez-nous", array("html"=>true, 'attributes' => array('class' => array('cta')), 'query' => array('nid' => $nid))); ?>

<?php    }

    ?>
