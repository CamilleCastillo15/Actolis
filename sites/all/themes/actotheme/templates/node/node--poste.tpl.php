<?php

    $nom = field_view_field("node",$node,'field_nom_du_poste');
    $caracteristiques = field_view_field("node",$node,'field_caracteristiques_du_poste');
    $description = field_view_field("node",$node,'field_description_de_l_offre');
    $qualites = field_view_field("node",$node,'field_qualit_s_requises');
    $date = field_view_field("node",$node,'field_date');

    $link = url('node/'.$node->nid, array('absolute' => TRUE));

    if($teaser){

        $nom_render =  render($nom);
        $date_render =  render($date);

        ?>

<!--
             <div class="item-offre">
                 <span class="nom"><?php //print render($nom) ?></span>
                 <span class="date"><?php //print render($date) ?></span>
                 <div class="sep"></div>
             </div>
-->

            <?php print l("
                <div class='item-offre'>
                    <span class='nom'>".$nom_render."</span>
                    <span class='date'>".$date_render."</span>
                    <div class='sep'></div>
                </div>", $link, array("html"=>true)); ?>

<?php    } else {

        ?>

        <h4><?php print render($nom); ?></h4>

        <h4>Caractéristiques de l'offre :</h4>
        <?php print render($caracteristiques); ?>

        <h4>Description de l'offre :</h4>
        <?php print render($description); ?>

        <h4>Qualités requises :</h4>
        <?php print render($qualites); ?>

<?php    }

    ?>
