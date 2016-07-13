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

            $description = field_view_field("node",$node,'field_description_de_l_offre');
            $activites = field_view_field("node",$node,'field_activites');
            $qualites = field_view_field("node",$node,'field_qualit_s_requises');

            $icone_formation = field_view_field("node",$node,'field_formation_demandee');
            $formation_demandee = field_view_field("node",$node,'field_icone_formation_demandee');

            $icone_type = field_view_field("node",$node,'field_type_de_poste');
            $type = field_view_field("node",$node,'field_icone_type_de_poste');

            $icone_emplacement = field_view_field("node",$node,'field_emplacement_du_poste');
            $emplacement = field_view_field("node",$node,'field_icone_emplacement_poste');

            $icone_experience = field_view_field("node",$node,'field_exp_rience_demandee');
            $experience = field_view_field("node",$node,'field_icone_experiece');

            $icone_langues = field_view_field("node",$node,'field_icone_langues');
            $langues = field_view_field("node",$node,'field_langues_demandees');

            $icone_disponibilite = field_view_field("node",$node,'field_disponibilite_du_poste');
            $disponibilite = field_view_field("node",$node,'field_icone_disponibilite');

            $icone_renumeration = field_view_field("node",$node,'field_renumeration');
            $renumeration = field_view_field("node",$node,'field_icone_renumeration');
        ?>

        <div class="poste-detail">
           <div class="c-block-offres-detail">
                <div class="c-blanc">
                   <div class="c-text img-bloc">
                        <h3><?php print render($nom); ?></h3>
                        <?php print render($description); ?>

                        <?php print render($public); ?>
                    </div>
                    <div class="c-img">
                    </div>
               </div>
            </div>

            <div class="bloc-gris">
               <h4>Informations</h4>
               <div class="formation c-picto">
                    <div class="center">
                        <?php print render($formation); ?>
                        <?php print render($icone_formation); ?>
                    </div>
               </div>
               <div class="type c-picto">
                    <div class="center">
                        <?php print render($type); ?>
                        <?php print render($icone_type); ?>
                    </div>
                </div>
                <div class="emplacement c-picto">
                    <div class="center">
                        <?php print render($emplacement); ?>
                        <?php print render($icone_emplacement); ?>
                    </div>
                </div>
                <div class="experience c-picto">
                    <div class="center">
                        <?php print render($experience); ?>
                        <?php print render($icone_experience); ?>
                    </div>
                </div>
                <div class="langues c-picto">
                    <div class="center">
                        <?php print render($langues); ?>
                        <?php print render($icone_langues); ?>
                    </div>
                </div>
                <div class="disponibilite c-picto">
                    <div class="center">
                        <?php print render($disponibilite); ?>
                        <?php print render($icone_disponibilite); ?>
                    </div>
                </div>
                <div class="renumeration c-picto">
                    <div class="center">
                        <?php print render($renumeration); ?>
                        <?php print render($icone_renumeration); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php

        $nid = $node->nid;

        $p = $_SERVER['REQUEST_URI'];
        $a = explode("/",$p);
        $poste = $a[2];

//        dpm($nid);

        print l("Postuler", "/content/formulaire-rejoignez-nous", array("html"=>true, 'attributes' => array('class' => array('cta')), 'query' => array('nid' => $nid))); ?>

<?php    }

    ?>
