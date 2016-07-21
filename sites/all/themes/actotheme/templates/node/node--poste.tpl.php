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

            $bkg_image = field_get_items("node",$node,'field_image');
            $p = image_style_url("large",$bkg_image[0]["uri"]);

            drupal_add_css('.poste-detail .c-block-offres-detail .c-img {background-image: url("'.$p.'") !important; } ', 'inline');

            $activites = field_view_field("node",$node,'field_activites');
            $qualites = field_view_field("node",$node,'field_qualit_s_requises');

            $icone_formation = field_view_field("node",$node,'field_icone_formation_demandee');

            $picto_formation = variable_get("actomod_pictos_postes_formation");
            $file = file_load($picto_formation);

            $img_picto_formation = file_create_url($file->uri);

            $formation_demandee = field_view_field("node",$node,'field_formation_demandee');

            $picto_contrat = variable_get("actomod_pictos_postes_contrat");
            $file = file_load($picto_contrat);

            $img_picto_contrat = file_create_url($file->uri);

            $type = field_view_field("node",$node,'field_type_de_poste');

            $picto_localisation = variable_get("actomod_pictos_postes_localisation");
            $file = file_load($picto_localisation);

            $img_picto_localisation = file_create_url($file->uri);

            $emplacement = field_view_field("node",$node,'field_emplacement_du_poste');

            $picto_experience = variable_get("actomod_pictos_postes_experience");
            $file = file_load($picto_experience);

            $img_picto_experience = file_create_url($file->uri);

            $experience = field_view_field("node",$node,'field_exp_rience_demandee');

            $picto_langues = variable_get("actomod_pictos_postes_langues");
            $file = file_load($picto_langues);

            $img_picto_langues = file_create_url($file->uri);

            $langues = field_view_field("node",$node,'field_langues_demandees');

            $picto_disponibilite = variable_get("actomod_pictos_postes_disponibilite");
            $file = file_load($picto_disponibilite);

            $img_picto_disponibilite = file_create_url($file->uri);

            $disponibilite = field_view_field("node",$node,'field_disponibilite_du_poste');


            $picto_salaire = variable_get("actomod_pictos_postes_salaire");
            $file = file_load($picto_salaire);

            $img_picto_salaire = file_create_url($file->uri);

            $renumeration = field_view_field("node",$node,'field_renumeration');

            $nid = $node->nid;

            $nid_prev = prev_next_nid($node->nid, 'prev');
            $link_prev = url('node/'.$nid_prev, array('absolute' => TRUE));
//            dpm($link_prev);

            $nid_next = prev_next_nid($nid, 'next');
            $link_next = url('node/'.$nid_next, array('absolute' => TRUE));
//            dpm($link_next);

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
               <div class="desc-pictos">
                    <div class="formation c-picto">
                        <div class="center">
                            <img src="<?php print $img_picto_formation ?>" />
                            <div class="desc"><?php print render($formation_demandee); ?></div>
                        </div>
                   </div>
                   <div class="type c-picto">
                        <div class="center">
                            <img src="<?php print $img_picto_contrat ?>" />
                            <div class="desc"><?php print render($type); ?></div>
                        </div>
                    </div>
                    <div class="emplacement c-picto">
                        <div class="center">
                            <img src="<?php print $img_picto_localisation ?>" />
                             <div class="desc"><?php print render($emplacement); ?></div>
                        </div>
                    </div>
                    <div class="experience c-picto">
                        <div class="center">
                            <img src="<?php print $img_picto_experience ?>" />
                            <div class="desc"><?php print render($experience); ?></div>
                        </div>
                    </div>
                    <div class="langues c-picto">
                        <div class="center">
                            <img src="<?php print $img_picto_langues ?>" />
                            <div class="desc"><?php print render($langues); ?></div>
                        </div>
                    </div>
                    <div class="disponibilite c-picto">
                        <div class="center">
                            <img src="<?php print $img_picto_disponibilite ?>" />
                            <div class="desc"><?php print render($disponibilite); ?></div>
                        </div>
                    </div>
                    <div class="renumeration c-picto">
                        <div class="center">
                            <img src="<?php print $img_picto_salaire ?>" />
                            <div class="desc"><?php print render($renumeration); ?></div>
                        </div>
                    </div>
               </div>
            </div>

            <div class="c-block-offres-detail second">
                <div class="c-blanc">
                   <div class="c-text">
                        <h4>Activités</h4>
                        <?php print render($activites); ?>

                        <h4>Qualités</h4>
                        <?php print render($qualites); ?>
                    </div>
               </div>
            </div>

            <?php if($nid_prev != 0 || $nid_next != 0 ) { ?>
            <div class="c-block-offres-detail">
                <div class="offres_liens">
                    <?php
                        if($nid_prev != 0) {
                            print l("Offre précédente", $link_prev, array("html"=>true, 'attributes' => array('class' => array('cta', 'offre_precedente', 'offres_boutons_liens'))));
                        }
                        if($nid_next != 0) {
                            print l("Offre suivante", $link_next, array("html"=>true, 'attributes' => array('class' => array('cta', 'offre_suivante', 'offres_boutons_liens'))));
                        } ?>
                </div>
            </div> <?php } ?>

        </div>

        <?php

        $nid = $node->nid;

        $p = $_SERVER['REQUEST_URI'];
        $a = explode("/",$p);
        $poste = $a[2];

            }
    ?>
